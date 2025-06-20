<?php

namespace App\Controllers;

use App\Models\ConsultationModel;

class ConsultationController extends BaseController
{
    protected $consultationModel;

    public function __construct()
    {
        $this->consultationModel = new ConsultationModel();
    }

    public function schedule()
    {
        // Load the view for scheduling a consultation
        return view('consultations/schedule');
    }

    public function list()
    {
        // Get all consultations from the model
        $data['consultations'] = $this->consultationModel->findAll();
        
        // Load the view to list consultations
        return view('consultations/list', $data);
    }

    public function details($id)
    {
        // Get consultation details by ID
        $data['consultation'] = $this->consultationModel->find($id);
        
        // Load the view to display consultation details
        return view('consultations/details', $data);
    }
}