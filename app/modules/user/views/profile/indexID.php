<h1>Профиль пользователя,
    <?php
    Session::init();
    echo $data['login'];
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

    </td>

         <td valign='top'>

            <table>
                <tr>
                    <td>
                        <i>Имя:</i>
                    </td>
                    <td>
                        <b>
                            <input type='text' readonly="true" name='name' value=<?php if(isset($data['name']))echo $data['name'];?>>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i>Фамилия:</i>
                    </td>
                    <td>
                        <b>
                            <input type='text' readonly="true" name='family' value=<?php if(isset($data['family']))echo $data['family'];?>>
                        </b>
                    </td>
                </tr>
            </table>

         </td></tr>
 </table>
<form  action="<?php echo URL ?>profile/addMessage/<?php echo $data['id'] ?>" method = 'post'>
    Написать сообщение <input type='text' name='msg'>
    <input type = 'submit' value = 'OK'>
</form>

<table><tr><td><b>ID-отправителя</td><td><b>Сообщение</td><td><b>Время</td></tr>
    <?php
    $msg=$data['message'];
    foreach($msg as $item)
        echo '<tr><td><center>'.$item['id_who'].'</center></td><td>'.$item['text'].'</td><td>'.$item['date'].'</td></tr>';

    ?>
</table>