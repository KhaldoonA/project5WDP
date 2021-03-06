<?php

if (isset($_POST['submit'])) 
{
	
	try 
	{
		
		require "connect.php";
		require "common.php";
		$connection = new PDO($dsn, $username, $password, $options);
		$sql = "SELECT * 
						FROM users
						WHERE location = :location";
		$location = $_POST['location'];
		$locationment = $connection->prepare($sql);
		$locationment->bindParam(':location', $location, PDO::PARAM_STR);
		$locationment->execute();
		$result = $locationment->fetchAll();
	}
	
	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}
}
?>
<?php require "header.php"; ?>
		
<?php  
if (isset($_POST['submit'])) 
{
	if ($result && $locationment->rowCount() > 0) 
	{ ?>
		<h2>Contact Results</h2>

		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>Age</th>
					<th>location</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
	<?php 
		foreach ($result as $row) 
		{ ?>
			<tr>
				<td><?php echo escape($row["id"]); ?></td>
				<td><?php echo escape($row["firstname"]); ?></td>
				<td><?php echo escape($row["lastname"]); ?></td>
				<td><?php echo escape($row["email"]); ?></td>
				<td><?php echo escape($row["age"]); ?></td>
				<td><?php echo escape($row["location"]); ?></td>
				<td><?php echo escape($row["date"]); ?> </td>
			</tr>
		<?php 
		} ?>
		</tbody>
	</table>
	<?php 
	} 
	else 
	{ ?>
		<blockquote>No results found for <?php echo escape($_POST['location']); ?>.</blockquote>
	<?php
	} 
}?> 

<h2>Find Contact by Location</h2>

<form method="post">
	<label for="location">location</label>
	<input type="text" id="location" name="location">
	<input type="submit" name="submit" value="View Results">
</form>

<a href="index.php">Back to home</a>

<?php require "footer.php"; ?>

<body style='background-color:lightcoral'>