<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath."/../lib/Session.php");
include_once ($filepath."/../lib/Database.php"); 
include_once ($filepath."/../helpers/Format.php");

class User{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
	}
public function getUserData(){
	$query="SELECT*FROM tbl_user";
	$result=$this->db->select($query);
	if($result){
		return $result;
	}else{
		$msg="No Data Found";
		return $msg;
	}
}
public function userDisable($disid){
	$query="UPDATE tbl_user
			SET 
			status='1'
			WHERE id='$disid'";
	$result=$this->db->update($query);
	if($result){
		$msg="<span style='color:green'>Disabled Successfully...</span>";
		return $msg;
	}else{
		$msg="<span style='color:green'>Not Disabled...</span>";
		return $msg;
	}
}

public function userEnable($enaid){
	$query="UPDATE tbl_user
			SET 
			status='0'
			WHERE id='$enaid'";
	$result=$this->db->update($query);
	if($result){
		$msg="<span style='color:green'>Enabled Successfully...</span>";
		return $msg;
	}else{
		$msg="<span style='color:green'>Not Enabled...</span>";
		return $msg;
	}
}

public function userDelete($delid){
	$query="DELETE FROM tbl_user WHERE id='$delid'";
	$result=$this->db->delete($query);
	if($result){
		$msg="<span style='color:green'>Deleted Successfully...</span>";
		return $msg;
	}else{
		$msg="<span style='color:green'>Not Deleted...</span>";
		return $msg;
	}
}

public function AdLogin($data){
	$adminUser=$this->fm->validation($data['adminUser']);
	$adminPass=$this->fm->validation($data['adminPass']);
	$adminUser=mysqli_real_escape_string($this->db->link, $adminUser);
	$adminPass=mysqli_real_escape_string($this->db->link, $adminPass);
}

public function userRegistrationData($name,$username,$password,$email){
		$name=$this->fm->validation($name);
		$username=$this->fm->validation($username);
		$password=$this->fm->validation($password);
		$email=$this->fm->validation($email);

		$name=mysqli_real_escape_string($this->db->link, $name);
		$username=mysqli_real_escape_string($this->db->link, $username);
		$password=mysqli_real_escape_string($this->db->link, $password);
		$email=mysqli_real_escape_string($this->db->link, $email);

		if($name==""|| $username==""|| $password==""|| $email==""){
			echo "<span class='error'>Field Must Not be Empty...</span>";
			exit();
		}else if(filter_var($email, FILTER_VALIDATE_EMAIL)===false){
			echo "<span class='error'>Invalied Email Address..</span>";
			exit();
		}else{
			$query="SELECT * FROM tbl_user WHERE useremail='$email'";
			$result=$this->db->select($query);
			if($result!=false){
				echo "<span class='error'>Email Allredy Exist..</span>";
				exit();	
			}else{
				$insertQuery="INSERT INTO tbl_user (name,username,useremail,userpass) VALUES ('$name','$username','$email','$password')";
				$InsertRow=$this->db->insert($insertQuery);
				if($InsertRow!=false){
					echo "<span class='success'>Register Successfully..</span>";
					exit();	
				}else{
					echo "<span class='error'>Register Fail..</span>";
					exit();	
				}
			}
			
		}
}

public function userLoginData($email, $password){
		$email=$this->fm->validation($email);
		$password=$this->fm->validation($password);
		$email=mysqli_real_escape_string($this->db->link, $email);
		$password=mysqli_real_escape_string($this->db->link, $password);
		
		if($password==""|| $email==""){
			echo "empty";
			exit();
		}else{
			$query="SELECT * FROM tbl_user WHERE useremail='$email' AND userpass='$password'";
			$result=$this->db->select($query);
			if($result!=false){
				$value=$result->fetch_assoc();
				if($value['status']=='1'){
					echo "disable";
					exit();
				}else{
					Session::init();
					Session::set('login', true);
					Session::set('id', $value['id']);
					Session::set('name', $value['name']);
					Session::set('username', $value['username']);
					Session::set('useremail', $value['useremail']);
				}
			}else{
				echo "error";
				exit();
			}
		}

		
}

public function getUserProfile($id){
	$query="SELECT * FROM tbl_user WHERE id='$id'";
	$result=$this->db->select($query);
	if($result!=false){
		return $result;
	}

}

}
?>