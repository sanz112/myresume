<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LogIn</title>
    
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>
<style>
 #button1:hover {
        background: #00ff00;
        color: #fff;
    }
form {
    width: 100%;
}
input[type='submit']:hover , #btnlog:hover {
    background-color: #eee;
    color: #fff !important;
    box-shadow: 5px 5px 4px 3px #000;
    box-shadow: 5px 4px 4px 8px rgba(0,0,0,0,0.65);
}
.form-group {
    padding: 10px 0;
}
body {
    background: #2b2b2b;
}
</style>
<?php
if(!isset($_SESSION["userId"])) {
    echo 
    '
        <div style="display: flex; height: 100vh; width: 100%; align-items: center; justify-content: center;">
        <div>
        <h2 style="text-align: center; color: #fff; margin: 20px 0;"> LogIn </h2>
        <div style="background: #fff; padding: 20px 30px; border-radius: 10px;">
        <form style="width: 100%;"  action="log.php" method="POST" enctype="multipart/form-data">
        <div  class="form-group">
        <input style="width: 300px; padding: 10px; border-radius: 10px; border: none; outline: none;"  type="text" name="uid" autocomplete="on" placeholder="Enter Your Username/Email">
        </div>
        <div class="form-group">
        <input style="width: 300px; padding: 10px;  border-radius: 10px; border: none; outline: none;" type="password" name="pwd" placeholder="Password">
        </div>
        <div style="display: flex; margin: 10px 0;" class="row">
        <p style="text-align: left; font-weight: 300;"><a style="color: #000 !important;" href="forgotPassword.php">Forgot Password?</a></p>
        <p style="font-weight: 300; float: right;"><a style="color: #000 !important;" href="register.php">Register?</a></p>
        </div>
        <div style="width: 100%; text-align:center;" cla ss="form-group">
        <input id="btnlog" style="  border-radius: 10px; width: 300px; color: #000;  padding: 10px 0; font-size: 16px; font-weight: 500;
        border: none; outline: none; cursor: pointer; background: #eece1a;" name="login-submit" type="submit" value="Login">
        </div>';
        ?>
        <?php 
        include '../footer.php'; 
        ?>
        <?php
        echo '
        </form>
        </div>
        </div>
        </div>
        </div>';
        ?>
        <?php
if(isset($_GET["reset"])) {
    if($_GET["reset"] == "success") {
    echo "<p style='font-weight: 600; color: blue;' class='resetsucccess text-center'>We have Sent You a Link. Check Your E-mail Address</p>";
    }
    }else if(isset($_GET["newpwd"])) {
        if($_GET["newpwd"] == "passwordupdated") {
            echo "<p style='font-weight: 600; color: blue;' class='resetsucccess text-center'>Your Password has been updated</p>";
            }
    } 
} else {
    echo "<div style='display: flex; height: 100%; color: #fff !important; align-items: center; justify-content: center; font-size: 26px;'> <h3>You are already logged in</h3></div>";
}
?>
<?php
/*if(isset($_GET["reset"])) {
if($_GET["reset"] == "success") {
echo "<p style='font-weight: 600; color: blue;' class='resetsucccess text-center'>We have Sent You a Link. Check Your E-mail Address</p>";
}
}else if(isset($_GET["newpwd"])) {
    if($_GET["newpwd"] == "passwordupdated") {
        echo "<p style='font-weight: 600; color: blue;' class='resetsucccess text-center'>Your Password has been updated</p>";
        }
} */

   ?> 
   
   <script>
            var d = new Date();
            var k = d.getFullYear() + "." + " " + "All Rights Reserved";
            document.getElementById("datecopy").innerHTML = k;
        </script>
   <script src="../js/main.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" data-auto-replace-svg="nest"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"> </script>
</body>
</html>
