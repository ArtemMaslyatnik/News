<?php
return array (
    
    'news/view/([0-9]+)' => 'news/view/$1', //actionCreate в NewsController
    'news/create' => 'news/create', //actionCreate в NewsController
    'news/update/([0-9]+)' => 'news/update/$1', //actionIndex в NewsController
    'news/delete/([0-9]+)' => 'news/delete/$1', //actionDelete в NewsController
    
    'news' => 'news/news/index', //actionIndex в NewsController
    'index.php' => 'news/index', //actionIndex в NewsController
    '' => 'news/index', //actionIndex в NewsController
    
);
