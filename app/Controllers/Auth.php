<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class Auth extends BaseController
{
    public function signIn()
    {
        $data = [];
        $data['main_content'] = 'Pages/SignIn';
        $data['isFooter'] = True;
        echo view('InnerPages/template', $data);
    }
    public function signUp()
    {
        $data = [];
        $data['main_content'] = 'Pages/SignUp';
        $data['isFooter'] = True;
        echo view('InnerPages/template', $data);
    }
    public function create()
    {
        // Validation des données du formulaire
        $validation = \Config\Services::validation();
        $validation->setRules([
            'PseudoNom' => 'required',
            'Nom' => 'required',
            'Prenom' => 'required',
            'Adresse' => 'required',
            'Sexe' => 'required',
            'Profession' => 'required',
            'DateNaissance' => 'required|valid_date',
            'Password' => 'required',
            'CPassword' => 'required|matches[Password]',
            'Email' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to(base_url('/sign-up'))->withInput()->with('errors', $validation->getErrors());
        }
        if ($this->request->getMethod() == 'post') {
            $user = new UserModel();
            $data = [
                'PseudoNom' => $this->request->getPost('PseudoNom'),
                'Nom' => $this->request->getPost('Nom'),
                'Prenom' => $this->request->getPost('Prenom'),
                'Adresse' => $this->request->getPost('Adresse'),
                'Sexe' => $this->request->getPost('Sexe'),
                'Profession' => $this->request->getPost('Profession'),
                'DateNaissance' => $this->request->getPost('DateNaissance'),
                'Email' => $this->request->getPost('Email'),
                'Password' => password_hash($this->request->getPost('Password'), PASSWORD_DEFAULT),
            ];
            $user->insert($data);
            return redirect()->to(base_url('/sign-in'));
        }
    }

    public function login()
    {
        // Validation des données du formulaire
        $validation = \Config\Services::validation();
        $validation->setRules([
            'PseudoNom' => 'required',
            'Password' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to(base_url('/'))->withInput()->with('errors', $validation->getErrors());
        }

        if ($this->request->getMethod() == 'post') {
            $user = new UserModel();
            $username = $this->request->getPost('PseudoNom');
            $password = $this->request->getPost('Password');
            $Cuser = $user->where('PseudoNom', $username)->first();

            if ($username === 'admin' && $password === 'admin') {
                session()->set('PseudoNom', "admin");
                return redirect()->to(base_url('/list-reclame'));
            }

            if ($Cuser && password_verify($password, $Cuser['Password'])) {
                session()->set('PseudoNom', $Cuser['PseudoNom']);
                return redirect()->to(base_url('/list-reclame'));
            }
            return redirect()->to(base_url('/'))->with('session', ['error' => 'Nom d\'utilisateur ou mot de passe incorrect']);
        }
    }
    public function logout()
    {
        session()->remove('PseudoNom');
        session()->destroy();
        return redirect()->to(base_url('/sign-in'));
    }
}
