<a href="<?php echo $site_dir;?>article/new">Добавить</a>
<table>
<?php
	foreach($articles as $key=>$value)
	{
		?>
			<tr><td><a href='<?php echo $site_dir.'article/'.$value['id']; ?>'><?php echo $value['name']?></a></td></tr>
		<?php
	}
?>
</table>