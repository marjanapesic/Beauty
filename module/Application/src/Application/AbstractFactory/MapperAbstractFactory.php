<?php 
namespace Application\AbstractFactory;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MapperAbstractFactory implements AbstractFactoryInterface {
	
	public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
		
		return (fnmatch('*Mapper', $requestedName)) ? true : false;
	}
	
	
	public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) {

		if (class_exists($requestedName)) {

			$mapper = new $requestedName($serviceLocator);
			
			return $mapper;
		}
	
		return false;
	}
}