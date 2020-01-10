-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2020 pada 07.03
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkmita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `NIA` int(20) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`NIA`, `nama`, `password`) VALUES
(34234234, 'ilham', 'ilham');

-- --------------------------------------------------------

--
-- Struktur dari tabel `download_materi`
--

CREATE TABLE `download_materi` (
  `id_download` varchar(50) NOT NULL,
  `id_upload` varchar(50) NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `kelas` int(11) NOT NULL,
  `total_download` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `download_materi`
--

INSERT INTO `download_materi` (`id_download`, `id_upload`, `id_siswa`, `kelas`, `total_download`) VALUES
('DM20190512M0001', 'UP20190512M0001', 'S0001', 1, 2),
('DM20190513M0002', 'UP20190513M0003', 'S0001', 1, 2),
('DM20190518M0003', 'UP20190512M0002', 'S0002', 2, 1),
('DM20190524M0004', 'UP20190522M0004', 'S0001', 1, 1),
('DM20190625M0005', 'UP20190625M0005', 'S0007', 1, 1),
('DM20191110M0006', 'UP20190625M0005', 'S0001', 1, 10),
('DM20191129M0007', 'UP20191129M0005', 'S0008', 1, 2),
('DM20191129M0008', 'UP20191129M0006', 'S0008', 1, 1),
('DM20191129M0009', 'UP20191129M0005', 'S0001', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `download_soal`
--

CREATE TABLE `download_soal` (
  `id_downloadsoal` varchar(20) NOT NULL,
  `id_uploadSoal` varchar(20) DEFAULT NULL,
  `id_siswa` varchar(20) DEFAULT NULL,
  `kelas` int(200) DEFAULT NULL,
  `total_download` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `download_soal`
--

INSERT INTO `download_soal` (`id_downloadsoal`, `id_uploadSoal`, `id_siswa`, `kelas`, `total_download`) VALUES
('DS20190512M0001', 'UPS20190512M0001', 'S0001', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `NIG` varchar(20) NOT NULL,
  `nama_guru` varchar(191) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `total_upload` int(150) NOT NULL,
  `status` int(11) NOT NULL,
  `status_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`NIG`, `nama_guru`, `alamat`, `jenis_kelamin`, `password`, `total_upload`, `status`, `status_pass`) VALUES
('G0001', 'irsa septiana', 'Balong bendo', 0, 'damarwulan', 7, 1, 1),
('G0002', 'didik sucipto', 'ngagel ketapan kulon', 1, 'ilhamfirnanda', 0, 1, 1),
('G0003', 'anis sudaryaningsih', 'griya kebon agong sidoarjo', 0, 'kitapastibisa', 0, 1, 1),
('G0004', 'H muhammad riyadi M.M', 'pedagangan wringin anom gresik', 1, 'halomasbro', 0, 1, 1),
('G0005', 'dra zuroidah', 'Jl staria CTN Ketegan taman', 0, 'oier343enjaioewrkl903823', 0, 1, 0),
('G0006', 'Erma handayani Spd', 'Tambak tengah Kiran sidoarjo', 0, 'oier343enjaioewrkl9038234', 0, 1, 0),
('G0007', 'sukijan', 'balongrejo', 1, 'ilham', 1, 1, 1),
('G0008', 'sukatono', 'jl wadung pal', 1, 'oier343enjaioewrkl9038234', 0, 1, 0),
('G0009', 'mam ratri skom', 'jl waru 25 sidoarjo', 0, 'oier343enjaioewrkl9038234', 0, 1, 0),
('G0010', 'Anita ariyani', 'jl sidoajro', 0, 'ambyar', 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `idjurusan` int(50) NOT NULL,
  `nama_jurusan` varchar(191) NOT NULL,
  `penjelasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`idjurusan`, `nama_jurusan`, `penjelasan`) VALUES
(1, 'teknik komputer dan jaringan', 'memahami soal teknik'),
(2, 'akuntansi', 'memahami dasar-dasar akuntansi'),
(3, 'administrasi perkantoran', 'belajar perkantoran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `jurusan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jurusan`) VALUES
(1, 'X TKJ 1', 1),
(2, 'X TKJ 2', 1),
(3, 'X AK 1', 2),
(4, 'X AK 2', 2),
(5, 'X APK 1', 3),
(6, 'X APK 2', 3),
(7, 'XI TKJ 1', 1),
(8, 'XI TKJ 2', 1),
(9, 'XI AK 1', 2),
(10, 'XI AK 2', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `NIS` varchar(50) NOT NULL,
  `nama_siswa` varchar(191) NOT NULL,
  `alamat` text NOT NULL,
  `kelas` int(50) NOT NULL,
  `nomor_telp` varchar(15) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `password` varchar(191) NOT NULL,
  `status` int(11) NOT NULL,
  `status_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`NIS`, `nama_siswa`, `alamat`, `kelas`, `nomor_telp`, `jenis_kelamin`, `password`, `status`, `status_pass`) VALUES
('S0001', 'matilda', 'ngelom megarert34', 1, '', 0, 'damarwulan', 1, 1),
('S0002', 'Achmad Harun antono', 'krian', 2, '', 1, 'damarwulan', 1, 1),
('S0003', 'al rizky', 'krian', 3, '', 1, 'ilham', 1, 1),
('S0004', 'Ahmad yofan', 'krian', 1, '', 1, 'hkajweh98qh3384juhakuw', 1, 0),
('S0005', 'alfan Yuli Syahputra', 'jenek kulon wetan', 1, '', 1, 'hkajweh98qh3384juhakuw', 1, 0),
('S0006', 'Tel\'Annas', 'gedangan sidoarjo', 5, '', 1, 'hkajweh98qh3384juhakuw', 1, 0),
('S0007', 'suparman', 'ngelom', 1, '', 1, 'ilham', 1, 1),
('S0008', 'muykeno', 'jl sambirejo', 1, '', 1, 'ambyar', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload_materi`
--

CREATE TABLE `upload_materi` (
  `id_upload` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `link` varchar(191) DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `id_guru` varchar(50) NOT NULL,
  `kelas` int(50) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upload_materi`
--

INSERT INTO `upload_materi` (`id_upload`, `judul`, `link`, `file`, `id_guru`, `kelas`, `gambar`, `keterangan`, `tgl_upload`) VALUES
('UP20190512M0002', 'latihan excel', 'https://mane3x.wordpress.com/2013/03/29/konsep-dasar-flowchart-dan-perbedaan-tiap-jenis-flowchart/', '', 'G0001', 2, 'gbr-201905121557651500p4Vs.jpg', 'sderer', '2019-05-12'),
('UP20190513M0003', 'buku saya', 'https://www.youtube.com/watch?v=kTJbE3sfvlI', '', 'G0001', 1, '', 'rtrtrt', '2019-05-13'),
('UP20190522M0004', 'Materi excel kasus x', '', 'file-201905221558501001yAdk.xlsx', 'G0001', 1, 'gbr-201905221558501001yAdk.png', 'ini adalah materi untuk kasus x', '2019-05-22'),
('UP20191129M0005', 'buku saya 5', '', 'file-201911291575022124J3w3.xlsx', 'G0010', 1, 'gbr-201911291575022124J3w3.jpg', 'ini buku budi', '2019-11-29'),
('UP20191129M0006', 'latihan excel', 'https://www.bagas31.info/', '', 'G0010', 1, '', 'aweaweawjbeuawbeajwe', '2019-11-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload_soal`
--

CREATE TABLE `upload_soal` (
  `id_uploadsoal` varchar(20) NOT NULL,
  `judul_soal` varchar(191) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `id_guru` varchar(20) NOT NULL,
  `kelas` int(20) NOT NULL,
  `gambar` varchar(500) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `tgl_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upload_soal`
--

INSERT INTO `upload_soal` (`id_uploadsoal`, `judul_soal`, `link`, `file`, `id_guru`, `kelas`, `gambar`, `keterangan`, `tgl_upload`) VALUES
('UPS20190512M0001', 'latihan excel', '', 'file-201905121557653544cwuD.xlsx', 'G0001', 1, 'gbr-201905121557653544cwuD.png', 'ffgfgtttttyty', '2019-05-12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`NIA`);

--
-- Indeks untuk tabel `download_materi`
--
ALTER TABLE `download_materi`
  ADD PRIMARY KEY (`id_download`);

--
-- Indeks untuk tabel `download_soal`
--
ALTER TABLE `download_soal`
  ADD PRIMARY KEY (`id_downloadsoal`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`NIG`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idjurusan`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indeks untuk tabel `upload_materi`
--
ALTER TABLE `upload_materi`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indeks untuk tabel `upload_soal`
--
ALTER TABLE `upload_soal`
  ADD PRIMARY KEY (`id_uploadsoal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `idjurusan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
