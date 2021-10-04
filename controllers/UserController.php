<?php

/**
 * Контроллер UserController
 */

class UserController { 
    
    /**
     * Action для страницы "Регистрация"
     */
    public function actionRegistration() {
        
        // Переменные для формы
        $email = false;
        $name = false;
        $password = false;
        $result = false;
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            
            // Флаг ошибок            
            $errors = false;
            
            // Валидация полей
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
            
           if ($errors == false) {
               // Если ошибок нет
               // Регистрируем пользователя
               $result = User::registration($name, $email, $password);
              
           }
      
        }
        // Подключаем вид
        require_once ROOT . '/view/user/registration.php';
        return true;
        
    }

    /**
     * Action для страницы "Вход на сайт"
     */
    public function actionLogin () { 
        
        //Обработка формы
        $email = false;
        $password = false;
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email =$_POST['email'];
            $password = $_POST['password'];
                        
            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if(!User::checkEmail($email)){
              $errors[] = 'Неправильный email';  
            }
            
            if(!User::checkPassword($password)){
              $errors[] = 'Пароль не может быть короче 8 символов';  
            }
            
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);
            
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправельные данные для входа на сайт';  
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);               
                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /news/profile/index");
            }
                                
        }
        // Подключаем вид
        require_once ROOT . '/view/user/login.php';
        return true;
        
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionlogout() {
        
        // Стартуем сессию
        session_start();
        
        // Удаляем информацию о пользователе из сессии
        unset($_SESSION['user']);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /news/index");
    }   
    
    
}
