<?php
/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 9/11/2014
 * Time: 10:30 AM
 */
namespace RequestResponse;

class SetAndGetMethod
{
       use \RequestResponse\RequestMethod;

       static protected $uploadInputName;
       protected static $onlyInstance;


       public static function __callStatic ( $methodName, $args )
       {


                     if ( preg_match ( '~^(get|request|file|set)([a-z|A-Z])(.*)$~', $methodName, $matches ) ) {
                            $whoCalled = get_called_class() ;
                            $property = strtolower ( $matches[ 1 ] );
                            $inputName = $matches[ 2 ] . $matches[ 3 ];
                            if ( !method_exists ( __CLASS__, $property ) ) {
                                   throw new \Exception( 'Property ' . $property . ' not exists' );
                            }
                            switch ( $matches[ 1 ] ) {

                                   case 'get':
                                          return self::get ( $inputName, $whoCalled );
                                   case 'request':
                                          return self::request ( $inputName, $whoCalled );
                                   case 'file':
                                          return self::file ( $inputName, $whoCalled );
                                   case 'set':
                                          return self::set ( $inputName, $args, $whoCalled );
                                   case 'default':
                                          throw new \eimaException ( 'Method ' . $methodName . ' not exists' );
                            }
                     }

       }

       protected static function getself ()
       {
              if ( static::$onlyInstance === null ) {
                     static::$onlyInstance = new self;
              }
              return static::$onlyInstance;
       }
       public static function get ( $property, $whoCalled )
       {
              if($whoCalled = "input")
              if ( isset( $_GET[ $property ] ) ) {
                     $property = $_GET[ $property ];
                     return $property;
              } else {
                     return false;
              }
       }
       public static function set ( $property, $whoCalled )
       {
              return get_called_class();
       }



       public static function request ( $property )
       {
              if ( isset( $_REQUEST[ $property ] ) ) {
                     $property = $_REQUEST[ $property ];
                     return $property;
              } else {
                     return false;
              }

       }


       public function setUploadInputName ()
       {
              return $this->Input ( self::$uploadInputName );
       }
}