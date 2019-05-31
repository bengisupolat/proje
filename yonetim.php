<script src="https://cdn.anychart.com/releases/8.6.0/js/anychart-base.min.js" type="text/javascript"></script>
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
<script type="text/javascript">
	<?php
	for($sayac=3;$sayac<7;$sayac++)
	{
		$sorgu=mysqli_query($baglan,"SELECT satis_miktar FROM satislar WHERE((ay_id=$sayac) AND(urun_id=85))");
		while($deger=mysqli_fetch_row($sorgu))
		{
			$kadin[$sayac-3]=$deger[0];
		}
		$sorgu=mysqli_query($baglan,"SELECT satis_miktar FROM satislar WHERE((ay_id=$sayac) AND(urun_id=87))");
		while($deger=mysqli_fetch_row($sorgu))
		{
			$erkek[$sayac-3]=$deger[0];
		}
	}
	 ?>
  anychart.onDocumentLoad(function() {
  var chart = anychart.line()
  chart.data({header: ["#", "Kadın", "Erkek"],
   rows:[
    ["Mart", <?php echo $kadin[0] ?>, <?php echo $erkek[0] ?>],
    ["Nisan", <?php echo $kadin[1] ?>, <?php echo $erkek[1] ?>],
    ["Mayıs", <?php echo $kadin[2] ?>, <?php echo $erkek[2] ?>],
    ["Haziran", <?php echo $kadin[3] ?>, <?php echo $erkek[3] ?>]
  ]});
  chart.title("Kadın (Ürün Kodu: 85) - Erkek (Ürün Kodu: 87) Manken Jean Satış Grafiği");
  chart.legend(true);
  chart.container("mankenler").draw();
});
</script>
<script type="text/javascript">
  	<?php 
  	for($i=1;$i<13;$i++)
  	{
  		$sorgu=mysqli_query($baglan,"SELECT SUM(satis_miktar) FROM satislar WHERE ay_id=$i");
  		while($deger=mysqli_fetch_row($sorgu))
  		{
  			$aylar[$i-1]=$deger[0];
  		}
  		if(empty($aylar[$i-1]))
  		{
  			$aylar[$i-1]=0;
  		}
  	}  	
  	?>
  	anychart.onDocumentLoad(function() {
  var chart = anychart.line()
  chart.data({header: ["#", "Miktar"],
   rows:[
    ["Ocak",<?php echo $aylar[0] ?>],
    ["Şubat",<?php echo $aylar[1] ?>],
    ["Mart",<?php echo $aylar[2] ?>],
    ["Nisan",<?php echo $aylar[3] ?>],
    ["Mayıs",<?php echo $aylar[4] ?>],
    ["Haziran",<?php echo $aylar[5] ?>],
    ["Temmuz",<?php echo $aylar[6] ?>],
    ["Ağustos",<?php echo $aylar[7] ?>],
    ["Eylül",<?php echo $aylar[8] ?>],
    ["Ekim",<?php echo $aylar[9] ?>],
    ["Kasım",<?php echo $aylar[10] ?>],
    ["Aralık",<?php echo $aylar[11] ?>]
  ]});
  chart.title("Aylara Göre Satılan Ürün Miktar Grafiği");  
  chart.container("satilanurun").draw();
});
</script>
<script type="text/javascript">
	<?php
	$k=0;
		$sorgu=mysqli_query($baglan,"SELECT s.sehir_ad,i.iade_miktar FROM sehirler s,iadeler i WHERE s.sehir_id=i.sehir_id");
		while($deger=mysqli_fetch_row($sorgu))
  		{
  			$sehir[$k]=$deger[0];
  			$miktar[$k]=$deger[1];
  			$k++;
  		}
	?>
	anychart.onDocumentLoad(function() {
  var chart = anychart.column()
  chart.data({header: ["#", "Miktar"],
   rows:[
    [<?php echo "\"$sehir[0]\"" ?>,<?php echo $miktar[0] ?>],
    [<?php echo "\"$sehir[1]\"" ?>, <?php echo $miktar[1] ?>],
    [<?php echo "\"$sehir[2]\"" ?>, <?php echo $miktar[2] ?>],
    [<?php echo "\"$sehir[3]\"" ?>, <?php echo $miktar[3] ?>]
  ]});
  chart.title("İllere Göre İade Edilen Ürün Grafiği");
  chart.container("iadeurunil").draw();
  });
</script>
<script type="text/javascript">
	<?php
	$k=0;
		$sorgu=mysqli_query($baglan,"SELECT s.sehir_ad,si.satis_miktar FROM sehirler s,satislar si WHERE s.satis_id=si.satis_id");
		while($deger=mysqli_fetch_row($sorgu))
  		{
  			$sehir[$k]=$deger[0];
  			$miktar[$k]=$deger[1];
  			$k++;
  		}
	?>
	anychart.onDocumentLoad(function() {
  var chart = anychart.pie()
  chart.data({header: ["#", "Miktar"],
   rows:[
    [<?php echo "\"$sehir[0]\"" ?>,<?php echo $miktar[0] ?>],
    [<?php echo "\"$sehir[1]\"" ?>, <?php echo $miktar[1] ?>],
    [<?php echo "\"$sehir[2]\"" ?>, <?php echo $miktar[2] ?>],
    [<?php echo "\"$sehir[3]\"" ?>, <?php echo $miktar[3] ?>]
  ]});
  chart.title("İllere Göre Satılan Ürün Miktar Grafiği");
  chart.container("satilanurunil").draw();
  });
</script>
<link rel="stylesheet" type="text/css" href="css/ana.css">
<div class="fixed-header">
        <div class="container">
            <nav>
               <h2>GİYİM KARAR DESTEK SİSTEMLERİ</h2>
            </nav>
        </div>
    </div>
<ul>
  <li><a class="active" href="yonetim.php">Grafikler</a></li>

  <li><a href="urunlistesi.php">Ürün Listesi</a></li>

  <li><a href="cikis.php">Çıkış Yap</a></li>
</ul>
<div style="margin-left:20%;padding:1px 16px;">
<h2>Kadın (Ürün Kodu: 85) - Erkek (Ürün Kodu: 87) Manken Jean Satış Grafiği</h2>
<hr>
<div id="mankenler">
</div>
<hr>
<h2>Aylara Göre Satılan Ürün Miktar Grafiği</h2>
<hr>
<div id="satilanurun">
</div>
<hr>
<h2>İllere Göre İade Edilen Ürün Grafiği</h2>
<hr>
<div id="iadeurunil">
</div>
<hr>
<h2>İllere Göre Satılan Ürün Miktar Grafiği</h2>
<hr>
<div id="satilanurunil">
</div>
<hr>
</div>

<?php } ?>
