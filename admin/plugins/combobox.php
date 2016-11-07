<?php
function ComboBox($name,$array,$value=0,$class='',$action='')
{
	$ret='';
	if($class!='')
	$class="class='$class'";
	if($action!='')
	$action="onChange='$action'";
	$ret.="<select $class name='$name' id='$name' $action>\n";
	foreach($array as $key=>$index)
	{
		$select='';
		if($key==$value)
		$select='selected';
		$ret.="<option $select value=$key>".$index."</option>\n";
	}
	$ret.="</select>\n";
	return $ret;
}
?>