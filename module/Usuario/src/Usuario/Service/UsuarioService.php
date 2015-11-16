<?php
namespace Usuario\Service;

use Administracao\Service\AbstractService;
use Doctrine\ORM\EntityManager;
/**
 * Description of UsuarioService
 *
 * @author Marcelo
 */
class UsuarioService  extends AbstractService{
    
    public function __construct(EntityManager $em) {
        $this->entity = 'Usuario\Entity\Usuario' ;
        parent::__construct($em);
    }
}
