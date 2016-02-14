<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Zend\Stdlib\Hydrator\Reflection;

use User\Form\VenueSignUpForm;
use Application\Mapper\VenueMapper;
use Application\Entity\Venue;


class VenueController extends AbstractActionController
{

    /** @var VenueSignUpForm $signUpFOrm */
    protected $signUpForm;
    protected $venueMapper;

    public function __construct(VenueSignUpForm $venueSignUpForm, VenueMapper $venueMapper)
    {

        $this->signUpForm = $venueSignUpForm;
        $this->venueMapper = $venueMapper;
    }


    public function signUpAction()
    {
        if($this->getRequest()->isPost()){
            $this->signUpForm->setData($this->getRequest()->getPost());
            if($this->signUpForm->isValid()){
                $venue = new Venue();
                $hydrator = new Reflection();
                $data = $this->signUpForm->getData();
                $hydrator->hydrate($this->signUpForm->getData(), $venue);

                if($this->venueMapper->insertObject($venue))
                {
                   //todo: success
                }

                $this->flashmessenger()->addMessage("Error");
            }

            $messages = $this->signUpForm->getMessages();
        }

        return new ViewModel(array('form' => $this->signUpForm));
    }
}
