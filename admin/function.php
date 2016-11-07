<?php
$site_dir=str_replace('index.php','',$_SERVER["PHP_SELF"]);
function CheckLogin($base='users')
{
        if(isset($_SESSION['login']) && isset($_SESSION['password']))
        {
                if($_SESSION['login']!='' && $_SESSION['password']!='')
                {
                        $quer=mysql_query("select * from $base where login='".$_SESSION['login']."' and password='".$_SESSION['password']."'");
                        if($query=mysql_fetch_array($quer))
                        {
                                return true;
                        }
                        else
                        {
                                unset($_SESSION['login']);
                                unset($_SESSION['password']);
                                return false;
                        }
                }
                else
                {
                        if(isset($_POST['login']) && isset($_POST['password']))
                        {
                                $quer=mysql_query("select * from $base where login='".$_POST['login']."' and password=md5('".$_POST['password']."')");
                                if($query=mysql_fetch_array($quer))
                                {
                                        $_SESSION['login']=$_POST['login'];
                                        $_SESSION['password']=md5($_POST['password']);
                                        return true;
                                }
                                else    return false;
                        }
                }
        }
        else
        {
                if(isset($_POST['login']) && isset($_POST['password']))
                {
                        $quer=mysql_query("select * from $base where login='".$_POST['login']."' and password=md5('".$_POST['password']."')");
                        if($query=mysql_fetch_array($quer))
                        {
                                $_SESSION['login']=$_POST['login'];
                                $_SESSION['password']=md5($_POST['password']);
                                return true;
                        }
                        else    return false;
                }
        }
}     
function GoToUrl($url){
        $ret='';
        $ret.="<script language='javascript'>\n";
        $ret.="window.location='".$url."';\n";
        $ret.="</script>\n";
        return $ret;
}
function ProtectFromSQLInjection()
{
        foreach($_POST as $key=>$value)
        {
                $_POST[$key]=mysql_real_escape_string(str_replace('union','',$value));

        }
        foreach($_GET as $key=>$value)
        {
                $_GET[$key]=str_replace('union','',$value);
        }
}
function SqlString($str){
        return $str;
}
function SqlInt($str){
        $str=$str*1;
        return $str;
}
function ShowTemplate($template_name){
	if(is_file('controllers/'.$template_name.'.php'))
       include 'controllers/'.$template_name.'.php';
    if(is_file('templates/'.$template_name.'.php'))
        include 'templates/'.$template_name.'.php';
}
function LeftMenu(){
	global $site_dir;
        $ret='';
        $ret.="<ul class='Menu'>\n";
        $quer=mysql_query("select * from admin_menus where parent_id=0 order by pos");
        while($query=mysql_fetch_assoc($quer))
        {
                $ret.="<li><a href='".$site_dir.$query['link']."'><img src='".$site_dir."lib/img/icon8.jpg'>".$query['title']."</a></li>";
        }
        $ret.="</ul>\n";
	return $ret;
}
function Head(){
        global $site_dir;
	$ret='';
	$ret.="header<div style='float:right;'><a href='$site_dir/logout'>logout</a></div>";
	return $ret;
}

function translit($string) {
        $converter = array(
                'а' => 'a',   'б' => 'b',   'в' => 'v',
                'г' => 'g',   'д' => 'd',   'е' => 'e',
                'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
                'и' => 'i',   'й' => 'y',   'к' => 'k',
                'л' => 'l',   'м' => 'm',   'н' => 'n',
                'о' => 'o',   'п' => 'p',   'р' => 'r',
                'с' => 's',   'т' => 't',   'у' => 'u',
                'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
                'ь' => '',  'ы' => 'y',   'ъ' => '',
                'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
                'і' => 'i',   'ї' => 'i',   'ґ' => 'g',
                'є' => 'e',

                'А' => 'A',   'Б' => 'B',   'В' => 'V',
                'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
                'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
                'И' => 'I',   'Й' => 'Y',   'К' => 'K',
                'Л' => 'L',   'М' => 'M',   'Н' => 'N',
                'О' => 'O',   'П' => 'P',   'Р' => 'R',
                'С' => 'S',   'Т' => 'T',   'У' => 'U',
                'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
                'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
                'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
                'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
                'І' => 'I',   'Ї' => 'I',   'Ґ' => 'G',
                'Є' => 'E',' '=>'_','-'=>'_'
        );
        return strtr($string, $converter);
}
function StrToUrl($str) {
    // переводим в транслит
    $str = translit($str);
    // в нижний регистр
    $str = strtolower($str);
    // заменям все ненужное нам на "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '_', $str);
    $str=str_replace('__','_',$str);
    $str=str_replace('__','_',$str);
    $str=str_replace('__','_',$str);
    $str=str_replace('__','_',$str);
    $str=str_replace('__','_',$str);
    // удаляем начальные и конечные '-'
    $str = trim($str, "-");
    return $str;
}
?>