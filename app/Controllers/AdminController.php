<?php namespace App\Controllers;

use App\Controllers\BaseController;
// IMPORT LES REQUETES SQL NECESSAIRES AUX PAGES
use App\Models\AdminModel;


class AdminController extends BaseController
{
    public function login()
    {
// DEFINITION D'UNE VARIABLE GLOBALE QUI CONSERVERA LES DONNEES DU FORMULAIRE
        $data = [];
// PROCEDURE LORS DE L'ENVOI DU FORMULAIRE
        if ($this->request->getMethod() == 'post') {
// DEFINITION DES REGLES REGISSANT LE REMPLISSAGE DU FORMULAIRE ET L'AFFICHAGE DES ERREURS QUI EN DECOULENT
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email et/ou le mot de passe est incorrect",
                ],
            ];
// SI LE FORMULAIRE N'EST PAS CORRECTEMENT REMPLI, ON RENVOIT LA PAGE AVEC LES ERREURS DETECTEES
            if (!$this->validate($rules, $errors)) {
                return view('admin/login', [
                    "validation" => $this->validator,
                ]);
// SI LE FORMULAIRE EST CORRECTEMENT REMPLI...
            } else {
// ON CONSULTE LA BDD POUR VERIFIER L'EXISTENCE DE L'UTILISATEUR
                $model = new AdminModel();
                $user = $model->where('email', $this->request->getVar('email', FILTER_SANITIZE_STRING))
                    ->first();
// ON CREE UNE SESSION ADMIN ET ON CHARGE LE DASHBOARD
                    $this->setUserSession($user);
                return redirect()->to(base_url('zone51/dashboard'));

            }
        }
// AFFICHAGE DE LA PAGE DE LOGIN PAR DEFAUT
        return view('admin/login');
    }

    private function setUserSession($user)
    {
// ON STOCKE LES DONNEES UTILISEES POUR CREER LA SESSION ADMIN
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'phone_no' => $user['phone_no'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    // public function register()
    // {
    //     $data = [];

    //     if ($this->request->getMethod() == 'post') {
    //         //let's do the validation here
    //         $rules = [
    //             'name' => 'required|min_length[3]|max_length[20]',
    //             'phone_no' => 'required|min_length[9]|max_length[20]',
    //             'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
    //             'password' => 'required|min_length[8]|max_length[255]',
    //             'password_confirm' => 'matches[password]',
    //         ];

    //         if (!$this->validate($rules)) {

    //             return view('register', [
    //                 "validation" => $this->validator,
    //             ]);
    //         } else {
    //             $model = new AdminModel();

    //             $newData = [
    //                 'name' => $this->request->getVar('name'),
    //                 'phone_no' => $this->request->getVar('phone_no'),
    //                 'email' => $this->request->getVar('email'),
    //                 'password' => $this->request->getVar('password'),
    //             ];
    //             $model->save($newData);
    //             $session = session();
    //             $session->setFlashdata('success', 'Successful Registration');
    //             return redirect()->to(base_url('admin/login'));
    //         }
    //     }
    //     return view('register');
    // }

    // public function profile()
    // {

    //     $data = [];
        
    //     $model = new AdminModel();

    //     $data['user'] = $model->where('id', session()->get('id'))->first();
    //     return view('profile', $data);
    // }

    public function logout()
    {
// FONCTION DE DECONNEXION QUI DETRUIT LES INFORMATIONS DE SESSION
        session()->destroy();
        return redirect()->to('zone51/login');
    }


}