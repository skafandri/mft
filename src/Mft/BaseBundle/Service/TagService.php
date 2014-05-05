<?php

namespace Mft\BaseBundle\Service;

class TagService extends AbstractService{
    
    
    public function getTags(){        
        $queryBuilder = $this->entityManager->createQueryBuilder()->select("t.id, t.tag")->from('MftBaseBundle:Tag', 't');
        $queryBuilder->getQuery()->execute();
        $tags = $queryBuilder->getQuery()->execute();
        
        return $tags;
    }
}