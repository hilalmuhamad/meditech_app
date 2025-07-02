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
        $validation =  \Config\Services::validation();
        $rules = [
            'nama' => 'required|min_length[3]',
            'alamat' => 'permit_empty',
            'tanggal_lahir' => 'permit_empty|valid_date',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'no_telepon' => 'permit_empty|regex_match[/^[0-9+\- ]*$/]'
        ];
        if (!$this->validate($rules)) {
            return view('registrasi_pasien', [
                'validation' => $validation
            ]);
        }
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
