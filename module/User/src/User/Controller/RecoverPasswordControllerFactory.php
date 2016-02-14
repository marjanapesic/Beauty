<?php
namespace User\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class RecoverPasswordControllerFactory implements FactoryInterface
{
	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		
		$serviceLocator = $serviceLocator->getServiceLocator();
		//$mapper = $serviceLocator->get('Advertising\Mapper\PublicidadTarifasGateway');

		$mapper = $serviceLocator -> get('Application\Mapper\UserMapper');
		$mailService = $serviceLocator -> get('User\Service\RecoverPasswordMailService');
		$form = $serviceLocator -> get('User\Form\RecoverPasswordForm');
		$authService = $serviceLocator -> get('AuthService');
		
		$controller =  new RecoverPasswordController($authService,$mapper, $mailService, $form);

		/** @var \Zend\EventManager\EventManager $events */
		$events     = $serviceLocator->get('EventManager');
		
		$events->attach('dispatch', function ($e) use ($controller) {
			$controller->layout()->setTemplate('userlayout');
		}, 100); // execute before executing action logic
		

		$controller->setEventManager($events);
		$controller->setServiceLocator($serviceLocator);
		return $controller;
	}

}