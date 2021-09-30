<?php
return array (
  
    'user/registration' => 'user/registration', //actionRegistration в UserController
    'user/login'  => 'user/login',    //actionlogin в UserController
    'user/logout' => 'user/logout',   //actionlogout в UserController
    'profile'     => 'profile/index', //actionindex в ProfileController
         
    'news/view/([0-9]+)' => 'news/view/$1', //actionCreate в NewsController
    'news/create' => 'news/create', //actionCreate в NewsController
    'news/update/([0-9]+)' => 'news/update/$1', //actionIndex в NewsController
    'news/delete/([0-9]+)' => 'news/delete/$1', //actionDelete в NewsController
    
    'news' => 'news/news/index', //actionIndex в NewsController
    'index.php' => 'news/index', //actionIndex в NewsController
    '' => 'news/index', //actionIndex в NewsController
    
);
