<?php
 class User
 {
     private $id;
     private $email;
     private $password;

     public function __construct($id,$email,$password)
     {
         $this->setId($id);
         $this->setEmail($email);
         $this->setPassword($password);
     }


     public function getId()
     {
         return $this->id;
     }


     private function setId($id)
     {
         // проверить формат
         // проверить размер
         if (!is_int($id)) {
             throw new Exception('ыаваываываы');
         }
         $this->id = $id;
     }


     public function getEmail()
     {
         return $this->email;
     }


     private function setEmail($email)
     {
         $this->email = $email;
     }


     public function getPassword()
     {
         return $this->password;
     }


     private function setPassword($password)
     {
         $this->password = $password;
     }

 }

 $user = new User('34234','exmple@com.com', '123456');

 var_dump($user);




 class SignUpRequest
 {
     private $email;
     private $password;
     private $passwordConfirmation;

     public function __construct($email, $password, $passwordConfirmation)
     {
         $this->setEmail($email);
         $this->setPassword($password);
         $this->setPasswordConfirmation($passwordConfirmation);
     }

     private function assertPasswordEquals()
     {
         if ($this->password !== $this->passwordConfirmation){
             throw new Exception('Пароли неверны');
         }
     }

     public function getEmail()
     {
         return $this->email;
     }


     private function setEmail($email)
     {
         $this->email = $email;
     }


     public function getPassword()
     {
         return $this->password;
     }


     private function setPassword($password)
     {
         $this->password = $password;
     }


     public function getPasswordConfirmation()
     {
         return $this->passwordConfirmation;
     }


     private function setPasswordConfirmation($passwordConfirmation)
     {
         $this->passwordConfirmation = $passwordConfirmation;
     }


 }


$form = [
    'email' => 'example@com.com',
    'password' => '123456',
    'password_confirmation' => '123456'
];

 $request = new SignUpRequest($form['email'], $form['password'], $form['password_confirmation']);

 $user = new User(1,$request->getEmail(),$request->getPassword());

 function Usere() use $user->getPassword(){

}