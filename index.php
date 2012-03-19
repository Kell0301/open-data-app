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
	
    <ul>
	
	<?php foreach ($results as $gardens) : ?>
		<li>
			<a href="single.php?id=<?php echo $gardens['id']; ?>"><?php echo $gardens['name']; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
    
    
        <h1>Rate Garden</h1>
    
    <div class='star_rater'>  
    
    <div id="r1" class="rate_widget">  
        <div class="star_1 ratings_stars"></div>  
        <div class="star_2 ratings_stars"></div>  
        <div class="star_3 ratings_stars"></div>  
        <div class="star_4 ratings_stars"></div>  
        <div class="star_5 ratings_stars"></div>  
        <div class="total_votes">vote data</div>  
    </div>  
</div>  
	
</body>
</html>

















