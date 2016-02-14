<?php

namespace User\Factory\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class VenueSignUpFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator) {

        /** @var \Application\Mapper\MunicipalityMapper $municipalityMapper */
        $municipalityMapper = $serviceLocator->get('Application\Mapper\MunicipalityMapper');

        $signUpForm = new \User\Form\VenueSignUpForm($municipalityMapper);
        $signUpForm->setDbAdapter($serviceLocator->get('Zend\Db\Adapter\Adapter'));
        return $signUpForm;
    }
}