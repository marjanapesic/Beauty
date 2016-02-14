<?php
namespace User\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use \User\Form\VenueSignUpForm;

class VenueControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {

        /** @var \Zend\ServiceManager\ServiceManager $services */
        $services   = $serviceLocator->getServiceLocator();

        /** @var \User\Form\VenueSignUpForm $venueSignUpForm */
        $venueSignUpForm = $services->get('User\Form\VenueSignUpForm');

        /** @var \Application\Mapper\VenueMapper $venueMapper */
        $venueMapper = $services -> get('Application\Mapper\VenueMapper');

        return new VenueController($venueSignUpForm, $venueMapper);
    }
}