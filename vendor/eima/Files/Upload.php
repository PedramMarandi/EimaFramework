<?php

/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 13/11/2014
 * Time: 10:40 AM
 */
namespace Files;

class Upload
{

       //  name of input form
       public $inputName;
       // directory that you chose to upload file
       public $directory;
       //uploaded file name
       public $fileName;
       //return full adress of uplaoded file
       public $fullUploadedAdress;
       //uploaded file extention
       public static $ext;
       //uploaded file size
       public $fileSize;
       // errors
       public $error;

       public function Input ( $inputName )
       {
              //RETURN NAME OF UPLOAD FORM INPUT
              $this->inputName = $inputName;
              return $this;
       }

       //RETURN BITES TO ANOTHER FORMATS
       function convertToBytes ( $from )
       {
              $number = substr ( $from, 0, -2 );
              switch ( strtoupper ( substr ( $from, -2 ) ) ) {
                     case "KB":
                            return $number * 1024;
                     case "MB":
                            return $number * pow ( 1024, 2 );
                     case "GB":
                            return $number * pow ( 1024, 3 );
                     case "TB":
                            return $number * pow ( 1024, 4 );
                     case "PB":
                            return $number * pow ( 1024, 5 );
                     default:
                            return $from;
              }
       }

       //CHECK SIZE OF FILE
       public function FileSize ( $maxSize )
       {
              if ( $_FILES[ $this->inputName ][ 'size' ] >= $this->convertToBytes ( $maxSize ) ) {
                     throw new \eimaException( 'size error' . $this->convertToBytes ( $maxSize ) );
              }
              return $this;
       }

       //CHECK FORMAT OF FILE
       public function Format ( $formats = null )
       {
              $formats = strtoupper ( $formats );
              if ( strstr ( $formats, '|' ) ) {
                     $formtArray = explode ( '|', $formats );
                     $filename = $_FILES[ $this->inputName ][ 'name' ];
                     $ext = pathinfo ( $filename, PATHINFO_EXTENSION );
                     $ext = strtoupper ( $ext );
                     if ( !in_array ( $ext, $formtArray ) ) {
                            return $this->error[ 'fileType' ];
                     }
              } else {
                     $filename = $_FILES[ $this->inputName ][ 'name' ];
                     self::$ext = pathinfo ( $filename, PATHINFO_EXTENSION );
                     if ( $formats != $this->ext ) {
                            return $this->error[ 'fileType' ];
                     }
              }
              return $this;
       }

       public function Directory ( $directory = null )
       {
              if ( sizeof ( $this->error ) <= 0 ) {

                     $this->directory = ROOT . DS . $directory;
                     $this->filneName = trim ( microtime ( 5 ) . $_FILES[ $this->inputName ][ 'name' ] );
                     $this->fullUploadedAdress = $this->directory . DS . $this->filneName;

                     if ( is_null ( $directory ) ) {
                            $this->directory = STORAGE;
                            move_uploaded_file ( $_FILES[ $this->inputName ][ 'tmp_name' ], $this->directory . $_FILES[ $this->inputName ][ 'tmp_name' ] );

                     } else {
                            //CHECK IF DIRECTORY DOES NOT EXIST CREAT IT
                            if ( !file_exists ( ROOT . DS . $directory ) ) {
                                   mkdir ( $this->directory, 0777 );
                                   $this->directory = $directory;
                                   return move_uploaded_file ( $_FILES[ $this->inputName ][ 'tmp_name' ], $this->directory . DS . $this->filneName );
                            } else {
                                   return move_uploaded_file ( $_FILES[ $this->inputName ][ 'tmp_name' ], $this->directory . DS . $this->filneName );
                            }
                     }
              } else {
                     return false;
              }

       }

}
