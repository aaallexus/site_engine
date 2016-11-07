<!doctype html>
<html>
<head>
<?php
echo MetaTags();
?>
</head>
<body>
	<table border=1 width=100%>
		<tr><td colspan=2><?php echo Head();?></td></tr>
		<tr><td style="width:200px" valign="top"><?php echo LeftMenu();?></td><td valign="top"><?php echo Main();?></td></tr>
	</table>
<?php
	include "footer.php";
?>

</body>
</html>

