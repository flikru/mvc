<h1>Профиль пользователя,
    <?php
    Session::init();
    echo $_SESSION['login'];
    ?>
</h1>

 <table>
    <tr><td>
        <input type="image" height=150 width=150 src="<?php
        echo URL; ?>upload/<?php
        if(isset($data['avatar']))
        echo $data['avatar'];
        else
        echo 'default.jpg';?>">

        <form action="profile/addAvatar" enctype="multipart/form-data" method="post">
            <input type='file' name='avatarAdd'> <br>
            <input type='submit' value="Отправить">
        </form>

    </td>

         <td valign='top'>
        <form  action = "profile/editData" method="post">
            <table>
                <tr>
                    <td>
                        <i>Имя:</i>
                    </td>
                    <td>
                        <b>
                            <input type='text' name='name' value=<?php if(isset($data['name']))echo $data['name'];?>>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i>Фамилия:</i>
                    </td>
                    <td>
                        <b>
                            <input type='text' name='family' value=<?php if(isset($data['family']))echo $data['family'];?>>
                        </b>
                    </td>
                </tr>
            </table>
            <input type = 'submit' value = 'Изменить'>
        </form>
         </td></tr>
 </table>
     <?php
        //var_dump($_SERVER);
    ?>