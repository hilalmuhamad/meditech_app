<?php

namespace App\Controllers;

use App\Models\PatientModel;

class PatientController extends BaseController
{
    protected $patientModel;

    public function __construct()
    {
        $this->patientModel = new PatientModel();
    }

    public function register()
    {
        // Logic for patient registration
        if ($this->request->getMethod() === 'post') {
            $data = [
                'name' => $this->request->getPost('name'),
                'age' => $this->request->getPost('age'),
                'gender' => $this->request->getPost('gender'),
                'contact' => $this->request->getPost('contact'),
                'address' => $this->request->getPost('address'),
            ];
            $this->patientModel->save($data);
            return redirect()->to('/patients/list');
        }
        return view('patients/register');
    }

    public function list()
    {
        $data['patients'] = $this->patientModel->findAll();
        return view('patients/list', $data);
    }

    public function details($id)
    {
        $data['patient'] = $this->patientModel->find($id);
        return view('patients/details', $data);
    }
}