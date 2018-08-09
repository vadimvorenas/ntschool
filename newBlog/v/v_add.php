
	<form method="post">
        <div>
            <div>Название</div>
            <input title="text" name="nameArticle" value="<?php echo $nameArticle ?? ''?>">
        </div>
        <div>
            <div>Контент</div>
            <textarea name="content"><?php echo $content ?? ''?></textarea>
</div>
<div><input type="submit"></div>
</form>
<p><?php echo $msg ?></p>
