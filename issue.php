<!DOCTYPE html>
<html>
	<head>
		<title>issue</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<style>
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
body{background-image:url('7.png');
background-repeat:no-repeat;
background-size:1600px 750px;
}

	form	
	{
		margin-top:8%;
	}

		label{margin-right:70%;}
		
		.card-header{
			background-color:Darkslategrey  ;
			color:white;
		}
		</style>
		<script>
			function checkForNull()
            {
                if (document.getElementById('usn').value=="" || document.getElementById('bookid').value=="")
                {
                    alert ("Blank fields not allowed");
					return false;
                }
                return true;
				
            }
		
		</script>
	</head>
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
	<body align="center">
	<center>
	<form method="post" onsubmit="return checkForNull();">
	<div class="card text-white bg-warning mb-3" style="max-width: 40rem; max-height: 47rem;">
  <div class="card-header">Issue</div>
  <div class="card-body">
    <p class="card-text">
    <label for="uname">USN</label><br>
	<input type="text" name="usn" placeholder="Enter USN" id="usn" class="form-control" style="width: 30rem; height:2rem"/><br>

    <label for="psw">Book ID</label><br>
    <input type="text" name="bookid" placeholder="Enter Book ID" id="bookid" class="form-control" style="width: 30rem; height:2rem"/><br>
        
   <p><a href="register.php" style="color:red; font-size:15px;"><b>Student Not Registered? Register</b></a></p>
    <input type="submit" name="issue" value="Issue" class="btn btn-dark" />
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
$count=0;
$conn=mysqli_connect("localhost","root","","wta") or die (mysql_error());
if(isset($_POST['issue']))
{
	 $usn = $_POST['usn'];
	 $bookid = $_POST['bookid'];
	 $issue=date('Y-m-d');
	 $return=Date('Y-m-d', strtotime("+15 days"));

	$sql="select bookId from books where status='unissued'";
	$resul=mysqli_query($conn,$sql);
	while($row1 = mysqli_fetch_array($resul))
	{
		if($row1['bookId']==$bookid)
		{
			$query="insert into issued (usn,bookId,issueDate,returnDate) values ('$usn','$bookid','$issue','$return')";
			$query1="update books set status='issued' where bookId='$bookid'";
			$query2="SELECT COUNT(usn) FROM issued WHERE usn='$usn'";
			$result = mysqli_query($conn,$query2);
			$row = mysqli_fetch_row($result);
			if ($row[0]==2)
			{
				echo '<script language="javascript">
				alert("More Than Two Books Cannot Be Issued");
				</script>';
				break;
			}
			else
			{
			    if(mysqli_query($conn,$query))
				{
					mysqli_query($conn,$query1);
					echo '<script language="javascript">
					alert("Book Successfully Issued");
					location="homepage.php";
					</script>';
					break;
				}
				else
				{
					echo '<script language="javascript">
					alert("Invalid USN");
					location="issue.php";
					</script>';
					break;
		
				}
			}
		}
	}//while
	$sql1="select bookId from books where status='issued'";
	$resul1=mysqli_query($conn,$sql1);
	while($row2 = mysqli_fetch_array($resul1))
	{
		if($row2['bookId']==$bookid)
		{
			echo '<script language="javascript">
				alert("Book Already Issued");
				location="issue.php";
				</script>';
				break;
		}
	}
	$sql2="select bookId from books where status='unissued'";
	$resul2=mysqli_query($conn,$sql2);
	while($row3 = mysqli_fetch_array($resul2))
	{
		if($row3['bookId']==$bookid)
		{
			$count++;
		}
	}
	if($count==0)
	{
		echo '<script language="javascript">
				alert("Invalid Book ID");
				location="issue.php";
				</script>';
	}
	

}
?>	`