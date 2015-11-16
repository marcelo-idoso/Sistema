<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User;

return array(
    'router' => array(
        'routes' => array(
            'login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'login',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/user',
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller'    => 'User',
                        'action'        => 'login',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'User\Controller\User' => Controller\UserController::class,
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'user/index/index'        => __DIR__ . '/../view/user/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'di' => array(
        'instance' => array(
            'alias' => array(
                'user' => 'User\Controller\UserController'
            ),
            'user' => array(
                'parameters' => array(
                    'broker' => 'Zend\Mvc\Controller\PluginBroker'
                )
            ),
            'User\Event\Authentication' => array(
                'parameters' => array(
                    'userAuthenticationPlugin' => 'User\Controller\Plugin\UserAuthentication',
                    'aclClass'                 => 'User\Acl\Acl'
                )
            ),
            'User\Acl\Acl' => array(
                'parameters' => array(
                    'config' => include __DIR__ . '/acl.config.php'
                )
            ),
            'User\Controller\Plugin\UserAuthentication' => array(
                'parameters' => array(
                    'authAdapter' => 'Zend\Authentication\Adapter\DbTable'
                )
            ),
            'Zend\Authentication\Adapter\DbTable' => array(
                'parameters' => array(
                    'zendDb' => 'Zend\Db\Adapter\Mysqli',
                    'tableName' => 'users',
                    'identityColumn' => 'email',
                    'credentialColumn' => 'password',
                    'credentialTreatment' => 'SHA1(CONCAT(?, "secretKey"))'
                )
            ),
            'Zend\Db\Adapter\Mysqli' => array(
                'parameters' => array(
                    'config' => array(
                        'host' => 'localhost',
                        'username' => 'username',
                        'password' => 'password',
                        'dbname' => 'dbname',
                        'charset' => 'utf-8'
                    )
                )
            ),
            'Zend\Mvc\Controller\PluginLoader' => array(
                'parameters' => array(
                    'map' => array(
                        'userAuthentication' => 'User\Controller\Plugin\UserAuthentication'
                    )
                )
            ),
            'Zend\View\PhpRenderer' => array(
                'parameters' => array(
                    'options' => array(
                        'script_paths' => array(
                            'user' => __DIR__ . '/../views'
                        )
                    )
                )
            )
        )
    ),
);
