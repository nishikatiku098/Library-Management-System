<!DOCTYPE html>
<html>
	<head>
		<title>register</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<style>
	.card-header{
			background-color:lightcyan;
			color:black;
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
body{background-image:url('6.jpg');
background-repeat:no-repeat;
background-size:1600px 750px;
}


		</style>
		<script>
			function checkForNull()
            {
                if (document.getElementById('usn').value==="" || document.getElementById('fullname').value==="" || document.getElementById('sem').value==="" ||
				document.getElementById('branch').value===""|| document.getElementById('email').value==="" )
   
                {
                    alert ("Blank fields not allowed");
					return false;
                }
                return true;
				
            }
			function checkForValues()
            {
           
			 var regex = /^[0-9]+$/
				var value = regex.test(document.getElementById("phone").value);
				if (value===false) 
				{
			        alert("Enter digits for phone number");
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
	   <p class="para"><a href="logout.php">Logout</a></p>
		<p class="pa">Logged In As '.$_SESSION['un'].'</p>
		</div>';
?>
	<body>
		<center>
			<form method="post" onsubmit="return !!(checkForNull() & checkForValues());">
			
			
			<div class="card text-white bg-primary mb-3" style="max-width: 40rem; max-height: 47rem;">
  <div class="card-header">Register</div>
  <div class="card-body">
    <p class="card-text">
					<table>
						<tr>
							<td>
								<label>USN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								<input type="text" name="usn" id="usn" class="form-control" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
							<td>
								<label>Full Name&nbsp;</label><input type="text" name="fullname" id="fullname" class="form-control" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
							<td><label>Gender</label><br>
							<label class="radio-inline">
							<input type="radio" name="gender" checked>Male
							</label>&nbsp;&nbsp;&nbsp;
							<label class="radio-inline">
							<input type="radio" name="gender">Female
							</label>
							</td>
						</tr>
						<tr>
							<td>
								<label>Semester&nbsp;</label><select name="sem" class="form-control" id="sem" style="width: 30rem; height:2rem">
								<option value="1">I</option>
								<option value="2">II</option>
								<option value="3">III</option>
								<option value="4">IV</option>
								<option value="5">V</option>
								<option value="6">VI</option>
								<option value="7">VII</option>
								<option value="8">VIII</option>
								</select><br>
							</td>
						</tr>
						<tr>
							<td>
								<label>Branch&nbsp;&nbsp;&nbsp;&nbsp;</label></label><select name="branch" id="branch" class="form-control" style="width: 30rem; height:2rem">
								<option value="cse">CSE</option>
								<option value="ise">ISE</option>
								<option value="ece">ECE</option>
								<option value="mech">ME</option>
								</select><br>
							</td>
						</tr>
						<tr>
							<td>
								<label>Phone No.&nbsp;</label><input type="tel" pattern="[1-9]{1}[0-9]{9}" name="phone" id="phone" class="form-control" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
							<td>
								<label>Email Id&nbsp;&nbsp;&nbsp;</label><input type="email" name="email" id="email" class="form-control" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
							<td><center>
								<input type="submit" class="btn btn-light" name="submit"/>
</center>								
							</td>
						</tr>
					</table></p>
  </div>
			</div>		
			
			
			
		
			</form>
			
		</center>
		<div class="footer">

<p>Email - bnm_library@bnmit.in</p>

</div>
	</body>
</html>

<?php
$conn=mysqli_connect("localhost","root","","wta") or die (mysql_error());
if(isset($_POST['submit']))
{
	 $usn = $_POST['usn'];
	 $fn = $_POST['fullname'];
	 $gndr = $_POST['gender'];
	 $sem = $_POST['sem'];
	 $brnch = $_POST['branch'];
	 $phn = $_POST['phone'];
	 $em = $_POST['email'];
	
	$query="insert into student (usn,fullname,gender,sem,branch,phone,email) values ('$usn','$fn','$gndr','$sem','$brnch','$phn','$em')";
	if(mysqli_query($conn,$query))
	{
			echo '<script language="javascript">
			alert("Student Successfully Registered");
			location="homepage.php";
			</script>';
		
	}
	else
	{
		echo '<script language="javascript">
			alert("Student already registered");
			location="register.php";
			</script>';	
	}
}
?>

