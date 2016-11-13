<?php
session_start();
include "core/function.php";
include "header.php";
ProtectFromSQLInjection();
include "templates/".getConfig('template')."/main.php";
function Main(){
	global $DB;
	if(isset($_GET['action'])){
		
		switch($_GET['action'])
		{
			default :	$quer = $DB->prepare("select * from links where link=?");
						$quer->execute(array($_GET['action']));
						if($query = $quer->fetch(PDO::FETCH_ASSOC))
						{
							if($query['type_obj']==2)
								ShowTemplate('category');
							if($query['type_obj']==1)
								ShowTemplate('article');
						}
						break;
		}
	}
	else
	{
		ShowTemplate('index');
	}
}
?>
