<?php

/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 10/11/2014
 * Time: 1:03 PM
 */


class curd
{
       //GET ANOTHER PAGE SOURCE WITH CURL
       public function getPageSource ( $url )
       {
              $ch = curl_init ( $url );
              curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
              curl_setopt ( $ch, CURLOPT_BINARYTRANSFER, true );
              return $content = curl_exec ( $ch );
              curl_close ( $ch );
       }
}