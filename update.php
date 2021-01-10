<?php
	include 'inc/header.php';
	include 'config.php';
	include 'database.php';
?>
<?php
    $id = $_GET['id'];

    $db = new Database();
    $query = "SELECT * FROM users WHERE user_id=$id ";
    $getData = $db->select($query)->fetch_assoc();
    
	if(isset($_POST['update'])) {
        $user_name = mysqli_real_escape_string($db->link, $_POST['user_name']);
        $user_email = mysqli_real_escape_string($db->link, $_POST['user_email']);
        $department = mysqli_real_escape_string($db->link, $_POST['department']);
		$branch = mysqli_real_escape_string($db->link, $_POST['branch']);
		$user_skills = mysqli_real_escape_string($db->link, $_POST['user_skills']);

		if($user_name == '' || $user_email == '' || $department == '' || $branch == '' || $user_skills == '') {
			$error = 'All fields are mandatory';
		} else {
            $query = "UPDATE `users` 
                        SET user_name = '$user_name',
                            user_email = '$user_email',
                            department = '$department',
                            branch = '$branch',
                            user_skills = '$user_skills' 
                        WHERE `user_id` = $id ";
            $update = $db->update($query);
		}
    }
?>

<?php 

    if(isset($_POST['delete'])) {
       $query = "DELETE FROM users WHERE user_id = '$id' "; 
       $deleteData = $db->delete($query);
    }

?>

<div id="container">
<?php 
if(isset($error)) {
	echo "<span style='color:red'>".$error."</span>";
}
?>
	<div id="left">
		<form action="update.php?id=<?php echo $id; ?>" method="post">
			<table>
				<tr>
					<td colspan="6"><strong>Enter Name:</strong></td>
					<td colspan="8"><input type="text" name="user_name" value="<?php echo $getData['user_name']; ?>" ></td>
				</tr>

				<tr>
					<td colspan="6"><strong>Email:</strong></td>
					<td colspan="8"><input type="text" name="user_email" value="<?php echo $getData['user_email']; ?>" ></td>
                <tr>
					<td colspan="6"><strong>Department:</strong></td>
					<td colspan="8"><input type="text" name="department" value="<?php echo $getData['department']; ?>" ></td>
                </tr>
                <tr>
					<td colspan="6"><strong>Branch:</strong></td>
					<td colspan="8"><input type="text" name="branch" value="<?php echo $getData['branch']; ?>" ></td>
				</tr>
                <tr>
					<td colspan="6"><strong>Skills:</strong></td>
					<td colspan="8"><input type="text" name="user_skills" value="<?php echo $getData['user_skills']; ?>" ></td>
				</tr>

				<tr>
					<td colspan="8"><input type="submit" name="update" value="Update User" class="button" /></td>
                    <td colspan="8"><input type="submit" name="delete" value="Delete User" class="button button3" /></td>

				</tr>
			</table>
		</form>
	</div>
	<div id="center">
		<a href="index.php" class="button button2">Go Back</a>
	</div>
</div>
<?php
	include 'inc/footer.php';
?>