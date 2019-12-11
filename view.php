<!DOCTYPE html>
<html>
	<head>
		<title>view</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<style>
	.topnav {
	background-color: black;
	overflow: hidden;
	height:50px;
}
body{background-image:url('10.jpg');
background-repeat:no-repeat;
background-size:1600px 750px;
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
		margin-top:8%;
	}

		</style>
		<script>
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
		   <form method="post" action="homepage.php">
		    <div>
				<?php
					$conn=mysqli_connect("localhost","root","","wta") or die (mysql_error());
					$query="select bookId,title,author,edition,publication from books where status='unissued'";
					$result=mysqli_query($conn,$query);
					echo "<table id='tab' border='1' class='table table-hover' style='color:white;'>
					<thead>
							<tr class='table-active'>
								<th>BOOK ID</th>
								<th>TITLE</th>
								<th>AUTHOR</th>
								<th>EDITION</th>
								<th>PUBLICATION</th>
							</tr>
							</thead>";
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>".$row['bookId']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['author']."</td>";
						echo "<td>".$row['edition']."</td>";
						echo "<td>".$row['publication']."</td>";			
						echo "</tr>";
					}
					echo "</table>";

				?>
			</div>
		</center>
		<div class="footer">

<p>Email - bnm_library@bnmit.in</p>

</div>
	</body>
</html>
