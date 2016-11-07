<!doctype html>
<html>
<head>
<?php
session_start();
include "function.php";
include "config/mysql.php";
include "config/settings.php";
include "header.php";
ProtectFromSQLInjection();
?>
</head>
<body>
<?php
include "templates/main.php";
function Main(){
	if(CheckLogin()){
		if(isset($_GET['action'])){
			switch($_GET['action'])
			{
				case "auth": ShowTemplate('authentification'); break;
				case "registr": ShowTemplate('registration'); break;
				case "admin": ShowTemplate('admin'); break;
				case "logout": ShowTemplate('logout'); break;
				case "articles": ShowTemplate('articles'); break;
				case "article": ShowTemplate('article'); break;
				case "categories": ShowTemplate('categories'); break;
				case "category": ShowTemplate('category'); break;
			}
		}
		else
		{
			ShowTemplate('index');
		}
	}
}
include "footer.php";
?>
</body>
</html>
