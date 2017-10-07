<?php
// SERVER

if(getenv('REQUEST_METHOD') == 'POST') {
	$client_data = file_get_contents("php://input");
	echo "
		<SERVER>
			Hello, I am server
			This is what I've got from you
			$client_data
		</SERVER>
	";
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
			'<xml><sample>client side data</sample></xml>'
	)">
Test
</button>
<BR/>
<textarea rows="10" cols="80" id="saida" value=""></textarea>
<!--//https://stackoverflow.com/questions/6665510/sending-a-raw-data-post-request-with-an-html-form-->