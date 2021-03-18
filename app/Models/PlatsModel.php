<?php

namespace App\Models;

use CodeIgniter\Model;

class PlatsModel extends Model
{
    protected $table = 'plats';
    protected $allowedFields = ['id', 'nom', 'description', 'prix', 'menu', 'commande'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data){
        if(!isset($data['data'])){

        }
        return $data;
    }

    protected function beforeUpdate(array $data){
        
        return $data;
    }
}