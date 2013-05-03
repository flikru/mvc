<?php
class Session{
    /**
     * Инициализация сессии
     * @static
     */
    public static function init()
    {
        @session_start();
    }

    /**
     * Помещение значения в сессию
     * @static
     * @param $key string Имя ключа
     * @param $value string Значение ключа
     */
    public static function set($key,$value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Получение значения сеcсии
     * @static
     * @param $key string Имя ключа
     * @return mixed Возвращает значение ключа
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
    }

    /**
     * Разрушение сессии
     * @static
     */
    public static function destroy()
    {
        session_destroy();
    }
}