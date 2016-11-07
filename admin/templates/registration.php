<form method="post">
	<table>
		<tr><td>Логин</td><td><input type="text" name="login" value="<?php echo $login?>"></td></tr>
		<tr><td>Пароль</td><td><input type="password" name="password" value=""</td></tr>
		<tr><td>Имя</td><td><input type="text" name="name" value="<?php echo $name?>"></td></tr>
		<tr><td>Фамилия</td><td><input type="text" name="surname" value="<?php echo $surname?>"</td></tr>
		<tr><td>Страна</td><td><?php echo ComboBox('country',$countryArray,$country)?></td></tr>
		<tr><td>Город</td><td><?php echo ComboBox('city',$cityArray,$city)?></td></tr>
		<tr><td>Дата рождения</td><td><input type="text" name="birthday" value="<?php echo $birthday?>"</td></tr>
		<tr><td><input type="submit" value="Save"></td><td></td></tr>
	</table>
</form>