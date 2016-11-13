<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php
echo MetaTags();
?>
<link href="templates/<?php echo getConfig('template'); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="templates/<?php echo getConfig('template'); ?>/css/layout.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 7]>
   <link href="templates/<?php echo getConfig('template'); ?>/css/style_ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body id="page1">
<div class="tail-top-right"></div>
<div class="tail-top">
  <div class="tail-bottom">
    <div id="main">
      <!-- header -->
      <div id="header">
        <form action="" method="post" id="form">
          <div>
            <label>Website Search:</label>
            <span>
            <input type="text" />
            </span></div>
        </form>
        <ul class="list">
          <li><a href="home.html"><img src="templates/<?php echo getConfig('template'); ?>/images/icon1.gif" alt="" /></a></li>
          <li><a href="contact-us.html"><img src="templates/<?php echo getConfig('template'); ?>/images/icon2.gif" alt="" /></a></li>
          <li class="last"><a href="sitemap.html"><img src="templates/<?php echo getConfig('template'); ?>/images/icon3.gif" alt="" /></a></li>
        </ul>
        <ul class="site-nav">
          <li><a href="home.html">Home</a></li>
          <li><a href="about-us.html">About Us</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="support.html">Support</a></li>
          <li><a href="contact-us.html">Contact Us</a></li>
          <li class="last"><a href="sitemap.html">Site Map</a></li>
        </ul>
        <div class="logo"><a href="home.html"><img src="templates/<?php echo getConfig('template'); ?>/images/logo.gif" alt="" /></a></div>
        <div class="slogan"><img src="templates/<?php echo getConfig('template'); ?>/images/slogan.gif" alt="" /></div>
      </div>
      <!-- content -->
      <div id="content">
        <?php echo Main();?>
      </div>
      <!-- footer -->
      <div id="footer">
        <div class="indent">
          <div class="fleft">Copyright - type in your name here.</div>
          <div class="fright">Designed by: &nbsp;<a href="http://www.templates.com"><img alt="website templates " src="templates/<?php echo getConfig('template'); ?>/images/templates-logo.gif" title="templates.com - website templates provider" /></a> Your <a href="http://russian.templates.com/product/3d-models/" title="templates.com - website templates provider">3D Models</a> Marketplace</div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>








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