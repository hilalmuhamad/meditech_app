-- SQL script to create table 'jadwal_konsultasi' in database 'meditech'

CREATE TABLE IF NOT EXISTS jadwal_konsultasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pasien VARCHAR(100) NOT NULL,
    tanggal_konsultasi DATE NOT NULL,
    jam_konsultasi TIME NOT NULL,
    dokter VARCHAR(100) NOT NULL,
    keluhan TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
