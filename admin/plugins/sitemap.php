<?php
include "config/settings.php";
function BuildSitemap($file="../site/sitemap.xml")
{
	global $SITE_URL;
	$f=fopen($file,'wb+');
	fwrite($f,"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n");
	$quer=mysql_query("select articles.*,links.link from articles,links where type_obj=1 and articles.id=links.id_obj");
	while($query=mysql_fetch_assoc($quer))
	{
		fwrite($f,"  <url>\n");
		fwrite($f,"    <loc>".$SITE_URL."/".$query['link']."</loc>\n");
		fwrite($f,"    <lastmod>".$query['date_changed']."</lastmod>\n");
		fwrite($f,"  </url>\n");
	}
	$quer=mysql_query("select categories.*,links.link from categories,links where type_obj=2 and categories.id=links.id_obj");
	while($query=mysql_fetch_assoc($quer))
	{
		fwrite($f,"  <url>\n");
		fwrite($f,"    <loc>".$SITE_URL."/".$query['link']."</loc>\n");
		fwrite($f,"    <lastmod>".$query['date_changed']."</lastmod>\n");
		fwrite($f,"  </url>\n");
	}
	fwrite($f,"</urlset>\n");
	fclose($f);
}
?>