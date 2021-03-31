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
        $data = [];
        if($this->request->getMethod() == 'post')
        {
            $rules = 
            [
                'nom' => 
                [
                    'rules' => 'required|is_unique[dwjb_plats.nom]',
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

        $data = [];
        $primaryKey = 'id';
        $model = new PlatsModel();
		if ($this->request->getMethod() == 'post') 
        {
			//let's do the validation here
			$rules = 
            [
                'nom' => 
                [
                    'rules' => 'required',
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
                // 'commande' =>
                // [
                //     'rules' => 'required',
                //     'errors' => ['required' => 'Merci d\'indiquer si ce plat est sur commande ou pas'],
                // ]
            ];

			if (! $this->validate($rules)) 
            {
				$data['validation'] = $this->validator;
			} else 
            {
                $updatedData = [
                    'id' => $this->request->getPost('plat-id', FILTER_SANITIZE_STRING),
                    'nom' => $this->request->getPost('nom', FILTER_SANITIZE_STRING),
                    'prix' => $this->request->getPost('prix', FILTER_SANITIZE_STRING),
                    // 'commande' => $this->request->getPost('commande'),                    
                ];
                if(empty($_POST['description']))
                {
                    $updatedData['description'] = NULL;
                } else 
                {
                    $updatedData['description'] = $this->request->getPost('description', FILTER_SANITIZE_STRING);
                };
                if(empty($_POST['menu']))
                {
                    $updatedData['menu'] = NULL;
                } else 
                {
                    $updatedData['menu'] = $this->request->getPost('menu', FILTER_SANITIZE_STRING);
                }
                $model->save($updatedData);

				session()->setFlashdata('success', 'Successfuly Updated');
				return redirect()->to('/zone51/dashboard/update');
			}
        }

        $data['plats'] = $model->findAll();
        return view('admin/update', $data);
    }

    public function confirm() 
    {
        if ($this->request->getMethod() == 'post') 
        {
            $model = new PlatsModel();

            $deletedData = [
                'numero' => $this->request->getPost('plat-id', FILTER_SANITIZE_STRING),
                'nom' => $this->request->getPost('nom', FILTER_SANITIZE_STRING),
            ];

            return view('admin/confirm', $deletedData);

        }
    }

    public function delete() 
    {
        if ($this->request->getMethod() == 'post') 
        {
            $model = new PlatsModel();
            $model->where('id', $_POST['plat-id'])->delete();
            session()->setFlashdata('success', 'Successfuly deleted');
            return redirect()->to('/zone51/dashboard/update');
        }
    }
}