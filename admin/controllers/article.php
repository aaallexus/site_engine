<?php
require_once "plugins/combobox.php";
include "plugins/categorytree.php";
global $site_dir;
if(isset($_POST['title']))
{
	if(isset($_GET['arg1']))
	{
		$link=StrToUrl($_POST['name']);
		$_POST['name']=SqlString($_POST['name']);
		$_POST['title']=SqlString($_POST['title']);
		$_POST['link']=SqlString($_POST['link']);
		$_POST['text']=SqlString($_POST['text']);
		$_POST['description']=SqlString($_POST['description']);
		$_POST['keywords']=SqlString($_POST['keywords']);
		$_POST['category']=SqlString($_POST['category']);
		$temp=explode(',',$_POST['category']);
		if($_GET['arg1']=='new')
		{
			$query=mysql_fetch_assoc(mysql_query("show table status where name='articles'"));
			$id_autoincr=$query['Auto_increment'];
			if(mysql_query("insert into articles values(null,'".$_POST['name']."','".$_POST['title']."','".$_POST['description']."','".$_POST['keywords']."','".$_POST['text']."','".date('Y-m-d')."')"))
			{
				foreach($temp as $value)
				{
					$value=SqlInt($value);
					mysql_query("insert into idx_articles_categories values($id_autoincr,$value)");
				}
				mysql_query("insert into links values('".$_POST['link']."',1,$id_autoincr)");
			}
		}
		else
		{
			mysql_query("update articles set name='".$_POST['name']."', title='".$_POST['title']."', text='".$_POST['text']."', description='".$_POST['description']."', keywords='".$_POST['keywords']."', date_changed='".date('Y-m-d')."' where id=".$_GET['arg1']);
			mysql_query("delete from idx_articles_categories where id_article=".$_GET['arg1']);
			foreach($temp as $value)
			{
				mysql_query("insert into idx_articles_categories values(".$_GET['arg1'].",$value)");
			}
		}
	}
	echo GoToUrl($site_dir.'articles');
}
$link_readonly='';
$name='';
$title='';
$description='';
$keywords='';
$link='';
$text='';
$category='';
if(isset($_GET['arg1']))
{
	if(is_numeric($_GET['arg1']))
	{
		$_GET['arg1']=SqlInt($_GET['arg1']);
		$quer=mysql_query("select articles.*,links.link from articles,links where links.type_obj=1 and links.id_obj=articles.id and articles.id=".$_GET['arg1']);
		if($query=mysql_fetch_assoc($quer))
		{
			$link_readonly='readonly';
			$name=$query['name'];
			$title=$query['title'];
			$description=$query['description'];
			$keywords=$query['keywords'];
			$text=$query['text'];
			$link=$query['link'];
			$quer1=mysql_query("select * from idx_articles_categories where id_article=".$query['id']);
			$category_array=array();
			while($query1=mysql_fetch_assoc($quer1))
			{
				$category_array[]=$query1['id_category'];
			}
			$category=implode(',',$category_array);
		}
	}
}


?>