<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

//KOD ÜRETME
$kod_icin1=date('d.m.Y H:i:s'); // o anın saniye biçiminden zamanı aldık
$kod_icin2=rand(0,20000);                    // anlık tarih saat almamız aynı kodun alınmasını engeller.
$aktivasyon_dkod=hash('sha256', $kod_icin1.$kod_icin2);


if(isset($_POST["kad"])){
  $kad = $_POST["kad"];
  $sifre=$database->get("385217_tbl_users", "sifre",["eposta" => $kad]);
  try {
      //Server settings
      $mail->SMTPAuth   = true;
      $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                                         // Enable SMTP authentication
      $mail->Username   = 'itpkagan@gmail.com';                     // SMTP username
      $mail->Password   = '123456789K-';                               // SMTP password
      $mail->SMTPSecure = "tls";        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom('itpkagan@gmail.com', 'Mailer'); //****gönderen
      $mail->addAddress($kad, 'Yeni Kullanıcı');   //****alıcı           // Add a recipient
      //$mail->addAddress('ellen@example.com');               // Name is optional
      //$mail->addReplyTo('info@example.com', 'Information');
      //$mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');

      // Attachments
      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Şifre Hatırlatma';
      $mail->Body    = '<h3>Şifreniz: '.$sifre.'<h3>';

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

}


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
    				<h1>Şifremi Unuttum</h1>
    			</div>
    			<div class="login-form">
    				<div class="inputs">
    					<input type="email" name="kad" placeholder="Mailinizi giriniz" required><br>
    					<input type="submit" name=""  class="btn" value="Hatırlatma Maili Gönder">
    				</div>
    			</div>
    	</div>
    </form>
  </body>
</html>
<?php
if(isset($_POST["kad"])){
  $kad = $_POST["kad"];
  $user = $database->get("385217_tbl_users", "id",["AND" => ["eposta" =>$kad]]);
  header("Location:gosterge.php");

//  $database->get("kisiler");

}

?>
