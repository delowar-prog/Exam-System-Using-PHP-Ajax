<?php 
$filepath=realpath(dirname(__FILE__));

include_once ($filepath."/../lib/Database.php"); 
include_once ($filepath."/../helpers/Format.php");

class Question{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();
	}

public function AddQuestion($data){
		$quesNo=$this->fm->validation($data['quesNo']);
		$question=$this->fm->validation($data['question']);
		$ans=array();
		$ans[1]=$data['ans1'];
		$ans[2]=$data['ans2'];
		$ans[3]=$data['ans3'];
		$ans[4]=$data['ans4'];
		$rightans=$data['rightans'];

		$query="INSERT INTO tbl_question (quesNo, ques) VALUES ('$quesNo','$question')";
		$queryResult=$this->db->insert($query);

		if($queryResult){
			foreach ($ans as $key => $value) {
				if($ans!=''){
					if($rightans == $key){
						$Rquery="INSERT INTO tbl_ans (quesNo, rightAns, ans) VALUES ('$quesNo', '1','$value')";
					}else{
						$Rquery="INSERT INTO tbl_ans (quesNo, rightAns, ans) VALUES ('$quesNo', '0','$value')";
					}

					$InsertRightAns=$this->db->insert($Rquery);

					if($InsertRightAns){
						continue;
					}else{
						die('error');
					}
				}
			}
			$msg="<span style='color:green'>Inserted Successfully...</span>";
			return $msg;
		}
}

public function getTotalQues(){
	$query="SELECT*FROM tbl_question";
	$result=$this->db->select($query);
	$total=$result->num_rows;
	return $total;
}

public function getQues(){
	$query="SELECT*FROM tbl_question ORDER BY quesNo ASC";
	$result=$this->db->select($query);
	if($result){
		return $result;
	}else{
		$msg="No Question Found";
		return $msg;
	}
}

public function delQues($quesid){
	$tables = array ('tbl_question', 'tbl_ans');
	foreach ($tables as $table) {
		$query="DELETE FROM $table WHERE quesNo='$quesid'";
		$result=$this->db->delete($query);
	}
	if($result){
			$msg="<span style='color:green'>Deleted Successfully...</span>";
			return $msg;
		} else{
			$msg="<span style='color:green'>Data Not Deleted...</span>";
			return $msg;
		}	
}

public function GetQuestionDaka(){
	$query="SELECT*FROM tbl_question";
	$result=$this->db->select($query);
	return $result;
}
public function getQuestionbyId($quesid){
	$query="SELECT*FROM tbl_question WHERE quesNo = '$quesid'";
	$result=$this->db->select($query);
	$value=$result->fetch_assoc();
	return $value;
}

public function getOptionData($quesid){
	$query="SELECT*FROM tbl_ans WHERE quesNo = '$quesid'";
	$result=$this->db->select($query);
	return $result;
}
public function getOptionItem($ansId){
	$query="SELECT*FROM tbl_ans WHERE quesNo = '$quesid'";
	$result=$this->db->select($query);
	return $result;
}

}
?>