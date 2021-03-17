<?php namespace App\Controllers;

use App\Models\ContentModel;

class GlobalController extends BaseController
{
	public function view($slug)
	{
		if ( ! is_file(APPPATH.'/Views/'.$slug.'.php'))
        {
        // Whoops, we don't have a page for that!
        throw new \CodeIgniter\Exceptions\PageNotFoundException($slug);
        }

        $model = new ContentModel();
        $data['titres'] = $model->getTitles($slug);
        $data['plats'] = $model->getMenus();
        // var_dump($data['plats']);
        echo view('templates/header', $data);
        echo view($slug);
        echo view('templates/footer');
    }
}
