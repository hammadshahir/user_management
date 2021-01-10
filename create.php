<?php

	include 'inc/header.php';
	include 'config.php';
	include 'database.php';
?>
<?php
	$db = new Database();
	if(isset($_POST['submit'])) {
		$user_name = mysqli_real_escape_string($db->link, $_POST['user_name']);
		$user_email = mysqli_real_escape_string($db->link, $_POST['user_email']);
		$department = mysqli_real_escape_string($db->link, $_POST['department']);
		$branch = mysqli_real_escape_string($db->link, $_POST['branch']);
		$user_skills = mysqli_real_escape_string($db->link, $_POST['user_skills']);

		if($user_name == '' or $user_email == '') {
			$error = 'User name and email is important';
		} else {
			$query = "	INSERT INTO users (user_name, user_email, department, branch, user_skills) 
						VALUES ('$user_name', '$user_email', '$department', '$branch', '$user_skills')";
			$create = $db->insert($query);	
		}

}

?> 

<div id="container">
<?php 
	if(isset($error)) {
		echo "<span style='color:red'>".$error."</span>";
	}
?>
	<div id="left">
		<form action="create.php" method="post">
			<table>
				<tr>
					<td colspan="6"><strong>Enter Name:</strong></td>
					<td colspan="8"><input type="text" name="user_name" placeholder="Enter Full Name"></td>
				</tr>

				<tr>
					<td colspan="6"><strong>Email:</strong></td>
					<td colspan="8"><input type="text" name="user_email" placeholder="Enter Email"></td>
				</tr>

				<tr>
					<td colspan="6"><strong>Department(e.g. Finance):</strong></td>
					<td colspan="8"><input type="text" name="department" placeholder="Department"></td>
				</tr>

				<tr>
					<td colspan="6"><strong>Branch (e.g. Berlin):</strong></td>
					<td colspan="8"><input type="text" name="branch" placeholder="Branch"></td>
				</tr>

				<tr>
					<td colspan="6"><strong>Skills:</strong></td>
					<td colspan="8"><input type="text" name="user_skills" placeholder="Skills"></td>
				</tr>

				<tr>
					<td colspan="8"><input type="submit" name="submit" value="Add User" class="button"></td>
				</tr>
			</table>
		</form>
	</div>
	<div id="center">
		<a href="index.php" class="button button3">Go Back</a>
	</div>
</div>
<?php
	include 'inc/footer.php';
?>