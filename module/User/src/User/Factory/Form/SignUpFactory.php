<?php

namespace User\Factory\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SignUpFactory implements FactoryInterface {
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
	
		$signUpForm = new \User\Form\SignUpForm();
		$signUpForm->setDbAdapter($serviceLocator->get('Zend\Db\Adapter\Adapter'));
		return $signUpForm;
	}
}