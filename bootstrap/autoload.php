<?PHP
//include config files
include 'config.php';
//include composer and core classes and files
require ( VENDOR_DIR . DS . 'autoload.php' );
function EimaAutoload ( $class )
{
       if ( file_exists ( CONTROLLER_DIR . "/$class.php" ) ) {
              include CONTROLLER_DIR . "/$class.php";
       } else if ( file_exists ( CONTROLLER_DIR . "/$class.php" ) ) {
              include CONTROLLER_DIR . "/$class.php";
       } else if ( file_exists ( EIMA_VIEW . "/$class.php" ) ) {
              include EIMA_VIEW . "/$class.php";
       } else if ( file_exists ( EIMA_DIR . DS . "Controller/$class.php" ) ) {
              include EIMA_DIR . DS . "Controller/$class.php";
       } else if ( file_exists ( EIMA_DIR . DS . "RequestResponse/$class.php" ) ) {
              include EIMA_DIR . DS . "RequestResponse/$class.php";
       } else if ( file_exists ( EIMA_DIR . DS . "validator/$class.php" ) ) {
              include EIMA_DIR . DS . "validator/$class.php";
       } else if ( file_exists ( EIMA_DIR . DS . "$class.class.php" ) ) {
              include EIMA_DIR . DS . "$class.class.php";
       } else if ( file_exists ( EIMA_DIR . DS . "/Date/$class.php" ) ) {
              include EIMA_DIR . DS . "/Date/$class.php";
       } else if ( file_exists ( EIMA_DIR . DS . "/ErrorHandler/$class.php" ) ) {
              include EIMA_DIR . DS . "/ErrorHandler/$class.php";
       } else if ( file_exists ( EIMA_DIR . DS . "/Files/$class.php" ) ) {
              include EIMA_DIR . DS . "/Files/$class.php";
       } else if ( file_exists ( EIMA_DIR . DS . "/Router/$class.php" ) ) {
              include EIMA_DIR . DS . "/Router/$class.php";
       } else if ( file_exists ( MODEL_DIRECTORY . DS . "/$class.php" ) ) {
              include MODEL_DIRECTORY . DS . "/$class.php";
       } else if ( file_exists ( EIMA_MODELS . DS . "/$class.php" ) ) {
              include EIMA_MODELS . DS . "/$class.php";
       } else if ( file_exists ( EIMA_DIR . DS . "Router/$class.php" ) ) {
              include EIMA_DIR . DS . "Router/$class.php";
       }else if ( file_exists ( EIMA_DIR . DS . "RequerstResponse/$class.php" ) ) {
              include EIMA_DIR . DS . "RequerstResponse/$class.php";
       }else if ( file_exists ( EIMA_DIR . DS . "Files/$class.php" ) ) {
              include EIMA_DIR . DS . "Files/$class.php";
       }else if ( file_exists ( EIMA_DIR . DS . "HTML/$class.php" ) ) {
              include EIMA_DIR . DS . "HTML/$class.php";
       }

}

spl_autoload_register ( 'EimaAutoload' );
