<?php
session_start();
session_destroy();
header("location:index.php?sayfa=anasayfa&basari=cikis_basarili");
?>