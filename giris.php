<link rel="stylesheet" type="text/css" href="css/login.css">
<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>KararDestek<span>Sistemi</span></div>
		</div>
		<br>
		<div class="login">
			<form action="giriskontrol.php" method="POST">
				<input type="email" placeholder="E-posta" name="mail"><br>
				<input type="password" placeholder="Şifre" name="sifre"><br>
				<?php 
				session_start();
				if(isset($_SESSION["mail"])&&isset($_SESSION["sifre"]))
				{
					header("Location:yonetim.php");
				}
				if(isset($_SESSION["hata"]))
				{
					echo "<br>";
					echo "<span><b><u>".$_SESSION["hata"]."</u></b></span>";
				}				
				?>
				<input type="submit" value="Giriş Yap">
			</form>
				
		</div>