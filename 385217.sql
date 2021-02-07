CREATE TABLE `385217_tbl_kullanim_alanlari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `madenid` int(11) NOT NULL,
  `kullanilan_yer` varchar(250) NOT NULL, 
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci; 

CREATE TABLE `php_final`.`385217_tbl_madenler` ( `id` INT NOT NULL AUTO_INCREMENT , `maden_adi` VARCHAR(500) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

CREATE TABLE `385217_tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eposta` varchar(500)  NOT NULL,
  `sifre` varchar(50)  NOT NULL,
  `ad` varchar(100)  NOT NULL,
  `soyad` varchar(100)  NOT NULL,
  `fotograf` varchar(500)  NOT NULL,
  `aktif_mi` int(11) NOT NULL DEFAULT 0,
  `aktivasyon` varchar(1000)  NOT NULL, 
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;