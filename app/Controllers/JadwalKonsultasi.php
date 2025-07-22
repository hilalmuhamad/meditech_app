<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalKonsultasiModel;

class JadwalKonsultasi extends BaseController
{
    
    public function booking($id)
    {
        $model = new JadwalKonsultasiModel();
        $jadwal = $model->find($id);
        if (!$jadwal) {
            return redirect()->to('/jadwal-konsultasi')->with('success', 'Jadwal tidak ditemukan!');
        }
        // Cek status, jika sudah dibooking, tolak
        if (isset($jadwal['status']) && $jadwal['status'] === 'booked') {
            return redirect()->to('/jadwal-konsultasi')->with('success', 'Jadwal sudah dibooking!');
        }
        // Update status jadwal menjadi booked
        $model->update($id, ['status' => 'booked']);
        return redirect()->to('/jadwal-konsultasi')->with('success', 'Booking jadwal berhasil!');
    }
    public function index()
    {
        $model = new JadwalKonsultasiModel();
        $data['jadwal'] = $model->orderBy('tanggal_konsultasi', 'DESC')->findAll();
        return view('jadwal_konsultasi', $data);
    }

    public function simpan()
    {
        $model = new JadwalKonsultasiModel();
        $data = [
            'nama_pasien' => $this->request->getPost('nama_pasien'),
            'tanggal_konsultasi' => $this->request->getPost('tanggal_konsultasi'),
            'jam_konsultasi' => $this->request->getPost('jam_konsultasi'),
            'dokter' => $this->request->getPost('dokter'),
            'keluhan' => $this->request->getPost('keluhan'),
        ];
        $model->insert($data);
        return redirect()->to('/jadwal-konsultasi')->with('success', 'Jadwal konsultasi berhasil ditambahkan!');
    }
}
