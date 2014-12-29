<?php
namespace Inz\ReportsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends Controller
{
    public function changeLanguageAction(Request $request,$lang)
    {
        $languages = array('pl' => 'pl_PL', 'en' => 'en_US');
        
        $this->get('session')->set('_locale',$languages[$lang]);
        return $this->redirect($request->headers->get('referer'));
    }
}
