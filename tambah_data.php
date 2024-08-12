<?php

session_start();
include 'gudang_db.php';

$id = $_POST['id'];
$barang_masuk = $_POST['barang_masuk'];


$sql_awal = "SELECT `jumlah` FROM `stok_barang` WHERE `id` = '$id'";

$result_awal = $conn->query($sql_awal);

    if(!empty($barang_masuk)){
    
    $row = $result_awal->fetch_assoc();
    $result_akhir = $row['jumlah'] + $barang_masuk;


    $sql_akhir = "UPDATE stok_barang SET jumlah = '$result_akhir' WHERE stok_barang.id = '$id'";
    if($conn->query($sql_akhir) === TRUE){
        $_SESSION['sukses'] = "Data berhasil ditambahkan";
        echo "sasada";
        header('location: index.php');
        exit();
    }


}

header('location: index.php');
exit();


?>