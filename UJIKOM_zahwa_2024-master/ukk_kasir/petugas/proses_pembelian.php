<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$NomorTelepon = $_POST['NomorTelepon'];
$Alamat = $_POST['Alamat'];
$TanggalPenjualan = $_POST['TanggalPenjualan'];

$sql = "INSERT INTO pelanggan VALUES($PelangganID,'$NamaPelanggan','$Alamat','$NomorTelepon')";
var_dump($sql);
mysqli_query($koneksi,$sql);


$penjualan = "select * from pelanggan order by PelangganID desc limit 1";
            $qkat = mysqli_query($koneksi, $penjualan);
            $data = mysqli_fetch_assoc($qkat);
            $id_pelanggan = $data['PelangganID'];

// menginput data ke database
mysqli_query($koneksi,"insert into penjualan values(0,'$TanggalPenjualan','','$id_pelanggan')");

// mengalihkan halaman kembali ke data_barang.php
header("location:pembelian.php?pesan=simpan");

?>