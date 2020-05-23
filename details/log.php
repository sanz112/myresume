<?php
session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["login-submit"])) {
    include "conn.php";
    $mailuid = test_input($_POST['uid']);
    $password = test_input($_POST['pwd']);

if(empty($mailuid) || empty($password)) {
    header("Location:login.php?error=emptyFields");
    exit();
} else {
    $sql ="SELECT * FROM users WHERE emailUsers=? OR uidUsers=?;";
     $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:login.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row =  mysqli_fetch_assoc($result)) {
            $pwdCheck = password_verify($password, $row["pwdUsers"]);
            if($pwdCheck === false) {
                header("Location:login.php?passworderror=wrongPassword");
                exit();
            } elseif($pwdCheck === true) {
                $_SESSION["userId"] = $row["idUsers"];
                $_SESSION["userUid"] = $row["uidUsers"];
                $_SESSION["emailUid"] = $row["emailUsers"];
                header("Location: ../index.php?login=success");
                exit();
            } else {
                header("Location:login.php?newpassworderror=wrongnewPassword");
                exit();
            }
        } else {
            header("Location:login.php?error=NouserFound");
            exit();
        }
    }
}

} else {
    header("Location: ../index.php");
    exit();
}