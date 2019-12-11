<!DOCTYPE html>
<html>
	<head>
		<title>search</title>
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
body{background-image:url('3.jpg');
background-repeat:no-repeat;
background-size:1530px 750px;
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
		margin-top:2%;
	}

		label{margin-right:80%;}
		
		.card-header{
			background-color:DodgerBlue;
			color:black;
		}
	
	
		</style>
		<script>
			function checkForNull1()
            {
                if (document.getElementById('option_value').value=="")
                {
                    alert ("Blank fields not allowed");
					return false;
                }
                return true;
				
            }
			function checkForNull2()
            {
                if (document.getElementById('text_value').value=="")
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
	<body>
	<center>
	<form method="post" onsubmit="return checkForNull1();" >
	<div class="card text-white bg-secondary mb-3" style="max-width: 35rem; max-height: 35rem;">
	<div class="card-header">Search</div>
	<div class="card-body">
    <p class="card-text">
	<label>Search By</label><br>
	<select name="option_value" id="option_value" class="form-control" id="sem" style="width: 30rem; height:2rem">
									<option selected="selected"></option>
                                    <option value="bookId">Book Id</option>
									<option value="title">Book Name</option>									
									<option value="author">Author Name</option>
								</select>
	<br>
    <input type="submit" name="submit1" value="Go" class="btn btn-primary" /><br>  
	</form>

<form method="post" onsubmit="return checkForNull2();">
 <label for="uname">Book</label><br>
	<input type="text" name="text_value" placeholder="Enter Book" id="text_value" class="form-control" style="width: 30rem; height:2rem"/>
         <br>
    <input type="submit" name="submit2" value="Go" class="btn btn-primary" /><br><br>
	 
</form>
	
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
if(isset($_POST['submit1']))
{
	$option_value = $_POST['option_value'];
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 	$_SESSION["option_value"] = $option_value; 
	echo "<h3 align ='center' style='color:white;'>Searching By {$_SESSION['option_value']}</h3>";	


}
if(isset($_POST['submit2']))
{
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }     
	echo "<h3 align ='center'>Searching By {$_SESSION['option_value']}</h3>";	
	$search_value = $_POST['text_value'];
	$query="select * from books where {$_SESSION['option_value']} like '%$search_value%' and status='unissued'";
	$result=mysqli_query($conn,$query);
	if($result->num_rows>0)
	{
					echo "<table align='center' id='tab' class='table table-hover' style='color:white;'>
					<thead>
							<tr>
								<th>BOOK ID</th>
								<th>TITLE</th>
								<th>AUTHOR</th>
								<th>EDITION</th>
								<th>PUBLICATION</th>
							</tr> </thead>";
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

    }
	else 
	{
		echo '<script language="javascript">
		alert("Invalid value");
		location="search.php";
		</script>';
	}
}
?>	


