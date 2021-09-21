<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/user.php');
	$user=new User();
?>
<?php 
	if(isset($_GET['dis'])){
		$disid=(int)$_GET['dis'];
		$userDisable=$user->userDisable($disid);
	}
	
	if(isset($_GET['ena'])){
		$enaid=(int)$_GET['ena'];
		$userEnable=$user->userEnable($enaid);
	}
// error_reporting(0);
	if(isset($_GET['del'])){
		$delid=$_GET['del'];
		$userDelete=$user->userDelete($delid);
	}
?>


<div class="main">
<h1>User Profile</h1>
	<?php 
		if(isset($userDisable)){
			echo $userDisable;
		}

		if(isset($userEnable)){
			echo $userEnable;
		}
		if(isset($userDelete)){
			echo $userDelete;
		}
	?>
<table class="tblone">
	<tr>
		<th>No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Status</th>
	</tr>
	<?php 
		$getUserData=$user->getUserData();
		$i=0;
		if($getUserData){
			while ($value=$getUserData->fetch_assoc()) {
			$i++;
	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $value['username']; ?></td>
		<td><?php echo $value['useremail']; ?></td>
		<td>
			<?php 
				if($value['status']=='0'){ ?>			
					<a onclick="return confirm('Are You Sure to Disable....')" href="?dis=<?php echo $value['id']; ?>">Disable</a>
			<?php } else{ ?>
					<a onclick="return confirm('Are You Sure to Enable....')" href="?ena=<?php echo $value['id']; ?>">Enable</a>
			<?php } ?> ||

		<a onclick="return confirm('Are You Sure to Remove....')" href="?del=<?php echo $value['id']; ?>">Remove</a></td>
	</tr>
<?php } } ?>
</table>

	
</div>
<?php include 'inc/footer.php'; ?>