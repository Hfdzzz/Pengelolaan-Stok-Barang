<?php
session_start();

include 'gudang_db.php';


$id = $_POST['id'];
$barang_keluar = $_POST['barang_keluar'];


if($barang_keluar != null){
$sql_awal = "SELECT id, jumlah FROM stok_barang WHERE id = '$id'";
$result_awal = $conn->query($sql_awal);

$row = $result_awal->fetch_assoc();


$result_akhir = $row['jumlah'] - $barang_keluar;


if($result_akhir <= 0){
    $sql_akhir = "UPDATE stok_barang SET jumlah = '0' WHERE id = '$id'";
    if($conn->query($sql_akhir) == TRUE){
        $_SESSION['sukses_barang_keluar'] = "Data berhasil diupdate";
        header('Location: index.php');
        exit();
    }
}else{
    $sql_akhir = "UPDATE stok_barang SET jumlah = '$result_akhir' WHERE id = '$id'";
    if($conn->query($sql_akhir) == TRUE){
        $_SESSION['sukses_barang_keluar'] = "Data berhasil diupdate";
        header('Location: index.php');
        exit();
}}


}else{
echo "Angka tidak boleh kosong";
header ('Location: index.php');
exit();
}




header('Location: index.php');
exit();




?>