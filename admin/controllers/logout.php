<?php
unset($_SESSION['login']);
unset($_SESSION['password']);
global $site_dir;
echo GoToUrl($site_dir);
?>