<?php

/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 27/10/14
 * Time: 4:04 PM
 */
namespace Controller;

class MasterController
{
       public static $action;
       public  static  $controller ;
       public static function callAction ($Controller, array $params )
       {
             self::$controller = $Controller;
              list($controller, $action) = explode ('@', $Controller);
              if (is_callable (array($controller, $action))) {
                     MasterController::$action = new $controller; // make instance of called Controller in Router.php
                     call_user_func_array (array(MasterController::$action, $action), $params); // call function
              } else {
                     throw new \eimaException( 'Controller ' . $Controller . ' not found' );
              }


       }

}