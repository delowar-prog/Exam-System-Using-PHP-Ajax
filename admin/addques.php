<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>

<?php
	//Total question
	$Total=$ques->getTotalQues();
	$QuesNo=$Total+1;

?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$AddQuestion=$ques->AddQuestion($_POST);
	}
?>
<div class="main">
<h1>Add Question</h1>
<?php 
	if(isset($AddQuestion)){
		echo $AddQuestion;
	}
?>
	<div class="add_question">
		<form action="" method="POST">
		<table>
			<tr>
				<td>Question No</td>
				<td>:</td>
				<td>
					<input type="number" name="quesNo" value="<?php 
						if(isset($QuesNo)){
								echo $QuesNo;
								}?>">
				</td>
			</tr>
			<tr>
				<td>Question</td>
				<td>:</td>
				<td><input type="text" name="question"></td>
			</tr>
			<tr>
				<td>Ans One</td>
				<td>:</td>
				<td><input type="text" name="ans1"></td>
			</tr>
			<tr>
				<td>Ans Two</td>
				<td>:</td>
				<td><input type="text" name="ans2"></td>
			</tr>
			<tr>
				<td>Ans Three</td>
				<td>:</td>
				<td><input type="text" name="ans3"></td>
			</tr>
			<tr>
				<td>Ans Four</td>
				<td>:</td>
				<td><input type="text" name="ans4"></td>
			</tr>
			<tr>
				<td>Right Ans</td>
				<td>:</td>
				<td><input type="number" name="rightans"></td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" value="Add Question"></td>
			</tr>
		</table>
		</form>
	</div>

	
</div>
<?php include 'inc/footer.php'; ?>