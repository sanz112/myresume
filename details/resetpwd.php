<?php
session_start();
//include "../includes/conn.php";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["reset_password_submit"])) {
$selector = test_input($_POST["selector"]);
$validator = test_input($_POST["validator"]);
$pwd = test_input($_POST["newpwd"]);
$password_repeat = test_input($_POST["pwd-repeat"]);
    
    if(empty($pwd) || empty($password_repeat)) {
        header("Location: resetpassword.php?new_password=empty");
        exit();

} else if($pwd !== $password_repeat) {
    header("Location: resetpassword.php?new_password=Password-not-the-same");
    exit();
}

$currentDate = date("U");

include "conn.php";

$sql = "SELECT * FROM  pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo "<p style='color: red;' class='text-center'>There was an error st</p>";
    exit();
} else {
    //$stmt = mysqli_stmt_init($conn);
    mysqli_stmt_bind_param($stmt,"ss", $selector, $currentDate);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(!$row = mysqli_fetch_assoc($result)) {
        echo "You need to re-submit your reset request.";
        exit();
    } else {       
    $tokenBin = hex2bin($validator);
    $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

    if($tokenCheck === false) {
        echo "You need to re-submit your request.";
        exit();
    } elseif ($tokenCheck === true) {
        $tokenEmail = $row['pwdResetEmail'];
        $sql = "SELECT * FROM users WHERE emailUsers=?";
        $stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo "<p style='color: red;' class='text-center'>There was an error somewhere</p>";
    exit();
} else {
    //$tokenEmail = $row['pwdResetEmail'];
    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(!$row = mysqli_fetch_assoc($result)) {
        echo "There was an Error in db.";
        exit();
    } else {
        $sql = "UPDATE users SET pwdUsers=? WHERE emailUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "<p style='color: red;' class='text-center'>There was an error in the email</p>";
            exit();
        } else {
           // $tokenEmail = $row['pwdResetEmail'];
            $newPwdHash = password_hash($pwd, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
            mysqli_stmt_execute($stmt);
            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) {
                echo "<p style='color: red;' class='text-center'>There wan an error some</p>";
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                header("Location: signup.php?newpwd=passwordupdated");
            }

        } 
    }
    }
}
}
}
//mysqli_stmt_close($stmt);
//mysqli_close($conn);
} else {
    echo "not found";
}