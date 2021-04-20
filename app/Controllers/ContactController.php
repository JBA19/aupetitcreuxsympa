<?php namespace App\Controllers;

use CodeIgniter\Controller;

class ContactController extends BaseController
{
    public function index()
    {
// DEFINITION D'UNE VARIABLE GLOBALE QUI CONSERVERA LES DONNEES DU FORMULAIRE
        $data = [];
// PROCEDURE LORS DE L'ENVOI DU FORMULAIRE
        if($this->request->getMethod() == 'post') 
        {
// DEFINITION DES REGLES REGISSANT LE REMPLISSAGE DU FORMULAIRE ET L'AFFICHAGE DES ERREURS QUI EN DECOULENT
            $rules = 
            [
                'name' => 
                [
                    'rules' => 'required',
                    'errors' => ['required' => 'Merci de préciser votre nom.']
                ],
                'tel' =>
                [
                    'rules' => 'integer|exact_length[10]',
                    'errors' => ['integer' => 'Votre numéro de téléphone ne doit comporter que des chiffres.', 'exact_length' => 'Votre numéro de téléphone n\'est pas au bon format.']
                ],
                'email' => 
                [
                    'rules' => 'required|valid_email',
                    'errors' =>
                    [
                        'required' => 'Merci de renseigner votre adresse mail.',
                        'valid_email' => 'Votre adresse mail semble incorrecte. Merci de bien vouloir vérifier'
                    ]
                ],
                'object' => 
                [
                    'rules' => 'required',
                    'errors' => ['required' => 'Merci d\'indiquer l\'objet de votre demande.']
                ],
                'message' => 
                [
                    'rules' => 'required',
                    'errors' => ['required' => 'Merci de formuler votre demande.']
                ],
            ];
// SI LES DONNEES ENVOYEES PAR LE FORMULAIRE RESPECTENT LES REGLES...
            if ($this->validate($rules)) 
            {
// ...ON CONFIGURE LE SERVICE EMAIL DE CODEIGNITER POUR ENVOYER A L'ADMIN...
                $email = \Config\Services::email();
                $email->setFrom($_POST['email'], $_POST['name']);
                $email->setTo('jba@test.local');
                $email->setSubject($_POST['object']);
                $email->setMessage('message de : ' . $_POST['civ'] . ' '. $_POST['name'] . ' : ' . $_POST['message'] . 'joignable au : ' . $_POST['tel']);

                $email->send();
// ... ET ON ENVOI UN ACCUSE RECEPTION...
                $emailConfirm = \Config\Services::email();
                $emailConfirm->setFrom('jba@test.local', 'Au petit creux sympa');
                $emailConfirm->setTo('jba@test.local');
                $emailConfirm->setSubject('Accusé réception de votre demande');
                $emailConfirm->setMessage('Madame, Monsieur. Nous avons bien reçu votre demande. Elle sera traitée dans les meilleurs délais. Cordialement.');

                $emailConfirm->send();
// ... PUIS ON REDIRIGE VERS UNE PAGE DE SUCCES
                return redirect()->to('contact/success');
            }
            else 
            {
// SI LE FORMULAIRE N'EST PAS CORRECTEMENT REMPL, ON REVIENT SUR LA PAGE EN AFFICHANT LES ERREURS
                return view('contact', [
                    "validation" => $this->validator,
                ]);
            }
        }
        else 
        {
// AFFICHAGE DE LA PAGE DE CONTACT
            return view('contact', $data);
        }
    }

    public function success() {
// AFFICHAGE DE LA PAGE EN CAS DE SUCCES DE L'ENVOI
        return view('contact/send');
    }
}