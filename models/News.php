<?php

class News {
    /**
    * Returns an array of news items
    * @return array
    */
   
    static function getNewsList() {
        
        $db = Db::getConnection();
        
        $newsList = array();
        $result = $db->query('SELECT id, title, date, author_name, short_content, content FROM news ORDER BY  date  DESC LIMIT 10');
        
       
   	$i = 0;
		
	while($row = $result->fetch()) {
        	$arrNews[$i]['id'] = $row['id'];
		$arrNews[$i]['title'] = $row['title'];
		$arrNews[$i]['date'] = $row['date'];
                $arrNews[$i]['short_content'] = $row['short_content'];
		$arrNews[$i]['content'] = $row['content'];
                $arrNews[$i]['author_name'] = $row['author_name'];
		$i++;
	}
        
        return $arrNews;
    }
   
    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createNews($options) {
       
        // Соединение с БД 
        $db = Db::getConnection();
        
        // Текст запроса к БД
        $sql = 'INSERT INTO news '
                    .'(title, short_content,  content,  author_name)'
                    .' VALUES '
                    .'( :title, :short_content,  :content,  :author_name)';
        
        //Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        
        if ($result->execute()) {
            return $db->lastInsertID();
        }
        return 0;       
        
    }
    
     /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteNewsById($id) {
        
        // Соединение с БД 
        $db = Db::getConnection();
        
        // Текст запроса к БД
        $sql = 'DELETE FROM news  WHERE id = :id';
                
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
 
         return $result->execute();       
        
    }
    
    /**
     * Редактирует новость с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
     public static function updateNewsById($id, $options) {
        
        // Соединение с БД 
        $db = Db::getConnection();
        
        // Текст запроса к БД
        $sql = "UPDATE  news 
                SET 
                    title = :title,
                    short_content = :short_content,
                    content = :content, 
                    author_name = :author_name
                WHERE id = :id";
 
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
 
         return $result->execute();       
        
    }
    
      /**
     * Возвращает новость с указанным id
     * @param integer $id <p>id товара</p>
     * @return array <p>Массив с информацией о новости</p>
     */
    public static function  getNewsById($id) {
        // Соединение с БД 
        $db = Db::getConnection();
        
        // Текст запроса к БД
        $sql = "SELECT * FROM news WHERE id = :id";
 
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
