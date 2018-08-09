
	<form method="post">
        <div>
            <div>Название</div>
            <input title="text" name="name_article" value="<?php echo $name_article ?? ''?>">
        </div>
        <div>
            <div>Контент</div>
            <textarea name="content"><?php echo $content ?? ''?></textarea>
</div>
<div><input type="submit"></div>
</form>
<p><?php echo $msg ?></p>
