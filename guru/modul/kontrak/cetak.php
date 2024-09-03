<?php
$time = time();
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=DAFTAR-HADIR-$time.xls");
?>
<?php
include '../../../config/db.php';
?>
<style>
    td.rotate {
        transform:
            /*nomor magic*/
            translate(1px, 1px) rotate(270deg);
        /*width: 3px;*/
        padding: 0px;
        word-spacing: none;
        white-space: nowrap;
        /*	padding:0px;
		white-space: nowrap;
		position: absolute;
		height: 40px;
		-webkit-transform: rotate(270deg);
		-moz-transform: rotate(270deg);
		-ms-transform: rotate(270deg);
		-o-transform: rotate(270deg);
		transform: rotate(270deg);*/

        /*transform: 
		translate(0px,0px)
		rotate(270deg);
		padding: 0px;
		word-spacing:none;
		white-space: nowrap;*/
    }
</style>
<?php
// tampilkan data mengajar
$kelasMengajar = mysqli_query($con, "SELECT * FROM tb_mengajar 
	INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru

	INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
	INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
	INNER JOIN tb_prodi ON tb_mengajar.id_prodi=tb_prodi.id_prodi

	INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
	INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
	WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_prodi='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 ");

foreach ($kelasMengajar as $d)




    // tampilkan data absen



    // tampilkan data walikelas
    $walikelas = mysqli_query($con, "SELECT * FROM tb_walikelas INNER JOIN tb_guru ON tb_walikelas.id_guru=tb_guru.id_guru WHERE tb_walikelas.id_prodi='$_GET[kelas]' ");
foreach ($walikelas as $walas)


    // $tglTerakhir = date('t',strtotime($tglBulan));
    $tglTerakhir = 14;


?>
<style>
    body {
        font-family: arial;
    }
</style>
<table width="100%">
    <tr>
        <td>
            <img src="../../../assets/img/download.png" width="130">
        </td>
        <td>
            <center>

                <h1>
                    ABSESNSI MAHASISWA <br>
                    <small>POLITEKNIK SAWUNGGALIH AJI KUTOARJO</small>
                </h1>
                <hr>
                <em>
                    Jl. Wismo Aji No.8, Kutoarjo, Kec. Kutoarjo, Kabupaten Purworejo, Jawa Tengah 54251
                </em>

            </center>
        </td>
        <td>

            <table width="100%">
                <tr>
                    <td colspan="2"><b style="border: 2px solid;padding: 7px;">
                            KELAS ( <?= strtoupper($d['nama_kelas']) ?> )
                        </b> </td>
                    <td>
                        <b style="border: 2px solid;padding: 7px;">
                            <?= $d['semester'] ?> |
                            <?= $d['tahun_ajaran'] ?>
                        </b>
                    </td>

                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Nama Dosen </td>
                    <td>:</td>
                    <td><?= $d['nama_guru'] ?></td>
                </tr>
                <tr>
                    <td>Bidang Studi </td>
                    <td>:</td>
                    <td><?= $d['mapel'] ?></td>
                </tr>
                <tr>
                    <td>Kaprodi </td>
                    <td>:</td>
                    <td><?= $walas['nama_guru'] ?></td>
                </tr>
                <tr>
                    <td>Prodi </td>
                    <td>:</td>
                    <td><?= $d['prodi'] ?></td>
                </tr>
                <tr>
                    <td>Wadir </td>
                    <td>:</td>
                    <td><?= $d['wakadir'] ?></td>
                </tr>
                
            </table>
        </td>
    </tr>
</table>

<hr style="height: 3px;border: 1px solid;">


<table width="100%" border="1" cellpadding="2" style="border-collapse: collapse;">
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
<table width="100%">
    <tr>
        <td>
            Presentase Perkuliahan
            </b> </td>


    </tr>
    <tr>

    </tr>
    <tr>
        <td>1. Presensi/Kehadiran : 15% </td>

    </tr>
    <tr>
        <td>2. Tugas : 20% </td>

    </tr>
    <tr>
        <td>3. Sikap Dan Keaktifan : 15% </td>
        >
    </tr>
    <tr>
        <td>4. UTS : 25% </td>

    </tr>
    <tr>
        <td>5. UAS : 25% </td>

    </tr>
</table>

<p></p>
<table width="100%">
    <tr>

    <td align="left">
 			<br>
 			<p>
 				Kaprodi
 				<br>
 				<br>
 				<br>
 				<br>
 				<br>
 				<?= $walas['nama_guru'] ?> <br>
 				----------------------<br>
 				<?= $walas['nip'] ?>
 			</p>
 		</td>

 		<td align="right">
 			<p>
 				Purworejo, <?php echo date('d-F-Y'); ?>
 			</p>
 			<p>
 				Dosen
 				<br>
 				<br>
 				<br>
 				<br>
 				<br>
 				<?= $d['nama_guru'] ?> <br>
 				----------------------<br>
 				<?= $d['nip'] ?>
 			</p>
 		</td>
         <td align="center">
 			<br>
 			<p>
 				Wadir
 				<br>
 				<br>
 				<br>
 				<br>
 				<br>
 				<?= $d['nama_guru'] ?> <br>
 				----------------------<br>
 				<?= $d['nip'] ?>
 			</p>
 		</td>
    </tr>
</table>

<script>
    window.print();
</script>