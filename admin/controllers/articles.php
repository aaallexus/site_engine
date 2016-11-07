<?php
	global $site_dir;
	$articles=array();
	$quer=mysql_query("select * from articles");
	while($query=mysql_fetch_assoc($quer))
	{
		$articles[]=$query;
	}
?>