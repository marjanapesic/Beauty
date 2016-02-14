<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(

    'dbParams' => array(
        'driver'         => 'Pdo',
       // 'dsn'            => 'mysql:dbname=portbooker;host=localhost',
		'database'		=> 'dev_beauty',
		'hostname'		=> 'localhost',
        'username'=>'root',
        'password'=>'arborlabs',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
	/*'session' => array(
        'config' => array(
            'class' => 'Zend\Session\Config\SessionConfig',
            'options' => array(
                'name' => 'myapp',
                'use_cookies'         => true,
                'cookie_lifetime'     => 0,
                'cookie_httponly'     => true,
                'cookie_secure'       => false,
                'remember_me_seconds' => 1800
            ),
        ),
        'storage' => 'Zend\Session\Storage\SessionArrayStorage',
        'validators' => array(
            array(
                'Zend\Session\Validator\RemoteAddr',
                'Zend\Session\Validator\HttpUserAgent',
            ),
        ),
    ),*/
	
  /*'service_manager' => array(
        'factories' => array(
            'reCaptchaService' => 'Application\Factory\Service\ReCaptchaServiceFactory',
        ),
    ),
    'recaptcha' => array(
    		'name' => 'recaptcha',
    		'private_key' => "6LcqF_MSAAAAAGYmQ0y6_g2NQbJ7GN1b_WHvanJQ",
    		'public_key' => "6LcqF_MSAAAAAA9E0oZ0qHjSUmS7VD64EDWAQkbL",
    ),*/    
)
    ?>

);
