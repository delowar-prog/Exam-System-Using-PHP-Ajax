<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/classes/user.php');
	$user=new User();

	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];

	$userRegistration=$user->userRegistrationData($name, $username, $password, $email);

?>