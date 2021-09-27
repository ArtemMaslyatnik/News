<?php

include_once ROOT . '/models/News.php';

class NewsController {

    public function actionIndex() {
        $arrNews = array();
        $arrNews = News::getNewsList();

        require_once ROOT . '/view/news/index.php';

        return true;
    }
    
    /**
     * Action для страницы "Добавить товар"
     */
    public function actionCreate() {


        //Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы    

            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['author_name'] = $_POST['author_name'];

            // При необходимости можно валидировать значения нужным образом
            $errors = false;

            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = News::createNews($options);

                // Перенаправляем пользователя на страницу новостей
                header("Location: /news/index");
            }
        }
        require_once ROOT . '/view/news/create.php';

        return true;
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id) {
        //Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем
            News::deleteNewsById($id);
            // Перенаправляем пользователя на страницу новостей
            header("Location: /news/index");
        }

        require_once ROOT . '/view/news/delete.php';

        return true;
    }
    
    /**
     * Action для страницы "Редактировать товар"
     */
    public function actionUpdate($id) {
        
        
        
        // Получаем данные о конкретном заказе
        $news = News::getNewsById($id);

        //Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['author_name'] = $_POST['author_name'];

            News::updateNewsById($id, $options);
            header("Location: /news/index");
            
        }
                
        require_once ROOT . '/view/news/update.php';
        return true;
    }

    
    public function actionView($id) {
       
        // Получаем данные о конкретном заказе
        $news = News::getNewsById($id);
        
        require_once ROOT . '/view/news/view.php';
        return true;
    
    }
}
