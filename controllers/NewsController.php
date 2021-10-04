<?php

/**
 * Контроллер NewsController
 * Управление контентом
 */
class NewsController {

    /**
     * Action для страницы "Управление контентом"
     */
    public function actionIndex() {
        
        // Получаем список контента
        $arrNews = News::getLatesNewsList();
        
        // Подключаем вид
        require_once ROOT . '/view/news/index.php';

        return true;
    }
    
    /**
     * Action для страницы "Добавить новость"
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
                // Добавляем новый контент
                $id = News::createNews($options);

                // Перенаправляем пользователя на страницу контент
                header("Location: /news/index");
            }
        }
        // Подключаем вид
        require_once ROOT . '/view/news/create.php';

        return true;
    }

    /**
     * Action для страницы "Удалить контент"
     */
    public function actionDelete($id) {
        //Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем
            News::deleteNewsById($id);
            // Перенаправляем пользователя на страницу контента
            header("Location: /news/index");
        }
        // Подключаем вид
        require_once ROOT . '/view/news/delete.php';

        return true;
    }
    
    /**
     * Action для страницы "Редактировать контента"
     */
    public function actionUpdate($id) {
        
        
        
        // Получаем данные о контенте
        $news = News::getNewsById($id);

        //Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['author_name'] = $_POST['author_name'];
            
            // Сохраняем изменения
            News::updateNewsById($id, $options);
            
            // Перенаправляем пользователя на страницу контента
            header("Location: /news/index");
            
        }
        // Подключаем вид        
        require_once ROOT . '/view/news/update.php';
        return true;
    }

    /**
     * Action для страницы "Показать контента"
     */
    public function actionView($id) {
       
        // Получаем данные о конкретном контенте
        $news = News::getNewsById($id);
        
        // Подключаем вид
        require_once ROOT . '/view/news/view.php';
        return true;
    
    }
}
