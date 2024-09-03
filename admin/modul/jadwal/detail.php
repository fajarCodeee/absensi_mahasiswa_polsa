<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Jadwal</h4>
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
        <a href="#">Jadwal Mengajar</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Daftar Jadwal Mengajar</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Detail Jadwal Mengajar</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <a href="?page=jadwal" class="btn btn-primary btn-sm text-white"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table id="table" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama Dosen</th>
                  <th>Mata Kuliah</th>
                  <th>Kelas</th>
                  <th>TP/Semester</th>
                  <th>Hari/Waktu</th>
                  <th>Ruangan</th>
                  <th>SKS</th>
                
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $id = $_GET['id'];
                $mapel = mysqli_query($con, "SELECT * FROM tb_mengajar 
                            INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru
                            INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
                            INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
                            INNER JOIN tb_sks ON tb_master_mapel.id_sks=tb_sks.id_sks
                            INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
                            INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
                            INNER JOIN tb_ruangan ON tb_mengajar.id_ruangan=tb_ruangan.id_ruangan                                                                                    
                            WHERE id_mengajar = '$id'  ");
                foreach ($mapel as $d) {
                ?>

                  <tr>
                    <td><?= $d['kode_pelajaran'] ?></td>
                    <td><?= $d['nama_guru'] ?></td>
                    <td><?= $d['mapel'] ?></td>
                    <td><?= $d['nama_kelas'] ?></td>
                    <td><?= $d['tahun_ajaran'] ?>/<?= $d['semester'] ?></td>
                    <td><?= $d['hari'] ?> / <?= $d['jam_mulai'] ?>-<?= $d['jam_selesai'] ?></td>
                    <td><?= $d['ruangan'] ?></td>
                    <td><?= $d['sks'] ?></td>
                  
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>