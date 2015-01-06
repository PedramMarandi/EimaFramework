<?php

/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 17/11/2014
 * Time: 12:39 PM
 */
class Input extends \RequestResponse\SetAndGetMethod
{
       static $constant;
       public static function file ()
       {
              if ( self::$constant === null ) {
                     self::$constant =  new Files\Upload();
              }
              return self::$constant;
              }

       public static function getJust ($indexes)
       {
              print_r(array( $indexes));
       }

}