<!DOCTYPE html>
<html>
	<head>
		<title>Homepage</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<style>
	
	body 
{
font-family: Bradley Hand, cursive; 
background-color:lightblue ;
}
	.topnav {
	background-color: black;
	overflow: hidden;
	height:50px;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color:Turquoise ;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: LightSkyBlue ;
  color: black;
}

	
.pa{
	color:white;
	font-size:12px;
	padding-top:17px;
	float:right
	}
.para{
	color:white;
	float:right;
	}	
	
* {box-sizing: border-box;}

.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}



/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color:black;
  color: white;
  text-align: center;
  height:50px;
}	

</style>
	<body>
		<?php
			session_start(); 
            echo '
        
		<div class="topnav">
		<a class="active" href="#home">Home</a>
		<a href="view.php">View Available Books</a>
	    <a href="search.php">Search For Books</a>
		<a href="remove.php">Remove Books</a>
		<a href="add.php">Add Books</a>
		<a href="register.php">Register Student</a>
		<a href="issue.php">Issue Books</a>
		<a href="renew.php">Renew Books</a>
		<a href="return.php">Return Books</a>
		<p class="para"><a href="logout.php">Logout</a></p>
		<p class="pa">Logged In As '.$_SESSION['un'].'</p>
		</div>';
		?>
			<br>
<div class="slideshow-container">

<div class="mySlides fade">
  <img src="laura.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="quotes.jpeg" style="margin-left: auto;
  margin-right: auto; display: block; border:10px solid black; width:80%;">
</div>

<div class="mySlides fade">
  <img src="past.jpg" style="margin-left: auto;
  margin-right: auto; display: block; border:10px solid black; width:70%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>


	</body>
	</html>
	<div class="footer">

<p>Email - bnm_library@bnmit.in</p>

</div>

		
	</body>
</html>