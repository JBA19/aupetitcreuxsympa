<?php namespace App\Controllers;
// IMPORT LES REQUETES SQL NECESSAIRES AUX PAGES
use App\Models\ContentModel;
use App\Models\PlatsModel;


class GlobalController extends BaseController
{
	public function view($slug)
	{
		if ( ! is_file(APPPATH.'/Views/'.$slug.'.php'))
        {
// ERREUR 404 SI LA PAGE DEMANDEE N'EXISTE PAS DANS LES VIEWS
        throw new \CodeIgniter\Exceptions\PageNotFoundException($slug);
        }
// NOUVEL OBJET QUI CHARGE LE CONTENU TYPIQUE DES PAGES
        $contentModel = new ContentModel();
        $data['titres'] = $contentModel->getTitles($slug);
// NOUVEL OBJET QUI CHARGE LES DONNEES RELATIVES AUX PLATS ET MENUS
        $platsModel = new PlatsModel();
        $data['plats'] = $platsModel->findAll();
// APPEL A LA VUE CORRESPONDANT A L'URL DEMANDEE ET INJECTION DES DONNEES PRECEDEMMENT CHARGEES
        return view($slug, $data);
    }
}
