<?php require 'server_restfull.php'; ?>
<!-- CLIENT -->
<script>
function sendAndLoad(sURL, sXML, sType) {
	var r = null;
	if(!r) try { r = new ActiveXObject("Msxml2.XMLHTTP") } catch (e){}
	if(!r) try { r = new XMLHttpRequest() } catch (e){}
	if(!r) return null;
	r.open(sType, sURL, false);
	r.send(sXML);
	return r.responseText;
}
function buttonClick(){
  var type = document.all['type'].value;
  document.all['output'].value = sendAndLoad(location.href,'/hello/1',type);
}
</script>

<button onclick="buttonClick();">Test Post</button>
<select id="type">
  <option value="POST">update</option>
  <option value="PUT">insert</option>
  <option value="GET">list</option>
  <option value="DELETE">delete</option>
</select>
<BR/>
<textarea rows="16" cols="80" id="output" value=""></textarea>