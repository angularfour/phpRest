<meta charset="UTF-8">
<script src="jquery-3.2.1.min.js"></script>
<?php require 'server_restfull.php'; ?>
<!-- CLIENT -->
<script>
function sendAndLoad(sURL, sXML, sType) {
    $.ajax({
      url: sURL,
      type: sType,
      //dataType: "JSON",
      data: { 
        xml: sXML
      },
      beforeSend: function (xhr) {
          xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");
      },
      success: function(response) {
        document.all['output'].value = response;
      },
      error: function(xhr) {
        document.all['output'].value = "error " + xhr;
      }
    });
}
function buttonClick(){
  var type = document.all['type'].value;
  sendAndLoad('server_restfull.php','/hello/1',type);
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