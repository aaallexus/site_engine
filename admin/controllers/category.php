<?php
	include "plugins/combobox.php";
	require_once "plugins/sitemap.php";
	global $site_dir;
	if(isset($_POST['name']))
	{
		if(isset($_GET['arg1']))
		{
			$link='cat_'.StrToUrl($_POST['title']);
			$_POST['parent_category']=SqlInt($_POST['parent_category']);
			$_POST['name']=SqlString($_POST['name']);
			$_POST['title']=SqlString($_POST['title']);
			$_POST['description']=SqlString($_POST['description']);
			$_POST['keywords']=SqlString($_POST['keywords']);
			$_POST['link']=SqlString($_POST['link']);
			if($_GET['arg1']=='new')
			{
				$query=mysql_fetch_assoc(mysql_query("show table status where name='categories'"));
				$id_autoincr=$query['Auto_increment'];
				mysql_query("insert into categories values(null,'".$_POST['name']."','".$_POST['title']."','".$_POST['description']."','".$_POST['keywords']."',".($_POST['parent_category']).",'".date('Y-m-d')."')");
				mysql_query("insert into links values('".$_POST['link']."',2,$id_autoincr)");
				BuildSitemap();
			}
			else
			{
				mysql_query("update categories set title='".$_POST['title']."', name='".$_POST['name']."', description='".$_POST['description']."', keywords='".$_POST['keywords']."',parent_category=".($_POST['parent_category']).", date_changed='".date('Y-m-d')."' where id=".$_GET['arg1']);
				BuildSitemap();
			}
		}
		//echo GoToUrl($site_dir.'categories');
	}
	$link_readonly='';
	$name='';
	$title='';
	$description='';
	$keywords='';
	$link='';
	$id_category=0;
	$category_array=array(0=>'');
	$quer=mysql_query("select * from categories");
	while($query=mysql_fetch_array($quer))
	{
		$category_array[$query['id']]=$query['name'];
	}
	if(isset($_GET['arg1']))
	{
		if(is_numeric($_GET['arg1']))
		{
			$_GET['arg1']=SqlInt($_GET['arg1']);
			$quer=mysql_query("select categories.*,links.link from categories,links where links.type_obj=2 and links.id_obj=categories.id and categories.id=".$_GET['arg1']);
			if($query=mysql_fetch_assoc($quer))
			{
				$link_readonly='readonly';
				$title=$query['title'];
				$name=$query['name'];
				$description=$query['description'];
				$keywords=$query['keywords'];
				$link=$query['link'];
				$id_category=$query['parent_category'];
			}
		}
	}
?>