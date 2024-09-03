<?php
// tampilkan data siswa
$kelas = $_GET['siswa'];


$kelasMengajar = mysqli_query($con, "SELECT tb_siswa.id_siswa, tb_siswa.id_mkelas, tb_siswa.id_semester, tb_mkelas.nama_kelas, tb_semester.semester
FROM tb_siswa
JOIN tb_mkelas ON tb_siswa.id_mkelas = tb_mkelas.id_mkelas
JOIN tb_semester ON tb_siswa.id_semester = tb_semester.id_semester
JOIN tb_prodi ON tb_siswa.id_prodi = tb_prodi.id_prodi
WHERE tb_prodi.id_prodi = $kelas
GROUP BY tb_siswa.id_siswa, tb_siswa.id_mkelas, tb_siswa.id_semester, tb_mkelas.nama_kelas, tb_semester.semester;
");
// $d = mysqli_fetch_assoc($kelasMengajar);
$d = mysqli_fetch_assoc($kelasMengajar);

// $kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 

// INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
// INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

// INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
// INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
// WHERE tb_mengajar.id_mkelas='$kelas'  AND tb_thajaran.status=1  ");


// foreach ($kelasMengajar as $d) 

?>

<div class="page-inner">

    <div class="page-header">
        <h4 class="page-title">Data Siswa</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">(<?php echo $d['prodi'] ?>)</a>
            </li>

        </ul>
    </div>


    <div class="row">

        <div class="col-md-12 col-xs-12">


            <div class="card">
                <div class="card-body">
                    <table class="table table-head-bg-danger table-xs">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Data Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kelasMengajar as $mp) { ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $mp['nama_kelas']; ?></td>
                                    <td><?= $mp['semester']; ?></td>
                                    <td>
                                        <a href="?page=siswa&act=data&siswa=<?= $mp['id_siswa'] ?>" class="btn btn-default">
                                            <span class="btn-label">
                                                <i class="fas fa-clipboard"></i>
                                            </span>
                                            Data Siswa
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>