<?php
$site_dir=str_replace('index.php','',$_SERVER["PHP_SELF"]);
include "config/config.php";
function getConfig($var){
    global $$var;
    if(isset($$var))
        return $$var;
    else
        return null;
}
function DB()
{
        $connection=getConfig('db_connection');
        try {   
                $db = new PDO('mysql:host='.$connection['host'].';dbname='.$connection['database'], $connection['user'], $connection['password']);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->exec("set names utf8");
                return $db;
        }
        catch(PDOException $e) {
        echo $e->getMessage();
        exit;
        }
}
$DB=DB();
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
    global $DB;
    if(is_file('controllers/'.$template_name.'.php'))
        include 'controllers/'.$template_name.'.php';
    if(is_file('templates/'.$template_name.'.php'))
        include 'templates/'.$template_name.'.php';
}
function LeftMenu(){
	global $site_dir;
    global $DB;
    $ret='';
    $ret.="<ul class='Menu'>\n";
    $quer = $DB->query("select categories.*,links.link from categories,links where links.type_obj=2 and links.id_obj=categories.id and parent_category=0");
    while($query = $quer->fetch(PDO::FETCH_ASSOC))

    {
            $ret.="<li><a href='".$site_dir.$query['link']."'>".$query['name']."</a></li>";
    }
    $ret.="</ul>\n";
	return $ret;
}
function Head(){
        global $site_dir;
	$ret='';
	$ret.="header";
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
function MetaTags(){
    global $DB;
    $ret='';
    $title='';
    $description='';
    $keywords='';
    if(isset($_GET['action'])){
        switch($_GET['action'])
        {
            default :   $substr=substr($_GET['action'],0,4);
                        $quer = $DB->prepare("select * from links where link=?");
                        $quer->execute(array($_GET['action']));
                        if($query = $quer->fetch(PDO::FETCH_ASSOC))
                        {
                            if($query['type_obj']==2)
                            {
                                $quer1 = $DB->prepare("select * from categories where id=?");
                                $quer1->execute(array($query['id_obj']));
                                if($query1 = $quer1->fetch(PDO::FETCH_ASSOC))
                                {
                                    $title=$query1['title'];
                                    $description=$query1['description'];
                                    $keywords=$query1['keywords'];
                                }
                            }
                            if($query['type_obj']==1)
                            {
                                $quer1=mysql_query("select * from articles where id=".$query['id_obj']);
                                $quer1 = $DB->prepare("select * from articles where id=?");
                                $quer1->execute(array($query['id_obj']));
                                if($query1 = $quer1->fetch(PDO::FETCH_ASSOC))
                                {
                                    $title=$query1['title'];
                                    $description=$query1['description'];
                                    $keywords=$query1['keywords'];
                                }
                            }
                      }
                      break;
        }
        if($title!='')
            $ret.="<title>$title</title>\n";
        if($description!='')
            $ret.='<meta name="description" content="'.$description.'">'."\n";
        if($keywords!='')
            $ret.='<meta name="keywords" content="'.$keywords.'">'."\n";
    }
    return $ret;
}
?>