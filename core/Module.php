<?php
class Module{
    public static $infoModule;
    function showInfoMod(){
        if(Bootstrap::$useModule!=null)
        {
            self::$infoModule=Bootstrap::$useModule;
        }

        $config = Bootstrap::$_config;
        $module=$config['Modules'];

        self::$infoModule['count']=count($module);
        self::$infoModule['list']=array($module);

        return self::$infoModule;
    }
}
?>