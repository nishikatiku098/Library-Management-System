<!DOCTYPE html>
<html>
	<head>
		<title>renew</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
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

body{background-image:url('8.jpg');
background-repeat:no-repeat;
background-size:1600px 750px;
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
		margin-top:8%;
	}

	
label{margin-right:70%;}
		
		.card-header{
			background-color:slategrey  ;
			color:white;
		}
		</style>
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
	<form method="get" onsubmit="return checkForNull();">
	<div class="card text-white bg-info mb-3" style="max-width: 40rem; max-height: 47rem;">
  <div class="card-header">Renew</div>
  <div class="card-body">
    <p class="card-text">
	<label for="uname">USN</label><br>
	<input type="text" name="usn" placeholder="Enter USN" id="usn" class="form-control" style="width: 30rem; height:2rem"/><br>

    <label for="psw">Book ID</label><br>
    <input type="text" name="bookid" placeholder="Enter Book ID" id="bookid" class="form-control" style="width: 30rem; height:2rem"/><br>
        
   <p><a href="issue.php" style="color:yellow; font-size:15px;">Book Not Issued? Issue</a></p>
    <input type="submit" name="renew" value="Renew" class="btn btn-secondary"/>
	</p>
  </div>
			</div>

			</form>
			
			<div class="footer">

<p>Email - bnm_library@bnmit.in</p>

</div>
			</body>
	</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","wta") or die (mysql_error());
if(isset($_GET['renew']))
{
	$usn = $_GET['usn'];
	$bookid=$_GET['bookid'];
	$issue=date('Y-m-d');
	$return=Date('Y-m-d', strtotime("+15 days"));
	$query1="update issued set returnDate='$return',issueDate='$issue' where usn='$usn' and bookId='$bookid'";
	$query3="insert into renewed (usn,bookId) values ('$usn','$bookid')";
	$query2="SELECT COUNT(usn) FROM renewed WHERE usn='$usn' and bookId='$bookid'";
	$query4="select * from issued where usn='$usn' and bookId='$bookid'";
	$result1 = mysqli_query($conn,$query4);
    $row1 = mysqli_fetch_array($result1);
	
    $result = mysqli_query($conn,$query2);
    $row = mysqli_fetch_row($result);
	if(strcmp($row1['usn'],$usn)==0 && strcmp($row1['bookId'],$bookid)==0)
	{
    if ($row[0]==2)
		
	{
		echo '<script language="javascript">
        alert("Books Cannot Be Renewed more than two times");
        </script>';
		
	}
	else 
	{
		
		if(mysqli_query($conn,$query3))
		{
			mysqli_query($conn,$query1);
			echo '<script language="javascript">
			alert("Book Successfully Renewed");
			location="homepage.php";
			</script>';
		}
		else 
		{
			echo '<script language="javascript">
			alert("Invalid Book ID or USN");
			location="renew.php";
			</script>';
		}
	}
	}
	else
	{
			echo '<script language="javascript">
			alert("Book Not Issued");
			location="renew.php";
			</script>';
	}

}
?>
