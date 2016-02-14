<?php

namespace Application\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;

class DbAdapterFactory implements FactoryInterface {
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
		$config = $serviceLocator->get ( 'Config' );
		$dbParams = $config ['dbParams'];
		
		return new Adapter ( array (
				'driver' => $dbParams ['driver'],
				'dsn' => 'mysql:dbname=' . $dbParams ['database'] . ';host=' . $dbParams ['hostname'],
				'database' => $dbParams ['database'],
				'username' => $dbParams ['username'],
				'password' => $dbParams ['password'],
				'hostname' => $dbParams ['hostname'],
				'driver_options' => array (
						\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8" 
				) 
		) );
	}
}