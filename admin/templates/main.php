<?php
if(CheckLogin()){
?>
<table class='MainTable' width=100%>
	<tr><td class='top_menu' colspan=2><?php echo Head();?></td></tr>
	<tr><td class='left_menu' style="width:200px" valign="top"><?php echo LeftMenu();?></td><td valign="top"><?php echo Main();?></td></tr>
</table>
<?php
}
else
{
	ShowTemplate('authentification');
}
?>

