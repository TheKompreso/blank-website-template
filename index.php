<?php
	session_start();
	mb_internal_encoding("UTF-8");

	const SERVER_URL = 'site.exemple';
	const SERVER_TITLE = 'Exemple Site';

	$_SERVER['REQUEST_URI'] = urldecode($_SERVER['REQUEST_URI']);			 // Декодируем русские буквы
	preg_match('/([^?]*)/',$_SERVER['REQUEST_URI'],$matches); 				 // Определяем что написано после "SERVER_URL"/
	$action = explode('/',$matches[1]);										 // Разделяем это на массив начиная с $action[1] = list; $action[2] = page, $action[3] = 2
	$action[0] = substr($matches[1], 1);								 	 // Записываем в 0 элемент общую картину	list/page/1
	
	// Определяем субдомен
	preg_match('/([^.]*).'.SERVER_URL.'/',$_SERVER['SERVER_NAME'],$matches);
	if(isset($matches[1])) $subdomain = $matches[1];
	else $subdomain = '';
	
	define('PUBLIC_DIR', dirname(__FILE__) . '/public/');				 	 // Движок сайта
	define('ENGINE_DIR', dirname(__FILE__) . '/system/');				 	 // Движок сайта
	define('PAGES_DIR', dirname(__FILE__) . '/system/pages/page');	 		 // Страницы и логика сайта
	define('SUBDOMAIN_DIR', dirname(__FILE__) . '/system/pages/subdomain/'); // Субдомены сайта
	
	require_once(ENGINE_DIR . 'libraries/database.php');					 // Подключение базы данных

	exit;
?>