<?php
function CategoryTree($name,$value='',$is_choise_parent_items=false)
{
	$ret='';
	$ret.="<input type='hidden' name='".$name."' value='".$value."'><div class='categorytree-container'>asdasd</div>\n";
	$ret.="<div class='categorytree-background'>";
	$ret.="</div>";
	$ret.="<div class='categorytree-body'>";
	$ret.="<ul>";
	$quer=mysql_query("select * from categories where parent_category=0");
	while($query= mysql_fetch_assoc($quer))
	{
		$checkbox='<input type="checkbox">';
		$child_items=ShowChildItems($query['id'],$is_choise_parent_items);
		if(!$is_choise_parent_items && $child_items!='')
			$checkbox="";
		$ret.="<li data-id-record='".$query['id']."'>".$checkbox."<span>".$query['name']."</span>";
		$ret.=$child_items;
		$ret.="</li>\n";
	}
	$ret.="</ul>\n";
	$ret.="</div>\n";
	return $ret;
}
function ShowChildItems($id_category,$is_choise_parent_items=false)
{
	$ret='';
	$quer=mysql_query("select * from categories where parent_category=".$id_category);
	if(mysql_num_rows($quer)==0)
	{
		return '';
	}
	else
	{
		$ret.="<ul>";
		while($query= mysql_fetch_assoc($quer))
		{
			$checkbox='<input type="checkbox">';
			$child_items=ShowChildItems($query['id']);
			if(!$is_choise_parent_items && $child_items!='')
				$checkbox="";
			$ret.="<li data-id-record='".$query['id']."'>".$checkbox."<span>".$query['name']."</span>";
			$ret.=ShowChildItems($query['id'],$is_choise_parent_items);
			$ret.="</li>\n";
		}
		$ret.="</ul>";
	}
	return $ret;
}
?>