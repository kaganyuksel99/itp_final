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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>59 Maden</title>
    <link rel="stylesheet" type="text/css" href="giris.css">
  </head>
  <body>
    <form  action="" method="post">
    	<div class="login">
    			<div class="title">
    				<h1>Maden Ekle</h1>
    			</div>
    			<div class="login-form">
    				<div class="inputs">
    					<input type="text" name="madekle" placeholder="Maden Girin" required><br>
    					<input type="submit" class="btn" value="Ekle">
							<a href="panel.php" class="btn" >Anasayfa</a>
    				</div>
    			</div>
    	</div>
    </form>

  </body>
</html>
<?php
$kal = "";
if(isset($_POST["madekle"])){
  if($_POST["madekle"]!=""){
    $kal=$_POST["madekle"];
    // Kayıt işlemi yapmalıyız
    $database->insert("385217_tbl_madenler", ["maden_adi" => $kal]);
    $son_eklenen_id =0;
    $son_eklenen_id = $database->id();
    if ($son_eklenen_id>0){
			echo '<script>alert("Yer Altı Kaynağı Eklendi Eklendi");</script>';
		}else {
			echo '<script>alert("Hata Bulundu!");</script>';
		}

  }
}
?>
