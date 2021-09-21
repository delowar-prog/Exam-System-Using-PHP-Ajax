<?php include 'inc/header.php'; ?>
<?php 
	$quesNo=$ques->GetQuestionDaka();
	if($quesNo){
		$value=$quesNo->fetch_assoc();
	}
	$Total=$ques->getTotalQues()
?>
<div class="main">
<h1>You are done!</h1>
	<div class="final">
		<p>Congratulations! You have finished your test.</p>
		<p>Your Score: 
			<?php if(isset($_SESSION['score'])){
				echo $_SESSION['score'];
				unset($_SESSION['score']);
			}?>
		</p>
		<p>Total Answer: 

		</p>
		<p>Wrong Answer: 
			<?php 
			if(isset($_SESSION['wrong_ans'])){
				echo $_SESSION['wrong_ans'];
				unset($_SESSION['wrong_ans']);
			} ?></p><br>
		<a href="viewresult.php">View Result</a>
		<a href="test.php?ques=<?php echo $value['quesNo'];?>">Start Again</a>
	</div>
<?php include 'inc/footer.php'; ?>