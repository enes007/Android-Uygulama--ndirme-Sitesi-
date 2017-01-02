<?php
$ip = $_SERVER["REMOTE_ADDR"];
include("ayar.php");
$eposta = strip_tags(trim(@$_POST["eposta"]));
$sifre = md5(strip_tags(trim(@$_POST["sifre"])));
$giris = $vt->prepare("select * from uyeler where uye_eposta=? and uye_sifre=?");
$giris->execute(array($eposta,$sifre));
$liste = $giris->fetch(PDO::FETCH_ASSOC);
$adi = $liste["uye_adi"];
$soyadi = $liste["uye_soyadi"];
$id = $liste["uye_id"];
$durum = $giris->rowCount();
if($_POST){
if($durum){
	   
		$guncelle = $vt->prepare("update uyeler set uye_ip=?,uye_son_giris=? where uye_eposta=? and uye_sifre=?");
		$guncellendi = $guncelle->execute(array($ip,date("Y/m/d")." ".date("H:i:s"),$eposta,$sifre));
		$_SESSION["uye_id"] = $id;
		$_SESSION["uye_adi"] = $adi;
		$_SESSION["uye_soyadi"] = $soyadi;
		$_SESSION["uye_eposta"] = $eposta;
		$_SESSION["uyemi"] = true;
		if($guncellendi){
			header("location:index.php?url=giris_yap&basari=giris_basarili");
		}else{
			header("location:index.php?url=giris_yap&hata=giris_yaparken_bir_hata_olustu");
		}
}else{
	header("location:index.php?url=giris_yap&hata=yanlis_eposta_veya_sifre");
}
}else{
	echo '<center>
<form class="giris_yap" action="" method="post">
<table cellpadding="2" cellspacing="2">
<tr><td><input type="email" name="eposta" placeholder="E-Posta Adresiniz..."/>
</td></tr><tr><td><input type="password" name="sifre" placeholder="Şifreniz..."/>
</td></tr>
<tr>
<td><button type="submit">Giriş Yap!</button></td>
</tr>
</table></form></center> ';
}
?>
<style type="text/css">body{background-color:rgba(14,106,106,1)}</style>