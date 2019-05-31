<?php
require("ayar.php");
if($baglan)
{
if(isset($_POST["mail"])&&isset($_POST["sifre"]))
{ 
$mail=$_POST["mail"];
$sif=$_POST["sifre"];
$sorgu=mysqli_query($baglan,"SELECT * FROM kullanici_giris WHERE ((e_posta='".$mail."') AND (sifre='".$sif."'))");
if(mysqli_num_rows($sorgu)>0)
{
session_start();
$_SESSION['mail']=$mail;
$_SESSION['sifre']=$sif;
unset($_SESSION["hata"]);
header("Location:yonetim.php");
}
else
{
mysqli_close($baglan);
session_start();
$_SESSION["hata"]="E-posta yada Şifre Hatalı !";
header("Location:giris.php");
}
}
}
else
{
die("Bağlantı Yapılamadı");
}
?>
