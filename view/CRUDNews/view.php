<section>
    <br>
    <br>
    <div class="container">
        <div class="row">
             <div class="col-md-12 ">
                <h2 class="blog-post-title"><?php echo $news['title']; ?></h2>
                <p class="blog-post-meta"><?php echo date('Y-m-d', strtotime($news['date'])); ?> Автор <a href="#"><?php echo $news['author_name']; ?></a></p>
                <p><?php echo $news['content']; ?></p>

            </div>
        </div>
    </div>
</section>