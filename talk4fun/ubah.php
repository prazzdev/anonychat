<?php
require 'functions.php';
require 'vars.php';

// ambil data dari url nya
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$chat = query("SELECT * FROM chat WHERE id = $id")[0];


// tombol submit sudah di pencet /belum
if( isset($_POST["submit"])) {

	// cek apakah data berhasil ditambahkan atau tidak
	if( ubah($_POST) >= 0 ) {
		echo "<script> alert('Pesan dibalas.');
				document.location.href = 'index.php';</script>";
	} else {
		echo "<script> alert('Pesan gagal dibalas.');
				document.location.href = 'index.php';</script>";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="file/img/icon3.png">
	<link rel="stylesheet" href="css/style.css">

	<!-- FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?&family=Twinkle+Star&family=Swanky+and+Moo+Moo&family=Shadows+Into+Light&family=Pangolin&display=swap" rel="stylesheet">
	<!-- selesai FONTS -->
	<title>Balas | AnonyChat</title>
</head>
<body>
	<header>
		<a href="index.php"><?=$head;?></a>
	</header>

	<form action="" method="POST" id="replies">
		<input type="hidden" name="id" value="<?= $chat["id"]; ?>">
		<ul>
			<li>
				<label for="message">Pesan : </label>
				<input type="text" name="message" id="message" value="<?= $chat["message"]; ?>" required>
			</li>
			<li>
				<label for="replies">Balasan</label>
				<input type="text" name="replies" id="replies" value="<?= $chat["replies"]; ?>" required autofocus>
			</li>
			<li>
				<button type="submit" name="submit">Submit</button>
			</li>
		</ul>
	</form>
</body>
</html>