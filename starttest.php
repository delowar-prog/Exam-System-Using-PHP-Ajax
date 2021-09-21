<?php include 'inc/header.php'; ?>
<?php 
	$quesNo=$ques->GetQuestionDaka();
	if($quesNo){
		$value=$quesNo->fetch_assoc();
	}
	$Total=$ques->getTotalQues()
?>
<div class="main">
<h1>Welcome to Online Exam</h1>
<div class="starttest_content">
	<h2>Test Your Knowledge</h2>
	<h5>Total Question: <?php echo $Total;?></h5>
	<h5>Question Type: Multiple Choose</h5>
	<a href="test.php?ques=<?php echo $value['quesNo'];?>">Start Now</a>
</div>
<?php include 'inc/footer.php'; ?>