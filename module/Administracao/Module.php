<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Administracao;

use Zend\Mvc\I18n\Translator;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;


class Module 
{
   
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        
        //Iniciando o Translator
        $translator = $e->getApplication()
                        ->getServiceManager()
                        ->get('translator');
        
        $translator->addTranslationFile(
                'phpArray', 
                './vendor/zendframework/zend-i18n-resources/languages/pt_BR/Zend_Validate.php', 
                'default', 
                'pt_BR'
                );

        \Zend\Validator\AbstractValidator::setDefaultTranslator(new Translator($translator));
        
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
