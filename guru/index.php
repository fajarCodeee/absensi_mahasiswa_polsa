<?php
@session_start();
include '../config/db.php';

if (!isset($_SESSION['guru'])) {
?> <script>
		alert('Maaf ! Anda Belum Login !!');
		window.location = '../user.php';
	</script>
<?php
}
?>


<?php
$id_login = @$_SESSION['guru'];
$sql = mysqli_query($con, "SELECT * FROM tb_guru
 WHERE id_guru = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);

// tampilkan data mengajar
$mengajar = mysqli_query($con, "SELECT * FROM tb_mengajar 

INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
 INNER JOIN tb_sks ON tb_master_mapel.id_sks=tb_sks.id_sks
 INNER JOIN tb_ruangan ON tb_mengajar.id_ruangan=tb_ruangan.id_ruangan    
INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_prodi ON tb_mengajar.id_prodi=tb_prodi.id_prodi
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_thajaran.status=1 ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dosen | Aplikasi Presensi</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/download.png" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="index.php" class="logo">
					<!-- <img src="../assets/img/mts.png" alt="navbar brand" class="navbar-brand" width="40"> -->
					<b class="text-white">Presensi Siswa</b>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">
					<!-- 	<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div> -->
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<!-- <li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li> -->



						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/user/<?= $data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../assets/img/user/<?= $data['foto'] ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $data['nama_guru'] ?></h4>
												<p class="text-muted"><?= $data['email'] ?></p>
												<a href="?page=jadwal" class="btn btn-xs btn-secondary btn-sm">Jadwal Mengajar</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="?page=akun">Akun Saya</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="logout.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/user/<?= $data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= $data['nama_guru'] ?>
									<span class="user-level"><?= $data['nip'] ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="?page=akun">
											<span class="link-collapse">Akun Saya</span>
										</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="index.php" class="collapsed">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Main Utama</h4>
						</li>
						<li class="nav-item">
							<a href="?page=jadwal">
								<i class="fas fa-clipboard-check"></i>
								<p>Jadwal Mengajar</p>
							</a>

						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#resume">
								<i class="fas fa-clipboard-list"></i>
								<p>Resume Materi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="resume">
								<ul class="nav nav-collapse">
									<li class="nav-section">
										<span class="sidebar-mini-icon">
											<i class="fa fa-ellipsis-h"></i>
										</span>
										<h4 class="text-section">DATA RESUME</h4>
									</li>
									<?php


									foreach ($mengajar as $dm) { ?>
										<li>
											<a href="?page=resume&act=data&pelajaran=<?= $dm['id_mengajar'] ?> ">
												<span class="sub-item"><!-- <?= strtoupper($dm['mapel']); ?> -->KELAS (<?= strtoupper($dm['nama_kelas']); ?>)-(<?= strtoupper($dm['semester']); ?>)-<?= strtoupper($dm['mapel']); ?></span>
											</a>
										</li>
									<?php } ?>
									<li class="nav-section">
										<span class="sidebar-mini-icon">
											<i class="fa fa-ellipsis-h"></i>
										</span>
										<h4 class="text-section">MASUKAN RESUME</h4>
									</li>
									<?php


									foreach ($mengajar as $dm) { ?>
										<li>
											<a href="?page=resume&pelajaran=<?= $dm['id_mengajar'] ?> ">
												<span class="sub-item"><!-- <?= strtoupper($dm['mapel']); ?> -->KELAS (<?= strtoupper($dm['nama_kelas']); ?>)-(<?= strtoupper($dm['semester']); ?>)-<?= strtoupper($dm['mapel']); ?></span>
											</a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#kontrak">
								<i class="fas fa-clipboard-list"></i>
								<p>Kontrak Perkuliahan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="kontrak">
								<ul class="nav nav-collapse">
									<li class="nav-section">
										<span class="sidebar-mini-icon">
											<i class="fa fa-ellipsis-h"></i>
										</span>
										<h4 class="text-section">DATA KONTRAK</h4>
									</li>
									<?php


									foreach ($mengajar as $dm) { ?>
										<li>
											<a href="?page=kontrak&act=data&pelajaran=<?= $dm['id_mengajar'] ?> ">
												<span class="sub-item"><!-- <?= strtoupper($dm['mapel']); ?> -->KELAS (<?= strtoupper($dm['nama_kelas']); ?>)-(<?= strtoupper($dm['semester']); ?>)-<?= strtoupper($dm['mapel']); ?></span>
											</a>
										</li>
									<?php } ?>
									<li class="nav-section">
										<span class="sidebar-mini-icon">
											<i class="fa fa-ellipsis-h"></i>
										</span>
										<h4 class="text-section">MASUKAN RESUME</h4>
									</li>
									<?php


									foreach ($mengajar as $dm) { ?>
										<li>
											<a href="?page=kontrak&pelajaran=<?= $dm['id_mengajar'] ?> ">
												<span class="sub-item"><!-- <?= strtoupper($dm['mapel']); ?> -->KELAS (<?= strtoupper($dm['nama_kelas']); ?>)-(<?= strtoupper($dm['semester']); ?>)-<?= strtoupper($dm['mapel']); ?></span>
											</a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-clipboard-list"></i>
								<p>Presensi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<?php


									foreach ($mengajar as $dm) { ?>
										<li>
											<a href="?page=absen&pelajaran=<?= $dm['id_mengajar'] ?> ">
												<span class="sub-item"><!-- <?= strtoupper($dm['mapel']); ?> -->KELAS (<?= strtoupper($dm['nama_kelas']); ?>)-(<?= strtoupper($dm['semester']); ?>)-<?= strtoupper($dm['mapel']); ?></span>
											</a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#rekapAbsen">
								<i class="fas fa-list-alt"></i>
								<p>Rekap Absen</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="rekapAbsen">
								<ul class="nav nav-collapse">
									<?php


									foreach ($mengajar as $dm) { ?>
										<li>
											<a href="?page=rekap&pelajaran=<?= $dm['id_mengajar'] ?> ">
												<span class="sub-item"><!-- <?= strtoupper($dm['mapel']); ?> -->KELAS (<?= strtoupper($dm['nama_kelas']); ?>)-<?= strtoupper($dm['semester']); ?>-<?= strtoupper($dm['mapel']); ?></span>
											</a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</li>
						<!-- menu data siswa -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#siswa">
								<i class="fas fa-list-alt"></i>
								<p>Data Mahasiswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="siswa">
								<ul class="nav nav-collapse">
									<?php
									$saya = $_SESSION['guru'];
									$cek = mysqli_query($con, "SELECT * FROM tb_walikelas, tb_prodi where id_guru='$saya' and tb_walikelas.id_prodi=tb_prodi.id_prodi");
									if (mysqli_num_rows($cek) > 0) {
										while ($c = mysqli_fetch_array($cek)) {
									?>

											<li>
												<a href="?page=siswa&siswa=<?= $c['id_prodi'] ?> ">
													<span class="sub-item"> (<?= strtoupper($c['prodi']); ?>)-</span>
												</a>
											</li>
									<?php
										}
									} else {
									}

									?>
								</ul>
							</div>
						</li>
						<!-- menu absen siswa kaprodi -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#walikelas">
								<i class="fas fa-list-alt"></i>
								<p>Kaprodi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="walikelas">
								<ul class="nav nav-collapse">
									<?php
									$saya = $_SESSION['guru'];
									$cek = mysqli_query($con, "SELECT * FROM tb_walikelas, tb_prodi where id_guru='$saya' and tb_walikelas.id_prodi=tb_prodi.id_prodi");
									if (mysqli_num_rows($cek) > 0) {
										while ($c = mysqli_fetch_array($cek)) {
									?>

											<li>
												<a href="?page=walikelas&prodi=<?= $c['id_prodi'] ?> ">
													<span class="sub-item"> (<?= strtoupper($c['prodi']); ?>)-</span>
												</a>
											</li>
									<?php
										}
									} else {
									}

									?>
								</ul>
							</div>
						</li>

						<li class="nav-item active mt-3">
							<a href="logout.php" class="collapsed">
								<i class="fas fa-arrow-alt-circle-left"></i>
								<p>Logout</p>
							</a>
						</li>

						<!-- 
						<li class="mx-4 mt-2">
							<a href="logout.php" class="btn btn-primary btn-block"><span class="btn-label"> <i class="fas fa-arrow-alt-circle-left"></i> </span> Logout</a> 
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">

				<!-- Halaman dinamis -->
				<?php
				error_reporting();
				$page = @$_GET['page'];
				$act = @$_GET['act'];

				if ($page == 'absen') {
					if ($act == '') {
						include 'modul/absen/absen_kelas.php';
					} elseif ($act == 'surat_view') {
						include 'modul/absen/view_surat_izin.php';
					} elseif ($act == 'konfirmasi') {
						include 'modul/absen/konfirmasi_izin.php';
					} elseif ($act == 'update') {
						include 'modul/absen/absen_kelas_update.php';
					}
				} elseif ($page == 'resume') {
					if ($act == '') {
						include 'modul/resume/data.php';
					} elseif ($act == 'data') {
						include 'modul/resume/lihat.php';
					} elseif ($act == 'edit') {
						include 'modul/absen/absen_kelas_update.php';
					} elseif ($act == 'cetak') {
						include 'modul/resume/cetak.php';
					}
				} elseif ($page == 'kontrak') {
					if ($act == '') {
						include 'modul/kontrak/data.php';
					} elseif ($act == 'data') {
						include 'modul/kontrak/lihat.php';
					} elseif ($act == 'edit') {
						include 'modul/absen/absen_kelas_update.php';
					} elseif ($act == 'cetak') {
						include 'modul/resume/cetak.php';
					}
				} elseif ($page == 'rekap') {
					if ($act == '') {
						include 'modul/rekap/rekap_absen.php';
					}
				} elseif ($page == 'jadwal') {
					if ($act == '') {
						include 'modul/jadwal/jadwal_megajar.php';
					}
				} elseif ($page == 'akun') {
					include 'modul/akun/akun.php';
				} elseif ($page == 'walikelas') {
					// include 'modul/walikelas/index2.php';
					if ($act == '') {
						include 'modul/walikelas/index2.php';
					} elseif ($act = 'rekap-perbulan') {
						include 'modul/walikelas/rekap_perbulan.php';
					}
				} elseif ($page == 'siswa') {
					// include 'modul/walikelas/index2.php';
					if ($act == '') {
						include 'modul/siswa/kelas_siswa.php';
					} elseif ($act = 'data') {
						include 'modul/siswa/data_siswa.php';
					}
				} elseif ($page == '') {
					include 'modul/home.php';
				} else {
					echo "<b>Tidak ada Halaman</b>";
				}


				?>


				<!-- end -->



			</div>

		</div>


	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>



	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>

	<script>
		document.addEventListener('DOMContentLoaded', (event) => {
			const dateInput = document.getElementById('start');
			const indonesiaTimeDiv = document.getElementById('indonesiaTime');

			// Menentukan batasan tanggal
			const today = new Date();
			const minDate = new Date();
			const maxDate = new Date();

			// Set maksimal tanggal ke besok harinya
			minDate.setDate(today.getDate() - 1);
			maxDate.setDate(today.getDate());

			// Format tanggal menjadi string yang sesuai dengan input type date
			const formatDateString = (date) => {
				const year = date.getFullYear();
				const month = String(date.getMonth() + 1).padStart(2, '0');
				const day = String(date.getDate()).padStart(2, '0');
				return `${year}-${month}-${day}`;
			};

			// Set atribut min dan max pada input

			dateInput.min = formatDateString(minDate);
			dateInput.max = formatDateString(maxDate);

			// Set nilai default input ke hari ini
			dateInput.value = formatDateString(today);

			// Update nilai default setiap kali halaman dimuat ulang
			dateInput.addEventListener('focus', () => {
				const now = new Date();
				dateInput.value = formatDateString(now);
				updateIndonesiaTime(now);
			});

			// Fungsi untuk mengupdate waktu Indonesia
			const updateIndonesiaTime = (date) => {
				const indonesiaTimeOffset = 7 * 60; // Offset untuk WIB (UTC+7)
				const localTimeOffset = date.getTimezoneOffset();
				const indonesiaTime = new Date(date.getTime() + (indonesiaTimeOffset + localTimeOffset) * 60000);

				const hours = String(indonesiaTime.getHours()).padStart(2, '0');
				const minutes = String(indonesiaTime.getMinutes()).padStart(2, '0');
				const seconds = String(indonesiaTime.getSeconds()).padStart(2, '0');

				indonesiaTimeDiv.innerHTML = `Waktu Indonesia: ${hours}:${minutes}:${seconds}`;
			};

			// Mengupdate waktu Indonesia saat nilai input berubah
			dateInput.addEventListener('change', (event) => {
				const selectedDate = new Date(event.target.value);
				updateIndonesiaTime(selectedDate);
			});

			// Mengupdate waktu Indonesia pada awal pemuatan halaman
			updateIndonesiaTime(today);
		});
	</script>
	<script>
		document.getElementById('selecth').addEventListener('change', function() {
			const checkboxes = document.querySelectorAll('.itemh');
			checkboxes.forEach(checkbox => {
				checkbox.checked = this.checked;
			});
		});

		const options = document.querySelectorAll('.itemh');
		options.forEach(option => {
			option.addEventListener('change', function() {
				if (!this.checked) {
					document.getElementById('selectAll').checked = false;
				} else {
					const allChecked = Array.from(options).every(opt => opt.checked);
					document.getElementById('selectAll').checked = allChecked;
				}
			});
		});
	</script>
</body>

</html>