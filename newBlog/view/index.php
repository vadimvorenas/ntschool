<div><?php   ?></div>
<a href="articles/add">Добавить статью</a>
<?php if ($auth){?>
    <a href="logout.php">Выйти</a>
<?php }
else {?>
    <a href="login.php">Войти</a>
<?php }?>
<hr>
<ul>
    <?php foreach ($articles as $article){?>
        <li>
            <a href="articles/show/<?php echo $article['id'] ?>">
                <?php echo $article['name_article'] ?>
            </a>
            <?php if ($auth){ ?>
                <div>
                    <a href="articles/edit/<?php echo $article['id'] ?>">Редактировать</a>
                    <a href="articles/delete/<?php echo $article['id'] ?>">Удалить</a>
                </div>
            <?php }
            if (isset($_SESSION['msg'])){
                unset($_SESSION['msg']);
            }?>
        </li>
    <?php } ?>
</ul>
