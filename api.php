<?php
    if(is_readable(dirname(__FILE__) . '/api' . $_SERVER['REDIRECT_URL'] . '.php'))  // Если файл найден, то открываем его
    {
        define('ENGINE_DIR', dirname(__FILE__) . '/system/');
        
        header('Access-Control-Allow-Origin: *');
        header("Content-type: application/json; charset=utf-8");
        require_once(ENGINE_DIR . 'libraries/database.php');
        require_once(dirname(__FILE__) . '/api' . $_SERVER['REDIRECT_URL'] . '.php');
        exit;
    }
	http_response_code(404);
    exit('Metod '.$_SERVER['REDIRECT_URL'].' was not found');
?>