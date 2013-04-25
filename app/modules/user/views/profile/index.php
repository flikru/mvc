<h1>Профиль пользователя, <?php echo $_SESSION['login'];?></h1>
  <style>
      .sdiv{
        position:relative;
      }
      .snos{
          left:100;
          top:-110;
      }
  </style>
 <table>
<tr><td>
    <input type="image" height=110 width=130 src="http://localhost/mvc/upload/<?php if(isset($_SESSION['imgname'])) echo $_SESSION['imgname'];
    else
    echo 'default.jpg'; ;?>">
    <form action="profile/addAvatar" enctype="multipart/form-data" method="post">
        <input type='file' name='avatarAdd'> <br>
        <input type='submit' value="Отправить">
    </form>
</td>

     <td valign='top'>
    <form  action = "profile" method="post">
        <label>Имя: <?php if(isset($_SESSION['name']))echo $_SESSION['name'];?> <br>
        <label>Фамилия: <?php if(isset($_SESSION['family']))echo $_SESSION['family'];?> <br>
    </form>
     </td></tr>
 </table>