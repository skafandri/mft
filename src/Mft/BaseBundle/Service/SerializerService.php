<?php

namespace Mft\BaseBundle\Service;

use Mft\BaseBundle\Service\AbstractService;

class SerializerService extends AbstractService {

    public function serialize($data, $format = 'json') {
        /* @var \JMS\Serializer\Serializer $serializer */
        $serializer = $this->container->get('serializer');
        return $serializer->serialize($data, $format);
    }

}
