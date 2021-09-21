<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/loginheader.php');
	include_once ($filepath.'/../classes/admin.php');
	$ad=new Admin();
?>

<div class="main">
<h1>Admin Login</h1>
<div class="adminlogin">
	<?php 
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$LoginResult=$ad->AdLogin($_POST);
		}
	?>

	<form action="login.php" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="adminUser" required="1" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="adminPass" required="1"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login"/></td>
			</tr>
			<tr>
				<td colspan="2">
				<?php
					if(isset($LoginResult)){
						echo $LoginResult;
					}
				?>
				</td>
			</tr>
		</table>
	</form>
</div>
</div>
<?php include 'inc/footer.php'; ?>