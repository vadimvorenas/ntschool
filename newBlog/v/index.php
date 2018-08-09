<div><?php   ?></div>
<a href="add.php">Добавить статью</a>
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
            <a href="post.php?id_article=<?php echo $article['id_article'] ?>">
                <?php echo $article['name_article'] ?>
            </a>
            <?php if ($auth){ ?>
                <div>
                    <a href="edit.php?id_article=<?php echo $article['id_article'] ?>">Редактировать</a>
                    <a href="delete.php?id_article=<?php echo $article['id_article'] ?>">Удалить</a>
                </div>
            <?php }
            if (isset($_SESSION['msg'])){
                unset($_SESSION['msg']);
            }?>
        </li>
    <?php } ?>
</ul>
