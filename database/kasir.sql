-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2022 pada 14.58
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1
-- AUTHOR : HAMDANDIH

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrasi_sub_menu`
--

CREATE TABLE `administrasi_sub_menu` (
  `id` int(10) NOT NULL,
  `id_menu` int(100) NOT NULL,
  `sub_menu` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrasi_sub_menu`
--

INSERT INTO `administrasi_sub_menu` (`id`, `id_menu`, `sub_menu`, `link`, `icon`) VALUES
(32, 5, 'knlk', 'knk', ''),
(33, 5, 'jnjnj', '787', 'UHIH'),
(34, 5, 'lucu', 'HH', 'HH'),
(35, 6, 'qq', 'qq', 'qq'),
(36, 5, 'qqq', 'qqq', ''),
(37, 9, 'Menu Utama', 'http://localhost/kasir-main/utama/admin/administrator/sub_menu.php', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrasi_toko`
--

CREATE TABLE `administrasi_toko` (
  `id` int(100) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` int(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrasi_toko`
--

INSERT INTO `administrasi_toko` (`id`, `nama_toko`, `alamat`, `no_telepon`, `website`, `gambar`) VALUES
(1, 'asxqdasdsdadasdsaasd', 'jo9h', 1234567890, 'bj', '135-hine.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator_menu`
--

CREATE TABLE `administrator_menu` (
  `id_menu` int(100) NOT NULL,
  `menu_utama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `administrator_menu`
--

INSERT INTO `administrator_menu` (`id_menu`, `menu_utama`) VALUES
(5, 'Master Data'),
(6, 'Test\r\n'),
(7, 'Belajar'),
(8, 'jj'),
(9, 'Testing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logistik_pemesanan`
--

CREATE TABLE `logistik_pemesanan` (
  `id_pemesanan` int(100) NOT NULL,
  `kode_pemesanan` text NOT NULL,
  `id_kategoripemesanan` int(100) NOT NULL,
  `id_jenisrelasi` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `diskonpersen` int(100) NOT NULL,
  `diskonrp` int(100) NOT NULL,
  `ppn` int(100) NOT NULL,
  `total_setelah_ppn` int(100) NOT NULL,
  `total_setelah_diskon` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masterdata_barang`
--

CREATE TABLE `masterdata_barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masterdata_barang`
--

INSERT INTO `masterdata_barang` (`id_barang`, `nama`) VALUES
(1, 'Buku'),
(3, 'Pena'),
(4, 'Kertas A4'),
(5, 'Rokok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masterdata_instansirelasi`
--

CREATE TABLE `masterdata_instansirelasi` (
  `id` int(11) NOT NULL,
  `id_jenisrelasi` int(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` int(20) NOT NULL,
  `no_fax` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masterdata_instansirelasi`
--

INSERT INTO `masterdata_instansirelasi` (`id`, `id_jenisrelasi`, `alamat`, `no_telepon`, `no_fax`, `email`, `website`) VALUES
(16, 23, 'jbjkbjj', 9, 87, 'sabbihismaf@gmail.com', 'hi'),
(18, 23, 'hfgrrrrrr', 4, 3, 'sabbihismaf@gmail.com', 'r');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masterdata_jenisrelasi`
--

CREATE TABLE `masterdata_jenisrelasi` (
  `id_jenisrelasi` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masterdata_jenisrelasi`
--

INSERT INTO `masterdata_jenisrelasi` (`id_jenisrelasi`, `nama`) VALUES
(23, 'qqjjjhhvh'),
(24, 'Toko1'),
(25, 'js');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masterdata_kategoripemesanan`
--

CREATE TABLE `masterdata_kategoripemesanan` (
  `id_kategoripemesanan` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masterdata_kategoripemesanan`
--

INSERT INTO `masterdata_kategoripemesanan` (`id_kategoripemesanan`, `kode`, `nama`) VALUES
(1, 'fuh097', 'hoihss'),
(2, 'h', 'E'),
(3, 'C', 'e'),
(5, 'aa', 'aa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masterdata_pegawai`
--

CREATE TABLE `masterdata_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat_ktp` varchar(100) NOT NULL,
  `alamat_domisili` varchar(100) NOT NULL,
  `status_karyawan` varchar(100) NOT NULL,
  `masa_kontrak` int(2) NOT NULL,
  `foto` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `role`) VALUES
(3, 'dandia', 'dans', '12345678', 'admin'),
(4, 'hamdandih', 'dandi', '12345678', 'gudang'),
(5, 'hamdandih', 'hamdandih', '12345678', 'keuangan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrasi_sub_menu`
--
ALTER TABLE `administrasi_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `administrasi_toko`
--
ALTER TABLE `administrasi_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `administrator_menu`
--
ALTER TABLE `administrator_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `logistik_pemesanan`
--
ALTER TABLE `logistik_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `masterdata_instansirelasi`
--
ALTER TABLE `masterdata_instansirelasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenisrelasi` (`id_jenisrelasi`);

--
-- Indeks untuk tabel `masterdata_jenisrelasi`
--
ALTER TABLE `masterdata_jenisrelasi`
  ADD PRIMARY KEY (`id_jenisrelasi`);

--
-- Indeks untuk tabel `masterdata_kategoripemesanan`
--
ALTER TABLE `masterdata_kategoripemesanan`
  ADD PRIMARY KEY (`id_kategoripemesanan`);

--
-- Indeks untuk tabel `masterdata_pegawai`
--
ALTER TABLE `masterdata_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrasi_sub_menu`
--
ALTER TABLE `administrasi_sub_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `administrasi_toko`
--
ALTER TABLE `administrasi_toko`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `administrator_menu`
--
ALTER TABLE `administrator_menu`
  MODIFY `id_menu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `masterdata_instansirelasi`
--
ALTER TABLE `masterdata_instansirelasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `masterdata_jenisrelasi`
--
ALTER TABLE `masterdata_jenisrelasi`
  MODIFY `id_jenisrelasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `masterdata_kategoripemesanan`
--
ALTER TABLE `masterdata_kategoripemesanan`
  MODIFY `id_kategoripemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `administrasi_sub_menu`
--
ALTER TABLE `administrasi_sub_menu`
  ADD CONSTRAINT `administrasi_sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `administrator_menu` (`id_menu`);

--
-- Ketidakleluasaan untuk tabel `masterdata_instansirelasi`
--
ALTER TABLE `masterdata_instansirelasi`
  ADD CONSTRAINT `masterdata_instansirelasi_ibfk_1` FOREIGN KEY (`id_jenisrelasi`) REFERENCES `masterdata_jenisrelasi` (`id_jenisrelasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
