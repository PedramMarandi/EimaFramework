<?php

/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 10/11/2014
 * Time: 10:54 PM
 */
namespace Router;
include EIMA_DIR . DS . 'Router/AltoRouter.php';

class Router
{

       private static $instance;
       public static $finalMethod;


       public static function start ()
       {
              if ( !isset( self::$instance ) )
                     self::$instance = new \Router\AltoRouter();
              return self::$instance;
       }

       public static function make ($RouterName)
       {
              return self::$instance->generate ($RouterName);
       }


}
