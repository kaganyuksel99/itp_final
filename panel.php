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
if(!isset($_SESSION["kullaniciID"]) || $_SESSION["kullaniciID"]==""){
    header('Location: 385217_giris.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="panel.css">
  </head>
<body>
    <ul>
      <li><a class="active" href="panel.php">Anasayfa</a></li>
      <li><a href="385217_yeraltikaynagiekle.php">Yer Altı Kaynağı Ekle</a></li>
			<li><a href="385217_kullanimalaniekle.php">Kullanım Alanı Ekle</a></li>
			<li><a href="385217_silme.php">Yer Altı Kaynağı Silme </a></li>
			<li><a href="385217_update.php">Kullanım Alanı Güncelleme </a></li>
      <li><a href="385217_arama.php">Tüm Kayıtları Görme ve Arama Yapma</a></li>
      <li style="float:right"><a href="385217_cikis.php">Çıkış Yap</a></li>
    </ul>

<?php
$kullanici = $database->get("385217_tbl_users", "*", ["id" => $_SESSION["kullaniciID"]]);

//yuklenenler\\dosyaismi
$foto = $kullanici["fotograf"]; //C:\xampp\htdocs\385217\yuklenenler\foto.png
$filtre = substr($foto,23);
// <img src="yuklenenler\emklogo.png" alt="">
echo '<img  src="'.$filtre.'" alt="">';

?>
<h3 class="bildirim">Hoş Geldin, <?php echo $kullanici["ad"]." ".$kullanici["soyad"]; ?></h3>

</body>
</html>
