<?php
session_start();
//include "headernew.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password?</title>
    <script src="../js/main.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>

<style>
  form #button1:hover {
        background: #00ff00;
        color: #fff;
    }
form {
    width: 100%;
}
input[type='submit']:hover , #btnlog:hover {
    box-shadow: 5px 5px 4px 3px #000;
    background-color: #eee;
    color: #fff;
}
.form-group {
    padding: 10px 0;
}
body {
    background: #2b2b2b;
}
</style>

<section>
<div style="display: flex; height: 100vh; width: 100%; align-items: center; justify-content: center;">
<div>
<h2 style="text-align: center; color: #fff; margin: 20px 0;"> Password Reset </h2>
<div style="background: #fff; padding: 20px 30px; border-radius: 10px;">
<form action="fgtPwd.php" method="post" enctype="multipart/form-data">
<div class="form-group">
        <input style="width: 300px; padding: 10px; border-radius: 10px; border: none; outline: none;" type="text" name="email"  placeholder="Email Address">
   </div>
   <div style="width: 100%; text-align: center;"  class="form-group">
<input style="color: #fff !important; border-radius: 10px; width: 300px; color: #000; font-size: 16px; font-weight: 500;
border: none; outline: none; cursor: pointer; padding: 10px 0; background: #eece1a;" type="submit" value="Reset Password" name="reset_password">
</div>
</form>
<a style="margin: 20px 0;" href="login.php"><button style="padding: 10px 20px; border-radius: 10px;background: #4d924e; color: #fff !important; font-weight: 500;
border: none; outline: none; cursor: pointer;">Login</button></a>
 <?php 
     include '../footer.php'; 
?>
</div>
</div>
</div>

    <?php

if(isset($_GET["newpwd"])) {
    if($_GET["newpwd"] == "passwordupdated") {
        echo "<p class='resetsucccess'>Your Password has been Updated</p>";
    }
} else if(isset($_GET["reset"])) {
    if($_GET["reset"] == "success") {
    echo "<p class='resetsucccess'>We have Sent You a Link. Check Your E-mail Adrress</p>";
    }
}
    ?>
</section>
<script>
            var d = new Date();
            var k = d.getFullYear() + "." + " " + "All Rights Reserved";
            document.getElementById("datecopy").innerHTML = k;
        </script>
<script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" data-auto-replace-svg="nest"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"> </script>
</body>
</html>