<?php
// hubungkan dengan database MongoDB
$host = "mongodb://localhost:27017"; // sesuaikan dengan host MongoDB Anda
$database = "nama_database"; // sesuaikan dengan nama database Anda

$client = new MongoDB\Client($host);
$db = $client->$database;

// tangkap data dari form checkout
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$provinsi = $_POST['provinsi'];
$kodepos = $_POST['kodepos'];
$telepon = $_POST['telepon'];

// simpan data ke database MongoDB
$result = $db->checkout->insertOne([
  'nama' => $nama,
  'alamat' => $alamat,
  'kota' => $kota,
  'provinsi' => $provinsi,
  'kodepos' => $kodepos,
  'telepon' => $telepon,
]);

if ($result->getInsertedCount() == 1) {
  echo "Data berhasil disimpan";
} else {
  echo "Error: Data gagal disimpan";
}
?>
