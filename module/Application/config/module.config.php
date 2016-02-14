<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

$env = getenv('APPLICATION_ENV') ?: 'production';

return array(
    'router' => array(
		//'router_class' => 'Zend\Mvc\Router\Http\TranslatorAwareTreeRouteStack',
        'routes' => array(
	
            'index' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/[:action]',
					'constrains'     => array(
						'action' => 'getComboMoorings|index',
						//'lang' => 'en|es|fr|it|de|us|nl',
					),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
 
    'service_manager' => array(
		'initializers' => array(

		),
        'abstract_factories' => array(
            'Application\AbstractFactory\FormAbstractFactory',
            'Application\AbstractFactory\MapperAbstractFactory'
        ),
		'invokables' => array(
		    'Application\Model\MyAuthStorage' => 'Application\Model\MyAuthStorage',
		    'Application\Entity\User' => 'Appliation\Entity\User'
        ),		
		'factories' => array(
		    'AuthService' => 'Application\Factory\Service\AuthServiceFactory',
		    'Zend\Db\Adapter\Adapter' => 'Application\Factory\Service\DbAdapterFactory',
		),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'es_ES',
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
            'Application\Controller\Index' => 'Application\Controller\IndexController',
        ),
    ),
	'view_helpers' => array(
		'invokables' => array(
		),
		 'factories' => array(
        ),
	),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/500',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/index.phtml',
			//'layout/header'			=> __DIR__ .'/../view/layout/header.phtml',
		//	'layout/footer'			=> __DIR__ .'/../view/layout/footer.phtml',
            'layout/login'          => __DIR__ .'/../view/layout/login.phtml',
		    'layout/error' 			=> __DIR__ .'/../view/layout/error.phtml',
			'layout/nav'			=> __DIR__ .'/../view/layout/nav.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
			'error/500'				=> __DIR__ . '/../view/error/500.phtml',
        	'error/403'				=> __DIR__ . '/../view/error/403.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'Application_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Application/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' =>  'Application_driver'
                ),
            ),
        ),
    )
);