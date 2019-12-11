<!DOCTYPE html>
<html>
	<head>
		<title>signup</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<style>
	label{margin-right:70%;}
		body{
		margin:0% 0%;
		}
		.card-header{
			background-color:Darkslategrey  ;
			color:white;
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


	form	
	{
		margin-top:1%;
	}
body{background-image:url('books.jpg');
background-repeat:no-repeat;
background-size:1600px 750px;
}

		</style>
		<script>
			function checkForNull()
            {
                if (document.getElementById('fullname').value=="" || document.getElementById('username').value=="" || document.getElementById('password').value=="" 
				|| document.getElementById('email').value=="")
                {
                    alert ("Blank fields not allowed");
					return false;
                }
                return true;
				
            }
		</script>
<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }             echo '
        
		<div class="topnav">
		<a class="active" href="#home">Library Management System</a>
				<a href="homepage.php">Go Back</a>
		</div>';
?>
	<body align="center">
	<center>
			<form method="post" onsubmit="return checkForNull();">
			<div class="card text-white bg-success mb-3" style="max-width: 40rem; max-height: 47rem;">
  <div class="card-header">Sign Up</div>
  <div class="card-body">
    <p class="card-text">
	
    <label>Full Name</label><br>
    <input type="text" name="fullname" id="fullname"  placeholder="Enter Fullname" class="form-control" style="width: 30rem; height:2rem"/><br>

    <label>Username</label><br>
    <input type="text" name="username" id="username"  placeholder="Enter Username" class="form-control" style="width: 30rem; height:2rem"/><br>

    <label>Password</label><br>
    <input type="password" name="password" id="password"  placeholder="Enter Password" class="form-control" style="width: 30rem; height:2rem"/><br>
    
	<label>Phone No.</label><br>
    <input type="tel" pattern="[1-9]{1}[0-9]{9}" name="phone" id="phone"  placeholder="Enter Phone" class="form-control" style="width: 30rem; height:2rem"/><br>
	
	<label>Email Id</label><br>
    <input type="email" name="email" id="email"  placeholder="Enter Email" class="form-control" style="width: 30rem; height:2rem"/><br>

      <input type="submit" align="middle"  class="btn btn-dark"  name="submit" value="Sign Up"/>
	  </p>
  </div>
			</div>
</form>
<div class="footer">

<p>Email - bnm_library@bnmit.in</p>

</div>
	</body>
</html>

<?php
$conn=mysqli_connect("localhost","root","","wta") or die (mysql_error());
if(isset($_POST['submit']))
{
	 $fn = $_POST['fullname'];
	 $un = $_POST['username'];
	 $pass = $_POST['password'];
	 $phn = $_POST['phone'];
	 $em = $_POST['email'];
	
	$query="insert into admin (fullname,username,password,phone,email) values ('$fn','$un','$pass','$phn','$em')";
	if(mysqli_query($conn,$query))
	{
		echo '<script language="javascript">;
		alert("Registered successfully");
		location="signin.php";
		</script>';
	 	}
}
?>