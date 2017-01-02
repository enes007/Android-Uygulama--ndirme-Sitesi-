<?php 
$id = $_GET["id"];
?>
<div class="sag">
<div class="kategoriler">
<center><h1>Kategoriler</h1></center>
<?php 
$kategori = $vt->prepare("select * from uygulama_kategori");
$kategori->execute(array());
$ls = $kategori->fetchAll(PDO::FETCH_ASSOC);
foreach($ls as $yaz){
	echo "<a href='?url=kategori&id=".$yaz["kategori_id"]."' title='".$yaz["kategori"]."'>".$yaz["kategori"]."</a><br />";
}
$uygulama = $vt->prepare("select * from uygulama where uygulama_id=?");
$uygulama->execute(array($id));
$yaz = $uygulama->fetch(PDO::FETCH_ASSOC);
?>
</div>
<div class="populer_uygulamalar">
</div>

</div>
<div class="uygulamalar">
<center><div class="uygulama_tarih"><?php 
$x = explode("-",$yaz["uygulama_eklenme_tarihi"]);
$gun = substr($x["2"],0,2);
	if($x["1"] == 01){
		echo $gun." "."Ocak"." ".$x[0];
	}elseif($x["1"] == 02){
		echo $gun." "."Şubat"." ".$x[0];
	}elseif($x["1"] == 03){
		echo $gun." "."Mart"." ".$x[0];
	}elseif($x["1"] == 04){
		echo $gun." "."Nisan"." ".$x[0];
	}elseif($x["1"] == 05){
		echo $gun." "."Mayıs"." ".$x[0];
	}elseif($x["1"] == 06){
		echo $gun." "."Haziran"." ".$x[0];
	}elseif($x["1"] == 07){
		echo $gun." "."Temmuz"." ".$x[0];
	}elseif($x["1"] == 08){
		echo $gun." "."Ağustos"." ".$x[0];
	}elseif($x["1"] == 09){
		echo $gun." "."Eylül"." ".$x[0];
	}elseif($x["1"] == 10){
		echo $gun." "."Ekim"." ".$x[0];
	}elseif($x["1"] == 11){
		echo $gun." "."Kasım"." ".$x[0];
	}elseif($x["1"] == 12){
		echo $gun." "."Aralık"." ".$x[0];
	}
?></div></center>
<center><div class="uygulama_resim">
<img src="<?php echo $yaz["uygulama_resim"] ?>" />
</div></center>
<div class="uygulama_baslik"><center>
<?php echo $yaz["uygulama_baslik"]; ?></center>
</div>
<div class="uygulama_aciklama">
<?php echo $yaz["uygulama_aciklama"]; ?></div>
<center>
<div class="indir">
<a href="<?php  echo $yaz["uygulama_link"]; ?>" target="_blank" title="<?php echo $yaz["uygulama_baslik"]; ?>">İndir</a>
</div></center>
</div>
<style type="text/css">body{background-color:rgba(14,106,106,1)}</style>