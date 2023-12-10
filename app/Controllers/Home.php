<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\ReclamationModel;

class Home extends BaseController
{
    public function index()
    {
        $data = [];
        // dd(session()->get('PseudoNom'));
        $eventModel = new EventModel();
        $data['events'] = $eventModel->findAll();
        $data['main_content'] = 'Pages/welcome';
        $data['isFooter'] = True;
        echo view('InnerPages/template', $data);
    }
}
