<?PHP



use Philo\Blade\Blade;
class View
{
       protected static $folder    = null;
       protected static $template;
       protected static $directory = null;
       public static function make ( $filename, $directory = null,  $parameter = null )
       {
              $views = VIEW_DIRECTORY;
              $cache = BLADE_CACHE;
              $blade = new Blade( $views, $cache );
              if ( !is_null ( $directory ) ) {
                     $directory .= ".";
              }


              echo $blade->view ()->make ($directory.$filename,  $parameter);
       }

}

