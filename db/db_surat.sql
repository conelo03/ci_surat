-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 04:36 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi_surat`
--

CREATE TABLE `disposisi_surat` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `index_disposisi` varchar(50) NOT NULL,
  `tgl_penyelesaian` date NOT NULL,
  `kembali_kepada` text,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi_surat`
--

INSERT INTO `disposisi_surat` (`id_disposisi`, `id_surat`, `index_disposisi`, `tgl_penyelesaian`, `kembali_kepada`, `tgl_kembali`) VALUES
(16, 26, '001/RSUD/2020', '2020-01-09', 'Bagian Umum', '2020-01-10'),
(17, 37, '006/RSUD/2020', '2020-02-27', 'Bagian Umum', '2020-02-28'),
(18, 33, '004/RSUD/2020', '2020-05-04', 'Bagian Umum', '2020-05-06'),
(19, 41, '008/RSUD/2020', '2020-07-16', 'Bagian Umum', '2020-07-17'),
(20, 40, '010/RSUD/2020', '2020-04-20', 'Bagian Umum', '2020-04-21'),
(21, 39, '011/RSUD/2020', '2020-07-08', 'Bagian Umum', '2020-07-10'),
(22, 35, '005/RSUD/2020', '2020-03-19', 'Bagian Umum', '2020-03-23'),
(23, 38, '009/RSUD/2020', '2020-06-08', 'Bagian Umum', '2020-06-10'),
(24, 32, '007/RSUD/2020', '2020-04-20', 'Bagian Umum', '2020-04-21'),
(25, 42, '012/RSUD/2020', '2020-07-27', 'Bagian Umum', '2020-07-28'),
(26, 43, '013/RSUD/2020', '2020-07-27', 'Bagian Umum', '2020-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `instalasi`
--

CREATE TABLE `instalasi` (
  `id_instalasi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_instalasi` varchar(200) NOT NULL,
  `kode_surat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instalasi`
--

INSERT INTO `instalasi` (`id_instalasi`, `id_jabatan`, `nama_instalasi`, `kode_surat`) VALUES
(1, 1, 'Bagian Umum', 'UMUM-RSU'),
(8, 8, 'Bagian Keuangan', 'BAG-UANG'),
(9, 9, 'Bagian Logistik', 'LGSTK-RS'),
(10, 10, 'Peningkatan Mutu dan Keselamatan Pasien', 'PMKP-RSU'),
(11, 11, 'Unit Pemeliharaan dan Pengelolaan Alat Medis / Kedokteran', 'UP2AMK'),
(12, 12, 'Instalasi Sistem Informasi Manajemen RS', 'SIMRS'),
(13, 13, 'Instalasi Promosi Kesehatan Rumah Sakit', 'PKRS'),
(14, 14, 'Unit Diklat', 'DIKLAT');

-- --------------------------------------------------------

--
-- Table structure for table `instruksi`
--

CREATE TABLE `instruksi` (
  `id_instruksi` int(11) NOT NULL,
  `id_disposisi` int(11) NOT NULL,
  `instruksi` text NOT NULL,
  `terusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruksi`
--

INSERT INTO `instruksi` (`id_instruksi`, `id_disposisi`, `instruksi`, `terusan`) VALUES
(18, 16, 'Untuk segera ditindaklanjuti', 12),
(19, 17, 'Untuk diberikan dana sesuai dengan kebutuhan', 8),
(20, 17, 'Untuk dilakukan pemasangan', 12),
(22, 17, 'Untuk dilakukan pencatatan', 9),
(23, 18, 'Untuk disediakan', 9),
(24, 18, 'Untuk diberikan dana sesuai dengan kebutuhan', 8),
(25, 18, 'Segera lakukan pemasangan apabila barang telah ada', 12),
(26, 19, 'Untuk mengikuti sosialisasi', 12),
(27, 20, 'Untuk dikaji', 12),
(28, 21, 'Untuk dikaji', 8),
(29, 21, 'Untuk dikaji', 13),
(30, 21, 'Untuk dikaji', 10),
(31, 22, 'Untuk disediakan', 9),
(32, 23, 'Untuk dikaji terlebih dahulu', 8),
(33, 23, 'Untuk dikaji', 13),
(34, 24, 'Untuk diberikan dana sesuai dengan kebutuhan', 8),
(35, 24, 'Segera lakukan pemasangan', 12),
(36, 24, 'Untuk dilakukan pencatatan', 9),
(37, 25, 'untuk disediakan', 9),
(38, 25, 'Untuk diberikan dana sesuai dengan kebutuhan', 8),
(39, 26, 'Untuk dikaji', 8);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Bagian Umum'),
(2, 'Direktur'),
(8, 'Kepala Bagian Keuangan'),
(9, 'Kepala Bagian Logistik'),
(10, 'Ketua Komite Mutu dan Keselamatan Pasien'),
(11, 'Kepala Unit Pemeliharaan dan Pengelolaan Alat Medis / Kedokteran'),
(12, 'Kepala Instalasi Sistem Informasi Manajemen RS'),
(13, 'Kepala Instalasi Promosi Kesehatan Rumah Sakit'),
(14, 'Kepala Unit Diklat');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id_register` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `index_disposisi` varchar(50) NOT NULL,
  `isi_ringkas` varchar(300) DEFAULT NULL,
  `lampiran` text,
  `pengolah` int(11) NOT NULL,
  `tgl_diteruskan` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id_register`, `id_surat`, `index_disposisi`, `isi_ringkas`, `lampiran`, `pengolah`, `tgl_diteruskan`, `catatan`) VALUES
(14, 26, '001/RSUD/2020', 'Penambahan fitur laporan SIMAKMU', '', 2, '2020-01-02', 'Tidak ada'),
(15, 30, '002/RSUD/2020', 'Permohonan PKL ', 'polsub.jpg', 2, '2020-02-04', 'Mahasiswa PKL'),
(16, 34, '003/RSUD/2020', 'training strategi sistem informmasi kesehatan di rs', '', 2, '2020-05-25', '-'),
(17, 33, '004/RSUD/2020', 'permohonan komputer untuk promosi kesehatan di rs', '', 2, '2020-04-28', '1 unit komputer'),
(18, 35, '005/RSUD/2020', 'permintaan tinta', '', 2, '2020-03-19', '-'),
(19, 37, '006/RSUD/2020', 'pemasangan internet untuk bagian keunagan', '', 2, '2020-02-20', 'tidak ada'),
(20, 32, '007/RSUD/2020', 'pemasangan internet untuk unit p2amk', '', 2, '2020-04-16', 'tidak ada'),
(21, 41, '008/RSUD/2020', 'Kelengkapan Sosialisasi & Simulasi Web Pemerintah Kab. Sumedang', 'diskominfo.jpg', 2, '2020-07-14', 'tidak ada'),
(22, 38, '009/RSUD/2020', 'Permohonan sponsorship', 'difest.jpg', 2, '2020-06-03', 'tidak ada'),
(23, 40, '010/RSUD/2020', 'Presesnsi SIMRS', 'sentosa.jpg', 2, '2020-04-14', 'tidak ada'),
(24, 39, '011/RSUD/2020', 'Permohonan sponsorship', 'difest1.jpg', 2, '2020-07-06', 'pengajuan dana'),
(25, 42, '012/RSUD/2020', 'permohonan komputer', '', 2, '2020-07-23', 'tidak ada'),
(26, 43, '013/RSUD/2020', 'sponsorship', 'difest2.jpg', 2, '2020-07-23', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `no_surat` varchar(200) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `asal` varchar(200) NOT NULL,
  `jenis_surat` enum('Internal','Eksternal','Eksternal Keluar') NOT NULL,
  `sifat` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `lampiran` text,
  `komentar` text,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `judul`, `no_surat`, `tujuan`, `asal`, `jenis_surat`, `sifat`, `tanggal`, `perihal`, `isi`, `lampiran`, `komentar`, `status`) VALUES
(26, 'NOTA DINAS', '001/PMKP-RSU/VII/2020', '2', 'Ketua Komite Mutu dan Keselamatan Pasien', 'Internal', 'Biasa', '2020-01-02', 'Penambahan Fitur/ Dashboad SIMAKMUU', 'Berdasarkan hasil rekomendasi KARS tentang PMKP 9 EP 3, bahwa \"Rumah sakit mengintegrasikan pelaporan kejadian dan pengukuranmutu agar solusi dan perbaikan yang dilakukan terintegrasi\", maka kami mengusulkan penambahan fitur untuk laporan Insiden Keselamatan Pasien ke dalam SItem Informasi Manajemen Indikator Mutu (SIMAKMU).', NULL, NULL, 4),
(30, 'PERMOHONAN IZIN', '273/PL41/PK.0106/2020', '2', 'Politeknik Negeri Subang', 'Eksternal', 'Segera', '2020-02-03', 'Pemohonan Praktik Kerja Lapangan', 'Dengan hormat, sehubungan dengan rencana PKL bagi mahasiswa Program Studi Sistem Informasi Jurusan Manajemen Informatika Polsub, kami mohom bantuan Bapak/Ibu agar mahasiswa dibawah ini:<br />\r\n1. Reizky Suci Agustini (10104026)<br />\r\n2. Noval Yusuf Kurniawan (10104023)<br />\r\n3. R Salma Dwi M (10104025)<br />\r\n4. Muhammad Irsyad W (10104022)<br />\r\nDapat diperkenankan melaksanakan PKL pada Instansi/Perusahan yang Bapak/Ibu pimpin, perlu kami beritahu bahwa tugas tersebut bersifat ilmiah guna menambah wawasan dan keterampilan mahasiswa.', NULL, NULL, 1),
(31, 'PEMUTAKHIRAN PENDATAAN APLIKASI', '489/1427/diskominfosanditik/2019', '2', 'Dinas Komunikasi dan Informaika, Persandian dan Statistik', 'Eksternal', 'Segera', '2020-03-17', 'Pemutakhiran Pendataan Aplikasi', 'Dipermaklumkan dengan hormat, menindaklanjuti surat kami sebelumnya nomor 489/132/diskipas/2018 tanggal 30 Januari 2019 perihal pendataan aplikasi, sebagai tindak lanjut surat dari Kepala Dinas Komunikasi dan Informatika Provinsi Jawa Barat, serta arahan Tim Koordinasi dan Supervisi Pencegahan Korupsi KPK RI dalam rangka integrasi dan interoperabilitas sistem informasi pemerintah, kami membutuhkan data aplikasi  baik berbais android, web, desktop, dan yang lainnyayang sudah, sedang dan akan dibuat oleh ODP di lingkungan Pemda Kab Sumedang sampai akhir tahun 2019.', NULL, NULL, 0),
(32, 'NOTA DINAS', '001/UP2AMK/VII/2020', '2', 'Kepala Unit Pemeliharaan dan Pengelolaan Alat Medis / Kedokteran', 'Internal', 'Biasa', '2020-04-15', 'Permohonan pemasangan internet', 'Dipermaklumkan dengan hormat, untuk mempermudah hubungan dengan rekanan pihak ke 3 dalam rangka komunikasi lewat email dan integrasi data yang berhubungan dengan akreditasi, maka untuk kelancarannya hal tersebut kami mengajukan permohonan pemasangan jaringan internet.<br />\r\nDemikian permohonan ini kami sampaikan, atas segala perhatian dan kebijaksanaan Bapak kami ucapkan terima kasih.', NULL, NULL, 3),
(33, 'NOTA DINAS', '001/PKRS/VII/2020', '2', 'Kepala Instalasi Promosi Kesehatan Rumah Sakit', 'Internal', 'Segera', '2020-04-28', 'Permohonan komputer', 'Dengan hormat kami sampaikan, salah satu upaya untuk mendukung pelayanan promosi kesehatan di RSUD Kabupaten Sumedang adalah pembutanan informasi, edukasi, dan komunikasi dengan media audio atau pesawat radio.<br />\r\nSalah satu pendukung media radio tersebut adalah komputer (PC), saat ini spesifikasi komputer yang ada kurang optimal untuk mendukung pelaksanaan siaran radio.<br />\r\nMaka terkait dengan hal tersebut diatas dengan ini kami mengajukan permohonan untuk penggantian 1 (satu) unit komputer.<br />\r\nDemikian permohonan ini kami sampaikan, atas perhatian dan perkenan Bapak, kami ucapkan terima kasih.', NULL, NULL, 2),
(34, 'NOTA DINAS', '001/SIMRS/VII/2020', '2', 'Kepala Instalasi Sistem Informasi Manajemen RS', 'Internal', 'Segera', '2020-05-25', 'Permohonan mengikuti pelatihan tentang strategi sistem informasi kesehatan di rumah sakit', 'Dipermaklumkan dengan hormat, sesuai dengan rekomendasi tim survey simulasi akreditasi snars edisi 1, dengan ini kami mengajukan usulan mengikuti pelatihan tentang Strategi Sistem Informasi Kesehatan di Rumah Sakit yang diselengkan oleh PT. Mairodi Mandiri Sejahtera, Training, Consulting & Engineering Services di Bandung pada tanggal 10  s.d. 14 Juni 2020.<br /><br /><br />\r\nAdapun nama pegawai yang kami usulkan untuk mengikuti pelatihan dimaksud adalah:<br /><br /><br />\r\n1. David Susilo Ismaya, AMD (814068498) dengan jabatan staff analis sistem pada instalasi SIMRS<br /><br /><br />\r\n2. Haris (823675836) dengan jabatan programmer pada instalasi SIMRS<br /><br /><br />\r\nDengan total biaya Rp. 11.900.000,00 terbilang sebelas juta sembilan ratus ribu rupiah<br /><br /><br />\r\nDemikian permohonan ini kami sampaikan, atas perhatian dan perkenan Bapak, kami ucapkan terima kasih.', NULL, NULL, 1),
(35, 'NOTA DINAS', '001/UMUM-RSU/VII/2020', '2', 'Bagian Umum', 'Internal', 'Biasa', '2020-03-18', 'Permintaan tinta', 'Dengan hormat kami sampaikan, salah satu upaya untuk mendukung pelayanan umum di RSUD Kabupaten Sumedang adalah pembutanan informasi, edukasi, dan komunikasi dengan media cetak.<br />\r\nMaka terkait dengan hal tersebut diatas dengan ini kami mengajukan permohonan untuk penambahan stok tinta di bagian umum.<br />\r\nDemikian permohonan ini kami sampaikan, atas perhatian dan perkenan Bapak, kami ucapkan terima kasih.', NULL, NULL, 3),
(37, 'NOTA DINAS', '001/BAG-UANG/VII/2020', '2', 'Kepala Bagian Keuangan', 'Internal', 'Biasa', '2020-02-20', 'Permohonan pemasangan internet', 'Dipermaklumkan dengan hormat, untuk mempermudah hubungan dengan rekanan pihak ke 3 dalam rangka komunikasi lewat email dan integrasi data yang berhubungan dengan akreditasi, maka untuk kelancarannya hal tersebut kami mengajukan permohonan pemasangan jaringan internet.<br /><br />\r\nDemikian permohonan ini kami sampaikan, atas segala perhatian dan kebijaksanaan Bapak kami ucapkan terima kasih.', 'difest.jpg', NULL, 4),
(38, 'Permohonan Sponsorship', '026/HIMMI/VI/2020', '2', 'Himpunan Mahasiswa Manajemen Informatika', 'Eksternal', 'Biasa', '2020-06-02', 'Sponsorship', 'Berhubungan dengan akan diadakannya acara DIFEST (Digital Festival) maka kami ingin mengajukan permohonan sponsorship dengan pihak RSUD Sumedang agar dimana apabila ada yang sakit dapat segera untuk ditangani.', NULL, NULL, 3),
(39, 'Permohonan Sponsorship', '066/BEM-KEMAPOLSUB/VII/2020', '2', 'BEM KEMA Polsub', 'Eksternal', 'Segera', '2020-07-06', 'Sponsorship', 'Berhubungan dengan akan diadakannya acara Polsub Futsal Cup maka kami ingin mengajukan permohonan sponsorship dengan pihak RSUD Sumedang agar dimana apabila ada yang cedera dapat segera untuk ditangani.', NULL, NULL, 3),
(40, 'Surat Permohonan', 'JHN316-36', '2', 'PT. Sentosa Medika Sejahtera', 'Eksternal', 'Biasa', '2020-04-14', 'Permohonan Pengajuan Presensi SIMRS yang Sudah Bridging dengan BPJS, Terintegrasi Internal dan Berbasis Online', 'Dengan hormat, kami memohon pengajuan presensi  SIMRS yang sudah bridging dengan BPJS, dimana yang terintegrasi internal dan juga berbasis online.<br /><br />\r\nAtas perhatian Bapak/Ibu kami ucupkan terima kasih banyak.', NULL, NULL, 3),
(41, 'Sosialisasi', '005/257/Diskipas/2020', '2', 'Ketua Diskipas Kab. Sumedang', 'Eksternal', 'Biasa', '2020-07-14', 'Kelengkapan Sosialisasi & Simulasi Web Pemerintah Kab. Sumedang', 'Sehubungan akan diadakannya kelengkapan sosialisasi beserta simulasi website pemerintah Kabupaten Sumedang, maka pihak RSUD diharapkan hadil dalam soisalisasi tersebut.', NULL, NULL, 3),
(42, 'NOTA DINAS', '002/SIMRS/VII/2020', '2', 'Kepala Instalasi Sistem Informasi Manajemen RS', 'Internal', 'Segera', '2020-07-23', 'Permohonan komputer', 'Permohonan pemasangan internet', 'difest.jpg', NULL, 3),
(43, 'Sosialisasi', '001/HIMMI/2020', '2', 'Himpunan Mahasiswa Manajemen Informatika', 'Eksternal', 'Biasa', '2020-07-23', 'Sponsorship', 'sponsorship', NULL, NULL, 3),
(44, 'SURAT BALASAN', '002/BAG-UANG/VII/2020', 'Himpunan Mahasiswa Manajemen Informatika', 'Kepala Bagian Keuangan', 'Eksternal Keluar', 'Biasa', '2020-07-23', 'untuk tindaklanjuti', 'oke', NULL, NULL, 0),
(45, 'Surat Balasan', '003/BAG-UANG/VII/2020', 'Himpunan Mahasiswa Manajemen Informatika', 'Kepala Bagian Keuangan', 'Eksternal Keluar', 'Biasa', '2020-07-23', 'surat balasan ', 'menindaklanjuti surat blablabla', NULL, NULL, 0),
(46, 'NOTA DINAS', '003/SIMRS/VII/2020', '2', 'Kepala Instalasi Sistem Informasi Manajemen RS', 'Internal', 'Biasa', '2020-07-30', 'Gabut', 'blablabla', 'a.PNG', 'perbaiki judulnya\r\n', 0),
(47, 'NOTA DINAS', '004/BAG-UANG/VII/2020', '2', 'Kepala Bagian Keuangan', 'Internal', 'Segera', '2020-07-30', 'Permohonan dana untuk workshop', 'Permohonan dana untuk workshop, berikut saya sertakan lampirannya.', 'difest4.jpg', NULL, 0),
(48, 'NOTA DINAS', '002/UMUM-RSU/VII/2020', '2', 'Bagian Umum', 'Internal', 'Segera', '2020-07-30', 'Permohonan dana untuk workshop', 'test', 'difest3.jpg', NULL, 5),
(49, 'NOTA DINAS', '003/UMUM-RSU/VII/2020', '2', 'Bagian Umum', 'Internal', 'Segera', '2020-07-30', 'Permohonan dana untuk workshop', 'blablabla', 'difest4.jpg', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(4) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `level` enum('Bagian Umum','Instalasi','Direktur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `id_jabatan`, `jabatan`, `nip`, `level`) VALUES
(2, 'umum', '21232f297a57a5a743894a0e4a801fc3', 'Reizky', 1, 'Bagian Umum', '12164440', 'Bagian Umum'),
(7, 'direktur', '21232f297a57a5a743894a0e4a801fc3', 'Aceng Solahudin Ahmad', 2, 'Direktur', '10104027', 'Direktur'),
(8, 'keuangan', '21232f297a57a5a743894a0e4a801fc3', 'Pepen Supendi', 8, 'Kepala Bagian Keuangan', '10104028', 'Instalasi'),
(9, 'logistik', '21232f297a57a5a743894a0e4a801fc3', 'Rifky Julian', 9, 'Kepala Bagian Logistik', '10104029', 'Instalasi'),
(10, 'pmkp', '21232f297a57a5a743894a0e4a801fc3', 'Meru Prabowo', 10, 'Ketua Komite Mutu dan Keselamatan Pasien', '10104030', 'Instalasi'),
(11, 'up2amk', '21232f297a57a5a743894a0e4a801fc3', 'Sukenda', 11, 'Kepala Unit Pemeliharaan dan Pengelolaan Alat Medis / Kedokteran', '10104031', 'Instalasi'),
(12, 'simrs', '21232f297a57a5a743894a0e4a801fc3', 'Wawan Kurniawan', 12, 'Kepala Instalasi Sistem Informasi Manajemen RS', '10104032', 'Instalasi'),
(13, 'pkrs', '21232f297a57a5a743894a0e4a801fc3', 'Noval Yusuf', 13, 'Kepala Instalasi Promosi Kesehatan Rumah Sakit', '10104033', 'Instalasi'),
(14, 'diklat', '21232f297a57a5a743894a0e4a801fc3', 'Irshad Wijaya', 14, 'Kepala Unit Diklat', '10104034', 'Instalasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `instalasi`
--
ALTER TABLE `instalasi`
  ADD PRIMARY KEY (`id_instalasi`);

--
-- Indexes for table `instruksi`
--
ALTER TABLE `instruksi`
  ADD PRIMARY KEY (`id_instruksi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id_register`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `instalasi`
--
ALTER TABLE `instalasi`
  MODIFY `id_instalasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `instruksi`
--
ALTER TABLE `instruksi`
  MODIFY `id_instruksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
