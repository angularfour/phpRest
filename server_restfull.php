<?php
// SERVER
define('CHARSET', 'UTF-8');

    $client_data = file_get_contents("php://input");
    $client_data = str_replace("xml=","",$client_data);
    if($client_data=='' and isset($_REQUEST['xml'])==''){
      return '';
    }

    switch(getenv('REQUEST_METHOD'))
    {
      case 'POST':
        $action = "update";
        break;
      case 'GET':
        $action = "list";
        if(isset($_REQUEST['xml']))
          $client_data = $_REQUEST['xml'];
        break;
      case 'PUT':
        $action = "insert";
        break;
      case 'DELETE':
        $action = "delete";
        break;
    }

    $request = explode('/', trim($client_data,'/'));

    $table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
    $key = array_shift($request)+0;

    $client_data = str_replace("%2F", "/", $client_data);
    
	echo "
		<SERVER>
			The server received a call for $action
			This is the command
			$client_data
		</SERVER>
	";

    return;

?>