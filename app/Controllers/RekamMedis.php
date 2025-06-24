<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RekamMedisModel;

class RekamMedis extends BaseController
{
    public function index()
    {
        $model = new RekamMedisModel();
        $data['rekam'] = $model->orderBy('tanggal', 'DESC')->findAll();
        return view('rekam_medis', $data);
    }

    public function simpan()
    {
        $model = new RekamMedisModel();
        $data = [
            'nama_pasien' => $this->request->getPost('nama_pasien'),
            'tanggal' => $this->request->getPost('tanggal'),
            'keluhan' => $this->request->getPost('keluhan'),
            'diagnosa' => $this->request->getPost('diagnosa'),
            'tindakan' => $this->request->getPost('tindakan'),
            'dokter' => $this->request->getPost('dokter'),
        ];
        $model->insert($data);
        return redirect()->to('/rekam-medis')->with('success', 'Rekam medis berhasil ditambahkan!');
    }
}
