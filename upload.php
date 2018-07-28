<!DOCTYPE html>
<html>
<title>Estate Vr</title>
<meta charset="UTF-8">
<style>
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 10;
  -moz-border-radius: 10;
  border-radius: 10px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

</style>


<body>

<form method="post" enctype="multipart/form-data">
	
<input type="file" name="file" />
<input type ="submit" name="submit" value="upload" />


</form>
<br>
<br>
<a href="http://localhost:1234/pro/Gallery.php" class="btn">Gallery</a>
 <?php

DEFINE ('DB_USER', 'signup');
DEFINE ('DB_PASSWORD', 'helloworld');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'project1');
 

 
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

session_start();
   $email=$_SESSION['email'];

if (isset($_POST['submit']))
{
	$name= $_FILES['file']['name'];
	$temp= $_FILES['file']['tmp_name'];
	

	move_uploaded_file($temp,"videos/".$name);
	$sql= "INSERT INTO `video` (`id`, `name`, `Email`) VALUES ('','$name','$email') ";

	 if (mysqli_query($dbc ,$sql))
{
	echo "";
}

  echo "<br>" .$name." ";
}


?>



	</body>
</html>
