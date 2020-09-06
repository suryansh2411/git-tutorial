<?php
session_start();

$conn=mysqli_connect("localhost","root","","user");
  if (isset($_POST['submit'])) {
    extract($_POST);
    $n2=$_POST['n2'];
    $decode=md5($n2);
    $sql="SELECT * FROM `table` WHERE `name`='$n1' && `password`='$decode'";
    $qry=mysqli_query($conn,$sql);
    if ($qry) {
       $data=mysqli_fetch_array($qry);
       if ($data) {
       	   $name=$data['name'];
       	   $_SESSION['name']=$name;
       	   $_SESSION['email']=$data['email'];
       	   $_SESSION['id']=$data['id'];
       	   header("location:wel.php");
       }
    }
    }
  
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <form method="post">
  	<table>
  		<tr>
  			<td>name</td>
  			<td><input type="text" name="n1"></td>
  		</tr>
  		<tr>
  			<td>password</td>
  			<td><input type="password" name="n2"></td>
  		</tr>
  		<tr>
  			<td></td>
  			<td><input type="submit" name="submit"></td>
  		</tr>
  	</table>
  </form>
</body>
</html>