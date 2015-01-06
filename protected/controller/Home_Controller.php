<?PHP

class Home_Controller extends Base_Controller
{
       public $title = "Eima Framework";

       public function SayHello ()
       {
              if ( Request::isMethod ( 'get', 'u' ) ) {
                     $result = Request::all ( 'get' );
              } else {
                     $result = Input::getJust ( 'username', 'passs', 'name' );
              }
              View::make ( 'index', 'front', array ( 'name' => $result ) );
       }

       public function upload ()
       {
              View::make ( 'upload', 'front', array ( 'format' => Input::file ()->fullUploadedAdress ) );

       }

       public function uploadpost ()
       {
              if ( isset ( $_POST[ 'submit' ] ) ) {
                     Input::file ()->Input ( 'Upload' )->FileSize ( '2MB' )->Directory ( 'upload' );
                     View::make ( 'upload', 'front', array ( 'format' => Input::file ()->filneName ) );
              }
       }

       public function fileManager ()
       {
              //              $delete = File::Delete ( 'upload/1416989341.3607h-slider-1.jpg' );
              $glob = File::glob ( 'upload/*.jpg' );
              $glob2 = File::glob ( 'upload/mard_yani/*.jpg' );
              //              File::Rename ( 'upload/mard_yani/asd.jpg', 'pedrammarandi' );


              View::make ( 'filemanager', 'front', array (
                                  'glob' => $glob,
                                  'glob2' => $glob2,

                        )
              );
       }

       public function formHandler ()
       {
              Form::Start ( array ( 'router' => 'home', 'method' => 'post' ) );

              View::make ( 'form', 'front' );
       }

       public function echoString ()
       {
              echo "hello";
       }

}
