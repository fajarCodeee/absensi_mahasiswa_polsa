<?php
// tampilkan data mengajar
$kelas = $_GET['prodi'];


$kelasMengajar = mysqli_query($con, "SELECT * FROM tb_mengajar, tb_master_mapel, tb_mkelas, tb_semester, tb_thajaran, tb_prodi, tb_guru where tb_mengajar.id_mapel=tb_master_mapel.id_mapel and tb_mengajar.id_mkelas=tb_mkelas.id_mkelas and tb_mengajar.id_guru=tb_guru.id_guru and tb_mengajar.id_prodi=tb_prodi.id_prodi and tb_prodi.id_prodi='$kelas' and tb_mengajar.id_semester=tb_semester.id_semester and tb_mengajar.id_thajaran=tb_thajaran.id_thajaran and tb_thajaran.status='1'");
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
        <h4 class="page-title">Rekap Absen</h4>
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
                <a href="#">KELAS (<?php echo $d['nama_kelas'] ?>)</a>
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
                                <th>Kode Pelajaran</th>
                                <th>Dosen</th>
                                <th>Kelas</th>
                                <th scope="col">Mata Kuliah</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Absensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kelasMengajar as $mp) { ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $mp['kode_pelajaran']; ?></td>
                                    <td><?= $mp['nama_guru']; ?></td>
                                    <td><?= $mp['nama_kelas']; ?></td>
                                    <td>
                                        <b><?= $mp['mapel']; ?></b><br>
                                        <code><?= $mp['nama_guru']; ?></code>
                                    </td>
                                    <td><?= $mp['semester']; ?></td>
                                    <td>
                                        <a href="?page=walikelas&act=rekap-perbulan&pelajaran=<?= $mp[id_mengajar] ?>&prodi=<?= $_GET[prodi] ?>" class="btn btn-default">
                                            <span class="btn-label">
                                                <i class="fas fa-clipboard"></i>
                                            </span>
                                            Rekap Absen
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