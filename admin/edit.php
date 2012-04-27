<?php 


include '../includes/theme-top.php';

$errors = array ();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
	}

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$street_address = filter_input(INPUT_POST, 'street_address', FILTER_SANITIZE_STRING);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_STRING);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(empty($name)) {
		$errors['name'] = true;
	}
	
	if (empty($street_address)) {
		$errors['street_address'] = true;
	}
	
	if (empty($longitude)) {
		$errors['longitude'] = true;
	}
	
	if (empty($latitude)) {
		$errors['latitude'] = true;
	}
	
	if (empty($errors)) {
		require_once '../includes/db.php';
		
		$sql = $db->prepare('
			UPDATE comgardens
			SET name = :name, street_address = :street_address, longitude = :longitude, latitude = :latitude
			WHERE id = :id
		');
		
		$sql->bindValue(':name', $name, PDO::PARAM_STR);
		$sql->bindValue(':street_address', $street_address, PDO::PARAM_STR);
		$sql->bindValue(':longitude', $longitude, PDO::PARAM_STR);
		$sql->bindValue(':latitude', $latitude, PDO::PARAM_STR);
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		
		$sql->execute();
		
		header('Location: index.php');
	}
}else {
	require_once '../includes/db.php';
	$sql = $db->prepare('
	SELECT id, name, street_address, longitude, latitude
	FROM comgardens
	WHERE id = :id
	');
	
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	
	$sql->execute();
	$results = $sql->fetch();
	$name = $results['name'];
	$street_address = $results['street_address'];
	$longitude = $results['longitude'];
	$latitude = $results['latitude'];
}

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit a Garden</title>
	<link href="../css/gardens.css" rel="stylesheet">
</head>

<body>

	<div class="adminwrapper">
		
		<div class="editwrap">
		
			<h1>Edit a Garden</h1>
			<form method="post" action="edit.php?id=<?php echo $id; ?>"> 
				<div>
					<label for="name">Garden Name<?php if (isset($errors['name'])) : ?> <strong>is required</strong><?php endif; ?></label>
					<br><input id="name" name="name" value="<?php echo $name; ?>" required>
				</div>
				<div>
					<label for="street_address">Address<?php if (isset($errors['street_address'])) : ?> <strong>is required</strong><?php endif; ?></label>
					<br><input id="street_address" name="street_address" value="<?php echo $street_address; ?>" required>
				   
				</div>
				 <div>
					<label for="longitude">Longtitude<?php if (isset($errors['longitude'])) : ?> <strong>is required</strong><?php endif; ?></label>
					<br><input id="longitude" name="longitude" value="<?php echo $longitude; ?>" required>
				   
				</div>
				 <div>
					<label for="latitude">Latitude<?php if (isset($errors['latitude'])) : ?> <strong>is required</strong><?php endif; ?></label>
					<br><input id="latitude" name="latitude" value="<?php echo $latitude; ?>" required>
				   
				</div>
				
				<button type="submit">Update</button>
			</form>
		</div>
	</div>
	<div class="flower"</div></div>
</body>
</html>