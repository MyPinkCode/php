<?php
session_start();
if(isset($_POST['login'])){
include("connection.php");
	$con=connect();
	$email=$_POST['username'];
	$password=$_POST['password'];
	if($con){
		$req="SELECT * FROM login  where login_user='$email' and password_user='$password'";
		$res=$con->query($req);	
	if($res->rowCount() == 1){
        $row = $res->fetch();
		$_SESSION['id']=$row['id'];
		$_SESSION['login_admin']=$row['login_user'];
		$_SESSION['status']=$row['status'];
		header("location:index.php");
	}
	else { 
		
		$_SESSION['error']=true;
		header("location:login.php");
	}
}
}

?>