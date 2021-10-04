<?php

/**
 * Контроллер ProfileController
 * Профиль пользователя
 */
class ProfileController {
   
    /**
     * Action для страницы "Профиль пользователя"
     */
   public function actionIndex() {
        
        //получить идентификатор пользователя из сессии
        $userId = User::checkLogged();        
        
        // Получаем информацию о пользователе из БД
        $user = User::getUserByID($userId);
        
        //Подключаем вид
        require_once ROOT . '/view/profile/index.php';
        return true;
   }
   
   /**
   * Action для страницы "Редактирование данных пользователя"
   */
   public function actionEdit() {
        
       //получить идентификатор пользователя из сессии
        $userId = User::checkLogged();        
        
        //получаем информацию о пользователе из БД
        $user = User::getUserByID($userId);
        
        // Заполняем переменные для полей формы
        $name = $user['name'];
        $password = $user['password'];
        
        // Флаг результата
        $result = false;
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $name = $_POST['name'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            
            if ($errors == false) {
                // Если ошибок нет
                // Сохраняет изменения профиля
                $result = User::edit($userId, $name, $password);
            }
        }
        
        //Подключаем вид
        require_once ROOT . '/view/profile/edit.php';
        return true;
   }

   
     public function actionUpladAvatar() {
        //получить идентификатор пользователя из сессии
        $userId = User::checkLogged();   
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            //Проверим загружалось ли через форму изображение
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/avatar/{$userId}.jpg");
            }
        }
      
        // Перенаправляем пользователя в закрытую часть - кабинет 
        header("Location: /news/profile/index");
    }
}
