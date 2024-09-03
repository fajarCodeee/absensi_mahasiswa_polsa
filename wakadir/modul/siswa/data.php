<?php
// tampilkan data mengajar
$data_siswa = mysqli_query($con, "SELECT * FROM tb_siswa

INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas
INNER JOIN tb_semester ON tb_siswa.id_semester=tb_semester.id_semester
WHERE tb_siswa.id_mkelas='$_GET[kelas]' AND tb_siswa.id_semester='$_GET[semester]' AND tb_siswa.status=1  ");

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
        <a href="#">Tambah Mahasiswa</a>
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
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Kelas</th>
                  <th>Tahun Masuk</th>
                  <th>Semester</th>
                  <th>Prodi</th>
                  <th>Foto</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $no = 1;
                $id_semester = $d['id_semester'];
                $id_kelas = $d['id_mkelas'];

                $siswa = mysqli_query($con, "SELECT * FROM tb_siswa 
                INNER JOIN tb_mkelas ON tb_siswa.id_mkelas=tb_mkelas.id_mkelas
                 INNER JOIN tb_semester ON tb_siswa.id_semester=tb_semester.id_semester
                 INNER JOIN tb_prodi ON tb_siswa.id_prodi=tb_prodi.id_prodi 
                 WHERE tb_siswa.id_semester='$id_semester' and tb_siswa.id_mkelas='$id_kelas' ORDER BY id_siswa ASC");
                // $siswa = mysqli_query($con, "SELECT * FROM tb_siswa WHERE id_mkelas='$id_kelas' and tb_siswa.id_semester='$id_semester' ORDER BY id_siswa ASC");
                $jumlahSiswa = mysqli_num_rows($siswa);
                foreach ($siswa as $g) { ?>
                  <tr>
                   
                    <td><?= $no++; ?>.</td>
                    <td><?= $g['nis']; ?></td>
                    <td><?= $g['nama_siswa']; ?></td>
                    <td><?= $g['nama_kelas']; ?></td>
                    <td><?= $g['th_angkatan']; ?></td>
                    <td><?= $g['semester']; ?></td>
                    <td><?= $g['prodi']; ?></td>
                    <td><img src="../assets/img/user/<?= $g['foto'] ?>" width="45" height="45"></td>
                    
                  </tr>

                <?php } ?>
                
              </tbody>
            </table>
        
        </div>
      </div>
    </div>
  </div>
</div>