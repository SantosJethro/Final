<?php

/**
 * Open a connection via PDO to create a
 * new database and table with structure.
 *
 */
if (isset($_POST['submit']))
{
require "config.php";


try 
	{
		$connection = new PDO($dsn, $username, $password, $options);
		// insert new user code will go here
		$new_user = array(
			"firstname" => $_POST['firstname'],
			"lastname"  => $_POST['lastname'],
=
		);
		$sql = sprintf(
			"INSERT INTO %s (%s) values (%s)",
			"users",
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