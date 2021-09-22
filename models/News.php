<?php

class News {
    /**
    * Returns an array of news items
    * @return array
    */
    static function getNewsList() {
        $arrNews = array();
        
        $arrNews = include("./components/News.php");
        
        return $arrNews;
    }

}
