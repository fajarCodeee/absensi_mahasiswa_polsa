<?php
// tampilkan data siswa
$data_siswa = mysqli_query($con, "SELECT * FROM tb_siswa

INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas
INNER JOIN tb_semester ON tb_siswa.id_semester=tb_semester.id_semester
WHERE tb_siswa.id_siswa='$_GET[siswa]'  AND tb_siswa.status=1  ");

foreach ($data_siswa as $d)



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
                    <h3 class="h4">Form Entry Mahasiswa</h3>
                </div>
                <div class="card-body">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>Nama Mahasiswa</th>
                                <th>Alamat</th>
                                <th>Tahun Masuk</th>
                                <th>Tempat, tanggal lahir</th>
                                <th>JK</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $id_semester = $d['id_semester'];
                            $id_kelas = $d['id_mkelas'];

                            $siswa = mysqli_query($con, "SELECT * FROM `tb_siswa` WHERE id_semester='$id_semester' and id_mkelas='$id_kelas' ORDER BY id_siswa ASC");
                            // $siswa = mysqli_query($con, "SELECT * FROM tb_siswa WHERE id_mkelas='$id_kelas' and tb_siswa.id_semester='$id_semester' ORDER BY id_siswa ASC");
                            $jumlahSiswa = mysqli_num_rows($siswa);
                            foreach ($siswa as $g) { ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $g['nis']; ?></td>
                                    <td><?= $g['nama_siswa']; ?></td>
                                    <td><?= $g['alamat']; ?></td>
                                    <td><?= $g['th_angkatan']; ?></td>
                                    <td><?= $g['tempat_lahir']; ?>, <?= $g['tgl_lahir']; ?></td>
                                    <td><?= $g['jk']; ?></td>
                                    <td><img src="../assets/img/user/<?= $g['foto'] ?>" width="45" height="45"></td>
                                    <!-- <td>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=siswa&act=del&id=<?= $g['id_siswa'] ?>"><i class="fas fa-trash"></i></a>
                                        <a class="btn btn-info btn-sm" href="?page=siswa&act=edit&id=<?= $g['id_siswa'] ?>"><i class="far fa-edit"></i></a>
                                    </td> -->
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>