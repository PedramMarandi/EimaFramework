<?php

/**
 * Created by PhpStorm.
 * User: Pedram
 * Date: 29/10/14
 * Time: 3:24 PM
 */

/*
 * $RequestResponse->setMethod ('GET');
$RequestResponse->setValue (array('name' => 'Fariba'
                 ));
echo $RequestResponse->getValue ('name');
*/

/*
if (!($RequestResponse->get_http_response_code ("RequestResponse://www.mtaha.co"))) {
       echo " url doesn't exists";
}else {
       echo $RequestResponse->get_http_response_code ("RequestResponse://www.mtaha.co");
}*/


namespace RequestResponse;
 trait  RequestMethod
       {
       public  $method;

       //SET METHOD NAME TO PARAMETER
       public function setMethod ($methodName)
       {
              try {
                     if ($methodName == "GET") {
                            return $this->method = $_GET;
                     } elseif ($methodName == "POST") {
                            return $this->method = $_POST;
                     } else {
                            throw new \Exception("We can't find a Global prameter with this method" .  $this->method);
                     }
              }
              catch (\Exception $e) {
                     echo $e->getMessage ();
              }

       }

        public function getMethod ()
        {
              return $this->method;
        }





}