<?php
global $site_dir;
$items=array();
$isHasChildCategory=false;
#$quer=mysql_query("select categories.*, links.link from categories,links where links.type_obj=2 and links.id_obj=categories.id and links.link='".SqlString($_GET['action'])."'");
$quer = $DB->prepare("select categories.*, links.link from categories,links where links.type_obj=2 and links.id_obj=categories.id and links.link=?");
$quer->execute(array($_GET['action']));
if($query = $quer->fetch(PDO::FETCH_ASSOC))
{
	$quer1=$DB->prepare("select categories.*,links.link from categories,links where links.type_obj=2 and links.id_obj=categories.id and parent_category=?");
	$quer1->execute(array($query['id']));
	while($query1 = $quer1->fetch(PDO::FETCH_ASSOC))
	{
		$items[]=$query1;
	}
	if(sizeof($items)==0)
	{
		$quer1=$DB->prepare("select articles.*, links.link from articles,idx_articles_categories,links where links.type_obj=1 and links.id_obj=articles.id and articles.id=idx_articles_categories.id_article and idx_articles_categories.id_category=?");
		$quer1->execute(array($query['id']));
		while($query1 = $quer1->fetch(PDO::FETCH_ASSOC))
		{
			$items[]=$query1;
		}
	}
	//include 'templates/'.getConfig('template').'/category.php';
}
?>