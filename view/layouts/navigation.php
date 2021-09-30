<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
    <div class="container-fluid">
        <div class="navbar-collapse collapse show" id="navbarsExample05" style="">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/news/index.php">Главная</a>
                </li>
                <?php if (User::isGuest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/news/user/login/">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news/user/registration">Регистрация</a>
                    </li>
                <?php else : ?> 
                    <li class="nav-item">
                        <a class="nav-link" href="/news/profile/index"><?php echo User::getName()  ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news/user/logout/">Выход</a>
                    </li>
                <?php endif; ?>
            </ul>
            <form>
                <input class="form-control" type="text" placeholder="Поиск" aria-label="Search">
            </form>
        </div>
    </div>
</nav>
