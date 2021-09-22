<?php

class News {
    /**
    * Returns an array of news items
    * @return array
    */
    static function getNewsList() {
        
        $db = DB::getConnection();
        
        $newsList = array();
        $result = $db->query('SELECT id, title, date, author_name, content FROM news ORDER BY  date  DESC LIMIT 10');
        
       
   	$i = 0;
		
	while($row = $result->fetch()) {
        	$arrNews[$i]['id'] = $row['id'];
		$arrNews[$i]['title'] = $row['title'];
		$arrNews[$i]['date'] = $row['date'];
		$arrNews[$i]['content'] = $row['content'];
                $arrNews[$i]['author_name'] = $row['author_name'];
		$i++;
	}
        
        return $arrNews;
    }

}
