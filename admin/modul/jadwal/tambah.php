<?php
$taAktif = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_thajaran WHERE status=1 "));
$semAktif = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_semester WHERE status=1 "));

?>
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
				<a href="#">Tambah Jadwal</a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Form Elements</div>
				</div>
				<div class="card-body">
					<form action="" method="post">

						<div class="row">
							<!-- <div class="col-md-4">
								<div class="form-group">
									<label for="kode">Kode Pelajaran</label>
									<input name="kode" type="text" class="form-control" id="kode" placeholder="Masukan Kode...">
								</div>
							</div> -->
							<div class="col-md-4">
								<div class="form-group">
									<label>Tahun Pelajaran</label>
									<input type="hidden" name="ta" value="<?= $taAktif['id_thajaran'] ?>">
									<!-- <input type="hidden" name="semester" value="<?= $semAktif['id_semester'] ?>"> -->
									<input type="text" class="form-control" placeholder="<?= $taAktif['tahun_ajaran'] ?>" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<label>Prodi</label>
								<select name="prodi" id="prodi" class="form-control" onchange="updateMataKuliahOptions1()">
									<option value="">- Pilih -</option>
									<?php
									$prodi = mysqli_query($con, "SELECT * FROM tb_prodi");
									foreach ($prodi as $g) {
										echo "<option value='$g[id_prodi]'>$g[prodi]</option>";
									}
									?>

								</select>


							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Semester</label>
									<select name="semester" id="semester" class="form-control" onchange="updateMataKuliah()">
										<option value="">-pilih-</option>
										<?php
										$guru = mysqli_query($con, "SELECT * FROM tb_semester WHERE status=1");
										foreach ($guru as $g) {
											echo "<option value='$g[id_semester]'>$g[semester]</option>";
										}
										?>

									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Dosen Mata Kuliah</label>
									<select name="guru" id="guru" class="form-control">
										<option value="">- Pilih -</option>
										<?php
										$guru = mysqli_query($con, "SELECT * FROM tb_guru ORDER BY id_guru ASC");
										foreach ($guru as $g) {
											echo "<option value='$g[id_guru]'>$g[nama_guru]</option>";
										}
										?>

									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="mapel">Mata Kuliah</label>
									<select name="mapel" id="mapel" class="form-control" onchange="updateSkshOptions()">
										<option value="">- Pilih -</option>

									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="sks">SKS</label>
									<input type="text" class="form-control" id="sks" name="sks" readonly>
								</div>
							</div>

						</div>


						<div class="row">
							<div class="col-md-6">
								<div class="form-check">
									<label>Hari</label><br />
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" id="hari" value="Senin">
										<span class="form-radio-sign">Senin</span>
									</label>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" id="hari" value="Selasa">
										<span class="form-radio-sign">Selasa</span>
									</label>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" id="hari" value="Rabu">
										<span class="form-radio-sign">Rabu</span>
									</label>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" id="hari" value="Kamis">
										<span class="form-radio-sign">Kamis</span>
									</label>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" id="hari" value="Jum'at">
										<span class="form-radio-sign">Jum'at</span>
									</label>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" id="hari" value="Sabtu">
										<span class="form-radio-sign">Sabtu</span>
									</label>

								</div>
							</div>
							<div class="col-md-6">
								<label>Kelas</label>
								<select name="kelas" id="kelas" class="form-control">
									<option value="">- Pilih -</option>
								</select>


							</div>

						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Jam Mulai</label>
								<select name="jam_mulai" id="jam_mulai" class="form-control">
									<option value="">- Pilih -</option>
									<?php
									$kelas = mysqli_query($con, "SELECT * FROM tb_jam ORDER BY id_jam ASC");
									$jamData = [];
									foreach ($kelas as $g) {
										$jamData[] = $g['jam'];
										echo "<option value='$g[jam]'>$g[jam]</option>";
									}
									?>

								</select>


							</div>
							<div class="col-md-6">
								<label>Jam Selesai</label>
								<select name="jam_selesai" id="jam_selesai" class="form-control">
									<option value="">- Pilih -</option>
									<?php
									$kelas = mysqli_query($con, "SELECT * FROM tb_jam ORDER BY id_jam ASC");
									foreach ($kelas as $g) {
										echo "<option value='$g[jam]'>$g[jam]</option>";
									}
									?>

								</select>


							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Ruangan</label>
									<select name="ruangan" class="form-control">
										<option value="">- Pilih -</option>
										<?php
										$guru = mysqli_query($con, "SELECT * FROM tb_ruangan ORDER BY id_ruangan ASC");
										foreach ($guru as $g) {
											echo "<option value='$g[id_ruangan]'>$g[ruangan]</option>";
										}
										?>

									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<button type="submit" name="save" class="btn btn-secondary">
										<i class="far fa-save"></i> Simpan
									</button>
									<a href="javascript:history.back()" class="btn btn-danger">
										<i class="fas fa-angle-double-left"></i> Kembali
									</a>
								</div>
							</div>
						</div>
					</form>
					<?php

					if (isset($_POST['save'])) {


						// $kode = $_POST['kode'];
						$ta = $_POST['ta'];
						$semester = $_POST['semester'];
						$guru = $_POST['guru'];
						$mapel = $_POST['mapel'];
						$hari = $_POST['hari'];
						$kelas = $_POST['kelas'];
						$prodi = $_POST['prodi'];
						$jam_mulai = $_POST['jam_mulai'];
						$jam_selesai = $_POST['jam_selesai'];
						$ruangan = $_POST['ruangan'];
						// $query_guru = mysqli_query($con, "SELECT * FROM tb_mengajar WHERE kode_pelajaran = '$kode'");


						// if ($query_guru->num_rows > 0) {
						// 	echo "<script>
						// alert('Data tidak tersimpan ! karena Kode sudah di pake');
						//  window.location='?page=jadwal&act=add';
						// </script>";
						// 	exit;
						// }
						$query_guru = mysqli_query($con, "SELECT * FROM tb_mengajar WHERE id_guru = '$guru' AND hari = '$hari' AND (('$jam_mulai' BETWEEN jam_mulai AND jam_selesai) OR ('$jam_selesai' BETWEEN jam_mulai AND jam_selesai) OR (jam_mulai BETWEEN '$jam_mulai' AND '$jam_selesai') OR (jam_selesai BETWEEN '$jam_mulai' AND '$jam_selesai'))");

						// $result_guru = $con->query($query_guru);
						if ($query_guru->num_rows > 0) {
							echo "<script>
                        alert('Data tidak tersimpan ! karena waktu nya bersamaan');
                         window.location='?page=jadwal&act=add';
						</script>";
							exit;
						}
						$query_guru = mysqli_query($con, "SELECT * FROM tb_mengajar WHERE id_ruangan = '$ruangan' AND hari = '$hari' AND (('$jam_mulai' BETWEEN jam_mulai AND jam_selesai) OR ('$jam_selesai' BETWEEN jam_mulai AND jam_selesai) OR (jam_mulai BETWEEN '$jam_mulai' AND '$jam_selesai') OR (jam_selesai BETWEEN '$jam_mulai' AND '$jam_selesai'))");

						// $result_guru = $con->query($query_guru);
						if ($query_guru->num_rows > 0) {
							echo "<script>
                        alert('Data tidak tersimpan ! karena ruangan sudah dipake');
                         window.location='?page=jadwal&act=add';
						</script>";
							exit;
						}
						// }else {
						$insert = mysqli_query($con, "INSERT INTO tb_mengajar VALUES (NULL,'$hari','$jam_mulai','$jam_selesai','$guru','$mapel','$kelas','$semester','$ta','$prodi','$ruangan'  ) ");

						if ($insert) {
							echo
							"<script>
                        alert('Data tersimpan !');
                        window.location='?page=jadwal';
                        </script>";
						}
					}


					?>


				</div>
				<script>
					// Ambil data jam dari PHP ke JavaScript
					const jamData = <?php echo json_encode($jamData); ?>;

					document.getElementById('jam_mulai').addEventListener('change', function() {
						const jamMulai = this.value;
						const jamSelesaiSelect = document.getElementById('jam_selesai');

						// Hapus semua opsi yang ada di jam selesai
						jamSelesaiSelect.innerHTML = '<option value="">- Pilih -</option>';

						// Tambahkan kembali opsi yang valid untuk jam selesai
						jamData.forEach(function(jam) {
							if (jam > jamMulai) {
								let option = document.createElement('option');
								option.value = jam;
								option.textContent = jam;
								jamSelesaiSelect.appendChild(option);
							}
						});
					});
				</script>
			</div>
		</div>
	</div>
</div>
</div>