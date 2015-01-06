<?php
/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 10/11/2014
 * Time: 10:38 AM
 */


\ActiveRecord\Config::initialize
(
          function ( $cfg ) {
                 $cfg->set_model_directory ( MODEL_DIRECTORY );
                 $cfg->set_connections (
                           array (
                                  //TODO : check sqlite connection
                                     "mysql" => "mysql://" . DBUSER . ":" . DBPASS . "@" . DBHOST . "/" . DBNAME . "? charset" . "=" . CHARSET,
                                     'pgsql' => 'pgsql://' . DBUSER . ":" . DBPASS . "@" . DBHOST . "/" . DBNAME . "? charset" . "=" . CHARSET,
                                     'sqlite' => 'sqlite://my_database.db',
                                     'oci' => 'oci://' . DBUSER .':' . DBPASS . '@' . DBHOST .'/' . DBNAME

                           )

                 );
          }
);

class MasterModel extends \ActiveRecord\Model
{
       static $connection = CONNECTION;


}