<?php

require_once 'includes/db.php';


$results = $db->query('
	SELECT id, name, street_address, longitude, latitude
	FROM comgardens
	ORDER BY name ASC
');

	
include 'includes/theme-top.php';
?>


	<h1>Gardensphere</h1>
	
        
    <button id="geo">Find Me</button>
    <form id="geo-form">
        <label for="adr">Address</label>
        <input id="adr">
    </form>
    
    <ul class="gardens">
	
	<?php foreach ($results as $gardens) : ?>
		<li itemscope itemtype="http://schema.org/TouristAttraction">
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

	

















