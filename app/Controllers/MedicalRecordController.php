<?php

namespace App\Controllers;

use App\Models\MedicalRecordModel;

class MedicalRecordController extends BaseController
{
    protected $medicalRecordModel;

    public function __construct()
    {
        $this->medicalRecordModel = new MedicalRecordModel();
    }

    public function add()
    {
        if ($this->request->getMethod() === 'post') {
            $data = [
                'patient_id' => $this->request->getPost('patient_id'),
                'record_details' => $this->request->getPost('record_details'),
                'date' => $this->request->getPost('date'),
            ];
            $this->medicalRecordModel->save($data);
            return redirect()->to('/medical_records/list');
        }

        return view('medical_records/add');
    }

    public function list()
    {
        $data['records'] = $this->medicalRecordModel->findAll();
        return view('medical_records/list', $data);
    }

    public function details($id)
    {
        $data['record'] = $this->medicalRecordModel->find($id);
        return view('medical_records/details', $data);
    }
}