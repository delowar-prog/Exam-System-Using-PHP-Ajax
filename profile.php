<?php include 'inc/header.php'; ?>
<div class="main">
<h1 class="profile">User Profile</h1>

<div class="pro_content">

	
	<form action="" method="post">
		<?php 
			$id=Session::get('id');
			$getUser=$user->getUserProfile($id);
			if($getUser){
			while ($value=$getUser->fetch_assoc()) {
		?>
		<table>
			<tr>
				<td>UserId</td>
				<td><input type="number" name="id" id="id" value="<?php echo $value['id'];?>"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" id="name" value="<?php echo $value['name'];?>"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" id="username" value="<?php echo $value['username'];?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" id="email" value="<?php echo $value['useremail'];?>"></td>
			</tr>
			<tr>
				<td><input type="submit" id="submit" value="Update"></td>
			</tr>
		</table>
		<?php } } ?>
	</form>

</div>
	
 </div>
<?php include 'inc/footer.php'; ?>