<?php

require_once 'includes/db.php';


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
	
    <ul class="gardens">
	
	<?php foreach ($results as $gardens) : ?>
		<li itemscope itemtype="http://schema.org/Place">
			<a href="single.php?id=<?php echo $gardens['id']; ?>"itemprop="name"><?php echo $gardens['name']; ?></a>
			<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
				<meta itemprop="latitude" content="<?php echo $gardens['latitude']; ?>">
				<meta itemprop="longitude" content="<?php echo $gardens['longitude']; ?>">
			</span>
		</li>
	<?php endforeach; ?>
	</ul>
    
   
	<div id="map"></div>
	
	<?php
	
	include 'includes/theme-bottom.php';
	
	?>

	
</body>
</html>

















