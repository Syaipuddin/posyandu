-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: posyandu
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `balita`
--

DROP TABLE IF EXISTS `balita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `balita` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `umur` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balita`
--

LOCK TABLES `balita` WRITE;
/*!40000 ALTER TABLE `balita` DISABLE KEYS */;
INSERT INTO `balita` VALUES (1,'Sabar','1','2022-12-01 00:00:00','3','1');
/*!40000 ALTER TABLE `balita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indikator`
--

DROP TABLE IF EXISTS `indikator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `indikator` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `balita_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imunisasi_dasar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukur_berat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukur_tinggi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konseling_gizi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kunjungan_rumah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `air_bersih` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jamban_sehat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akta_lahir` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jaminan_kesehatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengasuhan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indikator`
--

LOCK TABLES `indikator` WRITE;
/*!40000 ALTER TABLE `indikator` DISABLE KEYS */;
INSERT INTO `indikator` VALUES (1,'1','y','y','y','y','y','y',NULL,'y','y','y','2023-02-12 00:00:00','1');
/*!40000 ALTER TABLE `indikator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_02_18_110210_tbl_user',1),(6,'2022_08_18_150254_tbl_balita',1),(7,'2022_08_18_150438_tbl_indikator',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_anak`
--

DROP TABLE IF EXISTS `t_anak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_anak` (
  `no_bpjs` varchar(50) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_depan` varchar(25) NOT NULL,
  `nama_belakang` varchar(25) NOT NULL,
  `jenis_kelamin` enum('','L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  PRIMARY KEY (`no_bpjs`),
  KEY `no_kk` (`no_kk`),
  CONSTRAINT `t_anak_ibfk_1` FOREIGN KEY (`no_kk`) REFERENCES `t_warga` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_anak`
--

LOCK TABLES `t_anak` WRITE;
/*!40000 ALTER TABLE `t_anak` DISABLE KEYS */;
INSERT INTO `t_anak` VALUES ('11212121122','1277022207010002','Anak','1','L','2023-12-01'),('1212121212127','1277022207010002','Anak','2','P','2024-12-01'),('2312312312321','3454353452212122','Nuril','Kilam','L','2019-07-10'),('2348238472394','3287472387423847','ggigi','gigi','L','2019-07-01'),('2394723947329','2374637438793839','Arsya',' ','L','2019-07-15'),('2398483948394','2343243434343343','Nurils','koko','P','2017-06-07'),('2987283748234','2343243434343343','Amien','mien','P','2018-12-11'),('32424324243243','3534534534534534','b','Fadly','L','2019-01-19'),('3284782347834','3287472387423847','hula','jalu','L','2019-07-10'),('34234234234324','3534534534534534','a','Fadly','P','2018-12-24'),('3454353453453','4565465464564564','Irsan','Aham','L','2019-01-20'),('34792374927433','3344874837493742','Gio','Stevani','P','2019-03-15'),('3947239847329','3287472387423847','gugu','gugu','P','2019-07-02'),('4757485748594','3298473847384739','Gio','M','L','2019-07-08'),('5546334251425','2346575648448474','Vivin','Duryani','P','2019-06-06'),('6655447363526','2346575648448474','Zuhri','Mulyani','L','2019-07-03'),('8324782374238','3287472387423847','hulu','hulu','P','2019-07-01');
/*!40000 ALTER TABLE `t_anak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cek_imunisasi`
--

DROP TABLE IF EXISTS `t_cek_imunisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_cek_imunisasi` (
  `no_cek_imunisasi` varchar(30) NOT NULL,
  `id_imunisasi` int(11) NOT NULL,
  `no_kunjungan` varchar(30) NOT NULL,
  `umur` varchar(25) NOT NULL,
  `tgl_cek_imunisasi` date NOT NULL,
  `catatan` text NOT NULL,
  `kode_panitia` varchar(25) NOT NULL,
  PRIMARY KEY (`no_cek_imunisasi`),
  KEY `kode_panitia` (`kode_panitia`),
  KEY `id_imunisasi` (`id_imunisasi`),
  KEY `no_kunjungan` (`no_kunjungan`),
  CONSTRAINT `t_cek_imunisasi_ibfk_1` FOREIGN KEY (`no_kunjungan`) REFERENCES `t_kunjungan` (`no_kunjungan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_cek_imunisasi_ibfk_2` FOREIGN KEY (`id_imunisasi`) REFERENCES `t_imunisasi` (`id_imunisasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_cek_imunisasi_ibfk_3` FOREIGN KEY (`kode_panitia`) REFERENCES `t_panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cek_imunisasi`
--

LOCK TABLES `t_cek_imunisasi` WRITE;
/*!40000 ALTER TABLE `t_cek_imunisasi` DISABLE KEYS */;
INSERT INTO `t_cek_imunisasi` VALUES ('CEK_0002',17,'KJG_0002','6 Bulan 3 Hari ','2019-07-22','-','slipi0002'),('CEK_0004',17,'KJG_0004','6 Bulan 2 Hari ','2019-07-22','-','slipi0002'),('CEK_0005',1,'KJG_0005','14 Hari ','2019-07-22','-','slipi0002'),('CEK_0006',17,'KJG_0008','6 Bulan 29 Hari ','2019-07-22','-','slipi0002'),('CEK_0007',18,'KJG_0009','6 Bulan 3 Hari ','2019-07-22','-','slipi0002'),('CEK_0008',18,'KJG_0010','6 Bulan 2 Hari ','2019-07-22','-','slipi0002'),('CEK_0009',4,'KJG_0011','14 Hari ','2019-07-22','-','slipi0002'),('CEK_0010',7,'KJG_0020','8 Hari ','2024-12-09','Imunisasi Polio','slipi0002');
/*!40000 ALTER TABLE `t_cek_imunisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cek_pertumbuhan`
--

DROP TABLE IF EXISTS `t_cek_pertumbuhan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_cek_pertumbuhan` (
  `no_cek_pertumbuhan` varchar(30) NOT NULL,
  `no_kunjungan` varchar(20) NOT NULL,
  `umur` varchar(25) NOT NULL,
  `tb` float NOT NULL,
  `bb` float NOT NULL,
  `tgl_cek_pertumbuhan` date NOT NULL,
  `hasil` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  `kode_panitia` varchar(25) NOT NULL,
  PRIMARY KEY (`no_cek_pertumbuhan`),
  KEY `kode_panitia` (`kode_panitia`),
  KEY `no_kunjungan` (`no_kunjungan`),
  CONSTRAINT `t_cek_pertumbuhan_ibfk_1` FOREIGN KEY (`no_kunjungan`) REFERENCES `t_kunjungan` (`no_kunjungan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_cek_pertumbuhan_ibfk_2` FOREIGN KEY (`kode_panitia`) REFERENCES `t_panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cek_pertumbuhan`
--

LOCK TABLES `t_cek_pertumbuhan` WRITE;
/*!40000 ALTER TABLE `t_cek_pertumbuhan` DISABLE KEYS */;
INSERT INTO `t_cek_pertumbuhan` VALUES ('CEK_0002','KJG_0002','6 Bulan 3 Hari ',70,5,'2019-07-22','Kurus','Silahkan Makan Yang Banyak','slipi0002'),('CEK_0004','KJG_0004','6 Bulan 2 Hari ',90,5,'2019-07-22','Kurus','Makan Yang Banyak','slipi0002'),('CEK_0005','KJG_0005','14 Hari ',80,15,'2019-07-22','Sangat Gemuk','jaga kesejatan , dan perbanyak olahraga','slipi0002'),('CEK_0006','KJG_0006','19 Hari ',68,5,'2019-07-22','Kurus','Perbanyak makan','slipi0002'),('CEK_0007','KJG_0007','12 Hari ',57,6,'2019-07-22','Normal','-','slipi0002'),('CEK_0008','KJG_0008','6 Bulan 29 Hari ',78,6,'2019-07-22','Kurus','','slipi0002'),('CEK_0009','KJG_0009','6 Bulan 3 Hari ',67,7,'2019-07-22','Normal','-','slipi0002'),('CEK_0010','KJG_0010','6 Bulan 2 Hari ',89,7,'2019-07-22','Kurus','-','slipi0002'),('CEK_0011','KJG_0011','14 Hari ',67,7,'2019-07-22','Normal','89','slipi0002'),('CEK_0012','KJG_0018','1 Bulan 6 Hari ',70,5,'2024-12-07','Kurus','Makan sikit nanti sakit','slipi0002'),('CEK_0013','KJG_0019','1 Tahun 7 Hari ',79,3,'2024-12-08','Kurus','','slipi0002'),('CEK_0014','KJG_0020','8 Hari ',77,3.12,'2024-12-09','Kurus','Penimbangan 1','slipi0002');
/*!40000 ALTER TABLE `t_cek_pertumbuhan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_imunisasi`
--

DROP TABLE IF EXISTS `t_imunisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_imunisasi` (
  `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_imunisasi` varchar(30) NOT NULL,
  `dari_usia` int(5) NOT NULL,
  `sampai_usia` int(5) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_imunisasi`),
  KEY `dari usia` (`dari_usia`,`sampai_usia`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_imunisasi`
--

LOCK TABLES `t_imunisasi` WRITE;
/*!40000 ALTER TABLE `t_imunisasi` DISABLE KEYS */;
INSERT INTO `t_imunisasi` VALUES (1,'HB',1,2,'   '),(2,'BCG',0,11,''),(3,'POLIO',0,12,''),(4,'DPT 1',2,12,''),(5,'HB 1',2,12,''),(6,'HiB 1',2,12,''),(7,'POLIO 2',2,12,''),(8,'DPT 2',3,12,''),(9,'HB 2',3,12,''),(10,'HiB 2',3,12,''),(11,'POLIO 3',3,12,''),(12,'DPT 3',4,12,''),(13,'HB 3',4,12,''),(14,'HiB 3',4,12,''),(15,'POLIO 4',4,12,''),(16,'IPV',4,12,''),(17,'CAMPAK',9,12,''),(18,'DPT LANJUTAN',18,24,''),(19,'HB',18,24,''),(20,'HiB LANJUTAN',18,24,''),(21,'CAMPAK LANJUTAN',18,24,'');
/*!40000 ALTER TABLE `t_imunisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_jadwal_kegiatan`
--

DROP TABLE IF EXISTS `t_jadwal_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_jadwal_kegiatan` (
  `no_kegiatan` varchar(30) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `lokasi` text NOT NULL,
  `kode_panitia` varchar(30) NOT NULL,
  PRIMARY KEY (`no_kegiatan`),
  KEY `kode_panitia` (`kode_panitia`),
  CONSTRAINT `t_jadwal_kegiatan_ibfk_1` FOREIGN KEY (`kode_panitia`) REFERENCES `t_panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_jadwal_kegiatan`
--

LOCK TABLES `t_jadwal_kegiatan` WRITE;
/*!40000 ALTER TABLE `t_jadwal_kegiatan` DISABLE KEYS */;
INSERT INTO `t_jadwal_kegiatan` VALUES ('20190722-181','test','2019-07-22','test','slipi0002'),('20190722-196','Imunisasi Dan Perkembangan Balita','2019-07-21','Sekretariat RT / RW','slipi0002'),('20190725-64','Pertumbuhan dan perkembangan anak','2019-07-25','Jakarta','slipi0002'),('20230527-28','Imunisasi Dan Perkembangan Balita','2023-05-27','Balai Desa','slipi0002'),('20241207-100','Imunisasi Dan Perkembangan Balita','2024-12-07','Jakarta','slipi0002'),('20241209-2','Penimbangan dan Imunisasi','2024-12-09','Jakarta','slipi0002'),('20241215-63','Test','2024-12-08','Jakarta','slipi0002');
/*!40000 ALTER TABLE `t_jadwal_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_kms`
--

DROP TABLE IF EXISTS `t_kms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_kms` (
  `no_kms` varchar(50) NOT NULL,
  `no_bpjs` varchar(50) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `berat_badan_lahir` float NOT NULL,
  `panjang_badan_lahir` float NOT NULL,
  PRIMARY KEY (`no_kms`),
  KEY `no_bpjs` (`no_bpjs`),
  CONSTRAINT `t_kms_ibfk_1` FOREIGN KEY (`no_bpjs`) REFERENCES `t_anak` (`no_bpjs`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_kms`
--

LOCK TABLES `t_kms` WRITE;
/*!40000 ALTER TABLE `t_kms` DISABLE KEYS */;
INSERT INTO `t_kms` VALUES ('kms_0003','32424324243243','2019-07-06',5.4,4.4),('kms_0005','3454353453453','2019-07-06',3,3),('kms_0007','34792374927433','2019-07-06',3,3),('kms_0008','34234234234324','2019-07-06',4,4),('kms_0009','2398483948394','2019-07-11',3.5,50),('kms_0010','2987283748234','2019-07-11',3.4,4.3),('kms_0011','2312312312321','2019-07-11',5,2),('kms_0012','6655447363526','2019-07-22',5,68),('kms_0013','4757485748594','2019-07-22',5,46),('kms_0014','11212121122','2024-12-07',300,30),('kms_0015','1212121212127','2024-12-09',3000,75);
/*!40000 ALTER TABLE `t_kms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_kunjungan`
--

DROP TABLE IF EXISTS `t_kunjungan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_kunjungan` (
  `no_kunjungan` varchar(20) NOT NULL,
  `id_kegiatan` varchar(20) NOT NULL,
  `no_antri` int(11) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `no_kms` varchar(30) NOT NULL,
  `status` enum('','selesai','proses','terlewat','antri') NOT NULL,
  PRIMARY KEY (`no_kunjungan`),
  KEY `no_kms` (`no_kms`),
  KEY `id_kegiatan` (`id_kegiatan`),
  CONSTRAINT `t_kunjungan_ibfk_1` FOREIGN KEY (`no_kms`) REFERENCES `t_kms` (`no_kms`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_kunjungan_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `t_jadwal_kegiatan` (`no_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_kunjungan`
--

LOCK TABLES `t_kunjungan` WRITE;
/*!40000 ALTER TABLE `t_kunjungan` DISABLE KEYS */;
INSERT INTO `t_kunjungan` VALUES ('KJG_0002','20190722-196',2,'2019-07-22','KMS_0003','selesai'),('KJG_0004','20190722-196',4,'2019-07-22','KMS_0005','selesai'),('KJG_0005','20190722-196',5,'2019-07-22','kms_0013','selesai'),('KJG_0006','20190722-196',6,'2019-07-22','KMS_0012','selesai'),('KJG_0007','20190722-196',7,'2019-07-22','KMS_0011','selesai'),('KJG_0008','20190722-196',8,'2019-07-22','KMS_0008','selesai'),('KJG_0009','20190722-181',9,'2019-07-22','KMS_0003','selesai'),('KJG_0010','20190722-181',10,'2019-07-22','KMS_0005','selesai'),('KJG_0011','20190722-181',11,'2019-07-22','KMS_0013','selesai'),('KJG_0012','20190725-64',12,'2019-07-25','KMS_0003','proses'),('KJG_0013','20190725-64',13,'2019-07-25','KMS_0005','proses'),('KJG_0014','20190725-64',14,'2019-07-25','KMS_0007','proses'),('KJG_0015','20230527-28',15,'2023-05-27','kms_0009','proses'),('KJG_0016','20230527-28',16,'2023-05-27','kms_0010','proses'),('KJG_0017','20230527-28',17,'2023-05-27','kms_0005','proses'),('KJG_0018','20241207-100',18,'2024-12-07','kms_0014','selesai'),('KJG_0019','20241215-63',19,'2024-12-08','kms_0014','selesai'),('KJG_0020','20241209-2',20,'2024-12-09','kms_0015','selesai');
/*!40000 ALTER TABLE `t_kunjungan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_panitia`
--

DROP TABLE IF EXISTS `t_panitia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_panitia` (
  `kode_panitia` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama_panitia` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `akses` varchar(10) NOT NULL,
  `login_terakhir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`kode_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_panitia`
--

LOCK TABLES `t_panitia` WRITE;
/*!40000 ALTER TABLE `t_panitia` DISABLE KEYS */;
INSERT INTO `t_panitia` VALUES ('slipi0001','admin','Ali Mochtar','admin','admin','2023-05-26 22:46:45'),('slipi0002','kader','Wahyu Alfarisi','kader','kader','2023-05-26 22:51:17'),('slipi0003','ketua','Junior Prabowo','ketua','ketua','2023-05-26 22:51:09');
/*!40000 ALTER TABLE `t_panitia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_warga`
--

DROP TABLE IF EXISTS `t_warga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_warga` (
  `no_kk` varchar(16) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nama_ayah` varchar(25) NOT NULL,
  `nama_ibu` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  PRIMARY KEY (`no_kk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_warga`
--

LOCK TABLES `t_warga` WRITE;
/*!40000 ALTER TABLE `t_warga` DISABLE KEYS */;
INSERT INTO `t_warga` VALUES ('1277022207010001','syaipuddinmudapane@gmail.','','','abc123','','','2024-11-25'),('1277022207010002','muda3332@gmail.com','Ayah','Ibu','abc123','Palmerah','082273287550','2024-11-25'),('2343243434343343','bagio@gmail.com','Gio','Mush','1234','Jakarta','081727822827','2019-07-11'),('2346575648448474','Endah@gmail.com','Sugeng','Murni','1234','Jakarta','081317726873','2019-07-22'),('2374637438793839','devtoolind@gmail.com','gakuh','widya','wahyuais','jakarta','08131772687','2019-07-17'),('3287472387423847','fufu@gmail.com','fufu','mumu','1234','jakarta','081317726873','2019-07-11'),('3298473847384739','wahyualfarisi30@gmail.com','John','Jennie','12345678','Jakarta','081317726873','2019-07-22'),('3344874837493742','dede@gmail.com','dede','didi','1234','jakarta pusat','081317726873','2019-06-08'),('3454353452212122','Hilam@gmail.com','jojo','kiki','1234','Jakarta','08712227276726','2019-07-11'),('3534534534534534','qwe@gmail.com','Fadly','Mumu','1234','Jakarta','081317726973','2019-06-08'),('4565465464564564','wahyu@gmail.com','wahyu','alfarisi','1234','jakarta','081317726873','2019-06-08');
/*!40000 ALTER TABLE `t_warga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'nip',
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=admin,2=kepala,3=pasien',
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=aktif, 0=non',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','$2y$10$7nbQ9WkS/CUbEsaJ61ZrpuKEL857w/oaRLAeztY3pXRrjqIXpZ6h.','1','1'),(2,'kapus','$2y$10$ehnYpRbwzOaejD96czcWluvdx3b7tKJ1GxY5Ve6OaAhENHntdl4ha','2','1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'posyandu'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-09 22:25:51
