<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文件上传表单测试</title>
</head>
<body>
<form action="./signin.php" method="post" enctype='multipart/form-data'>
	<label>username:</label>
	<input name="username" type="text"></input>
	<label>image:</label>
	<input name="image" type="file"></input>
	<input type="submit" value="submit"></input>
</form>
</body>
</html>