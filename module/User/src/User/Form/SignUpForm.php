<?php
namespace User\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Factory as InputFactory;

class SignUpForm extends Form {
	
    protected $dbAdapter;
    
	public function __construct($options = null){
	    
	    parent::__construct('formSignUp');
	    
	    $this->setAttribute('method', 'post');
	    $this->setAttribute('id', "formSignUp");
	    
	    //email text input
	    $this->add(array(
	        'name' => 'email',
	        'type' => 'Zend\Form\Element\Email',
	        'attributes' => array(
	           'tabindex'=> '1', 
	            'maxlength' => '70', 
	            'value'=> ''
	        ),
	        'options' => array(
	            'label' => 'Email'
	        )
	    ));
	    
	    //password text input
	    $this->add(array(
	        'name' => 'password',
	        'type' => 'password',
	        'attributes' => array(
	            'tabindex'=> '2',
	            'value'=> ''
	        ),
	        'options' => array(
	            'label' => 'Password'
	        )
	    ));

	    //name text input
	    $this->add(array(
	        'name' => 'name',
	        'type' => 'Zend\Form\Element\Text',
	        'attributes' => array(
	            'tabindex'=> '3',
	            'value'=> ''
	        ),
	        'options' => array(
	            'label' => 'Name'
	        )
	    ));
	    
	    //surname text input
	    $this->add(array(
	        'name' => 'surname',
	        'type' => 'Zend\Form\Element\Text',
	        'attributes' => array(
	            'tabindex'=> '4',
	            'value'=> ''
	        ),
	        'options' => array(
	            'label' => 'Surname'
	        )
	    ));
	    
	    
	    //phone text input
	    $this->add(array(
	        'name' => 'phone',
	        'type' => 'Zend\Form\Element\Text',
	        'attributes' => array(
	            'tabindex'=> '5',
	            'value'=> ''
	        ),
	        'options' => array(
	            'label' => 'Phone number'
	        )
	    ));
	    
	    //female radio input
	    $this->add(array(
	        'name' => 'female',
	        'type' => 'Zend\Form\Element\Radio',
	        'attributes' => array(
	            'tabindex'=> '6',
	            'value'=> '1'
	        ),
	        'options' => array(
	            'label' => 'You are',
	            'value_options' => array('1'=>"Female", '0' => 'Male'),
	            'allow_empty' => false,
	        ),
	       
	    ));
	    
	    //submit button
	    $this->add(array(
	        'name' => 'submitButton',
	        'type' => 'submit',
	        'attributes'=> array(
	            'value' => 'Sign up',
	            'tabindex' => '7'
	        )
	    ));
	}
	
	
	public function getInputFilter()
	{

	    if (!$this->filter) {
	        $this->filter = new InputFilter();
	        $factory = new InputFactory();
	
	        //email filter
	        $this->filter->add($factory->createInput(array(
	            'name' => 'email',
	            'required' => true,
	            'validators' => array(
	                array(
	                    'name' => 'NotEmpty',
	                    'break_chain_on_failure' => true,
	                    'options' => array(
	                        'messages' => array(
	                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce an email.'
	                        )
	                    )
	                ),
	                array(
	                    'name' => 'EmailAddress',
	                    'options' => array(
	                        'messages' => array(
	                            \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Introduce valid email.'
	                        )
	                    )
	                ),
	                new \Zend\Validator\Db\NoRecordExists(
	                    array(
	                        'table'   => 'user',
	                        'field'   => 'email',
	                        'adapter' => $this->dbAdapter
                        )
	                )
	            ),
	             'filters' => array(
	                array('name' => 'StringTrim'),
	                array('name' => 'StripTags')
	            )
	        )));
	        
	       //password filter
	        $this->filter->add($factory->createInput(array(
	            'name' => 'password',
	            'required' => true,
	            'validators' => array(
	                array(
	                    'name' => 'NotEmpty',
	                    'break_chain_on_failure' => true,
	                    'options' => array(
	                        'messages' => array(
	                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce the password.'
	                        )
	                    )
	                ),
	                array(
	                    'name' => 'StringLength',
	                    'options' => array(
	                        'min' => 6,
	                        'messages' => array(
	                            \Zend\Validator\StringLength::TOO_SHORT => 'Password should have at least 6 characters.'
	                        )
	
	                    )
	                )
	            ),
	            'filters' => array(
	                array('name' => 'StringTrim'),
	                array('name' => 'StripTags')
	            )
	        )));
	        
	        //name filter
	        $this->filter->add($factory->createInput(array(
	            'name' => 'name',
	            'required' => true,
	            'validators' => array(
	                array(
	                    'name' => 'NotEmpty',
	                    'break_chain_on_failure' => true,
	                    'options' => array(
	                        'messages' => array(
	                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce name.'
	                        )
	                    )
	                ),
	            ),
	            'filters' => array(
	                array('name' => 'StringTrim'),
	                array('name' => 'StripTags')
	            )
	        )));
	        
	        //surname filter
	        $this->filter->add($factory->createInput(array(
	            'name' => 'surname',
	            'required' => true,
	            'validators' => array(
	                array(
	                    'name' => 'NotEmpty',
	                    'break_chain_on_failure' => true,
	                    'options' => array(
	                        'messages' => array(
	                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce surname.'
	                        )
	                    )
	                ),
	            ),
	            'filters' => array(
	                array('name' => 'StringTrim'),
	                array('name' => 'StripTags')
	            )
	        )));
	        
	        //phone filter
	        $this->filter->add($factory->createInput(array(
	            'name' => 'phone',
	            'required' => true,
	            'validators' => array(),
	            'allow_empty' => true,
	            'filters' => array(
	                array('name' => 'StringTrim'),
	                array('name' => 'StripTags')
	            )
	        )));
	        
	        //female filter
	        $this->filter->add($factory->createInput(array(
	            'name' => 'female',
	            'required' => true,
	            'validators' => array(
	                array(
	                    'name' => 'NotEmpty',
	                    'break_chain_on_failure' => true,
	                    'options' => array(
	                        'messages' => array(
	                            \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce gender.'
	                        )
	                    )
	                ),
	            ),
	            'filters' => array(
	                array('name' => 'StringTrim'),
	                array('name' => 'StripTags')
	            )
	        )));
	    }
	    return $this->filter;
	}
	
	public function setDbAdapter($adapter){
	    $this->dbAdapter = $adapter;
	}
}