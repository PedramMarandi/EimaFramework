<?php
/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 11/11/2014
 * Time: 1:27 PM
 */

class eimaException extends Exception
{

       public static   function getException ($exeption)
       {

              echo "in File : " . $exeption->getFile() . "</br>";
              echo "Message : " . $exeption->getMessage() . "</br>";
              echo "in Line : " . $exeption->getLine() . "</br>";
              echo "With Code : " . $exeption->getCode() . "</br>";
       }


}