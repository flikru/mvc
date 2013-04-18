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
                if(Bootstrap::$useModule==null)
                require 'app/views/'.$name.'.php';
                else
				require 'app/modules/'.Bootstrap::$useModule.'/views/'.$name.'.php';
                require 'views/footer.php';
            }
       }
}
?>