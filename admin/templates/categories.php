<a href="<?php echo $site_dir;?>category/new">Добавить</a>
<table>
<?php
	foreach($categories as $key=>$value)
	{
		?>
			<tr><td><a href='<?php echo $site_dir.'category/'.$value['id']; ?>'><?php echo $value['name']?></a></td></tr>
		<?php
	}
?>
</table>