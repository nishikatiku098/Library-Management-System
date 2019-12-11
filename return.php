<!DOCTYPE html>
<html>
	<head>
		<title>return
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	</head>
	<style>
		
			.card-header{
			background-color:Gold  ;
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
body{background-image:url('9.jpg');
background-repeat:no-repeat;
background-size:1600px 750px;
}

	form	
	{
		margin-top:8%;
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
			<form method="get" onsubmit="return checkForNull();">
			<div class="card text-white bg-dark mb-3" style="max-width: 40rem; max-height: 47rem;">
  <div class="card-header">Return</div>
  <div class="card-body">
    <p class="card-text">
			
					<table>
						<tr>
							<td>
								<label>USN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								<input type="text" name="usn" id="usn" class="form-control" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
							<td>
								<label>Book ID&nbsp;</label>
								<input type="text" name="bookid" id="bookid" class="form-control" style="width: 30rem; height:2rem"/><br>

							</td>
						</tr>
						<tr>
							<td><center>
								<input type="submit" name="submit" class="btn btn-warning"/>	
</center>								
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
if(isset($_GET['submit']))
{
	 $usn = $_GET['usn'];
	 $bookid = $_GET['bookid'];
	 
	$query1="update books set status='unissued' where bookId='$bookid'";
	$query2="delete from issued where usn='$usn' and bookId='$bookid'";
	$query4="delete from renewed where usn='$usn' and bookId='$bookid'";
	$query3="select returnDate from issued where usn='$usn' and bookId='$bookid'";
	$result = mysqli_query($conn,$query3);
    $row = mysqli_fetch_row($result);
	if(mysqli_affected_rows($conn)===1)
	{
    if($row[0]==date('Y-m-d')||$row[0]>date('Y-m-d'))
	{
		    mysqli_query($conn,$query4);
			mysqli_query($conn,$query2);
			mysqli_query($conn,$query1);
			echo '<script language="javascript">
			alert("Book Successfully Returned");
			location="homepage.php";
			</script>';
	}
	else if($row[0]<date('Y-m-d'))
	{
		mysqli_query($conn,$query4);
		mysqli_query($conn,$query2);
		mysqli_query($conn,$query1);
		$start_date = strtotime($row[0]); 
        $end_date = strtotime(date('Y-m-d'));
		$diff=($end_date - $start_date)/60/60/24; ?>	
        <script language="javascript">
		alert("Fine Generated Is Rs "+<?php echo $diff; ?>);
		location="homepage.php";
		</script>
		<?php
	}
	}
	else
	{
		echo '<script language="javascript">
			alert("Invalid Book ID or USN");
			location="return.php";
			</script>';
	
	}
}
?>