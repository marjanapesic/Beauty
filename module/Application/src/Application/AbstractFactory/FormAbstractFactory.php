<?php 
namespace Application\AbstractFactory;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FormAbstractFactory implements AbstractFactoryInterface {
	
	
	public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) {

		if(((fnmatch('*Form', $requestedName)) ? true : false)) {
			if (class_exists($requestedName)){
				return true;
			}		
		}

		return false;
	}
	
	
	public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
		
		if (class_exists($requestedName)) {
			return new $requestedName();
		}
	
		return false;
	}
}