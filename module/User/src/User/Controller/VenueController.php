<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Venue;


class VenueController extends AbstractActionController
{

    public function signUpAction()
    {
        $signUpForm = $this->getServiceLocator()->get('User\Form\VenueSignUpForm');

        if($this->getRequest()->isPost()){
            $signUpForm->setData($this->getRequest()->getPost());
            if($signUpForm->isValid()){

                $venue = new Venue();
                $data = $signUpForm->getData();

                $venue->setName($data['name']);
                $venue->setZip('11000');
                $venue->setLat(10);
                $venue->setLng(10);
                $venue->setAddress($data['address']);
                $venue->setMunicipalityId($data['municipality']);
                $venue->setDescription($data['description']);
                $venue->setPhone1($data['phone1']);
                $venue->setPhone2($data['phone2']);
                $venue->setPhone3($data['phone3']);
                $venue->setUrl($data['url']);

                $venue->setMoOpen($data['workdaysOpen']);
                $venue->setTuOpen($data['workdaysOpen']);
                $venue->setWeOpen($data['workdaysOpen']);
                $venue->setThOpen($data['workdaysOpen']);
                $venue->setFrOpen($data['workdaysOpen']);
                $venue->setSaOpen($data['saOpen']);
                $venue->setSuOpen($data['suOpen']);
                $venue->setMoClose($data['workdaysClose']);
                $venue->setTuClose($data['workdaysClose']);
                $venue->setWeClose($data['workdaysClose']);
                $venue->setThClose($data['workdaysClose']);
                $venue->setFrClose($data['workdaysClose']);
                $venue->setSaClose($data['saClose']);
                $venue->setSuClose($data['suClose']);

                $this->getEM()->persist($venue);
                $this->getEM()->flush();
            }

        }
        $messages = $signUpForm->getMessages();

        return new ViewModel(array('form' => $signUpForm));
    }


    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEM()
    {
        return $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
    }
}
