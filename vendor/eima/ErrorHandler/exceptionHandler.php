<?php
/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 11/11/2014
 * Time: 12:41 PM
 */
namespace ErrorHandler;

class exceptionHandler
{
       public static $message;
       public static $fileName;
       public static $line;
       public static $code;

       public static   function getException ($exeption)
       {
              self::$code = $exeption->getCode();
              self::$fileName = $exeption->getFile();
              self::$line = $exeption->getLine();
              self::$message = $exeption->getMessage();
              echo $exeption->getFile();
       }


}
