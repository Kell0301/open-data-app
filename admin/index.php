<?php

require_once '../includes/db.php';


$results = $db->query('
	SELECT id, name, street_address, longitude, latitude
	FROM comgardens
	ORDER BY name ASC
');

	

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Gardensphere Garden Finder</title>
</head>
<body>
	<h1>Gardensphere &bull; Community Garden Finder</h1>
	<a href="add.php">Add a Garden</a>
	<ul>
	<?php

	?>
	
	<?php foreach ($results as $gardens) : ?>
		<li>
			<?php echo $gardens['name'];?>
            <a href="edit.php?id=<?php echo $gardens['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $gardens['id']; ?>">Delete</a>
		</li>
	<?php endforeach; ?>
	</ul>
	
</body>
</html>

















