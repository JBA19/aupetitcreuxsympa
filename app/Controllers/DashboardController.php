<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PlatsModel;

class DashboardController extends BaseController
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
                        'required' => 'Merci de renseigner le nom du plat.',
                        'is_unique' => 'Il semblerait que ce plat soit déjà enregistré.'
                    ]
                ],
                'description' => 
                [
                    'rules' => 'permit_empty|max_length[50]',
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
                        'required' => 'Veuillez entrer le prix du plat.', 
                        'decimal' => 'Il doit s\'agir d\'un chiffre',
                    ]
                ],
                'menu' =>
                [
                    'rules' => 'permit_empty|decimal',
                    'errors' => 
                    [
                        'decimal' => 'Il doit s\'agir d\'un chiffre',
                    ]
                ],
                'commande' =>
                [
                    'rules' => 'required',
                    'errors' => ['required' => 'Merci d\'indiquer si ce plat est sur commande ou pas'],
                ]
            ];
            if (!$this->validate($rules)) 
            {
                return view('admin/insert', [
                    "validation" => $this->validator,
                ]);
            } else 
            {
                $model = new PlatsModel();
                $newData = [
                    'nom' => $this->request->getVar('nom', FILTER_SANITIZE_STRING),
                    'prix' => $this->request->getVar('prix', FILTER_SANITIZE_STRING),
                    'commande' => $this->request->getVar('commande'),                    
                ];
                if(empty($_POST['description']))
                {
                    $newData['description'] = NULL;
                } else {
                    $newData['description'] = $this->request->getVar('description', FILTER_SANITIZE_STRING);
                };
                if(empty($_POST['menu']))
                {
                    $newData['menu'] = NULL;
                } else {
                    $newData['menu'] = $this->request->getVar('menu', FILTER_SANITIZE_STRING);
                }
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Insertion réussie');
                return redirect()->to('insert');
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