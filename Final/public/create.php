<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit']))
{
	
	require "../config.php";
	require "../common.php";

	try 
	{
		$connection = new PDO($dsn, $username, $password, $options);
		
		$new_topic = array(
			"topicid" => $_POST['topicid'],
			"name" => $_POST['name'],
			"topic"  => $_POST['topic'],
		);

		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"topic",
				implode(", ", array_keys($new_user)),
				":" . implode(", :", array_keys($new_user))
		);
		
		$statement = $connection->prepare($sql);
		$statement->execute($new_user);
	}

	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}
	
}
?>

<?php require "templates/header.php"; 
if (isset($_POST['submit']) && $statement) 
{ ?>
	<blockquote><?php echo $_POST['topic']; ?> Topic successfully added.</blockquote>
<?php 
} ?>

<h2>Add a Topic</h2>

<form method="post">
	<label for="topicid">Topicid</label>
	<input type="text" name="topicid" id="topicid">
	<label for="name">Name</label>
	<input type="text" name="lastname" id="lastname">
	<label for="topic">Topic</label>
	<input type="text" name="topic" id="topic">
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>