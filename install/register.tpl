<html>
<head>
<style type='text/css'>
input, textarea{
width: 16em;
height: 2em;
margin: 3px 0 10px;
border: 1px solid gray;
border-radius: 5px;
padding: 2px;
font-size: 12px;
}
input{margin: 10px 0;}
label{width: 150px;display: block;}
textarea{
width: 25em;
height: 6em;
}
input:focus, textarea:focus{
box-shadow: 0 0 3px -1px #6181C0;
}
</style>
<body>
<form action='register.php' method='POST'>
	<label for='name'>Admin username: </label><input type='text' name='name' required autofocus><br>
	<label for='pass'>Password: </label><input type='password' name='pass'><br>
	<label for='repeat'>Repeat password: </label><input type='password' name='repeat'><br>
	<label for='email'>E-mail address: </label><input type='email' name='email'><br>
	<input type='submit' value='Next' name='submit'>
</form>
<body>
</html>
