<?php
$conn = mysqli_connect("localhost", "root", "", "talk4fun");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}



function tambah($data) {
	global $conn; // koneksi DBMS
	// ambil data dari tiap elemen dalam form
	$message = htmlspecialchars($data["message"]);
	
	// query insert data
	$query = "INSERT INTO chat
				VALUES
				('','$message','$replies')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function ubah($data) {
	global $conn; // koneksi DBMS
	// ambil data dari tiap elemen dalam form
	$id = $data["id"];
	$message = htmlspecialchars($data["message"]);
	$replies = htmlspecialchars($data["replies"]);


	// query insert data
	$query = "UPDATE chat SET
				message = '$message',
				replies = '$replies'
			WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}





function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM chat WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function cari($keyword) {
	$query = "SELECT * FROM chat 
				WHERE
			message LIKE '%$keyword%' OR
			replies LIKE '%$keyword%'
		";

	return query($query);
}

?>
