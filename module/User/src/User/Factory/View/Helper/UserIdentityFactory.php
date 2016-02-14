<?php

namespace User\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserIdentityFactory implements FactoryInterface {
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		$serviceLocator = $serviceLocator-> getServiceLocator();
		
		$userIdentity = new \User\View\Helper\UserIdentity();
		$userIdentity->setAuthService($serviceLocator->get('AuthService'));
		return $userIdentity;
	}
}