<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view("admin/dashboard");
    }

    public function insert()
    {
          
        if($this->request->getMethod() == 'post')
        {
            $rules = 
            [
                'nom' => 
                [
                    'rules' => 'required|is_unique[plats.nom]',
                    'errors' =>
                    [
                        'required' => 'Merci de renseigner votre adresse mail.',
                        'is_unique' => 'Il semblerait que ce plat soit déjà enregistré.'
                    ]
                ],
                'description' => 
                [
                    'rules' => 'max_length[50]',
                    'errors' =>
                    [
                        'max_length' => 'Merci de bien vouloir créer une description plus courte (50 caractères max).',
                    ]
                ],
                'prix' =>
                [
                    'rules' => 'required|decimal',
                    'errors' => 
                    [
                        'required' => 'Veuillez entrer votre mot de passe', 
                        'decimal' => 'Il doit s\'agir d\'un chiffre',
                    ]
                ],
                'menu' =>
                [
                    'rules' => 'decimal',
                    'errors' => 
                    [
                        'decimal' => 'Il doit s\'agir d\'un chiffre',
                    ]
                ]
            ];
            if (!$this->validate($rules)) 
            {
                $data['validation'] = $this->validator;
            } else {
                $model = new PlatsModel();
                $newData = [
                    'nom' => $this->request->getVar('nom'),
                    'description' => $this->request->getVar('description'),
                    'prix' => $this->request->getVar('prix'),
                    'menu' => $this->request->getVar('menu'),
                    // 'commande' => $this->request->getVar('commande'),                    
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Insertion réussie');
                return redirect()->to('/dashboard/insert');
            }
        } 
        return view('admin/insert');
    }

    public function update() 
    {
        return view('admin/update');
    }

    public function delete() 
    {
        return view('admin/delete');
    }
}