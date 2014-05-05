<?php

namespace Mft\BaseBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

abstract class AbstractService{
   
    /** @var ContainerInterface */
    protected $container;
    /** @var  EntityManager Description */
    protected $entityManager;
    
    public function __construct(Container $container){
        $this->container = $container;
        $this->entityManager = $container->get('doctrine')->getManager();
    }
}