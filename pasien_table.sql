-- SQL script to create database 'meditech' and table 'pasien'

CREATE DATABASE IF NOT EXISTS meditech;
USE meditech;

CREATE TABLE IF NOT EXISTS pasien (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(255),
    tanggal_lahir DATE,
    jenis_kelamin ENUM('L','P'),
    no_telepon VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
