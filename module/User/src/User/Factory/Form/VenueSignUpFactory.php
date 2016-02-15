<?php

namespace User\Factory\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class VenueSignUpFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator) {

        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $serviceLocator->get('doctrine.entitymanager.orm_default');

        $municipalities = $em->getRepository('Application\Entity\Municipalities')->findAll();

        $signUpForm = new \User\Form\VenueSignUpForm($municipalities);
        $signUpForm->setDbAdapter($serviceLocator->get('Zend\Db\Adapter\Adapter'));
        return $signUpForm;
    }
}