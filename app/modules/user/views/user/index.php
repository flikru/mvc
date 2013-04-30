<h1>Пользователи</h1>
<br>
<?php if(Session::get('role')=='owner'):?>
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
     <?php endif; ?>
<hr>

<table></b><tr><td><b>ID</td><td><b>Имя</td><td><b>Роль</td></tr>
<?php
	foreach($this->userList as $key => $value) {
		echo '<tr>';
		echo '<td>' . $value['id'] . '</td>';
		echo '<td><a href="'.URL.'profile/show/'.$value['id'].'">'.$value['login'] . '</td>';
		echo '<td>' . $value['role'] . '</td>';

    if(Session::get('role')=='owner'):
		echo '<td>
				<a href="'.URL.'user/edit/'.$value['id'].'">Править</a>
				<a href="'.URL.'user/delete/'.$value['id'].'">Удалить</a></td>';
		echo '</tr>';
    endif;
	}
?>
</table>