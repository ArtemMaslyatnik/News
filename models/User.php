<?php

class user {

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

    public static function checkName($name) {

        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password) {

        if (strlen($password) >= 6) {
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
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId) {

        $_SESSION['user'] = $userId;
    }

    public static function checkLogged() {
        // Если сессия есть, вернем индификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    public static function isGuest() {

        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
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

    public static function getName() {
        if (isset($_SESSION['user'])) {
            
            $user = self::getUserByID($_SESSION['user']);
            return $user['name'];
        }
        return 'Кабинет';
    }
}
