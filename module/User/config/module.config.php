<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
		'router_class' => 'Zend\Mvc\Router\Http\TranslatorAwareTreeRouteStack',
        'routes' => array(
			'login_route' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/{login_route}[:end]',
					'constraints'=> array(
						'end' => '(\/?)$'
					),
                    'defaults' => array(
                        'controller'    => 'User\Controller\User',
                        'action'        => 'login',
                    ),
                ),					
			),
			
			'logout_user_route' => array(
				'type'    => 'Segment',
                'options' => array(
                    'route'    => '/{logout_user_route}[:end]',
					'constraints'=> array(
						'end' => '(\/?)$'
					),
                    'defaults' => array(
                        
                        'controller'    => 'User\Controller\User',
                        'action'        => 'logout',
                    ),
                ),
			),

            'sign_up_route' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/{sign_up_route}[:end]',
                    'constraints'=> array(
                        'end' => '(\/?)$'
                    ),
                    'defaults' => array(
                        'controller'    => 'User\Controller\User',
                        'action'        => 'signUp',
                    ),
                ),
            ),
            
            'user_route' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/{user_route}[:end]',
                    'constraints'=> array(
                        'end' => '(\/?)$'
                    ),
                    'defaults' => array(
                        'controller'    => 'User\Controller\User',
                        'action'        => 'index',
                    ),
                ),
            ),
            
			'recover_password_route' => array(
				'type'    => 'Segment',
                'options' => array(
                    'route'    => '/{recover_password_route}[:end]',
					'constraints'=> array(
						'end' => '(\/?)$'
					),
                    'defaults' => array(         
                        'controller'    => 'User\Controller\RecoverPassword',
                        'action'        => 'recoverPassword',
                    ),
                ),
			),

			'business_index_route'  => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/{business_index_route}[:end]',
                    'constraints'=> array(
                        'end' => '(\/?)$'
                    ),
                    'defaults' => array(
                        'controller'    => 'User\Controller\Venue',
                        'action'        => 'signUp',
                    ),
                ),
			),
        ),
    ),
	'translator' => array(
        'translation_file_patterns' => array(
          
			array(
				'type' => 'phpArray',
				'base_dir' => __DIR__ . '/../language/routes',
				'pattern' => '%s.php',
			),
			
        ),
    ),
    'service_manager' => array(
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
		'invokables' => array(
			'User\Service\UserService' => 'User\Service\UserService'
		),
		'factories' => array(
		    'User\Form\SignUpForm' => 'User\Factory\Form\SignUpFactory',
		    'User\Form\VenueSignUpForm' => 'User\Factory\Form\VenueSignUpFactory',
		),
		'aliases' => array(
		),
    ),

    'controllers' => array(

       'factories' => array(
           'User\Controller\User' => 'User\Controller\UserControllerFactory',
           'User\Controller\Venue' => 'User\Controller\VenueControllerFactory',
	   ),
    ),
	'view_helpers' => array(
		'factories' => array(
			//'userIdentity' => 'User\Factory\View\Helper\UserIdentityFactory'
		)
	),
	'view_manager' => array(
		'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
		'template_map' => array(
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
);
