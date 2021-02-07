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
		<form action="" method="post">
		<div class="login">
			<div class="title">
				<h1>Yer Altı Kaynağı Silme</h1>
			</div>
			<div class="login-form">
				<div class="inputs">
					<input type="text" name="silinenkaynak" placeholder="Yer Altı Kaynağını Giriniz"> <br>
		      <input type="submit" class="btn" value="SİL">
					<a href="385217_arama.php" class="btn" >Kontrol Ediniz</a>
					<a href="panel.php" class="btn" >Anasayfa</a>

				</div>
			</div>
	    </form>
		</div>
  </body>
</html>
<?php
$silinenkayit = "";
if(isset($_POST["silinenkaynak"])){
    if($_POST["silinenkaynak"] != ""){
      $silinenkayit = $_POST["silinenkaynak"];
      $database->delete("385217_tbl_madenler", ["maden_adi" => $silinenkayit]);{
          echo '<script>alert("Silme İşlemi Gerçekleştirildi. Arama Sayfasından tüm kayıtlar listesinden kontrol edebilirsiniz.")</script>';
      }
    }
  }
?>
