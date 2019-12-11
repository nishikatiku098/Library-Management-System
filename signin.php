<!DOCTYPE html>
<html>
	<head>
		<title>signin</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script>
			function checkForNull()
            {
                if (document.getElementById('username').value=="" || document.getElementById('password').value=="")
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

body{background-image:url('books.jpg');
background-repeat:no-repeat;
background-size:1600px 750px;
}
label{margin-right:70%;}
		body{
		color:black;
		}
		.card-header{
			background-color:DodgerBlue ;
			color:white;
		}
		label{
			color:black;
		}	
		
</style>
	</head>
	<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }             echo '
        
		<div class="topnav">
		<a class="active" href="#home">Library Management System</a>
		</div>';
?>
	<body align="center">
	<center>
	<form method="post" onsubmit="return checkForNull();">
	<div class="card text-white bg-light mb-3" style="max-width: 40rem; max-height: 47rem;">
  <div class="card-header">Sign In</div>
  <div class="card-body">
    <p class="card-text">
	 <label for="uname">Username</label>
    </label><br><input type="text" name="username" placeholder="Enter Username" id="username" class="form-control" style="width: 30rem; height:2rem"/><br>

    <label for="psw">Password</label><br>
    <input type="password" name="password" placeholder="Enter Password" id="password" class="form-control" style="width: 30rem; height:2rem"/><br>
        
   <p><a href="signupagain.php" style="color:red; font-size:15px;"><b>Not Registered? Sign Up</b></a></p>
    <input type="submit" name="login" value="Login" class="btn btn-primary" />
	</p>
  </div>
			</div>
</center>
			</form>
			
			<div class="footer">

<p>Email - bnm_library@bnmit.in</p>

</div>
	</body>
</html>

<?php


$conn=mysqli_connect("localhost","root","","wta") or die (mysql_error());
if(isset($_POST['login']))
{
	 $un = $_POST['username'];
	 $pass = $_POST['password'];
	 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
	 $_SESSION["un"] = $un;
	 $query="select username,password from admin where username='$un' and password='$pass'";
     $res=mysqli_query($conn,$query);
	 if(mysqli_num_rows($res)==1)
	 {  
		$query3="select returnDate,usn,bookId from issued";
		$result = mysqli_query($conn,$query3);
		if(mysqli_num_rows($result)>0)
		{
			echo "hello";
			while($row = mysqli_fetch_array($result))
			{
				$x=$row['returnDate'];
				$u=$row['usn'];
				$bid=$row['bookId'];
				$y=date('Y-m-d');
				$z=(strtotime($x)-strtotime($y))/60/60/24;
				if($z==1)
				{
					echo "hello";
					$query5="select email,fullname from student where usn='$u'";
					$res2 = mysqli_query($conn,$query5);
					$row2 = mysqli_fetch_array($res2);
					$query6="select title,author,publication,bookId from books where bookId='$bid'";
					$res3 = mysqli_query($conn,$query6);
					$row3 = mysqli_fetch_array($res3);
					$headers = "From: nishikatiku098@gmail.com";
					$res=mail($row2['email'],"The Return Of Issued Book ","Student Name: ".$row2['fullname']."\nBook Id: ".$row3['bookId']."\nBook Name: ".$row3['title']."\nDue Date: ".$x."\nBook Publication: ".$row3['publication']."\nReturn as soon as possible other wise fine would be applicable",$headers);
					echo '<script language="javascript">;
					alert("Signed in successfully");
					location="homepage.php";
					</script>';
	 
			    }
			    else
			    {
					echo '<script language="javascript">;
					alert("Signed in successfully");
					location="homepage.php";
					</script>';
	 			    }
		    }
	    }//if
		else
	    {
			echo '<script language="javascript">;
			alert("Signed in successfully");
			location="homepage.php";
			</script>';
	 	}
	 }
	 else
	 {
		echo '<script language="javascript">;
		alert("Invalid username or password");
		location="signin.php";
		</script>';
	 }
}
	 
?>
