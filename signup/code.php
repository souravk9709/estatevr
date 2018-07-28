<?php

DEFINE ('DB_USER', 'signup');
DEFINE ('DB_PASSWORD', 'helloworld');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'project1');
 

 
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

if(isset($_POST['submit'])){

 $data_missing = array();
  if(empty($_POST['email'])){
 
        
        $data_missing[] = 'email';
 
    }

else{

$email = $_POST['email'];
}

if(empty($_POST['password'])){
 
        
        $data_missing[] = 'password';
 
    }
else{

$password = $_POST['password'];
}


$sql = "SELECT * FROM userdata WHERE email='$email' AND password='$password'";

$result = mysqli_query($dbc, $sql);

if(mysqli_num_rows($result)>0)
{   
   while($row=mysqli_fetch_assoc($result))
   {
	   $email=$row["email"];
	   $name=$row["name"];
	   session_start();
	   $_SESSION['email']=$email;
	   $_SESSION['name']=$name;
   }
	header ("Location: AfterLogIn.php");
}

else{
 include 'invalid.php';
}
}
else{
	echo "enter the data";
}


?>