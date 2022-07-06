<?php
require 'functions.php';

$id = $_GET["id"];

if(hapus($id) > 0) {
	echo "<script> alert('Pesan berhasil dihapus.');
				document.location.href = 'replies.php';</script>";
	} else {
		echo "<script> alert('Pesan gagal dihapus.');
				document.location.href = 'replies.php';</script>";
	}

?>