<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    public function getTitles($slug)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('titres');
        $builder->select('titre1, titre2, titre3, titre4, titre5, titre6');
        $builder->join('slug', 'titres.slug = slug.id');
        $builder->where('slug.slug', $slug);
        $query = $builder->get();
        $row = $query->getRowArray();
        if (isset($row))
        {
            return $row;
        }
        $db->close();
    }
}