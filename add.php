<!DOCTYPE html>
<html>
	<head>
		<title>add</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<style>
	.card-header{
			background-color:SlateGray  ;
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
body{background-image:url('5.jpg');
background-repeat:no-repeat;
background-size:1600px 750px;
}
	
		</style>
			 
		<script>
			function checkForNull()
            {
                if (document.getElementById('bookid').value=="" || document.getElementById('title').value=="" || document.getElementById('author').value=="" 
				|| document.getElementById('publication').value=="")
                {
                    alert ("Blank fields not allowed");
					return false;
                }
                return true;
				
            }
			function checkForValues()
            {
           
			 var regex = /^[0-9]+$/
				var value = regex.test(document.getElementById("edition").value);
				if (value===false) 
				{
			        alert("Enter an year for edition");
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
			<form method="post" name="form" onsubmit="return !!(checkForNull() & checkForValues());">
				<div class="card text-white bg-danger mb-3" style="max-width: 40rem; max-height: 47rem;">
  <div class="card-header">Add Books</div>
  <div class="card-body">
    <p class="card-text">	<table>
						<tr>
							<td>
								<label>Book ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								<input type="text" name="bookid" id="bookid" class="form-control" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
							<td>
								<label>Book Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="title" id="title" class="form-control" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
							<td>
								<label>Book Author&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="author" id="author" class="form-control" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
							<td>
								<label>Book Edition&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" name="edition" id="edition" pattern="[1-2]{1}[0-9]{3}" class="form-control" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
							<td>
								<label>Book Publication&nbsp;</label><input type="text" name="publication" id="publication" class="form-control" style="width: 30rem; height:2rem"/><br>
							</td>
						</tr>
						<tr>
							<td>
							<center>
								<input type="submit" name="submit" class="btn btn-secondary" />
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
if(isset($_POST['submit']))
{
	 $bookid = $_POST['bookid'];
	 $tl = $_POST['title'];
	 $auth = $_POST['author'];
	 $edn = $_POST['edition'];
	 $publn = $_POST['publication'];
	$query="insert into books (bookId,title,author,edition,publication,status) values ('$bookid','$tl','$auth','$edn','$publn','unissued')";
	if(mysqli_query($conn,$query))
	{
		echo '<script language="javascript">
		alert("Book Successfully Added");
		location="homepage.php";
		</script>';
	}
	else
	{
		echo '<script language="javascript">
		alert("Book Id already exists");
		location="add.php";
		</script>';
	
	}
	
}
?>