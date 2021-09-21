<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');	
?>

<?php 
if(isset($_GET['delques'])){
	$quesid=(int)$_GET['delques'];
	$delquesData=$ques->delQues($quesid);
}
?>


<div class="main">
<h1>Question List</h1>
	<?php 
		if(isset($delquesData)){
			echo $delquesData;
		}
	?>
<table class="tblone">
	<tr>
		<th width="10%">No</th>
		<th width="70%">Question</th>
		<th width="20%">Status</th>
	</tr>
	<?php 
		$getQues=$ques->getQues();
		$i=0;
		if($getQues){
		while ($value=$getQues->fetch_assoc()) {
		$i++;
	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $value['ques']; ?></td>
		<td>
		<a onclick="return confirm('Are You Sure to Delete....')" href="?delques=<?php echo $value['quesNo']; ?>">Delete</a></td>
	</tr>
<?php } } ?>
</table>

	
</div>
<?php include 'inc/footer.php'; ?>