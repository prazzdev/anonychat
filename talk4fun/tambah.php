<?php
require 'functions.php';
require 'vars.php';
// tombol submit sudah di pencet /belum
if( isset($_POST["submit"])) {

	// cek apakah data berhasil ditambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script> alert('Makasih pesannya. xixixi');
				document.location.href = 'index.php';</script>";
	} else {
		echo "<script> alert('Pesan gagal dikirim.');
				document.location.href = 'index.php';</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
		<!-- FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?&family=Twinkle+Star&family=Swanky+and+Moo+Moo&family=Shadows+Into+Light&family=Pangolin&display=swap" rel="stylesheet">
	<!-- selesai FONTS -->
	<title>AnonyChat</title>
	<style>
		body {
			
		}
	</style>
</head>
<body>
	<header>
		<a href="index.php"><?=$head;?></a>
	</header>

	<h1 id="tl-send">Kirim Pesan atau Pertanyaan</h1>

	<form action="" method="POST" id="send">
		<ul>
			<li>
				<label for="message">Aku mau ngomong :</label>
				<input type="text" name="message" id="message" required autofocus>
			</li>
			<li>
				<button type="submit" name="submit">kirim</button>
			</li>
		</ul>
	</form>
</body>
</html>