<!doctype html>
<html>
<head>
	<style>
	 <link rel="stylesheet" href="css/style.css">
	</style>
</head>
<body>
<?php

/**
 * Function to query information based on 
 * a parameter: in this case, location.
 *
 */


if (isset($_POST['submit'])) 
{
	
	try 
	{	
		require "../config.php";
		require "../common.php";

		$connection = new PDO($dsn, $username, $password, $options);

		$sql = "SELECT * 
						FROM Topic
						WHERE topic = :topic";


		$topic  = $_POST['topic '];

		$statement = $connection->prepare($sql);
		$statement->bindParam(':topic ', $topic , PDO::PARAM_STR);
		$statement->execute();

		$result = $statement->fetchAll();

	}
	
	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}
}
?>



<?php require "templates/header.php"; ?>
		
<?php  
if (isset($_POST['submit'])) 
{
	if ($result && $statement->rowCount() > 0) 
	{ ?>
		<h2>Results</h2>

		<table style = "background-color : #FF5733">
			<thead>
				<tr>
					<th>topicid</th>
					<th>Name</th>
					<th>Topic</th>

				</tr>
			</thead>
			<tbody>
	<?php 
		foreach ($result as $row) 
		{ ?>
			<tr>
				<td><?php echo escape($row["topicid"]); ?></td>
				<td><?php echo escape($row["name"]); ?></td>
				<td><?php echo escape($row["topic"]); ?></td>
			</tr>
		<?php 
		} ?>
		</tbody>
	</table>
	<?php 
	} 
	else 
	{ ?>
		<blockquote>No results found for <?php echo escape($_POST['topic']); ?>.</blockquote>
	<?php
	} 
}?> 


<h2>Find user based on location</h2>

<form method="post">
	<label for="topic ">Topic</label>
	<input type="text" id="topic" name="topic">
	<input type="submit" name="submit" value="View Results">
</form>

<?php require "templates/footer.php"; ?>

</body>
</html>