<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name', 'last_name', 'dob', 'gender', 'contact_number', 'email', 'address'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getPatients()
    {
        return $this->findAll();
    }

    public function getPatient($id)
    {
        return $this->find($id);
    }

    public function createPatient($data)
    {
        return $this->insert($data);
    }

    public function updatePatient($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletePatient($id)
    {
        return $this->delete($id);
    }
}