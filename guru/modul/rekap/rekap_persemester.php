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
WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_prodi='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1  ");

foreach ($kelasMengajar as $d)




	// tampilkan data absen

	$qry = mysqli_query($con, "SELECT tb_siswa.*, COUNT(*) AS jumlah_absensi
FROM _logabsensi 
INNER JOIN tb_siswa ON _logabsensi.id_siswa = tb_siswa.id_siswa
INNER JOIN tb_mengajar ON _logabsensi.id_mengajar = tb_mengajar.id_mengajar
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas = tb_mkelas.id_mkelas
INNER JOIN tb_semester ON tb_mengajar.id_semester = tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran = tb_thajaran.id_thajaran
WHERE tb_mengajar.id_mengajar = '$_GET[pelajaran]'
  AND tb_mengajar.id_prodi = '$_GET[kelas]'
  AND tb_thajaran.status = 1
  AND tb_semester.status = 1
GROUP BY tb_siswa.id_siswa
ORDER BY tb_siswa.id_siswa ASC;
");


// tampilkan data walikelas
$walikelas = mysqli_query($con, "SELECT * FROM tb_walikelas INNER JOIN tb_guru ON tb_walikelas.id_guru=tb_guru.id_guru WHERE tb_walikelas.id_prodi='$_GET[kelas]' ");
foreach ($walikelas as $walas)

	$walikelas = mysqli_query($con, "SELECT * FROM tb_kepsek ");
foreach ($walikelas as $kepsek)
	$wakadir = mysqli_query($con, "SELECT * FROM wakadir INNER JOIN tb_guru ON wakadir.id_guru=tb_guru.id_guru WHERE wakadir.id_bagian='1' AND wakadir.status='1' ");
foreach ($wakadir as $wadir)

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
					<small> Politeknik Sawunggalih Aji Kutoarjo</small>
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
					<td rowspan="5">
						<ul>
							<li>H= Hadir</li>
							<li>S = Sakit</li>
							<li>I = Izin</li>

							<li>A = Absen</li>

						</ul>
						<!-- <p>H= Hadir</p>
	<p>I = Izin</p>
	<p>S = Sakit</p>
	<p>A = Absesn    </p> -->
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
			</table>
		</td>
	</tr>
</table>

<hr style="height: 3px;border: 1px solid;">


<table width="100%" border="1" cellpadding="2" style="border-collapse: collapse;">
	<tr>
		<td rowspan="2" bgcolor="#EFEBE9" align="center">NO</td>
		<td rowspan="2" bgcolor="#EFEBE9">NAMA SISWA</td>
		<td rowspan="2" bgcolor="#EFEBE9" align="center">L/P</td>
		<td colspan="<?= $tglTerakhir; ?>" style="padding: 8px;"><b>Pertemuan Ke</b></td>
		<td colspan="5" align="center" bgcolor="#EFEBE9">JUMLAH</td>
	</tr>
	<tr>
		<?php
		for ($i = 1; $i <= $tglTerakhir; $i++) {
			echo "<td bgcolor='#EFEBE9' align='center'>" . $i . "</td>";
		}


		?>
		<td bgcolor="#FFC107" align="center">H</td>
		<td bgcolor="#D50000" align="center">S</td>
		<td bgcolor="#4CAF50" align="center">I</td>
		<td bgcolor="#76FF03" align="center">A</td>


	</tr>
	<?php
	// tampilkan absen siswa
	$no = 1;
	foreach ($qry as $ds) {
		$warna = ($no % 2 == 1) ? "#ffffff" : "#f0f0f0";

	?>
		<tr>

		<tr bgcolor="<?= $warna; ?>">
			<td align="center"><?= $no++; ?></td>
			<td><?= $ds['nama_siswa']; ?></td>
			<td align="center"><?= $ds['jk'] ?></td>
			<?php
			// Query data sekali di luar loop
			$keterangan = [];
			$ketResult = mysqli_query($con, "SELECT _logabsensi.pertemuan_ke, _logabsensi.ket, COUNT(*) AS jumlah_absensi
        FROM _logabsensi
        INNER JOIN tb_mengajar ON _logabsensi.id_mengajar = tb_mengajar.id_mengajar
        INNER JOIN tb_semester ON tb_mengajar.id_semester = tb_semester.id_semester
        INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran = tb_thajaran.id_thajaran
        WHERE _logabsensi.id_siswa = '$ds[id_siswa]'
        AND _logabsensi.id_mengajar = '$_GET[pelajaran]'
        AND tb_mengajar.id_prodi = '$_GET[kelas]'
        AND tb_thajaran.status = 1
        AND tb_semester.status = 1
        GROUP BY _logabsensi.pertemuan_ke, _logabsensi.ket
        ORDER BY _logabsensi.pertemuan_ke");

			while ($row = mysqli_fetch_assoc($ketResult)) {
				$keterangan[$row['pertemuan_ke']] = $row['ket'];
			}

			// Loop `for` untuk menampilkan data
			for ($i = 1; $i <= $tglTerakhir; $i++) {
			?>
				<td align="center" bgcolor="<?= $warna; ?>">
					<?php
					if (isset($keterangan[$i])) {
						// Ambil data `ket` sesuai dengan pertemuan ke-n
						$ket = $keterangan[$i];
						if ($ket == 'H') {
							echo "<b style='color:#2196F3;'>H</b>";
						} elseif ($ket == 'I') {
							echo "<b style='color:#4CAF50;'>I</b>";
						} elseif ($ket == 'S') {
							echo "<b style='color:#FFC107;'>S</b>";
						} elseif ($ket == 'A') {
							echo "<b style='color:#D50000;'>A</b>";
						} elseif ($ket == 'T') {
							echo "<b style='color:#76FF03;'>T</b>";
						} else {
							echo "<b style='color:#9C27B0;'>C</b>";
						}
					} else {
						// Jika tidak ada data untuk pertemuan ke-n, tampilkan "-"
						echo "-";
					}
					?>
				</td>
			<?php
			}
			?>



			<td align="center" style="font-weight: bold;">
				<?php
				$sakit = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS hadir
FROM _logabsensi
WHERE id_siswa = '$ds[id_siswa]'
AND ket = 'H'
 AND id_mengajar = '$_GET[pelajaran]'"));
				echo $sakit['hadir'];

				?>
			</td>
			<td align="center" style="font-weight: bold;">
				<?php
				$sakit = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS sakit
FROM _logabsensi
WHERE id_siswa = '$ds[id_siswa]'
AND ket = 'S'
AND id_mengajar = '$_GET[pelajaran]'"));
				echo $sakit['sakit'];

				?>
			</td>
			<td align="center" style="font-weight: bold;">
				<?php
				$sakit = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS sakit
FROM _logabsensi
WHERE id_siswa = '$ds[id_siswa]'
AND ket = 'I'
AND id_mengajar = '$_GET[pelajaran]'"));
				echo $sakit['sakit'];

				?>
			</td>

			<td align="center" style="font-weight: bold;">
				<?php
				$sakit = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS sakit
FROM _logabsensi
WHERE id_siswa = '$ds[id_siswa]'
AND ket = 'A'
AND id_mengajar = '$_GET[pelajaran]'"));
				echo $sakit['sakit'];

				?>
			</td>


		</tr>

	<?php } ?>
	<tr>
		<!-- style="height: 150px;" -->
		<td colspan="3" align="right">Tanggal Pertemuan</td>
		<?php
		for ($i = 1; $i <= $tglTerakhir; $i++) { ?>
			<td align="center">
				<em style="font: 11px;">
					<?php
					$ket = mysqli_query($con, "SELECT COUNT(*) FROM _logabsensi
	INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
	INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
	INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
	WHERE _logabsensi.pertemuan_ke='$i' AND _logabsensi.id_siswa='$ds[id_siswa]' AND _logabsensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 GROUP BY pertemuan_ke ");
					foreach ($ket as $h)

						if (mysqli_num_rows($ket) > 0) {
							$tgl = date('d m Y', strtotime($h['tgl_absen']));
							// echo "".namahari($tgl).",";
							echo $tgl;
						} else {
						}


					?>
				</em>

			</td>

		<?php } ?>
	</tr>

</table>

<p></p>
<table width="100%">
	<tr>
		<!-- 	<td align="left">
			<p>
				Mengetahui
			</p>
			<p>
				Kepala Sekolah
				<br>
				<br>
				<br>
				<br>
				<br>
				-----------------------------
			</p>
		</td> -->
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
		<td align="center">
			<br>
			<p>
				Wadir
				<br>
				<br>
				<br>
				<br>
				<br>
				<?= $wadir['nama_guru'] ?> <br>
				----------------------<br>
				<?= $wadir['nip'] ?>
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
	</tr>

</table>

<script>
	window.print();
</script>