<?php



include '../includes/theme-top.php';
require_once '../includes/users.php';

if (!user_is_signed_in()) {
	header('Location: sign-in.php');
	exit;
}

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
	<title>Gardensphere</title>
	<link href="../css/gardens.css" rel="stylesheet">
</head>
<body class="admina">
	
		<h1>Admin</h1>
	<div class="adminwrapper">
	
	
	
		<div class="signout"><a href="sign-out.php">Sign Out</a></div>
		<br>
		<a href="add.php">Add a Garden</a>
		
		
		<ul>
		
		
		<?php foreach ($results as $gardens) : ?>
			<li>
				<?php echo $gardens['name'];?>
				<br>
				<a href="edit.php?id=<?php echo $gardens['id']; ?>">Edit</a>
				<a href="delete.php?id=<?php echo $gardens['id']; ?>">Delete</a>
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
</body>
</html>

















