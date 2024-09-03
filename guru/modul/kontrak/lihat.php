<?php
// tampilkan data mengajar
$kelasMengajar = mysqli_query($con, "SELECT * FROM tb_mengajar 

INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_mengajar.id_mengajar='$_GET[pelajaran]'  AND tb_thajaran.status=1  ");

foreach ($kelasMengajar as $d)

    $tglTerakhir = 14;

?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Mahasiswa</h4>
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
                <a href="#">Data Mahasiswa</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Kelas <?php echo $d['nama_kelas'] ?> (<?php echo $d['semester'] ?>)</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Form Entry Mahasiswa</h3><br>
                </div>

                <div class="card-body">

                    <a target="_blank" href="../guru/modul/kontrak/cetak.php?pelajaran=<?= $_GET[pelajaran] ?>&kelas=<?= $d['id_prodi'] ?>" class="btn btn-default">
                        <span class="btn-label">
                            <i class="fas fa-print"></i>
                        </span>
                        CETAK RESUME
                    </a>
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Pertemuan Ke</th>
                                <th style="text-align: center;">Materi</th>
                                <th style="text-align: center;">Daftar Pustaka</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $id_semester = $d['id_semester'];
                            $id_kelas = $d['id_mkelas'];

                            $data_siswa = mysqli_query($con, "SELECT * FROM tb_kontrak 
                            INNER JOIN tb_mengajar ON tb_kontrak.id_mengajar=tb_mengajar.id_mengajar 
                            WHERE tb_kontrak.id_mengajar='$_GET[pelajaran]'  ");
                            // $siswa = mysqli_query($con, "SELECT * FROM tb_siswa WHERE id_mkelas='$id_kelas' and tb_siswa.id_semester='$id_semester' ORDER BY id_siswa ASC");
                            $jumlahSiswa = mysqli_num_rows($data_siswa);
                            foreach ($data_siswa as $g) { ?>
                                <tr>
                                    <td align="center"><?= $g['pertemuan_ke']; ?></td>
                                    <td align="center"><?= $g['materi']; ?></td>
                                    <td align="center"><?= $g['daftar_pustaka']; ?></td>

                                <?php } ?>



                                <!-- <td>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=siswa&act=del&id=<?= $g['id_siswa'] ?>"><i class="fas fa-trash"></i></a>
                                        <a class="btn btn-info btn-sm" href="?page=siswa&act=edit&id=<?= $g['id_siswa'] ?>"><i class="far fa-edit"></i></a>
                                    </td> -->
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>