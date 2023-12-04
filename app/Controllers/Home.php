<?php

namespace App\Controllers;

use App\Models\ReclamationModel;

class Home extends BaseController
{
    public function index()
    {

        $data = [];
        $data['main_content'] = 'Pages/welcome';
        $data['isFooter'] = True;
        echo view('InnerPages/template', $data);
    }
}
