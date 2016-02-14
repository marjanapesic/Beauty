<?php
namespace Application\Mapper;

use Application\Entity\Municipality;
use Zend\Db\TableGateway\TableGateway;

class MunicipalityMapper extends Mapper{


    public function __construct($serviceLocator)
    {
        parent::__construct('municipalities', $serviceLocator);
        $this->setEnityPrototype = new Municipality();

    }

    public function insertObject($user)
    {
        if(!($user instanceof Municipality))
            throw new \Exception();

        return parent::insert($this->hydrator->extract($user));
    }

    public function getHydrator()
    {
        return $this->hydrator;
    }

    public function getCollection(){
        $res = $this->select();
        return $this->hydrate($res);
    }

    public function hydrate($results){
		$hosts = new \Zend\Db\ResultSet\HydratingResultSet(
			$this->hydrator,
			$this->entityPrototype
		);

		return $hosts->initialize($results->toArray());
	}

}