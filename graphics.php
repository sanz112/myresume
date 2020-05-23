<!DOCTYPE html>
<html>
    <head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>My Graphics</title>
</head>
<style>

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: absolute;
  top: 70%;
  left: 50%;
  max-height: 100%;
  transform: translate(-50%, -50%);
}


@media screen and (max-width: 400px) {
  .container {
    top: 60%;
  }
}

/* Hide the images by default */
.mySlides {
  display: none;
 
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  background: green;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev {
  left: 0;
  border-radius: 3px 0 0 3px;
}
/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
<body>
<header>
    <div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="about.php">About Me</a>
    <a href="#Contact">Contact Me</a>
    <a href="resume">Resume</a>
    <a href="#graphics">Graphics</a>
  <a href="details/register.php">Register</a>
  <a href="details/login.php">LogIn</a>
  <div class="menu-btn icon">
            <div class="btn-line"></div>
            <div class="btn-line"></div>
            <div class="btn-line"></div>
        </div>
  </a>
</div>
       
        <nav class="menu">
            <div class="menu-branding">
                <div class="portrait"></div>
            </div>
            <ul class="menu-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#about.php" class="nav-link">About Me</a>
                </li>
                <li class="nav-item">
                    <a href="resume" class="nav-link">Resume</a>
                </li>
                <li class="nav-item current">
                    <a href="graphics.php" class="nav-link">Graphics</a>
                </li>
                <li class="nav-item">
                    <a href="details/register.php" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="details/login.php" class="nav-link">Log In</a>
                </li>
            </ul>
        </nav>
    </header>
    <style>
          @media screen and (max-width: 768px) {
        #aboutnew {
            padding-top: 80px;
            
        }  
         }
        </style>
        <main id="aboutnew">
<h3 style="text-align:center">Some of my Graphics Design</h3>

<div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 5</div>
    <img  src="img/1.jpg" style="width:100%;">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 5</div>
    <img  src="img/2.jpg" style="width:100%;">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 5</div>
    <img  src="img/3.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 5</div>
    <img src="img/4.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 5</div>
    <img src="img/6.jpg" style="width:100%">
  </div>
 
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>
<br>
  <div class="row">
    <div class="column">
      <img class="demo cursor" src="img/1.jpg" style="width:100%" onclick="currentSlide(1)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="img/2.jpg" style="width:100%" onclick="currentSlide(2)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="img/3.jpg" style="width:100%" onclick="currentSlide(3)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="img/4.jpg" style="width:100%" onclick="currentSlide(4)" alt="">
    </div>    
    <div class="column">
      <img class="demo cursor" src="img/6.jpg" style="width:100%" onclick="currentSlide(5)" alt="">
    </div>
   
  </div>
</div>
        </main>
        <br>
 
         
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
   
    <script src="js/main.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" data-auto-replace-svg="nest"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
</script>  
</body>
</html>
