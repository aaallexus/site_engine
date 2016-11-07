<?php
global $site_dir;
$login='';
$password='';
if(CheckLogin())
{
	echo GoToUrl($site_dir.'/Admin/');
}
?>