<?php

/**
 * Класс User - модель для работы с пользователями
 */
class user {
     /**
     * Регистрация пользователя 
     * @param string $name <p>Имя</p>
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function registration($name, $email, $password) {
        
        // Соединение с БД 
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';

        //Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

      /**
     * Редактирование данных пользователя
     * @param integer $id <p>id пользователя</p>
     * @param string $name <p>Имя</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */ 
    public static function edit($id, $name, $password) {
        
        // Соединение с БД 
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE  user 
                SET 
                    name = :name,
                    password = :password
                WHERE id = :id";

        //Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute(); 
    }
    
     /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return mixed : integer user id or false
     */
    public static function checkUserData($email, $password) {

        // Соединение с БД 
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        //Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }
        return false;
    }

      /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public static function auth($userId) {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }

    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function checkLogged() {
        
        // Если сессия есть, вернем индификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    /**
     * Проверяет является ли пользователь гостем
     * @return boolean <p>Результат выполнения метода</p>
     */
     public static function isGuest() {

        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function checkEmailExists($email) {
        // Соединение с БД 
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        //Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     * @param string $name <p>Имя</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkName($name) {

        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 8 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password) {

        if (strlen($password) >= 8) {
            return true;
        }
        return false;
    }

    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return mixed : integer user id or false
     */
    public static function checkEmail($email) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Возвращает пользователя с указанным id
     * @param integer $id <p>id пользователь</p>
     * @return array <p>Массив с информацией о пользователе</p>
     */
    public static function getUserByID($id) {
        if ($id) {
            // Соединение с БД 
            $db = Db::getConnection();

            // Текст запроса к БД
            $sql = "SELECT * FROM user WHERE id = :id";

            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            //Указываем, что хотим получить данные в виде массива(установить режим выборки)
            $result->setFetchMode(PDO::FETCH_ASSOC);

            //Выполнение команды
            $result->execute();

            return $result->fetch();
        }
    }
    
    /**
     * Возвращает имя пользователя из сессии
     * @return string <p>Строка имя пользователе или заглушка</p>
     */
    public static function getName() {
        if (isset($_SESSION['user'])) {
            
            $user = self::getUserByID($_SESSION['user']);
            return $user['name'];
        }
        return 'Кабинет';
    }
    
     /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id) {
        
        // Название изображения-пустышки
        $noImage = 'user.jpg';
        
        // Путь к папке с товарами
        $path = '/upload/images/avatar/';
        
        // Путь к изображению товара
        $pathToAvatarImage = $path . $id . '.jpg';
        
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToAvatarImage))  {
             // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToAvatarImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
        
    }
}
