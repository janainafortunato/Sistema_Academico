<?php

/**
*Constantes com as credencias de acesso ao banco Mysql.
*
*/
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123456');
define('DB_NAME', 'sistema_academico');

/**
*Habilita todas as exibiçoes de erros
*/
ini_set('display_errors', true);
error_reporting(E_ALL);

/**
*Inclui o arquivo de fucções
*/
require_once 'functions.php';


?>