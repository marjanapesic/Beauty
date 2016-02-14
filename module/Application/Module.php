<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;



class Module
{
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
    
    public function onBootstrap(MvcEvent $e)
    {
        date_default_timezone_set('Europe/Belgrade');
        $app = $e->getTarget();
        $app->getEventManager()->attach('route', array($this, 'onPreRoute'), 100);
        
        $app->getServiceManager()->get('translator')->setLocale('sr_SP');

        $viewModel = $app->getMvcEvent()->getViewModel();
        $loginForm = $app->getServiceManager()->get('User\Form\LoginForm');
        $viewModel->loginForm = $loginForm;
        
    }
    
    public function onPreRoute($e){
    
        $app = $e->getTarget();
        $serviceManager = $app->getServiceManager();
        $router = $serviceManager->get('router');
        if($router instanceof \Zend\Mvc\Router\Http\TranslatorAwareTreeRouteStack){
            $router->setTranslator($serviceManager->get('translator'));
        }
    
    }
}