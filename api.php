<?php

  require_once("Rest.inc.php");

  class API extends REST {

    public $data = "";
    private $db = NULL;

    public function __construct(){
      parent::__construct();
    }

    /*
     * Public method for access api.
     * This method dynmically call the method based on the query string
     *
     */
    public function processApi(){
      //echo $_SERVER['REQUEST_URI'] . "\r\n";
      //echo $_SERVER['QUERY_STRING'] . "\r\n";
      echo $_SERVER['PATH_INFO'] . "\r\n";
      echo strtolower(trim(str_replace("/","",$_SERVER['PATH_INFO']))) . "\r\n";
      
      $func = strtolower(trim(str_replace("/","",$_SERVER['PATH_INFO'])));
      if((int)method_exists($this,$func) > 0)
        $this->$func();
      else
        $this->response('Error code 404, Page not found',404);   // If the method not exist with in this class, response would be "Page not found".
    }

    private function hello(){
      echo str_replace("this","that","HELLO WORLD!!");
    }
    
    private function hello_id($id){
      echo "HELLO WORLD!! {$id}";
    }

    private function test(){    
      // Cross validation if the request method is GET else it will return "Not Acceptable" status
      if($this->get_request_method() != "GET"){
        $this->response('',406);
      }
      $myDatabase= $this->db;// variable to access your database
      $param=$this->_request['var'];
      // If success everythig is good send header as "OK" return param
      $this->response($param, 200);    
    }

    /*
     *  Encode array into JSON
    */
    private function json($data){
      if(is_array($data)){
        return json_encode($data);
      }
    }

  }

  // Initiiate Library
  $api = new API;
  $api->processApi();
?>