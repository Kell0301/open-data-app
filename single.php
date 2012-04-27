<?php

include 'includes/theme-top.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
}

 
require_once 'includes/db.php';
require_once 'includes/functions.php';

// ->prepare() allows us to execute SQL with user input
$sql = $db->prepare('
	SELECT id, name, street_address, longitude, latitude, rate_total, rate_count
	FROM comgardens
	WHERE id = :id
');

// ->bindValue() lets us fill in placeholders in our prepared statement
// :id is a placeholder for us to SECURELY put information from the user
$sql->bindValue(':id', $id, PDO::PARAM_INT);

// Performs the SQL query on the database
$sql->execute();

// Gets the results from the SQL query and stores them in a variable
// ->fetch() gets a single result
// ->fetchAll() gets all the possible results
$results = $sql->fetch();

// Redirect the user back to the homepage if there are no database results
// No results will happen if they change the ?id=4 to include an ID that doesn't exist
if (empty($results)) {
	header('Location: index.php');
	exit; // Stop the PHP compiler right here and immediately redirect the user
}


$title = $results['name'];

if ($results['rate_count'] > 0) {
	$rating = round($results['rate_total'] / $results['rate_count']);
} else {
	$rating = 0;
}

$cookie = get_rate_cookie();

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $results['name']; ?> &middot; Gardens</title>
</head>
<body class="single">
	
	<div class="singlewrapper">
		
		<h1><?php echo $results['name']; ?></h1>
		
		<div class="wraprating">
			<p class="ave">Average Rating</dt><dd>★<meter value="<?php echo $rating; ?>" min="0" max="5"><?php echo $rating; ?> out of 5</meter>★</p>
			</div>
		
		<div class="addycase">
		
			
			
			
			<div class="addy">
				<p>Address: <?php echo $results['street_address']; ?></p>
				<p>Longtitude: <?php echo $results['longitude']; ?></p>
				<p>Latitude: <?php echo $results['latitude']; ?></p>
			</div>
			
		
		<?php if (isset($cookie[$id])) : ?>
		
		<h2>Your rating</h2>
		<ol class="rater rater-usable">
			<?php for ($i = 1; $i <= 5; $i++) : ?>
				<?php $class = ($i <= $cookie[$id]) ? 'is-rated' : ''; ?>
				<li class="rater-level <?php echo $class; ?>">★</li>
			<?php endfor; ?>
		</ol>
		
		<?php else : ?>
		
		<h2>Rate</h2>
		<ol class="rater rater-usable">
			<?php for ($i = 1; $i <= 5; $i++) : ?>
			<li class="rater-level"><a href="rate.php?id=<?php echo $results['id']; ?>&rate=<?php echo $i; ?>">★</a></li>
			<?php endfor; ?>
		</ol>
		
		<?php endif; ?>
		
	</div>

</div>
	
</body>
</html>













