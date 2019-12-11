<!DOCTYPE html>
<html>
	<head>
		<title>remove</title>
	</head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>

			.card-header{
			background-color:limegreen;
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
body{background-image:url('4.jpg');
background-repeat:no-repeat;
background-size:1530px 750px;
}

	form	
	{
		margin-top:10%;
	}

		</style>
		<script>
		function checkForNull()
            {
                if (document.getElementById('bookid').value=="")
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
	   <p class="para"><a href="logout.php">Logout</a></p>
		<p class="pa">Logged In As '.$_SESSION['un'].'</p>
		</div>';
?>
	<body>
		<center>
			<form method="post" onsubmit="return checkForNull();">
				<div class="card text-white bg-primary mb-3" style="max-width: 40rem; max-height: 47rem;">
  <div class="card-header">Remove</div>
  <div class="card-body">
    <p class="card-text">
					<table>
						<tr>
							<td>
								<label>Book ID&nbsp;&nbsp;</label>
								<input type="text" name="bookid" id="bookid" class="form-control" placeholder="Enter Book ID" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
						
							<td><center>
								<input type="submit" name="submit" class="btn btn-success"/>	</center>						
							</td>
						</tr>
					</table>
					</p>
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
	$bookid = $_POST['bookid'];
	$query="delete from books where bookId='$bookid'";
	mysqli_query($conn,$query);
	if(mysqli_affected_rows($conn)===1)
	{
		echo '<script language="javascript">
		alert("Book Successfully Removed");
		location="homepage.php";
		</script>';
	}
    else if(mysqli_affected_rows($conn)===0)
	{
		echo '<script language="javascript">
		alert("Book ID does not exist");
		location="remove.php";
		</script>';
	}
    else
	{
		echo '<script language="javascript">
		alert("Already Issued book cannot be removed");
		location="remove.php";
		</script>';
	}		
	
}
?>