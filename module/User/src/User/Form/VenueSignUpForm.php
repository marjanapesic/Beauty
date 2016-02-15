<?php
namespace User\Form;


use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

class VenueSignUpForm extends Form {

    protected $dbAdapter;


    public function __construct($municipalities, $options = null){

        parent::__construct('businessSignUp');

        $this->setAttribute('method', 'post');
        $this->setAttribute('id', "businessSignUp");

        //name text input
        $this->add(array(
            'name' => 'name',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'tabindex'=> '1',
                'maxlength' => '70',
                'value'=> ''
            )
        ));

        //address text input
        $this->add(array(
            'name' => 'address',
            'type' => 'Zend\Form\Element\TextArea',
            'attributes' => array(
                'tabindex'=> '2',
                'maxlength' => '120',
                'value'=> ''
            )
        ));

        $municipalityArray = [];
        /** @var \Application\Entity\Municipalities $municipality */
        foreach($municipalities as $municipality){
            $municipalityArray[$municipality->getId()] = $municipality->getName();
        }
        $this->add(array(
            'name' => 'municipality',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'value_options' => $municipalityArray
            )
        ));

        //description text input
        $this->add(array(
            'name' => 'description',
            'type' => 'Zend\Form\Element\TextArea',
            'attributes' => array(
                'tabindex'=> '3',
                'value'=> ''
            ),
        ));

        //phone1 text input
        $this->add(array(
            'name' => 'phone1',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'tabindex'=> '4',
                'value'=> ''
            ),
        ));


        //phone2 text input
        $this->add(array(
            'name' => 'phone2',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'tabindex'=> '5',
                'value'=> ''
            ),
        ));

        //phone3 text input
        $this->add(array(
            'name' => 'phone3',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'tabindex'=> '6',
                'value'=> ''
            ),
        ));

        //url text input
        $this->add(array(
            'name' => 'url',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'tabindex'=> '7',
                'value'=> ''
            ),
        ));

        //opening hours workdays time input
        $this->add(array(
            'name' => 'workdaysOpen',
            'type' => 'Zend\Form\Element\Time',
            'attributes' => array(
                'tabindex'=> '8',
            ),
            'options' => [
                'format' => 'H:i'
            ]
        ));


        //closing hours workdays time input
        $this->add(array(
            'name' => 'workdaysClose',
            'type' => 'Zend\Form\Element\Time',
            'attributes' => array(
                'tabindex'=> '9',
            ),
            'options' => [
                'format' => 'H:i'
            ]
        ));

        //opening hours Saturday time input
        $this->add(array(
            'name' => 'saOpen',
            'type' => 'Zend\Form\Element\Time',
            'attributes' => array(
                'tabindex'=> '10',
                'allowEmpty'=> true
            ),
            'options' => [
                'format' => 'H:i'
            ]
        ));

        //closing hours Saturday time input
        $this->add(array(
            'name' => 'saClose',
            'type' => 'Zend\Form\Element\Time',
            'attributes' => array(
                'tabindex'=> '11',
                'allowEmpty'=> true
            ),
            'options' => [
                'format' => 'H:i'
            ]
        ));

        //opening hours Sunday time input
        $this->add(array(
            'name' => 'suOpen',
            'type' => 'Zend\Form\Element\Time',
            'attributes' => array(
                'tabindex'=> '12',
                'allowEmpty'=> true,
            ),
            'options' => [
                'format' => 'H:i'
            ]
        ));

        //closing hours Sunday time input
        $this->add(array(
            'name' => 'suClose',
            'type' => 'Zend\Form\Element\Time',
            'attributes' => array(
                'tabindex'=> '13',
                'allowEmpty'=> true,

            ),
            'options' => [
                'format' => 'H:i'
            ]
        ));

        //submit button
        $this->add(array(
            'name' => 'submitButton',
            'type' => 'submit',
            'attributes'=> array(
                'value' => 'Sign up',
                'tabindex' => '14'
            )
        ));
    }


    public function getInputFilter()
    {
        if (!$this->filter) {
            $this->filter = new InputFilter();
            $factory = new InputFactory();

            $this->filter->add($factory->createInput([
                'name' => 'name',
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'address',
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'municipality',
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'description',
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'phone1',
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'phone2',
                'required' => false
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'phone3',
                'required' => false
            ]));


            $this->filter->add($factory->createInput([
                'name' => 'url',
                'required' => false
            ]));


            $this->filter->add($factory->createInput([
                'name' => 'workdaysOpen',
                'required' => false
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'workdaysClose',
                'required' => false
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'saOpen',
                'required' => false
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'saClose',
                'required' => false
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'suOpen',
                'required' => false
            ]));

            $this->filter->add($factory->createInput([
                'name' => 'suClose',
                'required' => false
            ]));
        }

        return $this->filter;
    }

//
//    public function getInputFilter()
//    {
//
//        if (!$this->filter) {
//            $this->filter = new InputFilter();
//            $factory = new InputFactory();
//
//            //email filter
//            $this->filter->add($factory->createInput(array(
//                'name' => 'email',
//                'required' => true,
//                'validators' => array(
//                    array(
//                        'name' => 'NotEmpty',
//                        'break_chain_on_failure' => true,
//                        'options' => array(
//                            'messages' => array(
//                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce an email.'
//                            )
//                        )
//                    ),
//                    array(
//                        'name' => 'EmailAddress',
//                        'options' => array(
//                            'messages' => array(
//                                \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Introduce valid email.'
//                            )
//                        )
//                    ),
//                    new \Zend\Validator\Db\NoRecordExists(
//                        array(
//                            'table'   => 'user',
//                            'field'   => 'email',
//                            'adapter' => $this->dbAdapter
//                        )
//                    )
//                ),
//                'filters' => array(
//                    array('name' => 'StringTrim'),
//                    array('name' => 'StripTags')
//                )
//            )));
//
//            //password filter
//            $this->filter->add($factory->createInput(array(
//                'name' => 'password',
//                'required' => true,
//                'validators' => array(
//                    array(
//                        'name' => 'NotEmpty',
//                        'break_chain_on_failure' => true,
//                        'options' => array(
//                            'messages' => array(
//                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce the password.'
//                            )
//                        )
//                    ),
//                    array(
//                        'name' => 'StringLength',
//                        'options' => array(
//                            'min' => 6,
//                            'messages' => array(
//                                \Zend\Validator\StringLength::TOO_SHORT => 'Password should have at least 6 characters.'
//                            )
//
//                        )
//                    )
//                ),
//                'filters' => array(
//                    array('name' => 'StringTrim'),
//                    array('name' => 'StripTags')
//                )
//            )));
//
//            //name filter
//            $this->filter->add($factory->createInput(array(
//                'name' => 'name',
//                'required' => true,
//                'validators' => array(
//                    array(
//                        'name' => 'NotEmpty',
//                        'break_chain_on_failure' => true,
//                        'options' => array(
//                            'messages' => array(
//                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce name.'
//                            )
//                        )
//                    ),
//                ),
//                'filters' => array(
//                    array('name' => 'StringTrim'),
//                    array('name' => 'StripTags')
//                )
//            )));
//
//            //surname filter
//            $this->filter->add($factory->createInput(array(
//                'name' => 'surname',
//                'required' => true,
//                'validators' => array(
//                    array(
//                        'name' => 'NotEmpty',
//                        'break_chain_on_failure' => true,
//                        'options' => array(
//                            'messages' => array(
//                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce surname.'
//                            )
//                        )
//                    ),
//                ),
//                'filters' => array(
//                    array('name' => 'StringTrim'),
//                    array('name' => 'StripTags')
//                )
//            )));
//
//            //phone filter
//            $this->filter->add($factory->createInput(array(
//                'name' => 'phone',
//                'required' => true,
//                'validators' => array(),
//                'allow_empty' => true,
//                'filters' => array(
//                    array('name' => 'StringTrim'),
//                    array('name' => 'StripTags')
//                )
//            )));
//
//            //female filter
//            $this->filter->add($factory->createInput(array(
//                'name' => 'female',
//                'required' => true,
//                'validators' => array(
//                    array(
//                        'name' => 'NotEmpty',
//                        'break_chain_on_failure' => true,
//                        'options' => array(
//                            'messages' => array(
//                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce gender.'
//                            )
//                        )
//                    ),
//                ),
//                'filters' => array(
//                    array('name' => 'StringTrim'),
//                    array('name' => 'StripTags')
//                )
//            )));
//        }
//        return $this->filter;
//    }

    public function setDbAdapter($adapter){
        $this->dbAdapter = $adapter;
    }
}