<?php
/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 27/10/14
 * Time: 3:21 PM
 */
require ( 'autoload.php' );
if ( DEBUG === true ) {
       set_exception_handler ( array ( "eimaException", "getException" ) );
} else {
       exit();
}