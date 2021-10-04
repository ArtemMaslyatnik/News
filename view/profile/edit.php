<!DOCTYPE html>

<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <title>Главная</title>
    </head>
    <body>

        <?php
        //header
        include_once ("./view/layouts/header.php");
        //navigation
        include_once ("./view/layouts/navigation.php");
        ?>

        <main class="form-signin">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" >

                        <?php if ($result) : ?>
                            <p>Данные отредактированы</p>
                        <?php else : ?>
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>    
                                </ul>
                            <?php endif; ?>
                            <form action="" method="post" role="form">
                                <h1 class="h3 mb-3 fw-normal">Редактировать данные</h1>

                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="floatingInput" placeholder="логин" value="<?php echo $name; ?>">
                                    <label for="floatingInput">Логин</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Пароль" value="<?php echo $password; ?>">
                                    <label for="floatingPassword">Пароль</label>
                                </div>

                                <input class="btn btn-link" type="submit" name="submit" value="Изменить">
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>

        <?php
        //footer
        include_once ("./view/layouts/footer.php");
        ?>

    </body>
</html>