<?php

//config/autoload/doctrine.global.php
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host' => 'localhost',
                    'port' => '3306',
                    'dbname' => 'dev_beauty',
                ),
                'doctrine_type_mappings' => array(
                    'enum' => 'string'
                )
            ),
        )
    )
);