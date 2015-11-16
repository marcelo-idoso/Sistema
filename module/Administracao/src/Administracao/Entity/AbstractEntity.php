<?php

namespace Administracao\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Class AbstractEntity
 * @package Base\Entity
 */
abstract class AbstractEntity {

    /**
     * 
     * @param array $options
     */
    public function __construct(Array $options = []) {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($options, $this);
    }
    
    /**
     * @return array
     */
    public function toArray() {
        $hydrator = new ClassMethods();
        return $hydrator->extract($this);
    }
}
