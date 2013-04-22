<h1>Редактирование профиля</h1>
<form method="post" action="<?php echo URL;?>user/editSave/<?php echo $this->user['id']; ?>">
	<label>Имя</label><input type="text" name="login" value="<?php echo $this->user['login']; ?>" /><br>
	<label>Пароль</label><input type="text" name="password"><br>
	<label>Группа</label>
		<select name="role">
			<option value="default" <?php if($this->user['role'] == 'default') echo 'selected'; ?>>Default</option>
			<option value="admin" <?php if($this->user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
			<option value="owner" <?php if($this->user['role'] == 'owner') echo 'selected'; ?>>Owner</option>
		</select><br>
	<label>&nbsp;</label><input type="submit">
</form>