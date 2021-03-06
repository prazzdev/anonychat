<?php
require 'functions.php';
require 'vars.php';

$chat = query("SELECT * FROM chat");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$chat = cari($_POST["keyword"]);
}

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
<html lang="en">
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
	<title>AnonyChat</title>
</head>
<body>
	<header>
		<a href="index.php"><?=$head;?></a>
	</header>

	<div class="main">
		<form action="" method="post">
			<input type="text" name="keyword" size="30" placeholder="cari pesan..." autocomplete>
			<button name="cari" type="submit">Cari</button>
		</form>
		
		<div id="send">
			<h1 id="tl-send">Kirim Pesan atau Pertanyaan</h1>
			<form action="" method="POST" id="send">
				<ul>
					<li>
						<label for="message">Aku mau ngomong :</label>
						<input type="text" name="message" id="message" required autofocus autocomplete="off">
					</li>
					<li>
						<button type="submit" name="submit">kirim</button>
					</li>
				</ul>
			</form>
		</div>

		<table>
			<?php foreach( $chat as $ct ) : ?>
				<tr>
					<td id="message">
						<div id="message">
							<?= $ct["message"]; ?>	
						</div>
						<div id="replies">
							Balasan : <?= $ct["replies"]; ?>	
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>

	<footer>
		<?=$wm;?>
	</footer>
</body>
</html>
