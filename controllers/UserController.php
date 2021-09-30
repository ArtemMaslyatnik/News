<?php

include_once ROOT . '/models/User.php';

class UserController { 
    
    /**
     * Action для страницы "Регистрация"
     */
    public function actionRegistration() {
        //Обработка формы
        $email = '';
        $name = '';
        $password = '';
        $result = false;
        if (isset($_POST['submit'])) {
            
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
                        
            $errors = false;
            
            if(!User::checkEmail($email)){
              $errors[] = 'Неправильный email';  
            }
            
            if(!User::checkPassword($password)){
              $errors[] = 'Пароль не может быть короче 8 символов';  
            }
            
            if(!User::checkName($name)){
              $errors[] = 'Имя не может быть короче 2 симвалов';  
            }
            
            if(User::checkEmailExists($email)){
              $errors[] = 'Такой email уже используется';  
            }
            
            //$userId = User::chekUserData($email, $password);
            
           if ($errors == false) {
               $result = User::registration($name, $email, $password);
              
           }
      
        }

        require_once ROOT . '/view/user/registration.php';
        return true;
        
    }

    /**
     * Action для страницы "Вход на сайт"
     */
    public function actionLogin () { 
        
        //Обработка формы
        $email = '';
        $password = '';
        if (isset($_POST['submit'])) {
            
            $email =$_POST['email'];
            $password = $_POST['password'];
                        
            $errors = false;
            
            if(!User::checkEmail($email)){
              $errors[] = 'Неправильный email';  
            }
            
            if(!User::checkPassword($password)){
              $errors[] = 'Пароль не может быть короче 8 символов';  
            }
            
            $userId = User::checkUserData($email, $password);
            
            if ($userId == false) {
              
                $errors[] = 'Неправельные данные для входа на сайт';  
            } else {
                User::auth($userId);               
                // Перенаправляем пользователя на страницу новостей
                header("Location: /news/profile/index");
            }
                                
        }

        require_once ROOT . '/view/user/login.php';
        return true;
        
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionlogout() {
     
        unset($_SESSION['user']);
        header("Location: /news/index");
    }    
    
    
}
