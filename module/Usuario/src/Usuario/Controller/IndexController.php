<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuario\Controller;

use Administracao\Controller\abstractController;

class IndexController extends abstractController
{
      
   public function __construct() {
        $this->form = 'Usuario\Form\UsuarioForm';
        $this->controller = "usuario";
        $this->route = "usuario/default" ;
        $this->entity = 'Usuario\Entity\Usuario' ;
        $this->service = 'Usuario\Service\UsuarioService';
    }
}

