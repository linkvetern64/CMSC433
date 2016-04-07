<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Select Classes</title>

<link rel="stylesheet" href="animated-checkboxes/css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="animated-checkboxes/css/classes.css" media="all" type="text/css" />
<script>
function show(){
  document.getElementById('content').innerHTML= "(201) Credits: 4.0 Description:  This class is ez-pez lemon sqeeze";
}

function hide(){
  document.getElementById('content').innerHTML="";
}
</script>

</head>
<body>
<form method="POST" action="classSelect.php">

  <div id="checkboxes">
      <input type="checkbox" name="201" value="201" id="201" />
      <input type="checkbox" name="202" value="202" id="202" />
      <input type="checkbox" name="203" value="203" id="203" />
      <input type="checkbox" name="304" value="304" id="304" />
      <input type="checkbox" name="313" value="313" id="313" />
      <input type="checkbox" name="331" value="331" id="331" />
      <input type="checkbox" name="341" value="341" id="341" />
      <input type="checkbox" name="411" value="411" id="411" />
  </div>

  <ul class="choice-list">
      <label class="choice" onmouseover="show()" onmouseleave="hide()" for="201"><li class="checkbox _201 "></li></label>
      <label class="choice" for="202"><li class="checkbox _202 "></li></label>
      <label class="choice" for="203"><li class="checkbox _203 "></li></label>
      <br />
      <hr>

      <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
      <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
      <label class="choice" for="331" ><li class="checkbox _331" ></li></label>
      <label class="choice" for="341" ><li class="checkbox _341" ></li></label>
      <br />
      <hr>

      <label class="choice" for="411" ><li class="checkbox _411" ></li></label>
      <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
      <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
      <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
      <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
      <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
      <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
      <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
      <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
      <label class="choice" for="313" ><li class="checkbox _313" ></li></label>
      <label class="choice" for="304" ><li class="checkbox _304" ></li></label>
      <label class="choice" for="313" ><li class="checkbox _313" ></li></label>

  </ul>

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <input type="submit" />
  <p id="content"> </p>
</form>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="animated-checkboxes/js/animated-checkboxes.js"></script>
</body>
</html>