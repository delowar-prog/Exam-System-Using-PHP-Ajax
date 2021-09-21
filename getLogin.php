<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/classes/user.php');
	$user=new User();

	$email=$_POST['email'];
	$password=$_POST['password'];


	$userLogin=$user->userLoginData($email, $password);

?>