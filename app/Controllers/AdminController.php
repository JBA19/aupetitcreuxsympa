<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PlatsModel;
use App\Models\AdminModel;


class AdminController extends BaseController
{
    // public function index()
    // {
        
    //     $data = [];
        
    //     if($this->request->getMethod() == 'post')
    //     {
    //         $rules = 
    //         [
    //             'email' => 
    //             [
    //                 'rules' => 'required|valid_email',
    //                 'errors' =>
    //                 [
    //                     'required' => 'Merci de renseigner votre adresse mail.',
    //                     'valid_email' => 'Votre adresse mail semble incorrecte. Merci de bien vouloir vérifier'
    //                 ]
    //             ],
    //             'password' =>
    //             [
    //                 'rules' => 'required|validateUser[email,password]',
    //                 'errors' => 
    //                 [
    //                     'required' => 'Veuillez entrer votre mot de passe', 
    //                     'validateUser' => 'Vos informations de connexion ne correspondent pas',
    //                 ]
    //             ]
    //         ];
    //         if (!$this->validate($rules)) 
    //         {
    //             $data['validation'] = $this->validator;
    //         } else {
    //             $model = new AdminModel();
    //             $user = $model->where('email', $this->request->getVar('email'))
    //                           ->first();
    //             $this->setUserSession($user);
    //             return redirect()->to('/zone51/dashboard');

    //         }
    //     } 
    //     echo view('templates/header', $data);
    //     echo view('admin/connexion');
    // }

    // private function setUserSession($user){
    //     $data = [
    //         'id' => $user['id'],
    //         'email' => $user['email'],
    //         'name' => "Gilbert",
    //         'isLoggedIn' => TRUE,
    //     ];

    //     session()->set($data);
    //     return TRUE;
    // }

    // public function dashboard(){

    //     $data = [];
    //     echo view('admin/header');
    //     echo view('admin/dashboard');
    // }


    // public function insert(){
          
    //     if($this->request->getMethod() == 'post')
    //     {
    //         $rules = 
    //         [
    //             'nom' => 
    //             [
    //                 'rules' => 'required|is_unique[plats.nom]',
    //                 'errors' =>
    //                 [
    //                     'required' => 'Merci de renseigner votre adresse mail.',
    //                     'is_unique' => 'Il semblerait que ce plat soit déjà enregistré.'
    //                 ]
    //             ],
    //             'description' => 
    //             [
    //                 'rules' => 'max_length[50]',
    //                 'errors' =>
    //                 [
    //                     'max_length' => 'Merci de bien vouloir créer une description plus courte (50 caractères max).',
    //                 ]
    //             ],
    //             'prix' =>
    //             [
    //                 'rules' => 'required|decimal',
    //                 'errors' => 
    //                 [
    //                     'required' => 'Veuillez entrer votre mot de passe', 
    //                     'decimal' => 'Il doit s\'agir d\'un chiffre',
    //                 ]
    //             ],
    //             'menu' =>
    //             [
    //                 'rules' => 'decimal',
    //                 'errors' => 
    //                 [
    //                     'decimal' => 'Il doit s\'agir d\'un chiffre',
    //                 ]
    //             ]
    //         ];
    //         if (!$this->validate($rules)) 
    //         {
    //             $data['validation'] = $this->validator;
    //         } else {
    //             $model = new PlatsModel();
    //             $newData = [
    //                 'nom' => $this->request->getVar('nom'),
    //                 'description' => $this->request->getVar('description'),
    //                 'prix' => $this->request->getVar('prix'),
    //                 'menu' => $this->request->getVar('menu'),
    //                 // 'commande' => $this->request->getVar('commande'),                    
    //             ];
    //             $model->save($newData);
    //             $session = session();
    //             $session->setFlashdata('success', 'Insertion réussie');
    //             return redirect()->to('/zone51/dashboard/insert');
    //         }
    //     } 
    //     echo view('admin/header');
    //     echo view('admin/insert');
    // }

    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('admin/login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new AdminModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // Stroing session values
                $this->setUserSession($user);
                // Redirecting to dashboard after login
                return redirect()->to(base_url('zone51/dashboard'));

            }
        }
        return view('admin/login');
    }

    private function setUserSession($user)
    {
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

    public function register()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'phone_no' => 'required|min_length[9]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {

                return view('register', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new AdminModel();

                $newData = [
                    'name' => $this->request->getVar('name'),
                    'phone_no' => $this->request->getVar('phone_no'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to(base_url('admin/login'));
            }
        }
        return view('register');
    }

    public function profile()
    {

        $data = [];
        
        $model = new AdminModel();

        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('profile', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('zone51/login');
    }


}