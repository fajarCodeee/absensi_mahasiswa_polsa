<?php
// tampilkan data mengajar
$kelas = $_GET['kelas'];

$kelasMengajar = mysqli_query($con, "SELECT * FROM tb_semester where tb_semester.status='1' ");
$d = mysqli_fetch_assoc($kelasMengajar);
// $kelasMengajar = mysqli_query($con, "SELECT * FROM tb_siswa, tb_mkelas, tb_semester, tb_prodi where tb_siswa.id_mkelas=tb_mkelas.id_mkelas and tb_siswa.id_prodi=tb_prodi.id_prodi and tb_mkelas.id_mkelas='$kelas' and tb_siswa.id_semester=tb_semester.id_semester and tb_semester.status='1' ORDER BY tb_siswa.id_semester= '1' ");
// $d = mysqli_fetch_assoc($kelasMengajar);

// $kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 

// INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
// INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

// INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
// INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
// WHERE tb_mengajar.id_mkelas='$kelas'  AND tb_thajaran.status=1  ");


// foreach ($kelasMengajar as $d) 
$namakelas = mysqli_query($con, "SELECT * FROM tb_mkelas WHERE id_mkelas='$kelas' ");
foreach ($namakelas as $walas)
?>

<div class="page-inner">

    <div class="page-header">
        <h4 class="page-title">Data Kelas</h4>
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
                <a href="#">KELAS (<?php echo $walas['nama_kelas'] ?>)</a>
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


                                    <td><?= $mp['semester']; ?></td>
                                    <td>
                                        <a href="?page=siswa&act=siswa1&semester=<?= $mp[id_semester] ?>&kelas=<?= $_GET[kelas] ?>" class="btn btn-default">
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