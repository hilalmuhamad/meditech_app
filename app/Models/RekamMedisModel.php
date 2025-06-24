<?php
namespace App\Models;

use CodeIgniter\Model;

class RekamMedisModel extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_pasien', 'tanggal', 'keluhan', 'diagnosa', 'tindakan', 'dokter'];
    protected $useTimestamps = true;
}
