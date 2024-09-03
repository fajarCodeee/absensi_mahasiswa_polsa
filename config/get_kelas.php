<?php
include("db.php"); // Sambungkan ke database

if (isset($_GET['prodi_id'])) {
    $prodiId = $_GET['prodi_id'];

    // Ambil data kelas berdasarkan id prodi
    $kelas = mysqli_query($con, "SELECT * FROM tb_mkelas WHERE id_prodi='$prodiId'");
    $kelasData = [];

    while ($row = mysqli_fetch_assoc($kelas)) {
        $kelasData[] = [
            'id_kelas' => $row['id_mkelas'],
            'nama_kelas' => $row['nama_kelas']
        ];
    }

    // Kembalikan data dalam format JSON
    echo json_encode($kelasData);
}
