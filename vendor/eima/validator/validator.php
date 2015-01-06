<?php
/**
 * Created by PhpStorm.
 * User: Javantarh
 * Date: 9/11/2014
 * Time: 1:28 AM
 */
namespace Validator;
class Validator
{
       public  $error = array();
       protected $fails = false;
       public  $errorsParams = array();
       public $errors = array();
       
       use \RequestResponse\RequestMethod;

       public function validator (array $input)
       {

              foreach ($input as $methodKey => $rules) {
                     $method = $this->method; //GET METHOD
                     $value = $method[$methodKey]; // GET VALUE OF KEY
                     if (strstr ($rules, '|')) {
                            $sepratedRules = explode ('|', $rules);
                            foreach ($sepratedRules as $key => $sepratedValue) {

                                   if (strstr ($sepratedValue, '=') !== FALSE) {
                                          $sepratedValue = explode ('=', $sepratedValue);
                                          $rule = $sepratedValue[0];
                                          $ruleValue = $sepratedValue[1];
                                          $methodName = 'Validator_' .  $rule ;

                                   }else {
                                   $methodName = 'Validator_' . $sepratedValue  ;
                                   $ruleValue = null;
                                   }
                                   $result =  $this->$methodName($value, $methodKey, $ruleValue);

                            }
                     }

              }

       }

       public function errorHandler ($validatorName, $errorParams)
       {

              switch ($validatorName) {

                     case("Validator_max"):
                            return $this->error['Validator_max'] = "maximum character this " . $errorParams['key'] . ' is ' . $errorParams['param'] . "</ br>";
                            break;
                     case("Validator_min"):
                            return $this->error['Validator_min'] = "Minumum character of this " . $errorParams['key'] . ' is ' . $errorParams['param'] . "</ br>";
                            break;
                     case("Validator_email"):
                            return $this->error['Validator_email'] = "Email format of " . $errorParams['key'] . " is incorrect" . "</ br>";
                            break;
                     case("Validator_url"):
                            return $this->error['Validator_url'] = "URL format of " . $errorParams['key'] . " is is incorrect" . "</ br>";
                            break;
                     case("Validator_ip"):
                            return $this->error['Validator_ip'] = "ip format of " . $errorParams['key'] . " is is incorrect" . "</ br>";
                            break;
                     case("Validator_number"):
                            return $this->error['Validator_number'] = "your input of " . $errorParams['key'] . " must be number" . "</ br>";
                            break;
                     case("Validator_required"):
                            return $this->error['Validator_required'] = "please inter " . $errorParams['key'] . " field" . "</ br>";
                            break;
              }


       }
       
       //set error messages
       public  function fails ($error = null)
       {
              return $error = $this->error;

       }

       //maxumum charactrer validation
        function Validator_max ($value, $rule, $param = null)
       {
              if (strlen ($value) > $param) {
                     $errorParams = $this->errorsParams = array(
                               "param" => $param,
                               'key' => $value,
                               'rule' => $rule
                     );
                     $this->errorHandler (__FUNCTION__, $errorParams);

              }
       }

       // minimum character validation
       public  function Validator_min ($value, $rule, $param)
       {

              if (strlen ($value) < $param) {
                     $errorParams = $this->errorsParams = array(
                               "param" => $param,
                               'key' => $value,
                               'rule' => $rule
                     );
                     $this->errorHandler (__FUNCTION__, $errorParams);
              }


       }

       public  function Validator_required ($value, $rule, $param = null)
       {
              if (isset($value) && ($value === false || $value === 0 || $value === 0.0 || $value === "0" || $value === '' || empty($value))) {
                     $errorParams = $this->errorsParams = array(
                               "param" => $param,
                               'key' => $value,
                               'rule' => $rule
                     );
                     $this->errorHandler (__FUNCTION__, $errorParams);
              }


       }


       // Email valdiation
       public  function Validator_email ($value, $rule, $param = null)
       {
              if (!filter_var ($value, FILTER_VALIDATE_EMAIL)) {
                     $errorParams = $this->errorsParams = array(
                               "param" => $param,
                               'key' => $value,
                               'rule' => $rule
                     );
                     $this->errorHandler (__FUNCTION__, $errorParams);
              }
       }

       //URL validation
       public  function Validator_url ($value, $rule, $param = null)
       {
              if (!filter_var ($value, FILTER_VALIDATE_URL)) {
                     $errorParams = $this->errorsParams = array(
                               "param" => $param,
                               'key' => $value,
                               'rule' => $rule
                     );
                     $this->errorHandler (__FUNCTION__, $errorParams);
              }

       }

       //ip adress validator
       public  function Validator_ip ($value, $rule, $param = null)
       {
              if (!filter_var ($value, FILTER_VALIDATE_IP)) {
                     $errorParams = $this->errorsParams = array(
                               "param" => $param,
                               'key' => $value,
                               'rule' => $rule
                     );
                     $this->errorHandler (__FUNCTION__, $errorParams);
              }

       }

       public  function Validator_number ($value, $rule, $param = null)
       {
              if (!is_numeric (trim ($value))) {
                     $errorParams = $this->errorsParams = array(
                               "param" => $param,
                               'key' => $value,
                               'rule' => $rule
                     );
                     $this->errorHandler (__FUNCTION__, $errorParams);
              }
       }


}
