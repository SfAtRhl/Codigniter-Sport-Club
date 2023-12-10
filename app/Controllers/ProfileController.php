<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{

    public function index()
    {
        $data = [];
        $data['main_content'] = 'Pages/Profile';
        $user = new UserModel();
        $Cuser = $user
            ->where('PseudoNom', session()->get('PseudoNom'))->first();
        $data['data'] = $Cuser;

        $data['isFooter'] = False;
        echo view('InnerPages/template_date', $data);
    }

    public function update_info()
    {

        if ($this->request->getMethod() == 'post') {
            $user = new UserModel();

            $user
                ->where('PseudoNom', session()->get('PseudoNom'))
                ->set(['Nom' => $this->request->getPost("Nom")])
                ->set(['Prenom' => $this->request->getPost("Prenom")])
                ->set(['Email' => $this->request->getPost("Email")])
                ->update();
            return redirect()->back();
        }
    }
    public function update_password()
    {
        if ($this->request->getMethod() == 'post') {
            $user = new UserModel();
            $user->where('PseudoNom', session()->get('PseudoNom'))
                ->set(['Password' => password_hash($this->request->getPost('Password'), PASSWORD_DEFAULT),])
                ->update();


            return redirect()->back();
        }
    }

    public function destroy()
    {
        $user = new UserModel();
        $user->where('PseudoNom', session()->get('PseudoNom'))
            ->delete();
        session()->remove('PseudoNom');
        session()->destroy();


        return redirect()->to("/");
    }
    public function upload_image()
    {
        if ($this->request->getMethod() === 'post') {
            $image = $this->request->getFile('profile_image');
            $fileName = $image->getRandomName();
            $image->move('./uploads/', $fileName);
            $user = new UserModel();
            $user->where('PseudoNom', session()->get('PseudoNom'))
                ->set(['Image' => $fileName])
                ->update();
            return redirect()->back();
        }
    }
}
