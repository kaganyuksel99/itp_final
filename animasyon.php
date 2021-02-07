<?php
require 'Medoo.php';
session_start();
// Using Medoo namespace
use Medoo\Medoo;

$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'php_final',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',

	// [optional]
	'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_general_ci',
	'port' => 3306
]);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>59 Maden</title>
    <link rel="stylesheet" href="animasyon.css">
  </head>
  <body>

<div class="container">
  <span class="text1">59 Maden'e</span>
  <span class="text2">Hoş Geldiniz</span>
  <a href="panel.php" class="btn">ANASAYFA</a>
</div>



  </body>
</html>
