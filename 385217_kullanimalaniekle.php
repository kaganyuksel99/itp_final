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
    <link rel="stylesheet" type="text/css" href="giris.css">
    <title>59 Maden</title>
  </head>
  <body>
    <form  action="" method="post">
      <div class="login">
          <div class="title">
            <h1>Kullanım Alanı Ekle</h1>
          </div>
          <div class="login-form">
            <div class="inputs">
              <input type="text" name="kulalan" placeholder="Kullanım Alanını  giriniz" required><br>
              <label for="madenler">Maden Ekle</label>
              <select id="kullanimalanlari" name="maden">
                <?php
                $kullanimalanlari_=$database->select("385217_tbl_madenler","*");
                foreach ($kullanimalanlari_ as $kulalan_){
                  echo "<option value='".$kulalan_["id"]."'>".$kulalan_["maden_adi"]."</option>";
                }
                ?>
              <input type="submit" class="btn" value="Ekle">
							<a href="panel.php" class="btn" >Anasayfa</a>
							</form>
							<?php
							$kullnim = "";
							$madenn  = "";
							if(isset($_POST["kulalan"]) && isset($_POST["maden"])){
								$kullnim = $_POST["kulalan"];
								$madenn = $_POST["maden"];
								$database->insert("385217_tbl_kullanim_alanlari", ["madenid" => $madenn, "kullanilan_yer" => $kullnim ]);
							}
							?>


            </div>
          </div>
      </div>

  </body>
</html>
