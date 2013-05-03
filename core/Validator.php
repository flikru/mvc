<?php
class Validator{

    /**
     * Прогон данных по списку правил
     * @static
     * @param $param array Массив данных и используемых правил для валидации
     * @return bool Возвращает true если данные валидны, false если нет
     */
    public static function Validate($param){
        $string=self::clearData($param[0]);
        $count=count($param);

        for($i=1;$i<$count;$i++){
            $listMethod[]=explode(':',$param[$i]);
        }

        foreach($listMethod as $method){

            $lengthArr=count($method);
            $call=$method[0];
            if($lengthArr==1)
                $value = self::$call($string);
            if($lengthArr==2)
                $value = self::$call($string,$method[1]);

            if($value==false)
            {
                return false;
                break;
            }
        }
        return true;
    }

    /**
     * Фильтрация данных
     * @param $data string Данные
     * @return string
     */
    public function clearData($data)
    {
        return stripslashes(trim(strip_tags($data)));
    }

    /**
     * Максимальная длина строки
     * @param $string string Строка
     * @param $length integer Максимальная длина
     * @return bool
     */
    public function maxLength($string,$length)
    {
        return strlen($string)<=$length;
    }

    /**
     * Минимальная длина строки
     * @param $string string Строка
     * @param $length integer Минимальная длина
     * @return bool
     */
    public function minLength($string,$length)
    {
        return strlen($string)>=$length;
    }

    /**
     * Точная длина строки
     * @param $string string Строка
     * @param $length integer Точная длина
     * @return bool
     */
    public function exactLength($string,$length){
        return strlen($string)==$length;
    }

    /**
     * Проверка E-mail на валидностьы
     * @param $email string E-mail
     * @return bool
     */
    public function ValidEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL)?true:false;

    }

    /**
     * Валдиность даты
     * @param $date string Дата
     * @return bool
     */
    public function ValidDate($date){
        $pattern = '#[\d]{4}[-/][\d]{2}[-/][\d]{2}#';
        return preg_match($pattern, $date, $matches)?true:false;
    }

    /**
     * Валидность URL
     * @param $url URL
     * @return bool
     */
    public function ValidUrl($url) {
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url)?true:false;
    }

    /**
     * Фильтрация данных
     * @param $string string Строка
     * @return string
     */
    public function filterString($string)
    {
        return stripslashes(strip_tags(trim($string)));
    }

    /**
     * Определение ввода только букв английского алфавита
     * @param $string string Строка
     * @return bool
     */
    public function alpha($string)
    {
        return (!preg_match("/^([a-z])+$/i", $string))?false:true;
    }

//var_dump(Validate(array('f@s.ru','maxLength:10','minLength:1','validEmail')));

}
?>