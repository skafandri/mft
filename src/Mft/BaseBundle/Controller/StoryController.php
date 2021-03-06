<?php

namespace Mft\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StoryController extends Controller
{
    public function indexAction()
    {
        return $this->render('MftBaseBundle:Default:index.html.twig');
    }
    
    public function viewAction($storyId){
        
    }
    
    public function newAction(){
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository('MftBaseBundle:StoryType');
        $storyTypes = $repository->findAll();
        return $this->render('MftBaseBundle:Story:new.html.twig', array('types' => $storyTypes));
    }
}
