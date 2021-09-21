<?php include 'inc/header.php';?>

<?php
	$total=$ques->getTotalQues();
if(isset($_GET['ques'])){
	$quesid=$_GET['ques'];
}else{
	header("location:exam.php");
}
	$getQuestion =$ques->getQuestionbyId($quesid);
	
 ?>

<div class="main">
<h1> <?php echo 'Question '.$getQuestion['quesNo'].' of '.$total;?></h1>
	<div class="test">
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$process=$pro->processData($_POST);
			}
		?>
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $getQuestion['quesNo'];?>: <?php echo $getQuestion['ques'];?> </h3>
				</td>
			</tr>
			<?php 
				$getOption=$ques->getOptionData($quesid);
				if($getOption){
					while ($value=$getOption->fetch_assoc()) { ?>
			<tr>
				<td>
				 <input type="radio" name="ans" value="<?php echo $value['ansId']; ?>"/><?php echo $value['ans']; ?>
				</td>
			</tr>
			
				<?php } } ?>
			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
				<input type="hidden" name="number" value="<?php echo $quesid; ?>" />
			</td>
			</tr>
			
		</table>
	</form>
</div>
 </div>
<?php include 'inc/footer.php'; ?>