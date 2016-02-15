<?php
//
//
//namespace User\Controller;
//
//use Zend\Mvc\Controller\AbstractActionController;
//use Zend\Form\Annotation\AnnotationBuilder;
//use Zend\View\Model\ViewModel;
//use Zend\Session\Container;
//use Zend\Authentication\AuthenticationService;
//
//use Application\Mapper\UserMapper;
//use User\Service\RecoverPasswordMailService;
//use User\Form\RecoverPasswordForm;
//
//class RecoverPasswordController extends AbstractActionController{
//
//	/** @var UserMapper  */
//	protected $userMapper;
//
//	/** @var RecoverPasswordMailService  */
//	protected $mailService;
//
//	/** @var RecoverPasswordForm  */
//	protected $recoverPasswordForm;
//
//	/** @var AuthenticationService  */
//	protected $authService;
//
//	public function __construct(AuthenticationService $authService, UserMapper $mapper, RecoverPasswordMailService $mailService, RecoverPasswordForm $form){
//
//		$this -> userMapper = $mapper;
//		$this -> mailService = $mailService;
//		$this -> recoverPasswordForm = $form;
//		$this -> authService = $authService;
//	}
//
//
//	//function recoverPasswordAction
//	//returns:
//	//$result: -1 -if get request; 0 -if post request and error occured; 1 -post request successfully changed password
//	//$error: 0 -internal error; 1 -user not found
//
//	public function recoverPasswordAction() //usermapper, UserRecoverPasswordMailService, recoverPasswordForm
//	{
//
//		if($this -> authService -> hasIdentity()){
//			return $this->redirect()->toRoute('user_route');
//		}
//		$session = new Container('mainSession');
//
//		$request = $this->getRequest();
//		$uri = $request->getURI()->getPath();
//		$prg = $this->prg($uri, true);// false if it is get, response if it is post
//
//		if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
//
//			$session->recoverPassword = $request->getPost()->toArray();
//			return $prg;
//		}
//
//		$result = -1;
//		$error = -1;
//		$email = "";
//
//		if(isset($session -> recoverPassword)){
//
//			$this -> recoverPasswordForm ->setData($session -> recoverPassword);
//			$session -> recoverPassword = null;
//
//			if($this -> recoverPasswordForm -> isValid()){
//
//				$data = $this -> recoverPasswordForm -> getData();
//
//				$email= $data['email'];
//				$selectedUsers = $this -> userMapper->findByEmail($email);
//
//				if(count($selectedUsers) == 0){
//					$result = 0;
//					$error = 1; //user not found
//				}
//				else{
//					$user = $selectedUsers->current();
//					$newPwd = substr(uniqid(""),0,8);
//
//					$user->setUsu_pwd(md5($newPwd));
//					$result = $this -> userMapper->updateEntity($user);
//					if($result == 0){
//						$error = 0; //internal error
//					}
//					else{
//						//$mailService = $this->getServiceLocator()->get('UserRecoverPasswordMailService');
//						$userNameSurname = $user->getUsu_nombre()." ".$user->getUsu_apellidos();
//						try{
//							$this -> mailService ->sendMail($userNameSurname, $email, $newPwd);
//						}
//						catch (\Exception $e){
//							var_dump($e -> getMessage());
//							$result = 0;
//							$error = 0;
//						}
//					}
//
//				}
//			}
//		}
//		//El layout de users da error en el navegador, imprime dos veces el idioma (/es/es/)
//		$this->layout()->setTemplate('layout/layout');
//		$viewModel = new ViewModel();
//		$viewModel -> setTemplate('user/user/recover-password.phtml');
//		return $viewModel -> setVariables(array('form' => $this -> recoverPasswordForm, 'result'=> $result, 'error' => $error, 'email' => $email));
//	}
//
//}