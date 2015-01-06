<?php

/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 28/10/14
 * Time: 12:44 AM
 */
require 'vendor/autoload.php';

class AdminController extends Base_Controller
{
       public function  ShowDashboard ()
       {
              $url = \Router\Router::make ( 'portfolio' );

              $title = "Eima Admin Dashboard";
              $date = \Date\jDate::forge ( "2014-09-11 05:14:49" )->format ( 'time' );
              $category = Category::find ( 1 );
              $category = $category->name;
              View::make ( "index", "admin", array (
                                  'title' => $title,
                                  'date' => $date,
                                  'category' => $category,
                                  'url' => $url
                        )
              );
       }

}