<?php
class View{
    function __construct()
    {
        //echo 'This is the view<br>';
    }
    public function render($name, $noInclude = false)
    {
            if($noInclude == true){
                require 'app/views/'.$name.'.php';
            }  else
            {
                require 'views/header.php';
                require 'app/'.$name.'.php';
				//require 'app/modules/login/views/'.$name.'.php';
                require 'views/footer.php';
            }
       }
}
?>