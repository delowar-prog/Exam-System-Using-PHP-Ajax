<?php include 'inc/header.php'; ?>
<?php
	$getQuestion =$ques->getQues();
	
 ?>

<div class="main">
<h1>Question & Answer</h1>
	<div class="test">
		<?php 
			if($getQuestion){
				while ($Question=$getQuestion->fetch_assoc()) {
		?>
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $Question['quesNo'];?>: <?php echo $Question['ques'];?> </h3>
				</td>
			</tr>
			<?php 
				$quesid=$Question['quesNo'];
				$getOption=$ques->getOptionData($quesid);
				if($getOption){
					while ($value=$getOption->fetch_assoc()) { ?>
			<tr>
				<td>
					<input type="radio"/>
				 <?php 
				 if($value['rightAns']=='1'){
				 	 echo"<span style='color:green'>".$value['ans']."</span>"; 
				 }else{
				 	 echo $value['ans'];
				 }
				
				 ?>
				</td>
			</tr>
			
		<?php } } ?>
			
		</table>
	<?php } } ?>
<div class="back">
	<a href="final.php">Back..</a>
</div>
</div>
 </div>
<?php include 'inc/footer.php'; ?>