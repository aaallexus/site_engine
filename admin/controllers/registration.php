<?php
	//Нужно сделать проверку на правильность логина - нельзя . / ' " `
	if(isset($_POST['name']))
	{
		mysql_query("insert into users value(null,'".$_POST['login']."',md5('".$_POST['password']."'),'".$_POST['name']."','".$_POST['surname']."',".($_POST['country']*1).",".($_POST['city']*1).",'".$_POST['birthday']."',0,'".date('Y-m-d')."',1)");
	}
	$login="";
	$name='';
	$surname="";
	$country="";
	$city="";
	$birthday="";
	$countryArray=array();
	$cityArray=array();
	$quer=mysql_query('SELECT * FROM country_list');
	while($query=mysql_fetch_assoc($quer))
	{
		$countryArray[$query['id']]=$query['name'];
	}
	$quer=mysql_query('SELECT * FROM city_list');
	while($query=mysql_fetch_assoc($quer))
	{
		$cityArray[$query['id']]=$query['name'];
	}
?>