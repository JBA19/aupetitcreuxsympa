<?php namespace App\Controllers;

use App\Models\ContentModel;
use App\Models\PlatsModel;


class GlobalController extends BaseController
{
	public function view($slug)
	{
		if ( ! is_file(APPPATH.'/Views/'.$slug.'.php'))
        {
        // Whoops, we don't have a page for that!
        throw new \CodeIgniter\Exceptions\PageNotFoundException($slug);
        }

        $contentModel = new ContentModel();
        $data['titres'] = $contentModel->getTitles($slug);
        $platsModel = new PlatsModel();
        $data['plats'] = $platsModel->findAll();
        // var_dump($data['plats']);
        echo view('templates/header', $data);
        echo view($slug);
        echo view('templates/footer');
    }
}
