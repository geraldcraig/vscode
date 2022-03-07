<!DOCTYPE html>
<html>
<head>
<meta content="charset=utf-8" http-equiv="Content-Type">
<title>amazing facts</title>
</head>

<body>
 
<form action='processinsert.php' method='POST'> 
	<p>
		fact: <input type='text' name='myfact' required/>
	</p>
	<p>
		<input type='submit' value='insert fact'/>
	</p>
 </form>

 <form action='action_upload.php' method='POST' enctype='multipart/form-data'>
      <p>Upload a file: <input type='file' name='myfileupload' /> </p>
      <p><input type='submit' value='Upload'/></p>
    </form>
  
</body>
</html>
