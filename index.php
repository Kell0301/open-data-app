

<?php

require_once 'includes/db.php';


$results = $db->query('
	SELECT id, name, street_address, longitude, latitude, rate_count, rate_total
	FROM comgardens
	ORDER BY name ASC
');

	
include 'includes/theme-top.php';
?>


	
	
	<div class= "wrapper">
	
	
	
	
		<div class="findme">
			
			<button id="geo">Find Me</button>
			<form id="geo-form">
				<label for="adr">Address</label>
				<input id="adr">
			</form>
		</div>
			
			
			<div class="beeg">
			<ul class="gardens">
			
			<?php foreach ($results as $garden) : ?>
			
				<?php
				if ($garden['rate_count'] > 0) {
					$rating = round($garden['rate_total'] / $garden['rate_count']);
				} else {
					$rating = 0;
				}
			?>
				<li itemscope itemtype="http://schema.org/TouristAttraction" data-id="<?php echo $garden['id']; ?>">
				<strong class="distance"></strong>
					<a href="single.php?id=<?php echo $garden['id']; ?>"itemprop="name"><?php echo $garden['name']; ?></a>
					<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
						<meta itemprop="latitude" content="<?php echo $garden['latitude']; ?>">
						<meta itemprop="longitude" content="<?php echo $garden['longitude']; ?>">
					</span>
					
					<meter value="<?php echo $rating; ?>" min="0" max="5"><?php echo $rating; ?> out of 5</meter>
					<ol class="rater">
					<?php for ($i = 1; $i <= 5; $i++) : ?>
						<?php $class = ($i <= $rating) ? 'is-rated' : ''; ?>
						<li class="rater-level <?php echo $class; ?>">★</li>
					<?php endfor; ?>
					</ol>
					
				</li>
			<?php endforeach; ?>
			</ul>
			
		  
				<div id="map"></div>
				
			
			</div>
			
		</div>
		<div class="admin">
		<a href="admin/sign-in.php">Admin</a>
		</div>	
	</div>
	<?php
		include 'includes/theme-bottom.php';
			
	?>
			

	

















