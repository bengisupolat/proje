<?php require("ayar.php");
session_start();
if(!isset($_SESSION["mail"]))
{
	header("Location:giris.php");
}
if(!$baglan)
{
die("Bağlantı Yapılamadı");
}
else
{	
?> 
<link rel="stylesheet" type="text/css" href="css/ana.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
<div class="fixed-header">
        <div class="container">
            <nav>
               <h2>GİYİM KARAR DESTEK SİSTEMLERİ</h2>
            </nav>
        </div>
    </div>
<ul>
  <li><a  href="yonetim.php">Grafikler</a></li>

  <li><a  class="active" href="urunlistesi.php">Ürün Listesi</a></li>

  <li><a href="cikis.php">Çıkış Yap</a></li>
</ul>
<div style="margin-left:25%;padding:1px 16px;">
<div class="table-title">
<h3>Ürün Listesi</h3>
</div>
<table class="table-fill">
<thead>
<tr>
<th class="text-left">Ürün Kodu</th>
<th class="text-left">Ürün Adı</th>
<th class="text-left">Ürün Fiyatı</th>
</tr>
</thead>
<tbody class="table-hover">
<?php
$sorgu=mysqli_query($baglan,"SELECT * FROM urunler");
while($deger=mysqli_fetch_row($sorgu))
{
	echo "<tr><td class='text-left'>$deger[0]</td><td class='text-left'>$deger[1]</td><td class='text-left'>$deger[2]₺</td>";
}	
?>
</tbody>
</table>
</div>

<?php } ?>