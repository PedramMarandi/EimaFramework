<?PHP

/*
 * Database use PHP ACTIVERECORD ORM system
 * set your configurations of your database
 * if you need to add more database connections set your connection in vendor/eima/model/MasterModel.php
 *  add DBTYPE equal your database connection name
 * You can use  mysql, oracle, sql, sqlite, oci
 * */
define( 'DBUSER', 'root' );
define( 'DBPASS', '' );
define( 'DBHOST', 'localhost' );
define( 'DBNAME', 'eima' );
define( 'CHARSET', 'utf8' );
define( 'CONNECTION', 'mysql' );


define( 'DEBUG', true );
//website root
define( 'ROOT', dirname ( dirname ( __FILE__ ) ) );
// dolder seprators
define( 'DS', DIRECTORY_SEPARATOR );
//vendor and core files
define( 'VENDOR_DIR', ROOT . DS . 'vendor' );
// bootstrap directory
define( 'BOOTSTRAP_DIR', ROOT . DS . 'dir' );
//eima framework core
define( 'EIMA_DIR', VENDOR_DIR . DS . 'eima' );
//eima controllers
define( 'EIMA_CONROLLERS', EIMA_DIR . DS . 'Controller' );
//eima Model
define( 'EIMA_MODELS', EIMA_DIR . DS . 'Model' );
//eima view
define( 'EIMA_VIEW', EIMA_DIR . DS . 'view' );
//define Protected directory
define( 'PROTECTED_DIR', ROOT . DS . 'protected' );
//controllers directory
define( 'CONTROLLER_DIR', PROTECTED_DIR . DS . 'Controller' );
//Model directory
define( 'MODEL_DIRECTORY', PROTECTED_DIR . DS . 'Model' );
//vie directory
define ( 'VIEW_DIRECTORY', PROTECTED_DIR . DS . 'view' );
//Components Dir
define ( 'COMPONENTS_DIR', PROTECTED_DIR . DS . 'components' );
//define blade cache directory
define( 'BLADE_CACHE', ROOT . DS . 'public/cache' );
//smarty addons dir
//storage for file uploading default dir
define ( 'STORAGE', ROOT . DS . 'storage' );





