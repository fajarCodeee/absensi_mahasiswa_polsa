<?php
include("db.php");
// $prodi_id = $_POST['id_prodi'];
// $semester_id = $_POST['id_semester'];

// $result = $con->query("SELECT * FROM tb_master_mapel WHERE id_prodi = $prodi_id AND id_semester = $semester_id");
// $options = "<option value=''>--Pilih Mata Kuliah--</option>";
// while ($row = $result->fetch_assoc()) {
//     $options .= "<option value='" . $row['id_mapel'] . "'>" . $row['mapel'] . "</option>";
// }

// echo $options;

// $con->close();
$prodi = $_GET['prodi'];
$semester = $_GET['semester'];

$mapel = mysqli_query($con, "SELECT * FROM tb_master_mapel WHERE id_prodi='$prodi' AND id_semester='$semester'");
echo "<option value=''>- Pilih -</option>";
while ($g = mysqli_fetch_array($mapel)) {
    echo "<option value='$g[id_mapel]'>$g[mapel]</option>";
}
