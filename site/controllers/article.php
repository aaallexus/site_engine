<?php
	$quer = $DB->prepare("select articles.*, links.link from articles,links where links.link=? and links.type_obj=1 and links.id_obj=articles.id");
	$quer->execute(array($_GET['action']));
	//$quer=mysql_query("select articles.*, links.link from articles,links where links.link='".SqlString($_GET['action'])."' and links.type_obj=1 and links.id_obj=articles.id");
	if($query = $quer->fetch(PDO::FETCH_ASSOC))
	{	
		$article=$query;
		//include "templates/".$template."/article.php";
	}
?>