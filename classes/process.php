<?php 
$filepath=realpath(dirname(__FILE__));

include_once ($filepath."/../lib/Database.php"); 
include_once ($filepath."/../helpers/Format.php");

class Process{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
	}

	public function processData($data){
		$selectAns=$this->fm->validation($data['ans']);
		$number=$this->fm->validation($data['number']);
		$selectAns=mysqli_real_escape_string($this->db->link, $selectAns);
		$number=mysqli_real_escape_string($this->db->link, $number);
		$next=$number+1;

		if(!isset($_SESSION['score'])){
			$_SESSION['score'] = '0';
		}

		$total=$this->totalQuestion();

		$right=$this->rightAsn($number);
		if($right==$selectAns){
			$_SESSION['score']++;
		}

		if($number==$total){
			header('location:final.php');
			exit();
		}else{
			header('location:test.php?ques='.$next);
		}

		//wrong Answer
		if(!isset($_SESSION['wrong_ans'])){
			$_SESSION['wrong_ans']='0';
		}
		if($right!=$selectAns){
			$_SESSION['wrong_ans']++;
		}
	

	}

	private function totalQuestion(){
		$query="SELECT*FROM tbl_question";
		$result=$this->db->select($query);
		$totalQues=$result->num_rows;
		return $totalQues;
	}

	private function rightAsn($number){
		$query="SELECT*FROM tbl_ans WHERE quesNo = '$number' AND rightAns='1' ";
		$result=$this->db->select($query)->fetch_assoc();
		$value=$result['ansId'];
		return $value;
	}
}
?>