<?php  
	 include "config.php";
	// session开始  
    session_start();  
	
    $name = $_POST['name'];   
    $password = $_POST['password'];  
	
	$_SESSION['name'] = $config['username'];
	$_SESSION['password'] =  $config['password'];
 
    if ($password != $_SESSION['password'] && $name != $_SESSION['name']){
		echo "密码错误！";
		echo "<script>alert('密码错误'); history.go(-1);</script>";
		}
    else if ($password == $_SESSION['password'] && $name == $_SESSION['name']){
		$page="index.php";   
  		echo "<script>window.location = \"".$page."\";</script>";  
		}  
?> 