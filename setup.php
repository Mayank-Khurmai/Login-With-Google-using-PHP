<?php
	
	require_once('vendor/autoload.php');

	$google = new Google_Client();

	$google->setClientId('client_id');

	$google->setClientSecret('secret_key');

	$google->setRedirectUri('http://localhost/google_api/login_with_google/profile.php');

	$google->addScope('email');

	$google->addScope('profile');

	session_start();

?>