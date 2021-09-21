<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Session.php");
Session::checkLogin();
include_once ($filepath."/../lib/Database.php"); 
include_once ($filepath."/../helpers/Format.php");
class Admin{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
	}

	public function AdLogin($data){
		$adminUser=$this->fm->validation($data['adminUser']);
		$adminPass=$this->fm->validation($data['adminPass']);
		$adminUser=mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPass=mysqli_real_escape_string($this->db->link, $adminPass);

		$query="SELECT* FROM tbl_admin WHERE adminUser='$adminUser' AND adminPass='$adminPass'";
		$queryResult=$this->db->select($query);

		if($queryResult !=false){
			$value=$queryResult->fetch_assoc();
			Session::set('login', true);
			Session::set('User', $value['adminUser']);
			Session::set('Id', $value['adminId']);
			header("Location:index.php");
		} else {
			$msg='user and password not match';
			return $msg;
		}
	}
}
?>