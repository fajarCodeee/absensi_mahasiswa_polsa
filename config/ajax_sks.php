<?php
// Koneksi ke database
include("db.php");

if (isset($_POST['id_mapel'])) {
    $id = $_POST['id_mapel'];

    // Query untuk mengambil data SKS berdasarkan ID mata kuliah
    $query = "SELECT id_sks FROM tb_master_mapel WHERE id_mapel = $id";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($sks);
    $stmt->fetch();
    
    echo $sks;

    $stmt->close();
}

$con->close();
?>