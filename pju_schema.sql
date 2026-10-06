-- =====================================================================
-- pju_schema.sql  —  Skema REKONSTRUKSI aplikasi GIS PJU (SIMPEL-JALAN, CodeIgniter 4)
-- Dibangun dari analisis query/insert di app/Controllers, app/Models, app/Views,
-- karena database `pju` kosong dan tidak ada dump (.sql) di repo.
--
-- Semua tabel data KOSONG (hanya user admin + kategori jenis yang di-seed agar
-- aplikasi bisa dinavigasi). Untuk DATA ASLI, impor dump Anda (pju.sql):
--   Get-Content pju.sql -Raw | & "D:\xampp\mysql\bin\mysql.exe" -u root pju
-- Dump asli (mysqldump) biasanya DROP+CREATE tabel, jadi akan menimpa skema ini.
-- =====================================================================

DROP TABLE IF EXISTS `ruas_jalan`;
CREATE TABLE `ruas_jalan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_ruas` VARCHAR(255) DEFAULT NULL,
  `lat` VARCHAR(100) DEFAULT NULL,
  `long` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `jenis_perlengkapan`;
CREATE TABLE `jenis_perlengkapan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(100) DEFAULT NULL,
  `sub` INT DEFAULT NULL,
  `gambar` VARCHAR(255) DEFAULT NULL,
  `keterangan` VARCHAR(255) DEFAULT NULL,
  `icon` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `perlengkapan_jalan`;
CREATE TABLE `perlengkapan_jalan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_jenis` INT DEFAULT NULL,
  `id_ruasjalan` INT DEFAULT NULL,
  `nama` VARCHAR(255) DEFAULT NULL,
  `status` VARCHAR(10) DEFAULT NULL,
  `kondisi` VARCHAR(50) DEFAULT NULL,
  `lokasi` VARCHAR(255) DEFAULT NULL,
  `coordinate_lat` VARCHAR(100) DEFAULT NULL,
  `coordinate_lng` VARCHAR(100) DEFAULT NULL,
  `posisi` VARCHAR(100) DEFAULT NULL,
  `keterangan` TEXT,
  `gambar` VARCHAR(255) DEFAULT NULL,
  `id_gambar` INT DEFAULT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  `tipe_jalan` VARCHAR(100) DEFAULT NULL,
  `tgl_insert` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pengaduan`;
CREATE TABLE `pengaduan` (
  `id_pengaduan` INT NOT NULL AUTO_INCREMENT,
  `tgl_pengaduan` DATETIME DEFAULT NULL,
  `status` INT DEFAULT 0,
  `nama` VARCHAR(255) DEFAULT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  `id_perlengkapan` INT DEFAULT NULL,
  PRIMARY KEY (`id_pengaduan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) DEFAULT NULL,
  `password` VARCHAR(255) DEFAULT NULL,
  `nama` VARCHAR(100) DEFAULT NULL,
  `jabatan` VARCHAR(100) DEFAULT NULL,
  `profil` VARCHAR(255) DEFAULT NULL,
  `status` TINYINT DEFAULT 0,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `pju`;
CREATE TABLE `pju` (
  `id_pju` INT NOT NULL AUTO_INCREMENT,
  `id_perlengkapan_jalan` INT DEFAULT NULL,
  `catudaya` VARCHAR(10) DEFAULT NULL,
  `id_pel` VARCHAR(50) DEFAULT NULL,
  `jenis` VARCHAR(50) DEFAULT NULL,
  `jenis_lampu` VARCHAR(100) DEFAULT NULL,
  `daya_lampu` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`id_pju`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `lmandiri`;
CREATE TABLE `lmandiri` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_pju` INT DEFAULT NULL,
  `sumber` VARCHAR(100) DEFAULT NULL,
  `daya_panel` VARCHAR(100) DEFAULT NULL,
  `charger` VARCHAR(100) DEFAULT NULL,
  `baterai` VARCHAR(100) DEFAULT NULL,
  `kapasitas_baterai` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `idpel_terpasang`;
CREATE TABLE `idpel_terpasang` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tglpdl` VARCHAR(30) DEFAULT NULL,
  `tgl_nyala` VARCHAR(30) DEFAULT NULL,
  `idpel` VARCHAR(50) DEFAULT NULL,
  `nama` VARCHAR(255) DEFAULT NULL,
  `id_tarif` VARCHAR(50) DEFAULT NULL,
  `daya` VARCHAR(50) DEFAULT NULL,
  `lokasi` VARCHAR(255) DEFAULT NULL,
  `tgl_pasang` VARCHAR(30) DEFAULT NULL,
  `merk` VARCHAR(100) DEFAULT NULL,
  `type` VARCHAR(100) DEFAULT NULL,
  `no_meter` VARCHAR(100) DEFAULT NULL,
  `subkogol` VARCHAR(100) DEFAULT NULL,
  `kdgardu` VARCHAR(100) DEFAULT NULL,
  `no_tiang` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `tagihan`;
CREATE TABLE `tagihan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_pel` VARCHAR(50) DEFAULT NULL,
  `tarip` VARCHAR(50) DEFAULT NULL,
  `daya` DECIMAL(15,2) DEFAULT 0,
  `blth` VARCHAR(20) DEFAULT NULL,
  `kwh` DECIMAL(15,2) DEFAULT 0,
  `rpptl` DECIMAL(15,2) DEFAULT 0,
  `angs` DECIMAL(15,2) DEFAULT 0,
  `tagihan_pln` DECIMAL(15,2) DEFAULT 0,
  `materai` DECIMAL(15,2) DEFAULT 0,
  `total_pembayaran` DECIMAL(15,2) DEFAULT 0,
  `sts` VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `gambar_rambu`;
CREATE TABLE `gambar_rambu` (
  `id_gambar` INT NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(255) DEFAULT NULL,
  `gambar_rambu` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Seed: kategori jenis_perlengkapan yang dirujuk di kode (id 1,3,4,5)
-- ---------------------------------------------------------------------
INSERT INTO `jenis_perlengkapan` (`id`, `nama`, `sub`) VALUES
  (1, 'APILL', NULL),
  (3, 'Lampu PJU', NULL),
  (4, 'Rambu', NULL),
  (5, 'Marka', NULL);

-- Seed: admin default -> username `admin`, password `admin123` (bcrypt), status 1
INSERT INTO `user` (`username`, `password`, `nama`, `jabatan`, `status`) VALUES
  ('admin', '$2y$10$I.Df.aBE2Paksw2aFGp4f.ErrwUNGBtl.uZgILu0wg.5r/EjOs/Uq', 'Administrator', 'Admin', 1);
