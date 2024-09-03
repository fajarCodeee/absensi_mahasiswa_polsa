<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Mata Kuliah</h4>
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
        <a href="#">Data Umum</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Daftar Mata Kuliah</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">



            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Nama Matkul</th>
                  <th>Prodi</th>
                  <th>Semester</th>
                  <th>SKS</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $mapel = mysqli_query($con, "SELECT * FROM tb_master_mapel
                INNER JOIN tb_prodi ON tb_master_mapel.id_prodi=tb_prodi.id_prodi
                INNER JOIN tb_semester ON tb_master_mapel.id_semester=tb_semester.id_semester
                INNER JOIN tb_sks ON tb_master_mapel.id_sks=tb_sks.id_sks
                ORDER BY id_mapel ASC");
                foreach ($mapel as $k) { ?>
                  <tr>
                    <td><?= $no++; ?>.</td>

                    <td><?= $k['kode_mapel']; ?></td>
                    <td><?= $k['mapel']; ?></td>
                    <td><?= $k['prodi']; ?></td>
                    <td><?= $k['semester']; ?></td>
                    <td><?= $k['sks']; ?></td>
                    <td>

                      <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?= $k['id_mapel'] ?>"><i class="far fa-edit"></i> Edit</a>
                      <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delmapel&id=<?= $k['id_mapel'] ?>"><i class="fas fa-trash"></i> Del</a>

                      <!-- Modal -->
                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?= $k['id_mapel'] ?>" class="modal fade" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Mapel</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="post">
                                <div class="row">
                                  <div class="col-md-10">
                                    <div class="form-group">
                                      <label>Nama Matkul</label>
                                      <input name="id" type="hidden" value="<?= $k['id_mapel'] ?>">
                                      <input name="mapel" type="text" value="<?= $k['mapel'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label>Kode Matkul</label>                                  
                                      <input name="kode" type="text" value="<?= $k['kode_mapel'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label>Semester</label>
                                      <select class="form-control" name="semester">
                                        <option>Pilih Kelas</option>
                                        <?php
                                        $sqlsemester = mysqli_query($con, "SELECT * FROM tb_semester WHERE status=1");
                                        while ($semester = mysqli_fetch_array($sqlsemester)) {

                                          if ($semester['id_semester'] == $k['id_semester']) {
                                            $selected = "selected";
                                          } else {
                                            $selected = '';
                                          }
                                          echo "<option value='$semester[id_semester]' $selected>$semester[semester]</option>";
                                        }
                                        ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>Prodi</label>
                                      <select class="form-control" name="prodi">
                                        <option>Pilih Prodi</option>
                                        <?php
                                        $sqlprodi = mysqli_query($con, "SELECT * FROM tb_prodi ORDER BY id_prodi ASC");
                                        while ($prodi = mysqli_fetch_array($sqlprodi)) {

                                          if ($prodi['id_prodi'] == $k['id_prodi']) {
                                            $selected = "selected";
                                          } else {
                                            $selected = '';
                                          }
                                          echo "<option value='$prodi[id_prodi]' $selected>$prodi[prodi]</option>";
                                        }
                                        ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label>sks</label>
                                      <select class="form-control" name="sks">
                                        <option>Pilih sks</option>
                                        <?php
                                        $sqlsks = mysqli_query($con, "SELECT * FROM tb_sks ORDER BY id_sks ASC");
                                        while ($sks = mysqli_fetch_array($sqlsks)) {

                                          if ($sks['id_sks'] == $k['id_sks']) {
                                            $selected = "selected";
                                          } else {
                                            $selected = '';
                                          }
                                          echo "<option value='$sks[id_sks]' $selected>$sks[sks]</option>";
                                        }
                                        ?>
                                      </select>
                                    </div>

                                    <div class="form-group">
                                      <button name="edit" class="btn btn-primary" type="submit">Edit</button>

                                    </div>
                                  </div>
                                </div>
                              </form>
                              <?php
                              if (isset($_POST['edit'])) {
                                $save = mysqli_query($con, "UPDATE tb_master_mapel SET kode_mapel='$_POST[kode]',mapel='$_POST[mapel]',id_prodi='$_POST[prodi]',id_semester='$_POST[semester]',id_sks='$_POST[sks]' WHERE id_mapel='$_POST[id]' ");
                                if ($save) {
                                  echo "<script>
                        alert('Data diubah !');
                        window.location='?page=master&act=mapel';
                        </script>";
                                }
                              }

                              ?>


                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->



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
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel" class="modal-title">Tambah Mapel</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="form-horizontal">
          <div class="form-group">
            <label>Kode Mata Kuliah</label>
            <input name="kode" type="text"  class="form-control" placeholder="Kode Mata Kuliah">
          </div>
          <div class="form-group">
            <label>Nama mapel</label>
            <input name="mapel" type="text" placeholder="Nama mapel .." class="form-control">
          </div>
          <div class="form-group">
            <label>Prodi</label>
            <select name="prodi" class="form-control">
              <option value="">- Pilih -</option>
              <?php
              $prodi = mysqli_query($con, "SELECT * FROM tb_prodi ORDER BY id_prodi ASC");
              foreach ($prodi as $g) {
                echo "<option value='$g[id_prodi]'>$g[prodi]</option>";
              }
              ?>

            </select>
          </div>
          <div class="form-group">
            <label for="kode">Semester</label>
            <!-- <input type="text" class="form-control" placeholder="<?= $semAktif['semester'] ?>" readonly> -->
            <select name="semester" class="form-control">
              <option value="">-pilih-</option>
              <?php
              $guru = mysqli_query($con, "SELECT * FROM tb_semester WHERE status=1");
              foreach ($guru as $g) {
                echo "<option value='$g[id_semester]'>$g[semester]</option>";
              }
              ?>

            </select>
          </div>
          <div class="form-group">
            <label>SKS</label>
            <!-- <input type="text" class="form-control" placeholder="<?= $semAktif['semester'] ?>" readonly> -->
            <select name="sks" class="form-control">
              <option value="">-pilih-</option>
              <?php
              $guru = mysqli_query($con, "SELECT * FROM tb_sks ");
              foreach ($guru as $g) {
                echo "<option value='$g[id_sks]'>$g[sks]</option>";
              }
              ?>

            </select>
          </div>


          <div class="form-group">
            <button name="save" class="btn btn-primary" type="submit">Save</button>
          </div>
        </form>
        <?php
        if (isset($_POST['save'])) {
          $save = mysqli_query($con, "INSERT INTO tb_master_mapel VALUES(NULL,'$_POST[kode]','$_POST[mapel]','$_POST[prodi]','$_POST[semester]','$_POST[sks]') ");
          if ($save) {
            echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=mapel';
                        </script>";
          }
        }

        ?>


      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->