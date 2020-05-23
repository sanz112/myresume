<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NCCF- Register</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>

<style>
.form-group {
    padding: 10px 0;
}

form #button1:hover {
        background: #00ff00;
        color: #fff;
}
form {
    width: 100%;
}
input[type='submit']:hover , #btnlog:hover {
    box-shadow: 5px 4px 4px 8px rgba(0,0,0,0,0.65);
    background-color: #eee;
    color: #fff !important;
    box-shadow: 5px 5px 4px 3px #000;
}

div .form-group {
    padding: 10px 0 !important;
}
body {
    background: #2b2b2b;
}
</style>
<?php
if(!isset($_SESSION["userId"])) {
    echo '
        <div style="display: flex; height: 100vh; width: 100%; align-items: center; justify-content: center;">
        <div>
        <a style="text-align: center;" href="../"><h1> About <em style="color: #eece1a">Me</em></h1></a>
        <h2 style="text-align: center; color: #fff; margin: 20px 0;"> SignUp </h2>
        <div style="background: #fff; padding: 20px 30px; border-radius: 10px;">
        <form style="width: 100%;" action="signup.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <input style="width: 300px; padding: 10px; border-radius: 10px; border: none; outline: none;"  type="text" name="uid" placeholder="Enter Your UserName">
        </div>
        <div class="form-group">
        <input style="width: 300px; padding: 10px; border-radius: 10px; border: none; outline: none;"  type="email" name="mail" autocomplete="on" placeholder="Enter Your Email">
        </div>
        <div class="form-group">
        <input style="width: 300px; padding: 10px;  border-radius: 10px; border: none; outline: none;" type="password" name="pwd" placeholder="Password">
        </div>
        <div class="form-group">
        <input style="width: 300px; padding: 10px;  border-radius: 10px; border: none; outline: none;" type="password" name="pwd-repeat" placeholder="Confirm Password">
        </div>
        <div style="width: 100%; text-align:center;" class="form-group">
        <input id="btnlog" style=" border-radius: 10px; width: 300px; color: #000; font-size: 16px; padding: 10px 0; font-weight: 500;
        border: none; outline: none; background: #eece1a; cursor: pointer;" name="signup-submit" type="submit" value="Register">
        </div>
        ';
        ?>
        <?php 
        include '../footer.php'; 
        ?>
        <?php
        echo '
        </form>
        </div>
        </div>
        </div>';
} else {
    echo "
    <div style='text-align: center; color:#000; font-size: 26px; font-weight: 500;'>
        <h3> You are already Logged. You can register again </h3> 
    </div>";
}
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