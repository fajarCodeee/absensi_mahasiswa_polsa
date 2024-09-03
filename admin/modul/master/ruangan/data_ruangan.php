<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Prodi</h4>
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
                <a href="#">Daftar Ruangan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addprodi"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Ruangan</th>
                                <th scope="col">Nama Ruangan</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $prodi = mysqli_query($con, "SELECT * FROM tb_ruangan");
                            foreach ($prodi as $k) { ?>
                                <tr>
                                    <td><b><?= $no++; ?>.</b></td>
                                    <td><?= $k['id_ruangan']; ?></td>
                                    <td><?= $k['ruangan']; ?></td>
                                    <td>

                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $k['id_ruangan'] ?>"><i class="far fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delruangan&id=<?= $k['id_ruangan'] ?>"><i class="fas fa-trash"></i> Del</a>

                                        <!-- Modal -->
                                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?= $k['id_prodi'] ?>" class="modal fade" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 id="exampleModalLabel" class="modal-title">Edit Ruangan</h4>
                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="form-group">
                                                                        <label>Nama Prodi</label>
                                                                        <input name="id" type="hidden" value="<?= $k['id_ruangan'] ?>">
                                                                        <input name="ruangan" type="text" value="<?= $k['ruangan'] ?>" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <button name="edit" class="btn btn-primary" type="submit">Edit</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <?php
                                                        if (isset($_POST['edit'])) {
                                                            $save = mysqli_query($con, "UPDATE tb_ruangan SET ruangan='$_POST[ruangan]' WHERE id_ruangan='$_POST[id]' ");
                                                            if ($save) {
                                                                echo "<script>
                                                alert('Data diubah !');
                                                window.location='?page=master&act=ruangan';
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



            <!-- Modal -->
            <div id="addprodi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                <div role="document" class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Tambah Ruangan</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label>Nama Ruangan</label>
                                    <input name="ruangan" type="text" placeholder="Nama ruangan .." class="form-control">
                                </div>

                                <div class="form-group">
                                    <button name="save" class="btn btn-primary" type="submit">Simpan</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['save'])) {

                                $save = mysqli_query($con, "INSERT INTO tb_ruangan VALUES(NULL,'$_POST[ruangan]') ");
                                if ($save) {
                                    echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=ruangan';
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

        </div>
    </div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>