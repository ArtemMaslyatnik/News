<?php

include_once ROOT . '/models/User.php';

class ProfileController {
    
   public function actionIndex() {
        
        $userId = User::checkLogged();        
        
        $user = User::getUserByID($userId);
        
        require_once ROOT . '/view/profile/index.php';
        return true;
   }
}
