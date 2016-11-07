<form method='post'>
<table>
	<tr><td>Название</td><td><input type="text" id='name_field' name='name' value='<?php echo $name; ?>'></td></tr>
	<tr><td>Title</td><td><input type="text" name='title' value='<?php echo $title; ?>'></td></tr>
	<tr><td>Ссылка на категорию</td><td><input id='link_field' type=text name='link' value='<?php echo $link;?>' <?php echo $link_readonly; ?>></td></tr>
	<tr><td>Description</td><td><input type=text name='description' value='<?php echo $description;?>'></td></tr>
	<tr><td>Keywords</td><td><input type=text name='keywords' value='<?php echo $keywords;?>'></td></tr>
	<tr><td>Родительская категория</td><td><?php echo ComboBox("parent_category",$category_array,$id_category);?></td></tr>
	<tr><td colspan=2><input type="submit" value="Сохранить"> <input type="button" value='Отмена' onclick="transitionTo('<?php echo $site_dir.'categories'?>')"></td></tr>
</table>
</form>