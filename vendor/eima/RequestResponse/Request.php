<?php

/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 22/11/2014
 * Time: 12:49 AM
 */
class Request
{
       private static $method;
       private static $routerMethod;
       //return method name from get/post/request
       private static function setMethod ( $method )
       {
              $method = strtolower ( $method );
              switch ( $method ) {
                     case 'post':
                            $method = 'post';
                            break;
                     case 'get':
                            $method = 'get';
                            break;
                     case'request':
                            $method = 'request';
                            break;
              }
              return $method;
       }

       //return method array from $_GET/$_POST/$_REQUEST
       private static function getMethod ( $method )
       {
              $method = strtolower ( $method );
              switch ( $method ) {
                     case 'post':
                            $method = $_POST;
                            break;
                     case 'get':
                            $method = $_GET;
                            break;
                     case'request':
                            $method = $_REQUEST;
                            break;
              }
              return $method;
       }

       //return server request method
       public static function  requestMethod ()
       {
              self::$method = $_SERVER[ 'REQUEST_METHOD' ];
              return self::$method;
       }

       //check if method is equal to
       public static function  isMethod ( $method, $index = null )
       {
              if ( is_null ( $index ) ) {
                     $method = self::setMethod ( $method );
                     $requestMethod = self::setMethod ( self::requestMethod () );
                     //check if methods is equal
                     if ( $method == $requestMethod ) {
                            return true;
                     } else {
                            return false;
                     }
              } else if ( !is_null ( $index ) ) {
                     $method = self::setMethod ( $method );
                     $requestMethod = self::setMethod ( self::requestMethod () );
                     //check if methods is equal
                     $setmethod = self::getMethod ( $method );
                     if ( ( $method == $requestMethod ) && isset( $setmethod[ $index ] ) ) {

                            return true;
                     } else {
                            return false;
                     }
              }

       }

       //check method have this value
       public static function hasValue ( $method, $name, $value )
       {
              $method = self::getMethod ( $method );
              //check if value is not equal to method value
              if ( $method[ $name ] == $value ) {
                     return true;
              } else {
                     return false;
              }
       }
       //get value from method and index
       public static function getValue ( $method, $index )
       {
              $modifiedMethod = self::getMethod ( $method );
              if ( self::isMethod ( $method ) ) {
                     return $modifiedMethod[ $index ];
              }else {
              return false;
              }
       }

       //return router method
       public static function routerMethod ( $method )
       {
              self::$routerMethod = $method;
              return self::$routerMethod;
       }
       public static function url ()
       {
              return $_SERVER[ 'REQUEST_URI' ];
       }
       //return all of the input and files for the request
       public static function all ( $method )
       {
              $method = self::getMethod ( $method );
              return $method;
       }
// TODO: ahsFile ro dorst konam
       public static function hasFile ()
       {
       }
       //TODO : baraye inke header ajax ro check konam ghashng beram ajax ro yad begiram bbinam chi be chie o chia mikham
}