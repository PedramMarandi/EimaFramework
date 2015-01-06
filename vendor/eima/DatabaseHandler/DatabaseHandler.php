<?PHP
include 'config.php';

/**
 * Class Database
 */
class Database
{
       private static $host = DB_HOST;
       private static $user = DB_USER;
       private static $pass = DB_PASS;
       private static $dbname = DB_NAME;
       private static $error;
       static $dbh;
       static $result;
       static $stmt;
       public static $method = null;

       //MAKE CONNECTION TO DATABASE WITH PDO
       private static function SetHandler ()
       {
              //set DSN
              $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbname;
              $option = array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_PERSISTENT => true,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH
              );
              if (!isset(self::$_mHandler)) {
                     // Execute code catching potential exceptions
                     try {
                            // Create a new PDO class instance
                            self::$dbh = new PDO($dsn, self::$user, self::$pass, $option);
                            self::$dbh->exec ("set names UTF8");
                            return self::$dbh;
                     } catch (PDOException $e) {
                            self::$error = $e->getMessage () . $e->errorInfo;
                     }
              }
       }

       //Set database free
       public static function Close ()
       {
              self::$dbh = null;
       }

       //SELECT ROWS FROM DATABASE
       public static function query ($sql, $parms = NULL)
       {
              try {
                     $getHandler = self::SetHandler ();
                     self::$stmt = $getHandler->prepare ($sql);
                     // add customized parameters
              } catch (PDOException $e) {
                     self::$error = $e->getMessage ();
              }

       }

       //execut record from database
       public static function execute ()

       {
              if (empty(Validator::$error)) {
                     self::$stmt->execute ();
              }

       }

       //get latest inserted id from database
       public static function lastInsertId ()
       {
              try {
                     self::$dbh->lastInsertId ();
              } catch (PDOException $e) {
                     echo self::$error = 'we have error in count of rows ' . $e->getMessage () . ' in line ' . $e->getLine ();
              }
       }

       //get row count of table
       public static function  resultCount ()
       {
              try {
                     return self::$stmt->rowCount ();
              } catch (PDOException $e) {
                     echo self::$error = 'we have error in count of rows ' . $e->getMessage () . ' in line ' . $e->getLine ();
              }
       }

       public static function rowCount ()
       {
              try {
                     return self::$stmt->fetchColumn ();

              } catch (PDOException $e) {
                     echo self::$error = 'we have error in count of rows ' . $e->getMessage () . ' in line ' . $e->getLine ();
              }
       }

       //add query to array
       public static function resultSet ()
       {
              self::execute ();
              return self::$stmt->fetchAll (PDO::FETCH_BOTH);
       }

       //add single record to array
       public static function single ()
       {
              self::execute ();
              return self::$stmt->fetch (PDO::FETCH_ASSOC);
       }

       public static function bind (array $param, $type = NULL)
       {
              foreach ($param as $ParamKey => $ParamValue) {
                            $value = $ParamValue;
                            if (is_null ($type)) {
                                   switch (true) {
                                          case is_int ($value) :
                                                 $type = PDO::PARAM_INT;
                                                 break;
                                          case is_bool ($value):
                                                 $type = PDO::PARAM_BOOL;
                                                 break;
                                          case is_null ($value):
                                                 $type = PDO::PARAM_NULL;
                                                 break;
                                          default :
                                                 $type = PDO::PARAM_STR;
                                   }
                            }
                        self::$stmt->bindValue ($ParamKey, $value, $type);

                     }




       }


}