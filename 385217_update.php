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
		<link rel="stylesheet" type="text/css" href="kayit.css">
  </head>
  <body>
    <form action="" method="post">
			<div class="login">
				<div class="title">
					<h1>Kullanım ALanı Güncelleme</h1>
				</div>
				<div class="login-form">
					<div class="inputs">
						<label for="kulalanisecme">Seçiniz:</label>
						<select id="kulguncelleme" name="kulguncelleme">
						<?php
						$ksecme = $database->select("385217_tbl_kullanim_alanlari","*");
						foreach ($ksecme as $kgunc){
							echo "<option value='".$kgunc["kullanilan_yer"]."'>".$kgunc["kullanilan_yer"]."</option>";
						}
						?>

					</select>
					<div class="title">
						<h1>Değişen Kullanım Alanı Adı</h1>
					</div>
					<input type="text" name="guncellenenkul" placeholder="Yeni kullanım alanı">
					<input type="submit" class="btn" value="Güncelle">
					<a href="385217_arama.php" class="btn" >Kontrol Ediniz</a>
					<a href="panel.php" class="btn" >Anasayfa</a>

					</form>
					</div>

				</div>

		</div>
  </body>
</html>
<?php
$eskikulaln =  "";
$yenikulaln = "";
if(isset($_POST["kulguncelleme"]) && isset($_POST["guncellenenkul"])){
  if($_POST["kulguncelleme"] != "" && $_POST["guncellenenkul"] != ""){
    $eskikulaln = $_POST["kulguncelleme"];
    $yenikulaln = $_POST["guncellenenkul"];
    $database->update("385217_tbl_kullanim_alanlari", ["kullanilan_yer" => $yenikulaln], ["kullanilan_yer" => $eskikulaln]);
			echo "<script>alert('Güncelleme İşlemi Gerçekleştirildi. Arama Sayfasından tüm kayıtlar listesinden kontrol edebilirsiniz.')</script>";
		}
  }

?>
