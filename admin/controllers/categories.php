<?php
	global $site_dir;
	$categories=array();
	$quer=mysql_query("select * from categories");
	while($query=mysql_fetch_assoc($quer))
	{
		$categories[]=$query;
	}
?>