<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ControllerAPI extends ResourceController
{
    protected $modelName = 'App\Models\ReclamationModel'; // corrected property name
    protected $format = 'json';

    public function index()
    {
        $data = [
            'message' => 'success',
            'data' => $this->model->findAll() // corrected property name
        ];

        return $this->respond($data, 200);
    }


    public function store()
    {
        $rules = $this->validate([
            'CorpReclamation' => 'required|min_length[3]|max_length[50]',
            'DateReclamation' => 'required|valid_date[Y-m-d]'
        ]);

        if (!$rules) {
            $reponse = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($reponse);
        }

        $newRec =  $this->model->insert([
            'CorpReclamation' => esc($this->request->getVar('CorpReclamation')),
            'DateReclamation' => esc($this->request->getVar('DateReclamation'))
        ]);
        $response = [
            'message' => 'success',
            'newRec' => $newRec
        ];
        return $this->respondCreated($response);
    }

    public function delete($id = null)
    {

        if ($this->model->find($id)) {

            $this->model->delete($id);

            return $this->respondDeleted([
                'message' => 'has been deleted'
            ]);
        } else {
            $message  = [
                'message' => 'reclamation not found'
            ];
            return $this->respond($message, 404);
        }
    }

    public function update($id = null)
    {

        $rules = $this->validate([
            'CorpReclamation' => 'required|min_length[5]',
            'DateReclamation' => 'required|valid_date[Y-m-d]'
        ]);

        if (!$rules) {
            $err = [
                'message' => $this->validator->getErrors()
            ];
            return $this->failValidationErrors($err);
        } else {
            $this->model->update($id ,  [
                'CorpReclamation' => esc($this->request->getVar('CorpReclamation')),
                'DateReclamation' => esc($this->request->getVar('DateReclamation')),
            ]);

            return $this->respondUpdated([
                'message' => 'has been modified'
            ]);
        }
    }
}
