<html>
<head>
    <title>MVC</title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">
    <script type="app/text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
    <script type="app/text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
    <?php
    if (isset($this->js))
    {
        foreach ($this->js as $js)
        {
            echo '<script type="text/javascript" src="'.URL.'app/views/'.$js.'"></script>';
        }
    }
    ?>
</head>
<body>

<?php Session::init(); ?>

<div id="header">

        <?php if (Session::get('loggedIn') == false):?>
    <a href="<?php echo URL; ?>index">Главная</a>
    <a href="<?php echo URL; ?>help">Помощь</a>
        <?php endif; ?>
        <?php if (Session::get('loggedIn') == true):?>
    <a href="<?php echo URL; ?>dashboard">Сообщения</a>

        <?php if (Session::get('role') == 'owner'):?>
    <a href="<?php echo URL; ?>user">Пользователи</a>
        <?php
    endif;
    ?>

    <a href="<?php echo URL; ?>dashboard/logout">Выйти</a>
    <?php else: ?>
    <a href="<?php echo URL; ?>login">Войти</a>
    <?php endif; ?>
</div>

<div id="content">