<?php

// a small utility file for us to create an admin user

//THIS FILE SHOULD NEVER BE PUBLICLY ACCESSABLE!!!

require_once 'includes/db.php';
require_once 'users.php';

$email = 'alikellar@gmail.com';
$password = 'password';

user_create($db, $email, $password);