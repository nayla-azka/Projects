/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - db_profil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_profil` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_profil`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('nlNe31AiGtjE5bcgmXlaLdKRI4EXVUwJA1uY8zIL',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidm9LbE9DZDdxRHZnVkdTdXV6bW1wbm4ySkJQdm04TTdlckNyYkY1SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1740953499);

/*Table structure for table `tbl_artikel` */

DROP TABLE IF EXISTS `tbl_artikel`;

CREATE TABLE `tbl_artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi_artikel` longtext DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `tgl_buat` timestamp NULL DEFAULT current_timestamp(),
  `id_user` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_artikel` */

insert  into `tbl_artikel`(`id`,`category`,`judul`,`isi_artikel`,`gambar`,`tgl_buat`,`id_user`) values 
(4,'Prestasi','Artikel Pendidikan','<p><em>Reading&nbsp;</em>merupakan salah satu aspek yang dinilai dalam tes kemahiran bahasa Inggris seperti pada TOEFL atau pun IELTS.&nbsp;<em>Nah</em>, kalau berbicara tentang&nbsp;<em>reading&nbsp;</em>pasti tak lepas dari yang namanya kalimat dan teks bahasa Inggris.</p>\r\n<p>Pada umumnya, macam-macam teks yang akan kamu pelajari di artikel ini nggak jauh berbeda dengan jenis teks dalam bahasa Indonesia. Masing-masing teks tersebut memiliki tujuan/fungsi sosial masing-masing. Jadi,&nbsp;<em>yuk</em>&nbsp;kita cari tahu definisi, fungsi, struktur, dan contoh paragraf dari setiap teks-nya!</p>\r\n<p><strong>Pengertian Teks</strong></p>\r\n<p>Teks adalah sebuah tulisan yang disusun dengan kalimat yang memiliki konteks. Kalau dalam teori sastra, teks adalah segala benda yang dapat &ldquo;dibaca&rdquo;, baik benda tersebut berupa karya sastra, tanda jalan, atau gaya pakaian.</p>\r\n<p>Tapi, dalam hal ini, cakupannya hanya akan seputar &ldquo;tulisan&rdquo; saja ya,&nbsp;<em>guys</em>. Maka dari itu, setiap teks bahasa Inggris memiliki struktur dan kaidah kebahasaan (language feature) dalam penulisannya.</p>','reading.jpg','2024-09-24 11:43:18',1236),
(5,'Kegiatan','Camping atau Menginap di Sekolah','<p><em>For fun</em>&nbsp;dan untuk melatih kemandirian, pergi&nbsp;<em>camping</em>&nbsp;bersama kelompok pecinta alam atau pramuka bisa meninggalkan memori menyenangkan ketika sekolah. Jika lo malas untuk pergi jauh, tidak ada salahnya mencoba kegiatan seru di sekolah dengan menginap ketika kegiatan OSIS atau sekadar mengadakan kegiatan keakraban!&nbsp;</p>','camping.jpg','2024-09-24 11:44:47',1236),
(6,'Kegiatan','Eksperimen Sains','<p>Tidak harus ketika belajar, melakukan eksperimen sains juga bisa dilakukan di luar jam pelajaran loh! Zaman sekarang, banyak toko yang menyediakan&nbsp;<em>science kit</em>&nbsp;sederhana dengan berbagai macam percobaan. Eksperimen sains menjadi kegiatan seru di sekolah yang tidak boleh lo lewatkan, ya!</p>','sains.jpg','2024-09-24 11:45:52',1236),
(7,'Kegiatan','Go Green  ','<p>Lo bisa mencoba menanam pohon atau bibit tanaman lainnya di kebun sekolah yang telah disediakan sekolah. Selain belajar menyayangi alam dan udara sekitar akan lebih segar, merawat tumbuhan bisa menjadi&nbsp;<em>stress relief</em>&nbsp;lo ketika mumet belajar, loh! Tidak harus di kebun sekolah, kegiatan seru yang satu ini bisa lo mulai dengan merawat satu pot tanaman di kelas lo bersama teman-teman. Nantinya, satu kelas akan bertanggung jawab untuk merawat tumbuhan tersebut</p>','gogreen.jpg','2024-09-24 11:46:47',1236);

/*Table structure for table `tbl_chat` */

DROP TABLE IF EXISTS `tbl_chat`;

CREATE TABLE `tbl_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_chat` */

insert  into `tbl_chat`(`id`,`name`,`message`,`created_at`) values 
(31,'nayla','nnnkkn','2025-01-17 11:41:34'),
(32,'yyy','uuu','2025-01-17 11:41:47'),
(33,'pp','haiii','2025-01-23 18:09:46'),
(34,'pp','hfhfdgd','2025-01-23 18:10:03');

/*Table structure for table `tbl_contacts` */

DROP TABLE IF EXISTS `tbl_contacts`;

CREATE TABLE `tbl_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_contacts` */

insert  into `tbl_contacts`(`id`,`name`,`email`,`message`,`submitted_at`) values 
(5,'admin','admin@gmail.com','eee','2024-09-22 16:42:24'),
(6,'admin','admin@gmail.com','zsadsa','2024-09-22 16:45:37'),
(8,'ari','dfsdfsd@adasd.com','dfsdf','2024-11-15 15:12:53'),
(9,'nayla','nayla.azka1046@smk.belajar.id','ddsdsa','2025-01-12 17:30:14'),
(10,'nayla','naylaazka2007@gmail.com','sdada','2025-01-12 17:30:24');

/*Table structure for table `tbl_fasilitas` */

DROP TABLE IF EXISTS `tbl_fasilitas`;

CREATE TABLE `tbl_fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_fasilitas` varchar(200) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `id_user` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_fasilitas` */

insert  into `tbl_fasilitas`(`id`,`nm_fasilitas`,`keterangan`,`gambar`,`id_user`) values 
(7,'Gedung Sekolah','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod..','gedung1.jpg',1234),
(8,'Lapangan Olah Raga','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod..','lapangan.jpg',1234),
(9,'Lab Komputer','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod..','labkomputer.jpg',1234),
(10,'Mushola','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod..','mushola.jpg',1234),
(11,'Lapangan Parkir','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod..','parkir.jpeg',1234),
(12,'Ruang Serbaguna','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod..','ruangserbaguna.jpg',1234);

/*Table structure for table `tbl_guru` */

DROP TABLE IF EXISTS `tbl_guru`;

CREATE TABLE `tbl_guru` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(12) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_user` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_guru` */

insert  into `tbl_guru`(`id`,`nama_guru`,`email`,`alamat`,`telepon`,`gambar`,`id_user`) values 
(7,'Emily Park','emilypark@gmail.com','Apt. 940 69832 Napoleon Keys, West Rigobertocheste','740-468-4056','67c5a46312869.jpeg',NULL),
(8,'Ben Johnson','johnsonben@gmail.com','Suite 715 471 West Grove, Austinborough, NE 10026','591-268-9891','67c5a4cbe0249.jpg',NULL);

/*Table structure for table `tbl_pengunjung` */

DROP TABLE IF EXISTS `tbl_pengunjung`;

CREATE TABLE `tbl_pengunjung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) NOT NULL,
  `tanggal_kunjungan` datetime NOT NULL,
  `user_agent` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_pengunjung` */

insert  into `tbl_pengunjung`(`id`,`ip_address`,`tanggal_kunjungan`,`user_agent`) values 
(3,'::1','2024-10-01 03:59:41','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0'),
(4,'::2','2024-10-01 03:59:41','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0');

/*Table structure for table `tbl_profil` */

DROP TABLE IF EXISTS `tbl_profil`;

CREATE TABLE `tbl_profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `isi_profil` text DEFAULT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_profil` */

insert  into `tbl_profil`(`id`,`judul`,`isi_profil`,`jenis`,`gambar`,`id_user`) values 
(13,'Sejarah berdirinya Sekolah SMK 90594','<p data-start=\"25\" data-end=\"282\">SMK 90594 didirikan pada tahun 1995 sebagai bagian dari upaya pemerintah dalam meningkatkan kualitas pendidikan kejuruan di daerah. Awalnya, sekolah ini hanya memiliki dua jurusan, yaitu Teknik Mesin dan Akuntansi, dengan jumlah siswa yang masih terbatas.</p>\r\n<p data-start=\"284\" data-end=\"563\">Seiring berjalannya waktu, SMK 90594 mengalami perkembangan pesat. Pada awal tahun 2000-an, sekolah ini mulai menambah jurusan baru seperti Teknik Informatika, Tata Boga, dan Desain Grafis. Hal ini dilakukan untuk menyesuaikan dengan kebutuhan industri yang semakin berkembang.</p>\r\n<p data-start=\"565\" data-end=\"891\">Pada tahun 2010, SMK 90594 mendapatkan akreditasi A dari Badan Akreditasi Nasional, yang menjadi bukti kualitas pendidikan yang diterapkan di sekolah ini. Selain itu, berbagai kerja sama dengan perusahaan dan industri mulai dijalin, sehingga siswa mendapatkan kesempatan magang serta pengalaman kerja langsung sebelum lulus.</p>\r\n<p data-start=\"893\" data-end=\"1208\" data-is-last-node=\"\" data-is-only-node=\"\">Hingga saat ini, SMK 90594 terus berinovasi dalam metode pembelajaran, dengan menerapkan teknologi digital serta program kewirausahaan bagi siswa. Dengan visi menjadi sekolah kejuruan unggulan, SMK 90594 berkomitmen untuk mencetak lulusan yang siap kerja dan berdaya saing tinggi di dunia industri maupun wirausaha.</p>','Sejarah','678a15f198512.jpg',NULL),
(14,'Visi & Misi','<h3 data-start=\"31\" data-end=\"45\"><strong data-start=\"35\" data-end=\"43\">Visi</strong></h3>\r\n<p data-start=\"46\" data-end=\"221\"><em data-start=\"46\" data-end=\"219\">\"Menjadi sekolah kejuruan unggulan yang menghasilkan lulusan profesional, berkarakter, dan siap bersaing di dunia industri serta wirausaha berbasis teknologi dan inovasi.\"</em></p>\r\n<h3 data-start=\"223\" data-end=\"237\"><strong data-start=\"227\" data-end=\"235\">Misi</strong></h3>\r\n<ol data-start=\"238\" data-end=\"1020\">\r\n<li data-start=\"238\" data-end=\"359\"><strong data-start=\"241\" data-end=\"284\">Menyelenggarakan pendidikan berkualitas</strong> dengan kurikulum yang sesuai dengan perkembangan industri dan teknologi.</li>\r\n<li data-start=\"360\" data-end=\"456\"><strong data-start=\"363\" data-end=\"391\">Membentuk karakter siswa</strong> yang berintegritas, disiplin, dan memiliki jiwa kewirausahaan.</li>\r\n<li data-start=\"457\" data-end=\"576\"><strong data-start=\"460\" data-end=\"493\">Meningkatkan kompetensi siswa</strong> melalui praktik langsung dan kerja sama dengan dunia usaha dan industri (DU/DI).</li>\r\n<li data-start=\"577\" data-end=\"681\"><strong data-start=\"580\" data-end=\"612\">Menerapkan teknologi digital</strong> dalam proses pembelajaran untuk meningkatkan keterampilan abad 21.</li>\r\n<li data-start=\"682\" data-end=\"781\"><strong data-start=\"685\" data-end=\"723\">Menyediakan fasilitas yang memadai</strong> untuk menunjang pembelajaran yang efektif dan inovatif.</li>\r\n<li data-start=\"782\" data-end=\"901\"><strong data-start=\"785\" data-end=\"810\">Membina hubungan erat</strong> antara sekolah, dunia kerja, serta masyarakat dalam menciptakan lulusan yang kompetitif.</li>\r\n<li data-start=\"902\" data-end=\"1020\"><strong data-start=\"905\" data-end=\"953\">Mengembangkan program sertifikasi kompetensi</strong> bagi siswa agar memiliki nilai tambah saat memasuki dunia kerja.</li>\r\n</ol>\r\n<p data-start=\"1022\" data-end=\"1250\" data-is-last-node=\"\" data-is-only-node=\"\">Dengan visi dan misi ini, SMK 90594 berkomitmen untuk menjadi sekolah yang tidak hanya mencetak lulusan yang siap kerja tetapi juga memiliki kemampuan untuk berinovasi dan berkembang dalam berbagai bidang industri dan wirausaha.</p>','Visi','logo.png',NULL),
(15,'Sambutan Kepala Sekolah','<p data-start=\"47\" data-end=\"128\">Assalamu&rsquo;alaikum warahmatullahi wabarakatuh,<br data-start=\"91\" data-end=\"94\">Salam sejahtera bagi kita semua,</p>\r\n<p data-start=\"130\" data-end=\"325\">Puji dan syukur kita panjatkan ke hadirat Allah SWT atas segala rahmat dan karunia-Nya. Dengan penuh kebanggaan, saya menyampaikan sambutan ini sebagai bagian dari keluarga besar <strong data-start=\"309\" data-end=\"322\">SMK 90594</strong>.</p>\r\n<p data-start=\"327\" data-end=\"832\">SMK 90594 hadir sebagai lembaga pendidikan vokasi yang berkomitmen untuk mencetak lulusan yang tidak hanya memiliki kompetensi di bidangnya, tetapi juga berkarakter kuat, berintegritas, serta siap bersaing di dunia industri maupun wirausaha. Dengan perkembangan teknologi yang semakin pesat, kami terus berupaya menghadirkan inovasi dalam proses pembelajaran, baik melalui kurikulum berbasis industri, praktik langsung di dunia kerja, maupun penggunaan teknologi digital dalam kegiatan belajar mengajar.</p>\r\n<p data-start=\"834\" data-end=\"1155\">Kami percaya bahwa keberhasilan pendidikan tidak hanya ditentukan oleh sekolah semata, tetapi juga oleh dukungan penuh dari orang tua, industri, serta masyarakat luas. Oleh karena itu, kami mengajak semua pihak untuk terus bersinergi dalam membimbing dan mendukung peserta didik agar dapat mencapai prestasi terbaiknya.</p>\r\n<p data-start=\"1157\" data-end=\"1438\">Akhir kata, saya mengucapkan terima kasih kepada seluruh guru, staf, siswa, serta orang tua yang telah bersama-sama membangun dan mengembangkan SMK 90594 menjadi sekolah yang unggul dan berdaya saing. Mari kita terus bekerja keras dan berinovasi demi masa depan yang lebih cerah.</p>\r\n<p data-start=\"1440\" data-end=\"1491\"><strong data-start=\"1440\" data-end=\"1489\">Wassalamu&rsquo;alaikum warahmatullahi wabarakatuh.</strong></p>\r\n<p data-start=\"1493\" data-end=\"1560\" data-is-last-node=\"\" data-is-only-node=\"\">Hormat saya,<br data-start=\"1505\" data-end=\"1508\"><strong data-start=\"1508\" data-end=\"1533\">James Sterling</strong><br data-start=\"1533\" data-end=\"1536\">Kepala Sekolah SMK 90594</p>','Sambutan','67c57a20b068c.jpeg',NULL);

/*Table structure for table `tbl_sekolah` */

DROP TABLE IF EXISTS `tbl_sekolah`;

CREATE TABLE `tbl_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(200) DEFAULT NULL,
  `motto` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telepon` varchar(200) DEFAULT NULL,
  `wa` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_sekolah` */

insert  into `tbl_sekolah`(`id`,`nama_sekolah`,`motto`,`alamat`,`telepon`,`wa`,`instagram`,`facebook`,`twitter`,`youtube`,`email`,`gambar`) values 
(1,'SMK 90594','Terampil, Kreatif, Sukses!','831 Freddy Plains, East Eddiebury, GA 51320-1183','1-325-922-5766','1-267-539-8641','https://instagram.com/kami','https://facebook.com/','https://twitter.com/','https://youtube.com','kompeten90594@smk.sch.id','logo.png');

/*Table structure for table `tbl_slide` */

DROP TABLE IF EXISTS `tbl_slide`;

CREATE TABLE `tbl_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(225) DEFAULT NULL,
  `teks` text NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `tgl_create` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_slide` */

insert  into `tbl_slide`(`id`,`judul`,`teks`,`gambar`,`tgl_create`) values 
(1,'Sekolah Ramah Lingkungan','<p>Dengan lingkungan yang asri dan sejuk, SMK 90594 siap untuk GO GREEN!</p>','taman.jpg','2024-09-23 22:52:26'),
(2,'Mendukung Passion Siswa','<p>Segala macam passion siswa kami dukung dengan fasilitas-fasilitas yang mendukung</p>','gedung1.jpg','2025-01-12 19:08:23');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `passw` varchar(32) DEFAULT NULL,
  `nama_user` varchar(35) DEFAULT NULL,
  `level` enum('admin','Operator') DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=1243 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`username`,`passw`,`nama_user`,`level`,`gambar`) values 
(1241,'Clara','23d1e10df85ef805b442a922b240ce25','Clara Clerk','Operator','67c5616f62f58.jpg'),
(1242,'Freddy','eda56def9e82a3936a75aff3f4e66330','Freddy Sander','admin','67c576bb56c68.jpg');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
