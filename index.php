<?php
	session_start();
	mb_internal_encoding("UTF-8");

	// Simplified work with file paths
	define('ENGINE_DIR', dirname(__FILE__) . '/system/');
	define('PAGES_DIR', dirname(__FILE__) . '/system/pages/page');
	define('SUBDOMAIN_DIR', dirname(__FILE__) . '/system/pages/subdomain/');
	define('PUBLIC_DIR', dirname(__FILE__) . '/public/');

	// Connecting the site settings file
	include(ENGINE_DIR . 'config/server.php');		

	// Splitting the Request URL into Components. $URL[0] - full path; $URL[i] - component parts of the path.
	$_SERVER['REDIRECT_URL'] = urldecode($_SERVER['REDIRECT_URL']);
	$_URL = explode('/',$_SERVER['REDIRECT_URL']);
	$_URL[0] = substr($_SERVER['REDIRECT_URL'], 1);
	
	// Define subdomain
	preg_match('/([^.]*).'.SERVER_URL.'/',$_SERVER['SERVER_NAME'],$matches);
	if(isset($matches[1])) $_SUBDOMAIN = $matches[1];
	else $_SUBDOMAIN = '';
	
	// Including libraries
	require_once(ENGINE_DIR . 'libraries/database.php');

	// Request handling logic

	exit;
?>