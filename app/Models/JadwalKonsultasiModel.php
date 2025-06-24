<?php
namespace App\Models;

use CodeIgniter\Model;

class JadwalKonsultasiModel extends Model
{
    protected $table = 'jadwal_konsultasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_pasien', 'tanggal_konsultasi', 'jam_konsultasi', 'dokter', 'keluhan'];
    protected $useTimestamps = true;
}
