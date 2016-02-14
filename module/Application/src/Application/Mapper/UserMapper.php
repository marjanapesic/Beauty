<?php
namespace Application\Mapper;

use Application\Entity\User as UserEntity;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class UserMapper extends TableGateway{

	protected $tableName = 'user';
	protected $idCol = 'id';
	protected $entityPrototype = null;
	protected $hydrator = null;

	public function __construct($adapter)
	{
		parent::__construct($this->tableName, $adapter);
		$this->entityPrototype = new UserEntity();
		$this->hydrator = new \Zend\Stdlib\Hydrator\Reflection();
	}
	
	public function insertObject($user)
	{
	    if(!($user instanceof UserEntity))
	        throw new \Exception();
	    
	    return parent::insert($this->hydrator->extract($user));
	}
	
	public function getHydrator()
	{
	    return $this->hydrator;
	}

    /*public function hydrate($results){
		$hosts = new \Zend\Db\ResultSet\HydratingResultSet(
			$this->hydrator,
			$this->entityPrototype
		);

		return $hosts->initialize($results->toArray());
	}*/

}