<?php
include("ayar.php");
$ip = $_SERVER["REMOTE_ADDR"];
if($_POST){
	$adi = strip_tags(trim($_POST["adi"]));
	$soyadi = strip_tags(trim($_POST["soyadi"]));
    $eposta = strip_tags(trim($_POST["eposta"]));
	$sifre = strip_tags(trim($_POST["sifre"]));
	$md5sifre = md5($sifre);
	$eposta_varmi = $vt->prepare("select * from uyeler where uye_eposta=?");
	$eposta_varmi->execute(array($eposta));
	$kontrol = $eposta_varmi->rowCount();
	if(empty($adi)){
		header("location:index.php?sayfa=kayit_ol&hata=kullanici_adi_bos");
	}elseif(strlen($adi) > 20){
		header("location:index.php?sayfa=kayit_ol&hata=kullanici_adi_uzun");
	}elseif(empty($soyadi)){
		header("location:index.php?sayfa=kayit_ol&hata=kullanici_soyadi_bos");
	}elseif(strlen($soyadi) > 20){
		header("location:index.php?sayfa=kayit_ol&hata=kullanici_soyadi_uzun");
	}elseif(!filter_var($eposta,FILTER_VALIDATE_EMAIL)){
		header("location:index.php?sayfa=kayit_ol&hata=kullanici_gecersiz_eposta");
	}elseif(strlen($eposta) > 60){
		header("location:index.php?sayfa=kayit_ol&hata=kullanici_eposta_uzun");
	}elseif($kontrol){
		header("location:index.php?sayfa=kayit_ol&hata=kullanici_eposta_var");
	}elseif(empty($sifre)){
		header("location:index.php?sayfa=kayit_ol&hata=kullanici_sifre_bos");
	}elseif(strlen($sifre) > 20){
		header("location:index.php?sayfa=kayit_ol&hata=kullanici_sifre_uzun");
	}else{
		$kaydet = $vt->prepare("insert into uyeler set uye_adi=?,uye_soyadi=?,uye_eposta=?,uye_sifre=?,uye_ip=?,uye_son_giris=?");
		$tamamla = $kaydet->execute(array($adi,$soyadi,$eposta,$md5sifre,$ip,date("Y/m/d")." ".date("H:i:s")));
		$baglan = $vt->prepare("select * from uyeler where uye_eposta=? and uye_sifre=?");
		$baglan->execute(array($eposta,$md5sifre));
		$id2 = $baglan->fetch(PDO::FETCH_ASSOC);
		$id = $id2["uye_id"];
		$_SESSION["uye_id"] = $id;
		$_SESSION["uye_adi"] = $adi;
		$_SESSION["uye_soyadi"] = $soyadi;
		$_SESSION["uye_eposta"] = $eposta;
		$_SESSION["uyemi"] = true;
		if($tamamla){
			header("location:index.php?sayfa=kayit_ol&basari=kayit_basarili");
		}
	}
}else{
	echo '<form action="kayit_ol.php" method="post">
<table cellpadding="5" cellspacing="5">
<tr>
<td>Adınız:</td>
<td><input type="text" name="adi" placeholder="1-20"/></td>
</tr>
<tr>
<td>Soyadınız:</td>
<td><input type="text" name="soyadi" placeholder="1-20"/></td>
</tr>
<td>E-Posta Adresiniz:</td>
<td><input type="email" name="eposta" placeholder="1-60"/></td>
</tr>
<td>Şifreniz:</td>
<td><input type="password" name="sifre" placeholder="1-20"/></td>
</tr>
<td><button type="submit">Kayıt Ol</button></td>
</tr>
</table>
</form>';
}
?>