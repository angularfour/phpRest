<?php
// SERVER

if(getenv('REQUEST_METHOD') == 'POST') {
  $client_data = file_get_contents("php://input");
  echo "client_data:" . $client_data . "\r\n";
  
  $method = $_SERVER['REQUEST_METHOD'];
  $request = explode('/', trim($client_data,'/'));
   
  $table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
  $key = array_shift($request)+0;
  $action = array_shift($request);

  echo "method:" . $method . "\r\n";
  echo "table:" . $table . "\r\n";
  echo "key:" .$key . "\r\n";
  echo "action:" . $action . "\r\n";
  
  exit();
}
?>

<!-- CLIENT -->
<script>
function sendAndLoad(sURL, sXML) {
	var r = null;
	if(!r) try { r = new ActiveXObject("Msxml2.XMLHTTP") } catch (e){}
	if(!r) try { r = new XMLHttpRequest() } catch (e){}
	if(!r) return null;
	r.open("POST", sURL, false);
	r.send(sXML);
	return r.responseText;
}
</script>

<button onclick="
	document.all['saida'].value = sendAndLoad(
			location.href,
			'/hello/1/update'
	)">
Test
</button>
<BR/>
<textarea rows="16" cols="80" id="saida" value=""></textarea>