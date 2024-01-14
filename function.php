<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "cetakin_id");


// Fungsi untuk menjalankan query dan mengembalikan hasilnya dalam bentuk array

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

// Fungsi untuk menambahkan data produk ke dalam database
function tambah($data) {
	global $conn;

	$deskripsi = htmlspecialchars($data["deksripsi"]);
	$name = htmlspecialchars($data["name"]);
	$harga = $data["harga"];


	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	// Query SQL untuk menambahkan data produk ke dalam tabel produk
		$query = "INSERT INTO produk
				VALUES
			  ('', '$name ', '$deskripsi', '$harga', '$gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/products/' . $namaFileBaru);

	return $namaFileBaru;
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$name = htmlspecialchars($data["name"]);
	$harga = $data["harga"];
	$deskripsi = htmlspecialchars($data["deskripsi"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}


	
	$query = "UPDATE produk SET
				harga = '$harga',
				name = '$name',
				deskripsi = '$deskripsi',
				image_path = '$gambar'
			  WHERE id_produk = '$id'
			";

    var_dump($id);
    mysqli_query($conn, $query);
  
	return mysqli_affected_rows($conn);	
}


// Fungsi untuk menghapus data produk dari database
function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id");
	return mysqli_affected_rows($conn);
}

?>