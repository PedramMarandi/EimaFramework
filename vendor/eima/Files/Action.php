<?php

/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 17/11/2014
 * Time: 5:58 PM
 */
namespace Files;

trait Action
{
       //DELETE FILE FROM DIRECTORY
       public static function  Delete ( $filename )
       {
              if ( self::exists ( $filename ) ) {
                     return unlink ( $filename );

              } else {
                     throw new \eimaException( 'File ' . $filename . " doesn't exists" );
                     return false;
              }
       }

       //Move file to another place and delete old file
       public static function Move ( $filename, $newdirectory )
       {
              if ( self::exists ( $filename ) ) {
                     $masterName = pathinfo ( $filename, PATHINFO_FILENAME );
                     $masterExtension = pathinfo ( $filename, PATHINFO_EXTENSION );
                     $dir = str_replace ( $masterName . "." . $masterExtension, "", $filename );
                     $filename = $dir . $masterName . "." . $masterExtension;
                     echo $filename;
                     if ( substr ( $newdirectory, -1 ) !== '/' ) {
                            $newdirectory .= '/';

                     }
                     rename ( $filename, $newdirectory );

              } else {
                     return false;
              }
       }
       //Rename file
       public static function Rename ( $filename, $newFilename )
       {
              if ( self::exists ( $filename ) ) {
                     $masterExtension = pathinfo ( $filename, PATHINFO_EXTENSION );
                     $masterName = pathinfo ( $filename, PATHINFO_FILENAME );
                     $dir = str_replace ( $masterName . "." . $masterExtension, "", $filename );
                     $filename = $dir . $masterName . "." . $masterExtension;


                     return rename ( $filename,$dir .  $newFilename . "." . $masterExtension );

              } else {
                     return false;
              }
       }
       //copy file to another place and keep current file
       public static function Copy ( $filename, $newFile )
       {
              if ( self::exists ( $filename ) ) {
                     return copy ( $filename, $newFile );

              } else {
                     return false;
              }
       }
       //check file exists
       public static function exists ( $filename )
       {
              if ( file_exists ( $filename ) ) {
                     return true;
              } else {
                     return false;
              }
       }

       // return file extension
       public static function Type ( $filename )
       {
              if ( self::exists ( $filename ) ) {
                     return pathinfo ( $filename, PATHINFO_EXTENSION );
              } else {
                     return false;
              }
       }

       //check is file or not
       public static function isFile ( $filename )
       {
              if ( is_file ( $filename ) ) {
                     return true;
              } else {

                     return false;
              }
       }
       //return file size
       public static function Size ( $filename )
       {
              if ( self::exists ( $filename ) ) {
                     return filesize ( $filename );
              } else {
                     return false;
              }
       }
       //get files and folders in directory
       public static function  getDirectories ( $directoryName )
       {
              $dirs = array_diff ( scandir ( $directoryName ), Array ( ".", ".." ) );
              return $dirs;
       }
       //delte directory
       public static function  deleteDirectory ( $directoryName )
       {
              if ( self::isDir ( $directoryName ) ) {
                     return rmdir ( $directoryName );
              } else {
                     return false;
              }
       }
       //remove all of the directory file andfolders if have 0777 permision
       public static function emptyDirectory ( $directoryName )
       {
              if ( self::isDir ( $directoryName ) ) {
                     $read_sub1 = opendir ( $directoryName );
                     while ( false !== ( $files = readdir ( $read_sub1 ) ) ) {
                            if ( $files != "." && $files != ".." ) {
                                   return unlink ( $directoryName . "/" . $files );
                            }

                     }
                     return false;
              }
       }
       //check if is directory
       public static function isDir ( $directoryName )
       {
              if ( is_dir ( $directoryName ) ) {
                     return true;
              } else {
                     return false;
              }
       }
       //return files likethe pattern
       public static function glob ( $glob )
       {
              $matches = glob ( $glob );
              if ( is_array ( $matches ) && ( count ( $matches ) > 0 ) ) {
                     return $matches;
              } else {
                     return false;
              }
       }

       //Return name of file
       public static function Name ( $filename )
       {
              if ( self::isFile ( $filename ) ) {
                     return trim ( pathinfo ( $filename, PATHINFO_FILENAME ) );
              }else {
                     throw new \eimaException( "File that you want i can't find with this name " . $filename );
                     return false;
              }
       }



}