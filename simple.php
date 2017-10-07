<?php
 
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
echo "request:" . serialize($request) . "\r\n <BR/>";
 
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
$key = array_shift($request)+0;
$action = array_shift($request);

echo "path_info:" . $_SERVER['PATH_INFO'] . "\r\n <BR/>";
echo "method:" . $method . "\r\n <BR/>";
echo "table:" . $table . "\r\n <BR/>";
echo "key:" .$key . "\r\n <BR/>";
echo "action:" . $action . "\r\n <BR/>";

?>