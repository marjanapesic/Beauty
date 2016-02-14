<?php 

namespace User\Service;

class UserService {
    
    public function createPassword($password)
    {
        $bcrypt = new \Zend\Crypt\Password\Bcrypt();
        return $bcrypt->create($password);
    } 
    
    
}
?>