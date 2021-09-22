<?php

include_once ROOT.'/models/News.php';

class NewsController {
    
    public function actionIndex() {
        $arrNews = array();
        $arrNews = News::getNewsList();
        
        require_once ROOT.'/view/news/index.php';
        
        return true;
    }
} 
    

