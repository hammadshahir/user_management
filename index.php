<?php

	include 'inc/header.php';
	include 'config.php';
	include 'database.php';
?>

<?php
	
	$db = new Database();
	$query = "SELECT * FROM users";
	$read = $db->select($query);
?>

<div id="right">
	<a href="create.php" class = "button button">Add User</a>
</div>
<?php 

	if(isset($_GET['msg'])) {
		echo "<span style='color:green'>".$_GET['msg']."</span>"; 
	}

?>



<div id="container">
	<table class="tmain">
		<tr>
			<td> ID </th>
			<th> Name </th>
			<th> Email </th>
			<th> Department </th>
			<th> Branch </th>
			<th> Skills </th>
			<th> Action </th>
		</tr>
		<?php if($read) { ?>
		<?php while ($row = $read->fetch_assoc()) { ?>		
		<tr>
			<td> <?php echo $row['user_id'];  ?> </td>
			<td> <?php echo $row['user_name'];  ?> </td>
			<td> <?php echo $row['user_email'];  ?> </td>
			<td> <?php echo $row['department'];  ?> </td>
			<td> <?php echo $row['branch'];  ?> </td>
			<td> <?php echo $row['user_skills'];  ?> </td>
			<td> 
				<a href="update.php?id=<?php echo $row['user_id'];  ?>" class = "button button2"> Edit</a>
			</td>
		</tr>
		<?php  } ?>
		<?php  } else { ?>
			<p>No Data</p>
		<?php  } ?>
	</table>
</div>
<?php
	include 'inc/footer.php';
?>