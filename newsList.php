<!DOCTYPE html>

<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <title>Новости</title>
    </head>
    <body>
        <!-- navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Корр</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse show" id="navbarsExample05" style="">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ссылка</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Отключено</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">Раскрываюшейся список</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown05">
                                <li><a class="dropdown-item" href="#">Действие</a></li>
                                <li><a class="dropdown-item" href="#">Еще действие</a></li>
                                <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form>
                        <input class="form-control" type="text" placeholder="Поиск" aria-label="Search">
                    </form>
                </div>
            </div>
        </nav>

        <!-- list -->
            <div class="col-md-12 text-center">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Новости
                </h3>

                <article class="blog-post">
                    <h2 class="blog-post-title">Простой блог</h2>
                    <p class="blog-post-meta">Январь 1, 2021 автор <a href="#">Иван</a></p>
                </article>

                <article class="blog-post">
                    <h2 class="blog-post-title">Еще новость</h2>
                    <p class="blog-post-meta">Май 23, 2020 автор <a href="#">Яков</a></p>
                </article>

                <article class="blog-post">
                    <h2 class="blog-post-title">Новая особенность</h2>
                    <p class="blog-post-meta">Май 14, 2020 автор <a href="#">Марк</a></p>

                </article>

                <nav class="blog-pagination" aria-label="Pagination">
                    <a class="btn btn-outline-primary" href="#">Старые</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Новые</a>
                </nav>
            </div>
    </body>
</html>