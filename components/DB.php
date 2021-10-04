<?php
/**
 * Класс Db
 * Компонент для работы с базой данных
 */
class DB {
     /**
     * Устанавливает соединение с базой данных
     * @return \PDO <p>Объект класса PDO для работы с БД</p>
     */
    public static function getConnection()  {
        // Получаем параметры подключения из файла    
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include($paramsPath);
        
        // Устанавливаем соединение
        $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";

        try {
            $db = new PDO($dsn, $params['user'], $params['password']);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        
        // Задаем кодировку
        $db->exec("set names utf8");     
        
        return $db;
    }
}

