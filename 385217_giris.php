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
<html lang="tr" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>59 Maden</title>
		<link rel="stylesheet" type="text/css" href="giris.css">
	</head>
	<body>
<form  action="" method="post">
	<div class="login">
			<div class="title">
				<h1>Giriş Yap</h1>
			</div>
			<div class="login-form">
				<div class="inputs">
					<input type="email" name="kad" placeholder="Mailinizi giriniz"><br>
					<input type="password" name="sifre" placeholder="Şifrenizi giriniz"><br>
					<input type="submit" name=""  class="btn" value="Giriş Yap">
          <a href="385217_hatirlatma.php" class="btn" >Şifremi Unuttum</a>
				</div>
			</div>

</form>
</div>
	</body>
</html>
<?php
$sifre="";
$kad="";
if(isset($_POST["kad"]) && isset($_POST["sifre"])){
    if($_POST["kad"]!="" && $_POST["sifre"]!=""){
        $kad=$_POST["kad"];
        $sifre=$_POST["sifre"];
        $kullanici = $database->get("385217_tbl_users", "*", ["AND" => ["eposta" => $kad,"sifre"=>$sifre]]);
        if($kullanici['id']!=""){
            //Kullanıcı giriş bilgileri doğru
            //şimdi hesap aktif mi ona bakalım
            if($kullanici['aktif_mi']==1){
                //hesap aktif
                //profil sayfasına yönlendirelim
                $_SESSION["kullaniciID"]=$kullanici['id'];
                header('Location: animasyon.php');
                exit;
            }else{
                //hesap aktif değil
                //kullanıcıya uyarı ver
                echo '<script>alert("Hesabınız henüz aktifleştirilmedi.")</script>';
            }
        }else{
            //kullanıcı giriş bilgileri hatalı ya da tutarsız
            //kullanıcıya bilgi ver ve tekrar denesin
            echo '<script>alert("E-Posta ve Şifre bilgileriniz eksik ya da hatalı. Lütfen Tekrar deneyiniz.")</script>';
        }

    }else{
        echo '<script>alert("Eksik alanlar var. Lütfen bilgileri eksiksiz doldurunuz.")</script>';
    }
}


?>
