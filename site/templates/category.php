<?php
if($isHasChildCategory)
{
	foreach($items as $value)
	{
?>
		<div><a href='<?php echo $site_dir.$value['link'];?>'><?php echo $value['name']?></a></div>
<?php
	}
}
else
{
	foreach($items as $value)
	{
?>
		<div><a href='<?php echo $site_dir.$value['link'];?>'><?php echo $value['name']?></a></div>	
<?php
	}
}
?>