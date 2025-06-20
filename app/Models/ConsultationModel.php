<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultationModel extends Model
{
    protected $table = 'consultations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'date', 'time', 'doctor_id', 'notes'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getConsultations()
    {
        return $this->findAll();
    }

    public function getConsultation($id)
    {
        return $this->find($id);
    }

    public function createConsultation($data)
    {
        return $this->insert($data);
    }

    public function updateConsultation($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteConsultation($id)
    {
        return $this->delete($id);
    }
}