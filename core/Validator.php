<?php
class Validator{
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

    public function clearData($data)
    {
        return stripslashes(trim(strip_tags($data)));
    }

    public function maxLength($string,$length)
    {
        return strlen($string)<=$length;
    }

    public function minLength($string,$length)
    {
        return strlen($string)>=$length;
    }

    public function exactLength($string,$length){
        return strlen($string)==$length;
    }

    public function ValidEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL)?true:false;

    }

    public function ValidDate($date){
        $pattern = '#[\d]{4}[-/][\d]{2}[-/][\d]{2}#';
        return preg_match($pattern, $date, $matches)?true:false;
    }

    public function ValidUrl($url) {
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url)?true:false;
    }

    public function filterString($string)
    {
        return stripslashes(strip_tags(trim($string)));
    }

    public function alpha($string)
    {
        return (!preg_match("/^([a-z])+$/i", $string))?false:true;
    }

//var_dump(Validate(array('f@s.ru','maxLength:10','minLength:1','validEmail')));

}
?>