<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                Новости
            </h3>
            <?php if (!User::isGuest()) : ?> 
                <a href="news/create" class="btn btn-link"><i class="fa fa-plus"></i> Добавить новость</a>
            <?php endif; ?>

            <article class="blog-post">
                <?php foreach ($arrNews as $newsList): ?>
                    <h3 class="blog-post-title"> <a href="news/view/<?php echo $newsList['id']; ?>"> <?php echo $newsList['title']; ?></a> </h3>
                    <p class="blog-post-meta"><?php echo $newsList['short_content']; ?></p>
                    <p ><?php echo date("Y.m.d", strtotime($newsList['date'])); ?> Автор <a href="#"><?php echo $newsList['author_name']; ?></a></p>
                    <?php if (!User::isGuest()) : ?> 
                        <a href="news/delete/<?php echo $newsList['id']; ?>" class="btn btn-link"><i class="fa fa-plus"></i>Удалить новость</a>
                        <a href="news/update/<?php echo $newsList['id']; ?>" class="btn btn-link"><i class="fa fa-plus"></i>Редактировать новость</a>    
                    <?php endif; ?>
                <?php endforeach; ?>
            </article>

        </div>
    </div>
</div>
