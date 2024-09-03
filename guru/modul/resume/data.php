<?php
// tampilkan data mengajar
$kelasMengajar = mysqli_query($con, "SELECT * FROM tb_mengajar 

INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_mengajar.id_mengajar='$_GET[pelajaran]'  AND tb_thajaran.status=1  ");

foreach ($kelasMengajar as $d)



?>


<!-- 
<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						
					</div>
				</div> -->
<div class="page-inner">

    <div class="page-header">
        <!-- <h4 class="page-title">KELAS (<?= strtoupper($d['nama_kelas']) ?> )</h4> -->
        <ul class="breadcrumbs" style="font-weight: bold;">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">KELAS (<?= strtoupper($d['nama_kelas']) ?> <?= strtoupper($d['semester']) ?> )</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"><?= strtoupper($d['mapel']) ?></a>
            </li>

        </ul>

    </div>


    <div class="row">


        <?php
        // dapatkan pertemuan terakhir di tb izin
        $last_pertemuan = mysqli_query($con, "SELECT COUNT(*) FROM tb_resume WHERE id_mengajar='$_GET[pelajaran]' GROUP BY pertemuan_ke ORDER BY pertemuan_ke DESC LIMIT 1");
        $cekPertemuan = mysqli_num_rows($last_pertemuan);
        $jml = mysqli_fetch_array($last_pertemuan);

        if ($cekPertemuan > 0) {
            $pertemuan = $jml['pertemuan_ke'] + 1;
        } else {
            $pertemuan = 1;
        }


        ?>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Form Entry Direktur</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Pertemuan Ke</label>
                            <input type="text" name="pertemuan" class="form-control" value="<?= $pertemuan; ?>" placeholder="<?= $pertemuan; ?>" readonly>
                        </div>
                        <input type="hidden" name="pelajaran" value="<?= $_GET['pelajaran'] ?>">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tgl" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Materi </label>
                            <input name="materi" type="text" class="form-control" placeholder="Materi">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Siswa Hadir </label>
                            <input name="hadir" type="text" class="form-control" placeholder="Siswa Hadir...">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Siswa Tidak Hadir </label>
                            <input name="tdk_hadir" type="text" class="form-control" placeholder="Siswa Tidak Hadir..">
                        </div>



                        <div class="form-group">
                            <button name="save" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            <a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
                        </div>


                    </form>



                    <?php
                    if (isset($_POST['save'])) {

                        $today = $_POST['tgl'];
                        $pertemuan = $_POST['pertemuan'];
                        $materi = $_POST['materi'];
                        $pelajaran = $_POST['pelajaran'];
                        $hadir = $_POST['hadir'];
                        $tdk_hadir = $_POST['tdk_hadir'];
                        $insert = mysqli_query($con, "INSERT INTO tb_resume VALUES (NULL,'$pelajaran','$today','$materi','$pertemuan','$hadir','$tdk_hadir') ");

                        if ($insert) {
                            echo "
            <script type='text/javascript'>
            setTimeout(function () { 

            swal('Sukses', 'Resume ditambahkan', {
            icon : 'success',
            buttons: {        			
            confirm: {
            className : 'btn btn-success'
            }
            },
            });    
            },10);  
            window.setTimeout(function(){ 
            window.location.replace('?page=resume&pelajaran=$_GET[pelajaran]');
            } ,3000);   
            </script>";
                        }
                    }


                    ?>

                </div>
            </div>




        </div>

    </div>