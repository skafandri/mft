<?php

namespace Mft\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class TagController extends Controller
{
    public function getTagsAjaxAction()
    {
        $tags =  $this->get('mft.base.tag')->getTags();
        /** @var \JMS\Serializer\Serializer */
        $serializer = $this->get('mft.base.serializer');
        
        $tags = $serializer->serialize($tags, 'json');
        return new JsonResponse($tags);
    }
}
