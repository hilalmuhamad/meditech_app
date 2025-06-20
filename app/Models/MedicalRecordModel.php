<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicalRecordModel extends Model
{
    protected $table = 'medical_records';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'record_date', 'description', 'treatment', 'prescription'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getMedicalRecords($patientId = null)
    {
        if ($patientId) {
            return $this->where('patient_id', $patientId)->findAll();
        }
        return $this->findAll();
    }

    public function getMedicalRecord($id)
    {
        return $this->find($id);
    }

    public function addMedicalRecord($data)
    {
        return $this->insert($data);
    }

    public function updateMedicalRecord($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteMedicalRecord($id)
    {
        return $this->delete($id);
    }
}