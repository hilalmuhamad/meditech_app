<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;

class DaftarPasien extends BaseController
{
    public function index()
    {
        $pasienModel = new PasienModel();
        $data['pasien'] = $pasienModel->orderBy('created_at', 'DESC')->findAll();
        return view('daftar_pasien', $data);
    }
}
