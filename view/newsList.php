<!-- list -->

<div class="col-md-12 text-center">
    <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Новости
    </h3>
   
    <article class="blog-post">
        <?php 
         $arrNews = include("./components/News.php");
        foreach ($arrNews as $newsList):?>
        <h2 class="blog-post-title"><?php echo $newsList['title'];?></h2>
        <p class="blog-post-meta"><?php echo $newsList['content'];?></p>
        <p class="blog-post-meta"><?php echo $newsList['date'];?><a href="#"><?php echo $newsList['author_name'];?></a></p>
        <?php endforeach;?>
    </article>

</div>
