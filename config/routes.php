<?php
return array (
  
    'profile/uplad/avatar'  => 'profile/upladavatar', //actionUpladAvatar в ProfileController
    'user/registration' => 'user/registration', //actionRegistration в UserController
    'user/login'  => 'user/login',    //actionLogin в UserController
    'user/logout' => 'user/logout',   //actionLogout в UserController
    'profile/edit'     => 'profile/edit', //actionEdit в ProfileController
    'profile'     => 'profile/index', //actionIndex в ProfileController

     
    //Управление новостями
    'news/view/([0-9]+)' => 'news/view/$1', //actionView в NewsController
    'news/create' => 'news/create', //actionCreate в NewsController
    'news/update/([0-9]+)' => 'news/update/$1', //actionUpdate в NewsController
    'news/delete/([0-9]+)' => 'news/delete/$1', //actionDelete в NewsController
    
    // Главная страница
    'news' => 'news/news/index', //actionIndex в NewsController
    'index.php' => 'news/index', //actionIndex в NewsController
    '' => 'news/index', //actionIndex в NewsController
    
);
