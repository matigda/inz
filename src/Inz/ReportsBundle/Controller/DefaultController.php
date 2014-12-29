<?php

namespace Inz\ReportsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function redirectAction()
    {
        if($this->getUser()) {
            return $this->redirect($this->generateUrl('company'));
        } else {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

    }

}