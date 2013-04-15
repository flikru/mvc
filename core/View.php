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
                require 'app/views/header.php';
                require 'app/views/'.$name.'.php';
                require 'app/views/footer.php';
            }
       }
}
?>