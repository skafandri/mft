<?php

namespace Mft\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MftBaseBundle:Default:index.html.twig');
    }
}
