<title>Android Uygulama - Anasayfa </title>
<div class="sag">
<div class="kategoriler">
<center><h1>Kategoriler</h1></center>
<?php 
$Say   = $vt->query("select * from uygulama order by uygulama_id DESC");
$ToplamVeri   = $Say->rowCount();
$Sayfa   = @intval($_GET['sayfa']); if(!$Sayfa) $Sayfa = 1;
if(!@$_GET["sayfa"]){
	header("location:index.php?url=anasayfa&sayfa=1");
}
$Limit	= 2;
$Sayfa_Sayisi	= ceil($ToplamVeri/$Limit); if($Sayfa > $Sayfa_Sayisi){$Sayfa = 1;}
$Goster   = $Sayfa * $Limit - $Limit;
$GorunenSayfa   = 5;

$kategori = $vt->prepare("select * from uygulama_kategori");
$kategori->execute(array());
$ls = $kategori->fetchAll(PDO::FETCH_ASSOC);
foreach($ls as $yaz){
	echo "<a href='?url=kategori&id=".$yaz["kategori_id"]."' title='".$yaz["kategori"]."'>".$yaz["kategori"]."</a><br />";
}
$uygulama = $vt->prepare("select * from uygulama order by uygulama_id desc limit $Goster,$Limit");
$uygulama->execute(array());
$lsuy = $uygulama->fetchAll(PDO::FETCH_ASSOC);
?>
</div>
<div class="populer_uygulamalar">
</div>

</div>
<?php 
foreach($lsuy as $yaz){ ?>

<div class="uygulamalar">
<a href="?url=devamini_oku&id=<?php echo $yaz["uygulama_id"] ?>">
<center><div class="uygulama_resim">
<img src="<?php echo $yaz["uygulama_resim"] ?>" />
</div></center>
<div class="uygulama_baslik"><center>
<?php echo $yaz["uygulama_baslik"]; ?></center>
</div>
<div class="uygulama_aciklama">
<?php echo mb_substr($yaz["uygulama_aciklama"],0,1000)."..."; ?></div></a>
<center>
<div class="indir">
<a href="<?php  echo $yaz["uygulama_link"]; ?>" target="_blank" title="<?php echo $yaz["uygulama_baslik"]; ?>">İndir</a>
</div></center>
</div>
<?php
}
?>

<div class="sayfalama">
<ul>
<li><a href="index.php?url=anasayfa&sayfa=1">İlk</a></li>
<li><a href="index.php?url=anasayfa&sayfa=<?php echo $Sayfa - 1?>">Önceki</a></li>
<?php

for($i = $Sayfa - $GorunenSayfa; $i < $Sayfa + $GorunenSayfa +1; $i++){

   if($i > 0 and $i <= $Sayfa_Sayisi){

      if($i == $Sayfa){

         echo '<li><span class="say_aktif">'.$i.'</span><li>';

      }else{

         echo '<li><a class="say_a" href="index.php?url=anasayfa&sayfa='.$i.'">'.$i.'</a></li>';

      }
   }
}
?>
<li><a href="index.php?url=anasayfa&sayfa=<?php echo $Sayfa + 1 ?>">Sonraki</a></li>
<li><a href="index.php?url=anasayfa&sayfa=<?php echo $Sayfa_Sayisi ?>">Son</a></li>
</ul>
</div>

<style type="text/css">body{background-color:rgba(14,106,106,1)}</style>