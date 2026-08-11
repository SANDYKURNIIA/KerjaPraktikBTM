CREATE TABLE `laporan_operasi` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `id_pelayanan` VARCHAR(50) NOT NULL,
  `tindakan_operasi` TEXT,
  `operasi_dimulai` VARCHAR(10) DEFAULT NULL,
  `operasi_selesai` VARCHAR(10) DEFAULT NULL,
  `diagnosa_pra_operasi` TEXT,
  `diagnosa_post_operasi` TEXT,
  `tanggal_operasi` DATE DEFAULT NULL,
  `nama_ahli_bedah` VARCHAR(100) DEFAULT NULL,
  `verifikasi` ENUM('Tidak memerlukan verifikasi','Menunggu verifikasi','Sudah diverifikasi') DEFAULT 'Tidak memerlukan verifikasi',
  `tanggal_verifikasi` DATE NULL,
  `dokter_verifikasi` VARCHAR(100) NULL,
  `ttd_dokter` VARCHAR(100) NULL,
  `staff` VARCHAR(100) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `laporan_operasi` (
  `id_pelayanan`, 
  `tindakan_operasi`, 
  `operasi_dimulai`, 
  `operasi_selesai`, 
  `diagnosa_pra_operasi`, 
  `diagnosa_post_operasi`, 
  `tanggal_operasi`, 
  `nama_ahli_bedah`, 
  `verifikasi`, 
  `staff`
) VALUES (
  'PEL123456', 
  'Appendektomi terbuka', 
  '08:30', 
  '10:00', 
  'Apendisitis akut', 
  'Apendisitis perforasi', 
  '2026-08-07', 
  'Dr. Budi Santoso, Sp.B', 
  'Tidak memerlukan verifikasi', 
  'Perawat Ani'
);
