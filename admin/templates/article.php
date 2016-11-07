<form method='post'>
<table>
	<tr><td>Название</td><td><input id='name_field' type=text name='name' value='<?php echo $name; ?>'></td></tr>
	<tr><td>Title</td><td><input type=text name='title' value='<?php echo $title;?>'></td></tr>
	<tr><td>Ссылка на статью</td><td><input id='link_field' type=text name='link' value='<?php echo $link;?>' <?php echo $link_readonly; ?>></td></tr>
	<tr><td>Description</td><td><input type=text name='description' value='<?php echo $description;?>'></td></tr>
	<tr><td>Keywords</td><td><input type=text name='keywords' value='<?php echo $keywords;?>'></td></tr>
	<tr><td>Категория</td><td><?php echo CategoryTree('category',$category);?></td></tr>
	<tr><td>Статья</td><td><textarea name='text'><?php echo $text; ?></textarea></td></tr>
	<tr><td colspan=2><input type="submit" value="Сохранить"><input type="button" value='Отмена' onclick="transitionTo('<?php echo $site_dir.'articles'?>')"></td></tr>
</table>
</form>