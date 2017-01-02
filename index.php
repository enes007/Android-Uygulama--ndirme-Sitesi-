<?php 
include("ayar.php");
session_start();
$url = $_GET["url"];
if($url != "devamini_oku" and $url != "kategori" and $url != "sosyal_medya" and $url != "adminler" and $url != "uyeler" and $url != "iletisim" and $url != "giris_yap" and $url != "kayit_ol" and $url != "uye_ol" and $url != "anasayfa" and $url != "sss"){
	header("location:index.php?url=anasayfa");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/kaynak.css" />
<script src="js/jquery.js"></script>
<script src="js/jquery_form.js"></script>
<meta name="charset" content="utf8" />
<script type="text/javascript">
$(function(){
$(".footer_facebook").hover(function(){$(".footer_facebook").attr("src","img/facebook.png");});
$(".footer_facebook").mouseleave(function(){$(".footer_facebook").attr("src","img/facebook-gray.png");});
$(".footer_youtube").hover(function(){$(".footer_youtube").attr("src","img/youtube.png");});
$(".footer_youtube").mouseleave(function(){$(".footer_youtube").attr("src","img/youtube-gray.png");});
$(".footer_twitter").hover(function(){$(".footer_twitter").attr("src","img/twitter.png");});
$(".footer_twitter").mouseleave(function(){$(".footer_twitter").attr("src","img/twitter-gray.png");});
$(".footer_googleplus").hover(function(){$(".footer_googleplus").attr("src","img/googleplus.png");});
$(".footer_googleplus").mouseleave(function(){$(".footer_googleplus").attr("src","img/googleplus-gray.png");});
function menu(){$("#menu_buton").click(function(){
$(".ul").css("display","block").css("transition","1s");
$(".menu_buton_img").attr("src","img/x.png");
$("#menu_buton").attr("id","menu_buton2");});
$("#menu_buton2").click(function(){
$(".ul").css("display","none");
$(".menu_buton_img").attr("src","img/menu.png");
$("#menu_buton2").attr("id","menu_buton");
});
}
$(".digeriac").hide();
$(".diger").hover(function(){
$(".digeriac").slideDown(1000).css("display","inline-block");
});
$(".diger").mouseleave(function(){
$(".digeriac").css("display","none");
});
});
</script>
</head>
<body id="index">
<header>
<h1>Android Uygulama</h1><sub>Android Uygulamaları Ve Oyunları!</sub>
<div class="menu_mobil">
<ul class="gizlepc">
<li class="gizlepc"><label class="menu_buton"><button id="menu_buton" type="button" onClick="menu()"></button><img class="menu_buton_img" src="img/menu.png" /></label></li>
<ul class="ul">
<li><a href="">Anasayfa</a></li>
<li><a href="">Hakkımda</a></li>
<li><a href="">İletişim</a></li>
<li><a href="">Kayıt Ol</a></li>
</ul>

</ul>
</div>
<div class="menu">
<ul>
<li><a href="?url=anasayfa">Anasayfa</a></li>
<?php if(!$_SESSION){ echo ' <li><a href="?url=giris_yap">Giriş Yap</a></li>
<li><a href="?url=kayit_ol">Kayıt Ol</a></li>'; }
?>

<li><a href="?url=iletisim">İletişim</a></li>
<li class="diger"><a href="">Diğer</a><br /><ul class="digeriac">
<li><a href="?url=uyeler">Üyeler</a><img src="img/uye.png" /></li><br />
<li><a href="?url=adminler">Adminler</a><img src="img/admin.png" /></li><br />
<li><a href="?url=sss">S.S.S</a><img src="img/s.s.s.png" /></li><br />
<li><a href="?url=sosyal_medya">Sosyal Medya</a><img src="img/sosyalmedya.png" /></li><br />
</ul></li>
<?php if($_SESSION){echo '<li><a href="cikis_yap.php">Çıkış</a></li>';} ?>
</ul>
</div>
</header>
<?php
switch($url){
case "anasayfa":
 include("anasayfa.php");
break;
case "giris_yap":
 include("giris_yap.php");
break;
case "kayit_ol":
 include("kayit_ol.php");
break;
case "iletisim":
 include("iletisim.php");
break;
case "uyeler":
 include("uyeler.php");
break;
case "adminler":
 include("adminler.php");
break;
case "sss":
 include("sss.php");
break;
case "kategori":
 include("kategori.php");
break;
case "sosyal_medya":
 include("sosyal_medya.php");
break;
case "devamini_oku":
 include("devamini_oku.php");
break;
}
?>
<footer>
<ul>
<li><a href="http://bc.vc/g7IETMH" target="_blank"><img class="footer_facebook" title="Facebook Grubumuz!" src="img/facebook-gray.png" /></a></li>
<li><a href="http://bc.vc/PjW6A9m" target="_blank"><img class="footer_youtube" title="Youtube Kanalımız!" src="img/youtube-gray.png" /></a></li>
<li><a href="" target="_blank"><img class="footer_twitter" title="Twitter Hesabımız!" src="img/twitter-gray.png" /></a></li>
<li><a href="http://bc.vc/613fSXq" target="_blank"><img class="footer_googleplus" title="Google+ Hesabımız!" src="img/googleplus-gray.png" /></a></li>
</ul>
<br />
<sub>2016-2017 @ Coded By Enes007</sub>
</footer>
</body>
</html>