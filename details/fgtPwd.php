<?php
session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["reset_password"])) {

//$newemail = $_POST["email"];

$selector = bin2hex(random_bytes(8));

$token = random_bytes(32);

$url = 'localhost:81/mysite/details/resetpassword.php?selector=' . $selector . '&validator=' . bin2hex($token);

$expires = date("U") + 1800 ;

$pwdresetemail = test_input($_POST['email']);

include 'conn.php';

$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";

//$query->bindParam(':uname', $uname); && $conn->prepare($sql) usin PDO Version

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo "<p style='color: red;' class='text-center'>There was an error</p>";
    exit();
} else {
    mysqli_stmt_bind_param($stmt,"s", $pwdresetemail);
    mysqli_stmt_execute($stmt);
   // header("Location: login.php?newpwd=passwordupdated");
}
$sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo "<p style='color: red;' class='text-center'>There was an errorr</p>";
    exit();
} else {
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss", $pwdresetemail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
}


mysqli_stmt_close($stmt);
mysqli_close($conn);

echo "your reset url is <a href='$url'>".$url."</a>";
/*$to = $pwdresetemail;

$subject = 'Reset your password for JoveFarms';

$message = '<p> We received a password reset request. The link to reset your password is below</p>
<p><button class="btn btn-success">Reset Password</button </p>
            <p>Here is your Password Reset Link</p>
            <p><a href="'.$url.'">'.'</a></p>';
$headers = "From: joveFarms <info@jovefarms.com>\r\n";
$headers .="Reply-To: info@jovefarms.com\r\n";
$headers .="Cotent-type: text/html\r\n";

mail($to, $subject, $message, $headers);
*/

} else {
    header("Location: ../index.php?error=notsent");
}