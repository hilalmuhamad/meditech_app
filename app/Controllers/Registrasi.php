<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;

class Registrasi extends BaseController
{
    public function edit($id)
    {
        $pasienModel = new PasienModel();
        $pasien = $pasienModel->find($id);
        if (!$pasien) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pasien tidak ditemukan');
        }
        return view('edit_pasien', ['pasien' => $pasien]);
    }

    public function update($id)
    {
        $pasienModel = new PasienModel();
        $validation =  \Config\Services::validation();
        $rules = [
            'nama' => 'required|min_length[3]',
            'alamat' => 'permit_empty',
            'tanggal_lahir' => 'permit_empty|valid_date',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'no_telepon' => 'permit_empty|regex_match[/^[0-9+\- ]*$/]'
        ];
        if (!$this->validate($rules)) {
            $pasien = $pasienModel->find($id);
            return view('edit_pasien', [
                'pasien' => $pasien,
                'validation' => $validation
            ]);
        }
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'no_telepon' => $this->request->getPost('no_telepon'),
        ];
        $pasienModel->update($id, $data);
        return redirect()->to('/profil-pasien/' . $id)->with('success', 'Data pasien berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $pasienModel = new PasienModel();
        $pasienModel->delete($id);
        return redirect()->to('/daftar-pasien')->with('success', 'Data pasien berhasil dihapus!');
    }
    public function index()
    {
        return view('registrasi_pasien');
    }

    public function profil($id)
    {
        $pasienModel = new PasienModel();
        $pasien = $pasienModel->find($id);
        if (!$pasien) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pasien tidak ditemukan');
        }
        return view('profil_pasien', ['pasien' => $pasien]);
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
        $id = $pasienModel->insert($data, true); // true agar return id
        return redirect()->to('/profil-pasien/' . $id)->with('success', 'Registrasi pasien berhasil!');
    }
}
