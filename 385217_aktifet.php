<?php
require 'Medoo.php';

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

if(isset($_GET["eposta"]) && isset($_GET["kod"])){
  $eposta = $_GET["eposta"];
  $kod = $_GET["kod"];
  $user = $database->get("385217_tbl_users", "id",["AND" => ["eposta" =>$eposta,"aktivasyon" =>$kod]]);
  if($user>0){
    //aktivasyon yap
    $data = $database->update("385217_tbl_users", ["aktif_mi" => 1], ["id" => $user]);
    header("Location:panel.php");
  }else {
    // hatalı kod tekrar kayıt ol
    header("Location:giris.php?kod_hatali");
  }
}
?>
