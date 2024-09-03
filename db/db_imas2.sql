-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2024 pada 16.21
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_imas2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `kode_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `kode_bagian`, `nama_bagian`) VALUES
(1, 1, 'Kemahasiswaan'),
(2, 2, 'akademik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` varchar(5) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `aktif`, `foto`) VALUES
(1, 'Akademik', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Y', 'admin.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_guru` varchar(120) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `email`, `password`, `foto`, `status`) VALUES
(5, '001', 'Damar Eko Cahyono S.Kom.,M.M', 'Damarekocahyono@gmail.com', 'e193a01ecf8d30ad0affefd332ce934e32ffce72', '023533100_1638496655-Biji-Kelor.webp', 'Y'),
(10, '7896542', 'Agus Fitri Yanto, S.E., M.M.', 'Agusfitriyanto@gmail.com', '33f503994907eccc201420e006c69c45fcaa9a6f', '98bd019861f0803afec5439aa6d73811.jpg', 'Y'),
(11, '654312786', 'Caecilia Rosma W, SE., M.Si., Ak.', 'Caeciliarosma@gmail.com', '69737ed1165fa551c8ce1cddba0e48a3ed3da7dc', 'bubuk-kelor.jpg', 'Y'),
(12, '43213144e26', 'Novita Purnaningsih, S.S., M.A.', 'novitapurnaningsih@gmail.com', '3ec2290032ed14b0438c26e479a3d9b9a8fa10ba', 'dc902a6862bf3382125b8fe9fa354912.jpg', 'Y'),
(14, '78965', 'Agus Dwi A., S.E.,M.Eng', 'Agusdwiatmoko@gmail.com', '1bfdc456771cefaf781ae36a8dd59b55a390870a', 'Gallery-4-1536x864.jpg', 'Y'),
(15, '12345', 'Supriono, S.E., M.Si, Ak', 'Supriono@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', 'Y'),
(16, '23456', 'Titik Suhartini, S.Pd., M.Si.', 'TitikSuhartini@gmail.com', 'c24d0a1968e339c3786751ab16411c2c24ce8a2e', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', 'Y'),
(17, '34567', 'Heri Oktaviandi,S.T.,M.Eng', 'Heryoktaviandi@gmail', 'd003eb01f6492f7429e2599c4d7961514cde0ce1', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', 'Y'),
(18, '32211', 'Imam Tri Suryanudin, M.Kom', 'Imam riSuryanudin@gmail.com', 'a6d35a6ddd31e3b6882d9b7fbbc415da4874261c', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jam`
--

CREATE TABLE `tb_jam` (
  `id_jam` int(11) NOT NULL,
  `jam` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jam`
--

INSERT INTO `tb_jam` (`id_jam`, `jam`) VALUES
(1, '08.00'),
(2, '08.40'),
(3, '09.20'),
(4, '10.00'),
(5, '10.40'),
(6, '11.20'),
(7, '12.00'),
(8, '12.40'),
(9, '13.00'),
(10, '13.40'),
(11, '14.20'),
(12, '15.00'),
(13, '15.40'),
(14, '16.20'),
(15, '17.00'),
(16, '17.40'),
(17, '18.20'),
(18, '19.00'),
(19, '19.40'),
(20, '20.20'),
(21, '21.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kepsek`
--

CREATE TABLE `tb_kepsek` (
  `id_kepsek` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_kepsek` varchar(120) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kepsek`
--

INSERT INTO `tb_kepsek` (`id_kepsek`, `nip`, `nama_kepsek`, `email`, `password`, `foto`, `status`) VALUES
(1, '123456789011', 'Danis Imam Bachtiar, S.E, M.M.', 'Danisimambachtiar@gmail.com', '4ce8e48be6c978348e4a6f4754b050de5581be4b', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontrak`
--

CREATE TABLE `tb_kontrak` (
  `id_kontrak` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `materi` varchar(200) NOT NULL,
  `pertemuan_ke` varchar(10) NOT NULL,
  `daftar_pustaka` varchar(300) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kontrak`
--

INSERT INTO `tb_kontrak` (`id_kontrak`, `id_mengajar`, `materi`, `pertemuan_ke`, `daftar_pustaka`, `tanggal`) VALUES
(1, 23, 'menghitung', '1', 'gbzngnngf', '2024-07-02'),
(2, 48, 'manajemen basis data', '1', 'manajemen', '2024-07-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_mapel`
--

CREATE TABLE `tb_master_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(40) NOT NULL,
  `mapel` varchar(60) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_mapel`
--

INSERT INTO `tb_master_mapel` (`id_mapel`, `kode_mapel`, `mapel`, `id_prodi`, `id_semester`, `id_sks`) VALUES
(19, 'MBD1', 'Manajemen Basis Data', 1, 8, 2),
(20, 'MTKB', 'Matematika Bisnis', 3, 7, 2),
(21, 'MBD', 'Manajemen Basis Data 1', 1, 7, 2),
(22, 'WEB', 'Program Website', 1, 8, 3),
(23, 'AP.S', 'Aplikasi Server', 1, 7, 4),
(24, 'AKM', 'Akuntansi Keuangan Menengah', 3, 6, 2),
(25, 'DG', 'Desain Grafis', 2, 6, 2),
(26, 'DG', 'Desain Grafis', 2, 7, 2),
(28, 'Ks', 'Kesekretarisan', 2, 6, 2),
(29, 'k', 'kewarganegaraan', 1, 8, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mengajar`
--

CREATE TABLE `tb_mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `hari` varchar(40) NOT NULL,
  `jam_mulai` varchar(60) NOT NULL,
  `jam_selesai` varchar(60) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_mkelas` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_thajaran` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mengajar`
--

INSERT INTO `tb_mengajar` (`id_mengajar`, `hari`, `jam_mulai`, `jam_selesai`, `id_guru`, `id_mapel`, `id_mkelas`, `id_semester`, `id_thajaran`, `id_prodi`, `id_ruangan`) VALUES
(48, 'Rabu', '08.00', '09.20', 5, 21, 8, 7, 10, 1, 5),
(49, 'Kamis', '08.00', '09.20', 5, 19, 8, 8, 10, 1, 9),
(50, 'Selasa', '08.40', '08.00', 5, 23, 8, 7, 10, 1, 3),
(56, 'Senin', '08.40', '10.00', 11, 24, 10, 6, 10, 3, 5),
(57, 'Senin', '11.20', '13.00', 16, 28, 15, 6, 10, 2, 6),
(58, 'Kamis', '11.20', '12.40', 5, 21, 8, 7, 10, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mkelas`
--

CREATE TABLE `tb_mkelas` (
  `id_mkelas` int(11) NOT NULL,
  `nama_kelas` varchar(40) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mkelas`
--

INSERT INTO `tb_mkelas` (`id_mkelas`, `nama_kelas`, `id_prodi`) VALUES
(8, 'TI A', 1),
(9, 'TI B', 1),
(10, 'AK A', 3),
(14, 'AK B', 3),
(15, 'AB A', 2),
(16, 'AB B', 2),
(18, 'TRPL', 4),
(19, 'TRPL A', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `prodi`) VALUES
(1, 'Teknik Infrmatika'),
(2, 'Administrasi Bisnis'),
(3, 'Akuntansi'),
(4, 'Teknik Rekayasa Perangkat Lunak'),
(5, 'Teknik Rekayasa Perangkat Lunak'),
(6, 'acak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resume`
--

CREATE TABLE `tb_resume` (
  `id_resume` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `materi` varchar(1000) NOT NULL,
  `pertemuan_ke` varchar(30) NOT NULL,
  `hadir` varchar(100) NOT NULL,
  `tdk_hadir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_resume`
--

INSERT INTO `tb_resume` (`id_resume`, `id_mengajar`, `tanggal`, `materi`, `pertemuan_ke`, `hadir`, `tdk_hadir`) VALUES
(7, 23, '2024-07-02', 'belajar koding', '1', '20', '5'),
(8, 24, '2024-07-02', 'abjad', '1', '20', '5'),
(9, 48, '2024-07-15', 'pengeertian manajemen basis data', '1', '30', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `ruangan`) VALUES
(2, 'A.1.1'),
(3, 'A.1.2'),
(5, 'Mawar'),
(6, 'B.2.0'),
(7, 'B.2.1'),
(8, 'C.2.1'),
(9, 'L.S.1'),
(10, 'L.S.2'),
(11, 'L.S.3'),
(12, 'A.1.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `status` int(10) NOT NULL,
  `semesters` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `status`, `semesters`) VALUES
(6, 'Semester 1', 1, 'Ganjil'),
(7, 'Semester 2', 1, 'Genap'),
(8, 'Semester 3', 1, 'Ganjil'),
(9, 'Semester  4', 1, 'Genap'),
(10, 'Semester 5', 1, 'Ganjil'),
(11, 'Semester 6', 1, 'Genap'),
(12, 'Semester 7', 1, 'Ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(60) NOT NULL,
  `nama_siswa` varchar(120) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `th_angkatan` year(4) NOT NULL,
  `id_mkelas` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `password`, `foto`, `status`, `th_angkatan`, `id_mkelas`, `id_semester`, `id_prodi`) VALUES
(12, '32211001', 'ferdy', 'ourworejo', '2024-06-01', 'L', 'popongan', '57f1b3ce59b2c2b936dfda070b06c3114cbc68af', 'Picture2.png', '1', 2019, 5, 7, 1),
(13, '32211003', 'mufti', 'banyuasin', '2024-06-08', 'L', 'banyuasin', 'bc05f66975d17ccb17540d04a24deaec0298252f', '4238f1ad-b201-4b64-bc03-94f6a0473e9c.jpeg', '1', 2019, 6, 7, 1),
(14, '32211002', 'adi', 'popongan', '2024-06-07', 'L', 'popongan', 'efa162c02f2c357f59aa74ac730f6b2e0e7ff687', '4238f1ad-b201-4b64-bc03-94f6a0473e9c.jpeg', '1', 2019, 7, 6, 1),
(15, '1243213', 'nugroho', 'baafgba', '2024-06-01', 'L', 'rgdasvevsa', '770afba21b5d7325a3e687201e9a7aedbd256b97', '1.jpg', '1', 2020, 5, 6, 1),
(16, '32211003', 'Muftikhatul Khoiriyah', 'Purworejo', '2001-10-29', 'P', 'Ngargosari, Loano, Purworejo', 'bc05f66975d17ccb17540d04a24deaec0298252f', 'bubuk-daun-kelor-jadi-incaran-pecinta-makanan-sehat-190426d.jpg', '1', 2021, 8, 12, 1),
(17, '32211001', 'ferdy', 'purworejo', '2002-06-05', 'L', 'popongan', '57f1b3ce59b2c2b936dfda070b06c3114cbc68af', '1.jpg', '1', 2021, 8, 12, 1),
(18, '4213423', 'adi', 'popongan', '2024-05-28', 'L', 'geardv', '3a0b20e86964b38e4df59d236f8e4f665ab19b90', '1.jpg', '1', 2022, 10, 9, 3),
(19, '32211026', 'Jeny Fatmawati', 'purworejo', '2003-01-02', 'L', 'pituruh', '9b6e0ea2ced7172f01816bc039be847d63510c00', 'Gallery-11-1536x864.jpg', '1', 2021, 8, 12, 1),
(20, '525252', 'anggit', 'purworejo', '2024-05-08', 'L', 'xdrtdgcgcy', '19c2220e14268ff71f2b77b555e5e30ea55fc1e1', '3d_bg_putih-01-removebg-preview.png', '1', 2021, 8, 10, 1),
(21, '23523523', 'azis', 'purworejo', '0000-00-00', 'L', 'we3fwefwe', '381bad45cc201dbfdfc5e7662c688dc642b229b6', '3d_bg_putih-01-removebg-preview.png', '1', 2020, 15, 7, 2),
(22, '2313r2', 'ika', 'purworejo', '2001-07-28', 'P', 'kemiri', '430d5edd138afe8d6e970d7f5e747649408998a7', 'WhatsApp Image 2024-06-30 at 20.48.08.jpeg', '1', 2022, 8, 10, 1),
(23, '656789', 'sapna', 'purworejo', '2001-06-05', 'P', 'loning', '756a2b1edfccc2ac7a263eff679ed4f4bce74d22', 'WhatsApp Image 2024-06-30 at 20.48.07 (1).jpeg', '1', 2022, 8, 10, 1),
(24, '322114', 'ridho', 'purworejo', '2002-06-17', 'L', 'winong purworejo', '645be703df9a0f26e699aa99d42b96f91435e92e', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2023, 8, 8, 1),
(25, '32211002', 'setiawan', 'purworejo', '0000-00-00', 'L', 'sindurjan', 'efa162c02f2c357f59aa74ac730f6b2e0e7ff687', 'form tambah kaprodi.png', '1', 2023, 8, 8, 1),
(26, '3221109', 'andika', 'purworejo', '2002-07-27', 'L', 'pekalongan', '37d21fb1cca28e89265d8cc6dae15d8d092b2760', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2023, 8, 7, 1),
(27, '3221178', 'Aisyah Indriani', 'Purworejo', '0003-01-12', 'P', 'Perum Boro', 'e35194818fb8a34f9213ad5de8bf8581eb651621', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2023, 8, 7, 1),
(28, '3221154', 'Ryan Hanafi', 'Purworejo', '2002-02-02', 'L', 'Loano Purworejo', '7398792a2d4bef2e1fa30642442bad8493f868cf', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2002, 8, 7, 1),
(29, '32211007', 'Latifa', 'Purworejo', '2002-09-09', 'P', 'Pituruh', '7db13aa651e9df7503065486d3fcb62818c72257', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2023, 8, 7, 1),
(30, '322', 'Nurlaila', 'Purworejo', '2002-12-23', 'P', 'Sucen Purworejo', '81110df80ca4086e306c4c52ab485a35cf761acc', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2022, 8, 9, 1),
(31, '322456', 'Kurniawan Pradana', 'Purworejo', '2002-05-12', 'L', 'Candi Ngasinan Banyuurip', 'e5bdc9a3ad69b0abeb3e8c8536e22bbe8fe018cb', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2022, 8, 9, 1),
(32, '3221108', 'Muftikhatul Khoiriyah', 'Purworejo', '2001-10-29', 'P', 'Loano Purworejo', '0a7a5e4d21ef5e694b0d8c5bbc25b621bdd46444', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2021, 8, 12, 1),
(33, '322116', 'Ferdy Adi Nugroho', 'Purworejo', '2002-06-05', 'L', 'Popongan Purworejo', '23909f6227f56ff37bc49d0be720c0ca4e1ca1ef', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2021, 8, 12, 1),
(34, '3221187', 'Sefica Putri Adelia', 'Purworejo', '2002-09-14', 'P', 'Kaliningko Purworejo', 'f181312c63f93bc50d5fcf35167486617243bccc', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2023, 8, 6, 1),
(35, '322117', 'Hilma Roselly', 'Purworejo', '2001-10-26', 'P', 'Sindurjan Purworejo', '84ce7c0f0c2e79fe20069f78129042520b5df687', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2023, 9, 6, 1),
(36, '322115', 'Vernanda', 'Purworejo', '2003-11-20', 'P', 'Sindurjan', '7e3793475ace104188c2fb2a27e4f8aba210634a', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2023, 10, 6, 3),
(37, '322118', 'Novita', 'Purworejo', '2003-12-23', 'P', 'Pituruh', '35f7941ef79c3482122113b878b9e5b997d808e2', 'WhatsApp Image 2024-06-20 at 19.52.10.jpeg', '1', 2023, 15, 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sks`
--

CREATE TABLE `tb_sks` (
  `id_sks` int(11) NOT NULL,
  `sks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sks`
--

INSERT INTO `tb_sks` (`id_sks`, `sks`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_thajaran`
--

CREATE TABLE `tb_thajaran` (
  `id_thajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_thajaran`
--

INSERT INTO `tb_thajaran` (`id_thajaran`, `tahun_ajaran`, `status`) VALUES
(7, '2019/2020', 0),
(8, '2020/2021', 0),
(9, '2022/2023', 0),
(10, '2023/2024', 1),
(11, '2024/2025', 0),
(12, '2025/2026', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_walikelas`
--

CREATE TABLE `tb_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_walikelas`
--

INSERT INTO `tb_walikelas` (`id_walikelas`, `id_guru`, `id_prodi`, `status`) VALUES
(18, 5, 1, 1),
(19, 17, 1, 1),
(20, 10, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wakadir`
--

CREATE TABLE `wakadir` (
  `id_wakadir` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wakadir`
--

INSERT INTO `wakadir` (`id_wakadir`, `id_guru`, `id_bagian`, `status`) VALUES
(5, 14, 2, 1),
(6, 5, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `_logabsensi`
--

CREATE TABLE `_logabsensi` (
  `id_presensi` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `ket` enum('H','I','S','T','A','C') NOT NULL,
  `pertemuan_ke` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `_logabsensi`
--

INSERT INTO `_logabsensi` (`id_presensi`, `id_mengajar`, `id_siswa`, `tgl_absen`, `ket`, `pertemuan_ke`) VALUES
(1, 2, 1, '2021-03-02', '', '1'),
(2, 4, 2, '2021-03-06', 'I', '1'),
(3, 2, 1, '2021-03-21', 'H', '2'),
(4, 2, 3, '2021-03-21', 'H', '3'),
(5, 5, 1, '2021-03-21', 'H', '1'),
(6, 5, 3, '2021-03-21', 'H', '1'),
(7, 2, 1, '2021-03-23', 'H', '4'),
(8, 2, 3, '2021-03-23', 'I', '4'),
(9, 6, 1, '2021-03-23', 'H', '1'),
(10, 6, 3, '2021-03-23', 'H', '1'),
(11, 6, 4, '2021-03-23', 'H', '1'),
(12, 6, 1, '2021-03-25', 'I', '2'),
(13, 6, 3, '2021-03-25', 'I', '2'),
(14, 6, 4, '2021-03-25', 'I', '2'),
(15, 7, 5, '2024-06-04', 'I', '1'),
(16, 11, 6, '2024-06-06', 'S', '1'),
(17, 11, 7, '2024-06-06', 'H', '2'),
(18, 12, 8, '2024-06-06', 'H', '1'),
(19, 14, 9, '2024-06-07', 'H', '1'),
(20, 15, 10, '2024-06-07', 'H', '1'),
(21, 18, 16, '2024-06-19', 'H', '1'),
(22, 18, 16, '2024-06-24', 'H', '2'),
(23, 18, 17, '2024-06-24', 'H', '2'),
(24, 23, 20, '2024-07-01', 'H', '1'),
(25, 23, 20, '2024-07-02', 'T', '2'),
(26, 23, 20, '2024-07-03', 'S', '3'),
(27, 24, 21, '2024-07-02', 'S', '1'),
(28, 23, 20, '2024-07-08', 'H', '4'),
(29, 23, 22, '2024-07-08', 'H', '5'),
(30, 23, 23, '2024-07-08', 'H', '5'),
(31, 49, 24, '2024-08-10', 'H', '1'),
(32, 49, 25, '2024-08-10', 'H', '1'),
(33, 48, 26, '2024-08-12', 'H', '1'),
(34, 48, 27, '2024-08-12', 'H', '1'),
(35, 48, 28, '2024-08-12', 'H', '1'),
(36, 48, 29, '2024-08-12', 'H', '1'),
(37, 48, 26, '2024-08-13', 'H', '2'),
(38, 48, 27, '2024-08-13', 'H', '2'),
(39, 48, 28, '2024-08-13', 'H', '2'),
(40, 48, 29, '2024-08-13', 'H', '2'),
(41, 48, 26, '2024-08-14', 'H', '3'),
(42, 48, 27, '2024-08-14', 'H', '3'),
(43, 48, 28, '2024-08-14', 'H', '3'),
(44, 48, 29, '2024-08-14', 'H', '3'),
(45, 57, 37, '2024-08-14', 'H', '1'),
(46, 58, 26, '2024-08-14', 'S', '1'),
(47, 58, 27, '2024-08-14', 'H', '1'),
(48, 58, 28, '2024-08-14', 'H', '1'),
(49, 58, 29, '2024-08-14', 'H', '1'),
(50, 57, 37, '2024-08-22', 'H', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_jam`
--
ALTER TABLE `tb_jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indeks untuk tabel `tb_kepsek`
--
ALTER TABLE `tb_kepsek`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indeks untuk tabel `tb_kontrak`
--
ALTER TABLE `tb_kontrak`
  ADD PRIMARY KEY (`id_kontrak`);

--
-- Indeks untuk tabel `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  ADD PRIMARY KEY (`id_mkelas`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tb_resume`
--
ALTER TABLE `tb_resume`
  ADD PRIMARY KEY (`id_resume`);

--
-- Indeks untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_sks`
--
ALTER TABLE `tb_sks`
  ADD PRIMARY KEY (`id_sks`);

--
-- Indeks untuk tabel `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  ADD PRIMARY KEY (`id_thajaran`);

--
-- Indeks untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD PRIMARY KEY (`id_walikelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `wakadir`
--
ALTER TABLE `wakadir`
  ADD PRIMARY KEY (`id_wakadir`);

--
-- Indeks untuk tabel `_logabsensi`
--
ALTER TABLE `_logabsensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_jam`
--
ALTER TABLE `tb_jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_kepsek`
--
ALTER TABLE `tb_kepsek`
  MODIFY `id_kepsek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kontrak`
--
ALTER TABLE `tb_kontrak`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  MODIFY `id_mkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_resume`
--
ALTER TABLE `tb_resume`
  MODIFY `id_resume` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_sks`
--
ALTER TABLE `tb_sks`
  MODIFY `id_sks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  MODIFY `id_thajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `wakadir`
--
ALTER TABLE `wakadir`
  MODIFY `id_wakadir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `_logabsensi`
--
ALTER TABLE `_logabsensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
