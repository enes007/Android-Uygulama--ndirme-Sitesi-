<?php
//Zaman Ayarı
date_default_timezone_set("Europe/Istanbul");
// Veri Tabanı Adresi
$host = "127.0.0.1";
// Veri Tabanı İsmi
$dbname = "android_uygulama";
// Veri Tabanı Kullanıcı Adı
$user_name = "root";
// Veri Tabanı Kullanıcı Şifresi
$user_password = "";
// Veri Tabanı Karakter Seti
$charset = "utf8";
try{
$vt = new PDO("mysql:host={$host};dbname={$dbname};charset={$charset};",$user_name,$user_password);
}catch(PDOException $hata){
	echo $hata->getMessage();
}

?>