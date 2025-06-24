-- SQL script to create table 'rekam_medis' in database 'meditech'

CREATE TABLE IF NOT EXISTS rekam_medis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pasien VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    keluhan TEXT,
    diagnosa TEXT,
    tindakan TEXT,
    dokter VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
