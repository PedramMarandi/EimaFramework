<?PHP
include EIMA_DIR . DS . 'Router/Router.php';
$router =  \Router\Router::start();
$router->setBasePath ( '/Framework' );
$router->map ( 'GET', '/', 'Home_Controller@SayHello', 'home' );
$router->map ( 'GET', '/admin', 'AdminController@ShowDashboard', 'admin' );
$router->map ( 'GET', '/portfolio', function () {
                 View::make ( 'portfolio', 'front' );
          }, 'portfolio'
);

$router->map ( 'GET', '/up', 'Home_Controller@upload', 'upload' );
$router->map ( 'GET', '/filemanager', 'Home_Controller@fileManager', 'filemanager' );
$router->map ( 'GET|POST', '/form', 'Home_Controller@formHandler', 'form' );

$router->map ( 'POST', '/up', 'Home_Controller@uploadpost', 'uploadpost' );

$match = $router->match ();
if ( $match ) {
       if ( is_string ( $match[ 'target' ] ) ) {
              $controller = new \Controller\MasterController();
              $controller->callAction ( $match[ 'target' ], $match[ 'params' ] );
       } else if ( $match && is_callable ( $match[ 'target' ] ) ) {
              call_user_func_array ( $match[ 'target' ], $match[ 'params' ] );
       }
} else {
       $requestUrl = $_SERVER[ 'REQUEST_URI' ];

       throw new eimaException( "In Safte ( $requestUrl ) Vojod Nadarad  ( $router->method )" );
}



