<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Wadir</h4>
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
                <a href="#">Wadir</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Daftar Wadir</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                </div>
                <div class="card-body">




                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>Nama Wakadir</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kelas = mysqli_query($con, "SELECT wakadir.*, tb_guru.nama_guru, tb_guru.nip, bagian.kode_bagian
                            FROM wakadir
                            INNER JOIN tb_guru ON wakadir.id_guru = tb_guru.id_guru
                            INNER JOIN bagian ON wakadir.id_bagian = bagian.id_bagian                        
                            WHERE wakadir.id_wakadir");
                            foreach ($kelas as $k) { ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $k['nip']; ?></td>
                                    <td><b><?= $k['nama_guru']; ?></b><br>
                                    <code> Wakil Direktur <?= $k['kode_bagian']; ?></code>
                                </td>
                                    <td>
                            <?php 
                            if ($k['status']==0) {
                              echo "<span class='badge badge-danger'>Tidak Aktif</span>";    
                            }else{
                              echo "<span class='badge badge-success'>Aktif</span>";
                            }
                            ?></td>
                                    <td>
                                    <?php 
                            if ($k['status']==0) {
                             ?>
                             <a onclick="return confirm('Yakin Aktifkan Ta  ??')" href="?page=wakadir&act=set_wadir&id=<?=$k['id_wakadir'] ?>&status=1" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Aktifkan</a>
                             <?php
                              
                            }else{
                              ?>
                              <a onclick="return confirm('Yakin Non-Aktifkan Ta  ??')" href="?page=wakadir&act=set_wadir&id=<?=$k['id_wakadir'] ?>&status=0" class="btn btn-danger btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a>
                              <?php
                            }

                            ?>

                                        <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?= $k['id_wakadir'] ?>"><i class="far fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=wakadir&act=del&id=<?= $k['id_wakadir'] ?>"><i class="fas fa-trash"></i> Del</a>
                        </td>
                                        <!-- Modal -->
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?= $k['id_wakadir'] ?>" class="modal fade" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 id="exampleModalLabel" class="modal-title">Edit Wakadir</h4>
                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" class="form-horizontal">
                                                            <input type="hidden" name="id" value="<?= $k['id_wakadir'] ?>">
                                                            <div class="form-group">
                                                                <label>Nama Dosen</label>
                                                                <select name="wakadir" class="form-control">
                                                                    <?php
                                                                    $wkel = mysqli_query($con, "SELECT * FROM tb_guru");
                                                                    foreach ($wkel as $wk) {
                                                                        if ($wk['id_guru'] == $k['id_guru']) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = '';
                                                                        }
                                                                        echo "<option value='$wk[id_guru]' $selected>$wk[nama_guru]</option>";
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Wakil Direktur </label>
                                                                <select name="bagian" class="form-control">
                                                                    <?php
                                                                    $wkel = mysqli_query($con, "SELECT * FROM bagian");
                                                                    foreach ($wkel as $wk) {
                                                                        if ($wk['id_bagian'] == $k['id_bagian']) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = '';
                                                                        }
                                                                        echo "<option value='$wk[id_bagian]' $selected>$wk[kode_bagian]-$wk[nama_bagian]</option>";
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <!-- <div class="form-group">
                                                                <label>Nama Kelas</label>
                                                                <select name="kelas" class="form-control">
                                                                    <option value="">Pilih Kelas</option>
                                                                    <?php
                                                                    $kel = mysqli_query($con, "SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC ");
                                                                    foreach ($kel as $kl) {

                                                                        if ($kl['id_mkelas'] == $k['id_mkelas']) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = '';
                                                                        }

                                                                        echo "<option value='$kl[id_mkelas]' $selected>$kl[nama_kelas]</option>";
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div> -->
                                                            <!-- <div class="form-group">
                                                                <label>Nama Prodi</label>
                                                                <select name="prodi" class="form-control">
                                                                    <option value="">Pilih prodi</option>
                                                                    <?php
                                                                    $kel = mysqli_query($con, "SELECT * FROM tb_prodi ORDER BY id_prodi ASC ");
                                                                    foreach ($kel as $kl) {

                                                                        if ($kl['id_prodi'] == $k['id_prodi']) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = '';
                                                                        }

                                                                        echo "<option value='$kl[id_prodi]' $selected>$kl[prodi]</option>";
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div> -->





                                                            <div class="row form-group">
                                                                <div class="col-lg-2 col-lg-10">
                                                                    <button name="edit" class="btn btn-info" type="submit">Edit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php
                                                        if (isset($_POST['edit'])) {
                                                            $save = mysqli_query($con, "UPDATE wakadir SET id_guru='$_POST[wakadir]',id_bagian='$_POST[bagian]' WHERE id_wakadir='$_POST[id]' ");
                                                            if ($save) {
                                                                echo "<script>
                        alert('Data diubah !');
                        window.location='?page=wakadir';
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


<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="exampleModalLabel" class="modal-title">Tambah Wakadir</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <select name="wakadir" class="form-control">
                            <option value="">Pilih Dosen</option>
                            <?php
                            $wkel = mysqli_query($con, "SELECT * FROM tb_guru");
                            foreach ($wkel as $wk) {
                                echo "<option value='$wk[id_guru]'>$wk[nama_guru]</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Wadir berapa</label>
                        <select name="no" class="form-control">
                            <option value="">Pilih Kode</option>
                            <?php
                            $wkel = mysqli_query($con, "SELECT * FROM bagian");
                            foreach ($wkel as $wk) {
                                echo "<option value='$wk[id_bagian]'>$wk[kode_bagian] $wk[nama_bagian]</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Nama Kelas</label>
                        <select name="kelas" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <?php
                            $kel = mysqli_query($con, "SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC ");
                            foreach ($kel as $k) {
                                echo "<option value='$k[id_mkelas]'>$k[nama_kelas]</option>";
                            }

                            ?>
                        </select>
                    </div> -->
                    <!-- <div class="form-group">
                        <label>Nama prodi</label>
                        <select name="prodi" class="form-control">
                            <option value="">Pilih prodi</option>
                            <?php
                            $kel = mysqli_query($con, "SELECT * FROM tb_prodi ORDER BY id_prodi ASC ");
                            foreach ($kel as $k) {
                                echo "<option value='$k[id_prodi]'>$k[prodi]</option>";
                            }

                            ?>
                        </select>
                    </div> -->





                    <div class="row form-group">
                        <div class="col-lg-2 col-lg-10">
                            <button name="save" class="btn btn-info" type="submit">Save</button>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['save'])) {
                    $save = mysqli_query($con, "INSERT INTO wakadir VALUES(NULL,'$_POST[wakadir]','$_POST[no]','1') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=wakadir';
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