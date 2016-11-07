<?php
	chdir('../../../../storage/images/');
?>

<form method=post enctype='multipart/form-data'>
<input type="file" name="image">
<input type=submit>
</form>
<?php
	if(isset($_FILES['image']))
	{
		$filename='';
		$temp=explode('.',$_FILES['image']['name']);
		$ext=$temp[sizeof($temp)-1];
		unset($temp);
		$filename=date('YmdHis').'.'.$ext;
		if(move_uploaded_file($_FILES['image']['tmp_name'], $filename))
		{
			echo "<input type=hidden id='image' value='lib/storage/images/".$filename."'>";
			echo "<img src=\"".str_replace('/var/www/html','',getcwd()."/".$filename)."\">";
		}
	}
?>
