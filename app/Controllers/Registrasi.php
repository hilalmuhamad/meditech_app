<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;

class Registrasi extends BaseController
{
    public function index()
    {
        return view('registrasi_pasien');
    }

    public function simpan()
    {
        $pasienModel = new PasienModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'no_telepon' => $this->request->getPost('no_telepon'),
        ];
        $pasienModel->insert($data);
        return redirect()->to('/registrasi')->with('success', 'Registrasi pasien berhasil!');
    }
}
