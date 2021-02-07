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

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
		<link rel="stylesheet" type="text/css" href="giris.css">
		<style>
		table.steelBlueCols {
			border: 4px solid #BBE500;
			background-color: #A71114;
			width: 400px;
			text-align: center;
			border-collapse: collapse;
		}
		table.steelBlueCols td, table.steelBlueCols th {
			border: 1px solid #555555;
			padding: 5px 10px;
		}
		table.steelBlueCols tbody td {
			font-size: 12px;
			font-weight: bold;
			color: #FFFFFF;
		}
		table.steelBlueCols td:nth-child(even) {
			background: #398AA4;
		}
		table.steelBlueCols thead {
			background: #398AA4;
			border-bottom: 10px solid #398AA4;
		}
		table.steelBlueCols thead th {
			font-size: 15px;
			font-weight: bold;
			color: #FFFFFF;
			text-align: left;
			border-left: 2px solid #398AA4;
		}
		table.steelBlueCols thead th:first-child {
			border-left: none;
		}

		table.steelBlueCols tfoot td {
			font-size: 13px;
		}
		table.steelBlueCols tfoot .links {
			text-align: right;
		}
		table.steelBlueCols tfoot .links a{
			display: inline-block;
			background: #FFFFFF;
			color: #398AA4;
			padding: 2px 8px;
			border-radius: 5px;
		}
		table {
			position: relative;
			margin: auto;
		}
		</style>
  </head>
  <body>
    <form action="" method="post">
      <div class="login">
        <div class="title">
          <h1>Kaynak Seçiniz ve kullanım alanlarını listeleyin</h1>
        </div>
        <div class="login-form">
					<div class="inputs">
						<label for="kaynaksecme">Seçiniz:</label>
	          <select id="kaynakarama" name="kaynakarama">
	          <?php
	          $karama = $database->select("385217_tbl_madenler","*");
	          foreach ($karama as $seckaynak){
	            echo "<option value='".$seckaynak["id"]."'>".$seckaynak["maden_adi"]."</option>";
	          }
	          ?>
						<br><br>
	          <input type="submit" name="btn" value="ARA">
	        </form>
	        </select>
	        <table class="steelBlueCols">
	        <thead>
	        <tr>
					<th>Maden Adı</th>
	        <th>Kullanım Alanı</th>
	        </tr>
	        </thead>
	        <tbody>
	        <?php

	        $cikansonuc = "";
	        if(isset($_POST["kaynakarama"])){
	          $cikansonuc = $_POST["kaynakarama"];
	        //  $madenarama = $database->query("SELECT maden_adi,kullanilan_yer FROM 385217_tbl_madenler inner join 385217_tbl_kullanim_alanlari WHERE 385217_tbl_madenler.id=385217_tbl_kullanim_alanlari.madenid and 385217_tbl_madenler.maden_adi='".$cikansonuc."'")->fetchAll();
						$madenarama  = $database->SELECT("385217_tbl_kullanim_alanlari", "*", [
							"madenid" => $cikansonuc
						]);
	          foreach($madenarama as $sonislem){
							$kategori = $database->get("385217_tbl_madenler", "maden_adi", [
								"id" => $sonislem["madenid"]
							]);
	            echo "<tr>
	            <td>".$kategori."</td>
							<td>".$sonislem["kullanilan_yer"]."</td>
	            </tr>";
	          }
	        }else {
	        	$tumkayitlar = $database->query("SELECT maden_adi,kullanilan_yer FROM 385217_tbl_madenler inner join 385217_tbl_kullanim_alanlari on 385217_tbl_madenler.id=385217_tbl_kullanim_alanlari.madenid")->fetchAll();
						foreach($tumkayitlar as $tumunucekme){
							echo "<tr>
	            <td>".$tumunucekme["maden_adi"]."</td>
							<td>".$tumunucekme["kullanilan_yer"]."</td>
	            </tr>";
	        }
				}
	        ?>
					</div>

        </div>
      </div>

    </form>
  </body>
</html>
