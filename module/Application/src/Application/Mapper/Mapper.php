<?php
/**
 * Created by PhpStorm.
 * User: Maka
 * Date: 04-Nov-15
 * Time: 1:57 PM
 */
namespace Application\Mapper;

use Zend\Db\TableGateway\TableGateway;

abstract class Mapper extends TableGateway{

    protected $adapter;
    protected $idCol = 'id';
    protected $entityPrototype = null;
    protected $hydrator;

    public function __construct($tableName, $adapter)
    {
        $this->adapter = $adapter;
        $this->tableName = $tableName;
        parent::__construct($this->tableName, $adapter);

        $this->hydrator = new \Application\ModelHydrator();
    }




    /**
     * @return array|string|\Zend\Db\Sql\TableIdentifier
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @param array|string|\Zend\Db\Sql\TableIdentifier $tableName
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

    /**
     * @return string
     */
    public function getIdCol()
    {
        return $this->idCol;
    }

    /**
     * @param string $idCol
     */
    public function setIdCol($idCol)
    {
        $this->idCol = $idCol;
    }

    /**
     * @return null
     */
    public function getEntityPrototype()
    {
        return $this->entityPrototype;
    }

    /**
     * @param null $entityPrototype
     */
    public function setEntityPrototype($entityPrototype)
    {
        $this->entityPrototype = $entityPrototype;
    }

    /**
     * @return mixed
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * @param mixed $hydrator
     */
    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;
    }


}