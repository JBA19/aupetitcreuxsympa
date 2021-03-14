<?php namespace App\Controllers;

use CodeIgniter\Controller;

class ContactController extends BaseController
{
    public function index()
    {        
        $data = [];
        if($this->request->getMethod() == 'post') 
        {
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
            if ($this->validate($rules)) 
            {
                $email = \Config\Services::email();
                $email->setFrom($_POST['email'], $_POST['name']);
                $email->setTo('jba@test.local');
                $email->setSubject($_POST['object']);
                $email->setMessage('message de : ' . $_POST['civ'] . ' '. $_POST['name'] . ' : ' . $_POST['message'] . 'joignable au : ' . $_POST['tel']);

                $email->send();

                $emailConfirm = \Config\Services::email();
                $emailConfirm->setFrom('jba@test.local', 'Au petit creux sympa');
                $emailConfirm->setTo('jba@test.local');
                $emailConfirm->setSubject('Accusé réception de votre demande');
                $emailConfirm->setMessage('Madame, Monsieur. Nous avons bien reçu votre demande. Elle sera traitée dans les meilleurs délais. Cordialement.');

                $emailConfirm->send();
                return redirect()->to('contact/success');
            }
            else 
            {
                $data['validation'] = $this->validator;
                echo view('templates/header');
                echo view('contact', $data);
                echo view('templates/footer');
            }
        }
        else 
        {
            echo view('templates/header');
            echo view('contact', $data);
            echo view('templates/footer');
        }
    }

    public function success() {
        echo view('templates/header');
        echo view('contact/send');
        echo view('templates/footer');
    }
}