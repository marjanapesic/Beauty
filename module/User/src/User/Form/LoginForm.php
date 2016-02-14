<?php
namespace User\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Factory as InputFactory;

class LoginForm extends Form {
	
	public function __construct($options = null){

		parent::__construct('formLoginUser');
		
		$this->setAttribute('method', 'post');
		$this->setAttribute('id', "formLoginUser");

		//email text area
		$attributes = array('type'=> 'Zend\Form\Element\Textarea', 'tabindex'=> '1', 'maxlength' => '70', 'value'=> '');
		$options = array('label' => 'Email');
		$this->createInputField('email', $attributes, $options);
		
		//password text area
		$attributes = array('type'=> 'password',  'tabindex'=> '2', 'value'=> '');
		$options = array('label' => 'Password');
		$this->createInputField("password", $attributes, $options);
		
		//submit button
		$this->add(array(
			'name' => 'buttonLogin',
			'type' => 'submit',
			'attributes'=> array(
				'value' => 'Log in',
				'tabindex' => '3'
			)
		));	
	}
	
	
	public function createInputField( $name,$attributes, $options){
	
		$this->add(array(
			'name' => $name,
			'attributes' => $attributes,
			'options' => $options
		));
	
	}
        
    public function getInputFilter()
    {
        if (!$this->filter) {
            
            $this->filter = new InputFilter();
            $factory = new InputFactory();
            
            $this->filter->add($factory->createInput(array(
                'name' => 'email',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce el email.'
                            )
                        )
                    ),
                    array(
                        'name' => 'EmailAddress',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Por favor, introduce un email válido.'
                            )
                        )
                    )
                ),
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    ),
                    array(
                        'name' => 'StripTags'
                    )
                )
            )));
            
            $this->filter->add($factory->createInput(array(
                'name' => 'password',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Introduce la contraseña.'
                            )
                        )
                    ),
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'min' => 6,
                            'messages' => array(
                                \Zend\Validator\StringLength::TOO_SHORT => 'La contraseña debe tener más de 6 carácteres.'
                            )
                            
                        )
                    )
                ),
                'filters' => array(
                    array(
                        'name' => 'StringTrim'
                    ),
                    array(
                        'name' => 'StripTags'
                    )
                )
            )));
        }
        return $this->filter;
    }
}