<?php

/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 26/11/2014
 * Time: 3:26 PM
 */
class Form
{
       private static $formMethod;
       private static $formAction;
       private Static $file = false;
       private static $oneInput;
       //set method and action property
       //TODO : set if form isset send values to router and class action
       private static function setActionAndMethod ( array $option, array $parameters )
       {
              if ( array_key_exists ( 'router', $option ) ) { //add router action with router array key
                     self::$formAction = \Router\Router::make ( $option[ 'router' ] );
              }
              if ( array_key_exists ( 'action', $option ) ) { // add controller action with method array key
                     $controller = new \Controller\MasterController();
                     $controller->callAction ( $option[ 'action' ], $parameters );
              }
              if ( array_key_exists ( 'method', $option ) ) {
                     self::$formMethod = $option[ 'method' ];
              } else {
                     throw new eimaException( "Insert form method with 'method' array key" );
              }
       }

       //start HTML form
       public static function Start ( array $option = array (), array $extras = array (), array $parameters = array () )
       {
              //Add router action or controller action
              self::setActionAndMethod ( $option, $parameters );
              if ( array_key_exists ( 'file', $option ) && ( $option[ 'file' ] === true ) ) {
                     self::$file = true;
              }
              $formStart = '<form method="' . self::$formMethod . '" action="' . self::$formAction . '"';
              foreach ( $extras as $extraKey => $exteraValue ) {
                     $formStart .= $extraKey . '="' . $exteraValue . '"';
              }
              if ( self::$file === true ) {
                     $formStart .= 'enctype="multipart/form-data"';
              }
              $formStart .= '>';
              return $formStart;
       }

       public static function Input ( array $options = array (), array $extras = array () )
       {
              if ( array_key_exists ( 'name', $options ) ) {
                     $inputName = $options[ 'name' ];
              }
              //TODO : vaghti session handler dorost shod bayad inam ok konam alan nemishe
              /*if ( array_key_exists ( 'oldValue', $options ) ) {
                     $oldInputValue = ;

              }*/
              if ( array_key_exists ( 'value', $options ) ) {
                     $inputValue = $options[ 'value' ];
              }

              $inputStart = '<input type="text"';
              if ( isset( $inputValue ) ) {
                     $inputStart .= 'value="' . $inputValue . '"';
              }
              if ( isset( $inputName ) ) {
                     $inputStart .= 'name="' . $inputName . '"';
              }
              foreach ( $extras as $extraKey => $exteraValue ) {
                     if ( !is_int ( $extraKey ) ) {
                            $inputStart .= $extraKey . '="' . $exteraValue . '"';
                     } else if ( is_int ( $extraKey ) ) {
                            $inputStart .= $exteraValue;

                     }
              }
              $inputStart .= '>';
              return $inputStart;
       }

       public static function Password ( array $options = array (), array $extras = array () )
       {
              if ( array_key_exists ( 'name', $options ) ) {
                     $inputName = $options[ 'name' ];
              }
              //TODO : vaghti session handler dorost shod bayad inam ok konam alan nemishe
              /*if ( array_key_exists ( 'oldValue', $options ) ) {
                     $oldInputValue = ;

              }*/
              if ( array_key_exists ( 'value', $options ) ) {
                     $inputValue = $options[ 'value' ];
              }

              $inputStart = '<input type="password"';
              if ( isset( $inputValue ) ) {
                     $inputStart .= 'value="' . $inputValue . '"';
              }
              if ( isset( $inputName ) ) {
                     $inputStart .= 'name="' . $inputName . '"';
              }
              foreach ( $extras as $extraKey => $exteraValue ) {
                     if ( !is_int ( $extraKey ) ) {
                            $inputStart .= $extraKey . '="' . $exteraValue . '"';
                     } else if ( is_int ( $extraKey ) ) {
                            $inputStart .= $exteraValue;

                     }
              }
              $inputStart .= '>';
              return $inputStart;
       }

       public static function Radio ( array $options = array (), array $extras = array () )
       {
              if ( array_key_exists ( 'name', $options ) ) {
                     $inputName = $options[ 'name' ];
              }
              //TODO : vaghti session handler dorost shod bayad inam ok konam alan nemishe
              /*if ( array_key_exists ( 'oldValue', $options ) ) {
                     $oldInputValue = ;

              }*/
              if ( array_key_exists ( 'value', $options ) ) {
                     $inputValue = $options[ 'value' ];
              }

              $inputStart = '<input type="radio"';
              if ( isset( $inputValue ) ) {
                     $inputStart .= 'value="' . $inputValue . '"';
              }
              if ( isset( $inputName ) ) {
                     $inputStart .= 'name="' . $inputName . '"';
              }
              foreach ( $extras as $extraKey => $exteraValue ) {
                     if ( !is_int ( $extraKey ) ) {
                            $inputStart .= $extraKey . '="' . $exteraValue . '"';
                     } else if ( is_int ( $extraKey ) ) {
                            $inputStart .= $exteraValue;

                     }
              }
              $inputStart .= '>';
              return $inputStart;
       }

       public static function Checkbox ( array $options = array (), array $extras = array () )
       {
              if ( array_key_exists ( 'name', $options ) ) {
                     $inputName = $options[ 'name' ];
              }
              //TODO : vaghti session handler dorost shod bayad inam ok konam alan nemishe
              /*if ( array_key_exists ( 'oldValue', $options ) ) {
                     $oldInputValue = ;

              }*/
              if ( array_key_exists ( 'value', $options ) ) {
                     $inputValue = $options[ 'value' ];
              }

              $inputStart = '<input type="checkbox"';
              if ( isset( $inputValue ) ) {
                     $inputStart .= 'value="' . $inputValue . '"';
              }
              if ( isset( $inputName ) ) {
                     $inputStart .= 'name="' . $inputName . '"';
              }
              foreach ( $extras as $extraKey => $exteraValue ) {
                     if ( !is_int ( $extraKey ) ) {
                            $inputStart .= $extraKey . '="' . $exteraValue . '"';
                     } else if ( is_int ( $extraKey ) ) {
                            $inputStart .= $exteraValue;

                     }
              }
              $inputStart .= '>';
              return $inputStart;
       }

       public static function File ( array $options = array (), array $extras = array () )
       {
              if ( array_key_exists ( 'name', $options ) ) {
                     $inputName = $options[ 'name' ];
              }
              //TODO : vaghti session handler dorost shod bayad inam ok konam alan nemishe
              /*if ( array_key_exists ( 'oldValue', $options ) ) {
                     $oldInputValue = ;

              }*/
              $inputStart = '<input type="file"';
              if ( isset( $inputValue ) ) {
                     $inputStart .= 'value="' . $inputValue . '"';
              }
              if ( isset( $inputName ) ) {
                     $inputStart .= 'name="' . $inputName . '"';
              }
              foreach ( $extras as $extraKey => $exteraValue ) {
                     $inputStart .= $extraKey . '="' . $exteraValue . '"';
              }
              $inputStart .= '>';
              return $inputStart;
       }

       public static function Submit ( array $options = array (), array $extras = array () )
       {


              if ( array_key_exists ( 'name', $options ) ) {
                     $inputName = $options[ 'name' ];
              }
              //TODO : vaghti session handler dorost shod bayad inam ok konam alan nemishe
              /*if ( array_key_exists ( 'oldValue', $options ) ) {
                     $oldInputValue = ;

              }*/
              if ( array_key_exists ( 'value', $options ) ) {
                     $inputValue = $options[ 'value' ];
              }

              $inputStart = '<input type="submit"';
              if ( isset( $inputValue ) ) {
                     $inputStart .= 'value="' . $inputValue . '"';
              }
              if ( isset( $inputName ) ) {
                     $inputStart .= 'name="' . $inputName . '"';
              }
              foreach ( $extras as $extraKey => $exteraValue ) {
                     if ( !is_int ( $extraKey ) ) {
                            $inputStart .= $extraKey . '="' . $exteraValue . '"';
                     } else if ( is_int ( $extraKey ) ) {
                            $inputStart .= $exteraValue;

                     }
              }

              $inputStart .= '>';
              return $inputStart;
       }

       public static function Hidden ( array $options = array (), array $extras = array () )
       {
              if ( array_key_exists ( 'name', $options ) ) {
                     $inputName = $options[ 'name' ];
              }

              if ( array_key_exists ( 'value', $options ) ) {
                     $inputValue = $options[ 'value' ];
              }

              $inputStart = '<input type="hidden"';
              if ( isset( $inputValue ) ) {
                     $inputStart .= 'value="' . $inputValue . '"';
              }
              if ( isset( $inputName ) ) {
                     $inputStart .= 'name="' . $inputName . '"';
              }
              foreach ( $extras as $extraKey => $exteraValue ) {
                     if ( !is_int ( $extraKey ) ) {
                            $inputStart .= $extraKey . '="' . $exteraValue . '"';
                     } else if ( is_int ( $extraKey ) ) {
                            $inputStart .= $exteraValue;
                     }
              }
              $inputStart .= '>';
              return $inputStart;
       }

       public static function Teaxtarea ( array $options = array (), array $extras = array () )
       {
              if ( array_key_exists ( 'name', $options ) ) {
                     $textareaName = $options[ 'name' ];
              }

              if ( array_key_exists ( 'value', $options ) ) {
                     $textareaValue = $options[ 'value' ];
              }
              $textareaStart = '<textarea type="text"';

              if ( isset( $textareaName ) ) {
                     $textareaStart .= 'name="' . $textareaName . '"';
              }
              foreach ( $extras as $extraKey => $exteraValue ) {
                     if ( !is_int ( $extraKey ) ) {
                            $textareaStart .= $extraKey . '="' . $exteraValue . '"';
                     } else if ( is_int ( $extraKey ) ) {
                            $textareaStart .= $exteraValue;

                     }
              }
              $textareaStart .= '>';
              if ( isset( $textareaValue ) ) {
                     $textareaStart .= $textareaValue;
              }
              $textareaStart .= '</textarea>';
              return $textareaStart;
       }

       public static function Select ( $name, array $selectOptions = array (), array $extras = array () )
       {

              $selectStart = '<select ';

              if ( isset( $name ) ) {
                     $selectStart .= 'name="' . $name . '"';
              }
              foreach ( $extras as $extraKey => $exteraValue ) {
                     if ( !is_int ( $extraKey ) ) {
                            $selectStart .= $extraKey . '="' . $exteraValue . '"';
                     } else if ( is_int ( $extraKey ) ) {
                            $selectStart .= $exteraValue;

                     }
              }
              $selectStart .= '>';
              if ( count ( $selectOptions ) == count ( $selectOptions, COUNT_RECURSIVE ) ) {
                     //normal select form
                     foreach ( $selectOptions as $selectKey => $selectValue ) {
                            $selectStart .= '<option value="' . $selectKey . '">' . $selectValue . '</option>';
                     }
              } else {
                     //Group select form
                     $your_keys = array_keys ( $selectOptions );
                     $your_values = array_values ( $selectOptions );
                     $numKeys = array_keys ( $your_keys );
                     foreach ( $numKeys as $key ) {
                            $selectStart .= '<optgroup label=' . $your_keys[ $key ] . '>';
                            foreach ( $your_values[ $key ] as $valueKey => $valueSelect ) {
                                   $selectStart .= '<option value="' . $valueKey . '">' . $valueSelect . '</option>';
                            }
                            $selectStart .= "</optgroup>";
                     }
              }
              $selectStart .= "</select>";
              return $selectStart;
       }

       public static function End ()
       {
              $formEnd = "</form>";
              return $formEnd;
       }

}