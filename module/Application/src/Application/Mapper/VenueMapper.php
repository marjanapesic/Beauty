<?php
namespace Application\Mapper;

use Application\Entity\Venue as VenueEntity;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class VenueMapper extends TableGateway{

    protected $tableName = 'venue';
    protected $idCol = 'id';
    protected $entityPrototype = null;
    protected $hydrator = null;

    public function __construct($adapter)
    {
        parent::__construct($this->tableName, $adapter);
        $this->entityPrototype = new VenueEntity();
        $this->hydrator = new \Zend\Stdlib\Hydrator\Reflection();
    }

    public function insertObject($venue)
    {
        if(!($venue instanceof VenueEntity))
            throw new \Exception();

        return parent::insert($this->hydrator->extract($venue));
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