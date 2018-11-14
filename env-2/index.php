<?php
try {	
	$host       = getenv("DEMO_HOSTNAME");
	$username   = getenv("DEMO_USERNAME");
	$password   = getenv("DEMO_PASSWORD");
	$dbname     = getenv("DEMO_DBNAME"); // will use later
	$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
	$options    = array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				);

	$connection = new PDO($dsn, $username, $password, $options);
	$sql = "SELECT * FROM users";
	$statement = $connection->prepare($sql);
	$statement->bindParam(':location', $location, PDO::PARAM_STR);
	$statement->execute();

	$result = $statement->fetchAll();
} catch(PDOException $error) {
	echo $sql . "<br>" . $error->getMessage();
}
echo $result;
	if ($result && $statement->rowCount() > 0) { ?>
	<h2>Results</h2>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th>Last Name</th>
			</tr>
		</thead>
		<tbody>
<?php foreach ($result as $row) { ?>
		<tr>
			<td><?php echo $row["id"]; ?></td>
			<td><?php echo $row["firstname"]; ?></td>
			<td><?php echo $row["lastname"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
		</tr>
	<?php } ?> 
		</tbody>
</table>
<?php } else { ?>
	<blockquote>No results found</blockquote>
<?php } ?> 
