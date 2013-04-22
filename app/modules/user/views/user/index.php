<h1>Пользователи</h1>
<br>
<font size =4> Добавить нового:</font>
<form method="post" action="<?php echo URL;?>user/create">
	<label>Имя</label><input type="text" name="login"><br>
	<label>Пароль</label><input type="text" name="password"><br>
	<label>Группа</label>
		<select name="role">
			<option value="default">Default</option>
			<option value="admin">Admin</option>
		</select><br>
	<label>&nbsp;</label><input type="submit">
</form>

<hr>

<table>
<?php
	foreach($this->userList as $key => $value) {
		echo '<tr>';
		echo '<td>' . $value['id'] . '</td>';
		echo '<td>' . $value['login'] . '</td>';
		echo '<td>' . $value['role'] . '</td>';
		echo '<td>
				<a href="'.URL.'user/edit/'.$value['id'].'">Править</a>
				<a href="'.URL.'user/delete/'.$value['id'].'">Удалить</a></td>';
		echo '</tr>';
	}
?>
</table>