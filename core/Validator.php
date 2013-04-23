<?php
class Validator{

         public function LengthString($string,$length,$type){
         switch($type){
             case 'max':return strlen($string)<=$length;
             case 'min':return strlen($string)>=$length;
             case 'exact':return strlen($string)==$length;
                     }
         }

         public function ValidEmail($email){
            return filter_var($email, FILTER_VALIDATE_EMAIL)==true;

         }

         public function ValidDate($date){
             $pattern = '#[\d]{4}[-/][\d]{2}[-/][\d]{2}#';
             return preg_match($pattern, $date, $matches);
         }

         public function ValidUrl($url) {
             return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
         }

        public function filterString($string)
        {
            return stripslashes(strip_tags(trim($string)));
        }


}
?>