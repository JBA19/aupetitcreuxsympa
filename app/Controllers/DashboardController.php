<?php

namespace App\Controllers;
use App\Controllers\BaseController;
// IMPORT LES REQUETES SQL NECESSAIRES AUX PAGES
use App\Models\PlatsModel;

class DashboardController extends BaseController
{
    public function index()
    {
// APPEL A LA VUE DASHBOARD DE L'ESPACE ADMIN
        return view("admin/dashboard");
// TO DO
// 
// MODIFICATION JOURS/HEURES D'OUVERTURE ?
// STATS SUR LA FREQUENTATION DU SITE ?        
    }

    public function insert()
    {
// DEFINITION D'UNE VARIABLE GLOBALE QUI CONSERVERA LES DONNEES DU FORMULAIRE
        $data = [];
// PROCEDURE LORS DE L'ENVOI DU FORMULAIRE
        if($this->request->getMethod() == 'post')
        {
// DEFINITION DES REGLES REGISSANT LE REMPLISSAGE DU FORMULAIRE ET L'AFFICHAGE DES ERREURS QUI EN DECOULENT
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
// SI LE FORMULAIRE N'EST PAS CORRECTEMENT REMPLI, ON RENVOIT LA PAGE AVEC LES ERREURS DETECTEES
            if (!$this->validate($rules)) 
            {
                return view('admin/insert', [
                    "validation" => $this->validator,
                ]);
// SI LE FORMULAIRE EST CORRECTEMENT REMPLI...
            } else 
            {
// ... ON FAIT APPEL A LA BONNE TABLE DE LA BDD...
                $model = new PlatsModel();
// ...ON RECUPERE DANS UNE VARIABLE (TABLEAU) LES DONNEES DU FORMULAIRE EN LES FILTRANT...
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
// ... ET ON LES INSERE DANS LA BDD...
                $model->save($newData);
// ...TOUT EN ENVOYANT UN MESSAGE DE SUCCES LORS DE LA REDIRECTION
                $session = session();
                $session->setFlashdata('success', 'Insertion réussie');
                return redirect()->to('insert');
            }
        }
// AFFICHE DE LA VUE PAR DEFAUT
        return view('admin/insert');
    }

    public function update() 
    {
// DEFINITION D'UNE VARIABLE GLOBALE QUI CONSERVERA LES DONNEES DU FORMULAIRE
        $data = [];
// ON CHARGE LES DONNEES RELATIVES AUX PLATS
        $model = new PlatsModel();
// PROCEDURE LORS DE L'ENVOI DU FORMULAIRE
        if ($this->request->getMethod() == 'post') 
        {
// DEFINITION DES REGLES REGISSANT LE REMPLISSAGE DU FORMULAIRE ET L'AFFICHAGE DES ERREURS QUI EN DECOULENT
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
            ];
// SI LE FORMULAIRE N'EST PAS CORRECTEMENT REMPLI? ON RENVOIT LA PAGE AVEC LES ERREURS DETECTEES
			if (! $this->validate($rules)) 
            {
				$data['validation'] = $this->validator;
			} else 
// SI LE FORMULAIRE EST CORRECTEMENT REMPLI...
            {
// ...ON RECUPERE DANS UNE VARIABLE (TABLEAU) LES DONNEES DU FORMULAIRE EN LES FILTRANT...
                $updatedData = [
                    'id' => $this->request->getPost('plat-id', FILTER_SANITIZE_STRING),
                    'nom' => $this->request->getPost('nom', FILTER_SANITIZE_STRING),
                    'prix' => $this->request->getPost('prix', FILTER_SANITIZE_STRING),
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
// ... ON LES SAUVEGARDE DANS LA BDD...
                $model->save($updatedData);
// ... ET ON REDIRIGE EN ENVOYANT UN MESSAGE DE REUSSITE.
				session()->setFlashdata('success', 'Mise à jour réussie');
				return redirect()->to('/zone51/dashboard/update');
			}
        }
// CHARGEMENT DE LA VUE PAR DEFAUT ET DE TOUTES LES DONNEES CONCERNANT LES PLATS
        $data['plats'] = $model->findAll();
        return view('admin/update', $data);
    }

// FONCTION SUPPLEMENTAIRE AJOUTANT UNE ETAPE DE CONFIRMATION AVANT SUPPRESSION D'UN PLAT DANS LA BDD
    public function confirm() 
    {
        if ($this->request->getMethod() == 'post') 
        {
// ON RECUPERE LES INFORMATIONS DU PLAT QUE L'ON VEUT SUPPRIMER
            $model = new PlatsModel();
            $deletedData = [
                'numero' => $this->request->getPost('plat-id', FILTER_SANITIZE_STRING),
                'nom' => $this->request->getPost('nom', FILTER_SANITIZE_STRING),
            ];
// ON AFFICHE CES INFORMATIONS DANS UNE VUE QUI DEMANDE DE CONFIRMER 
            return view('admin/confirm', $deletedData);
        }
    }

    public function delete() 
    {
// SI LA SUPPRESSION EST CONFIRMEE
        if ($this->request->getMethod() == 'post') 
        {
// ON RECUPERE LA LIGNE DE LA BDD CORRESPONDANT A L'ID PRECEDEMMENT CHARGEE ET ON LA SUPPRIME
            $model = new PlatsModel();
            $model->where('id', $_POST['plat-id'])->delete();
// ON CONFIRME LA SUPPRESSION APRES LA REDIRECTION
            session()->setFlashdata('success', 'Suppression effectuée');
            return redirect()->to('/zone51/dashboard/update');
        }
    }
}