<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;

class RestReclamation extends ResourceController
{
    protected $modelName = 'App\Models\ReclamationModel';
    protected $format = 'json';

    public function index()
    {
        $data = $this->model->findAll();

        return $this->respond($data, 200);
    }
}
