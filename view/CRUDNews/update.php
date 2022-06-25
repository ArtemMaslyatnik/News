<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col-md-12" >
            <form action="#" method="post" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label>Заголовок</label>
                    <input class="form-control" type="text" name="title" placeholder="" value="<?php echo $news['title'];?>">
                </div>
                <div class="form-group">
                    <label>Краткое описание</label>
                    <input class="form-control" type="text" name="short_content" placeholder="" value="<?php echo $news['short_content'];?>">
                </div> 
                <div class="form-group">
                    <label>Статья</label>
                    <textarea class="form-control" name="content" style="height: 300px"><?php echo $news['content'];?></textarea>
                </div>
                <div class="form-group">
                    <label>Автор</label>
                    <input class="form-control" type="text" name="author_name" placeholder="" value="<?php echo $news['author_name'];?>">
                </div>
                <br/>
                <input class= "btn btn-link" type="submit" name="submit"  value="Сохранить">
            </form>
        </div>

    </div>
</div>

