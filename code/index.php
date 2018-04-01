<?php
	ini_set('max_execution_time', 0); 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<title>PaperPy</title>
    <link href="https://fonts.googleapis.com/css?family=Acme|Lato|Butcherman|Dancing+Script|Jura|Changa|Permanent+Marker|Rammetto+One|Righteous" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="head.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		.*{
			margin: 0;
		}
		#name{
			color: white;
			bottom: 0;
		}
		#home{
			background-color: #db0404;
			color: white;
		}
		.unordered_list li a{
			font-family: 'Jura',sans-serif;
			font-size: 20px;
		}
		body{
			background-repeat:no-repeat;
			background-image:url("bck_img.png");
		}
		h2{
			color: white;
			font-size: 40px;
			text-shadow: 1px 1px 1px #000,
						5px 5px 5px red;
			clear: both;
			margin-top: 10%;
			margin-left: 30%;
			font-family: 'Jura', sans-serif;
		}
		.button {
			background-color: red;
			border: 3px solid lightcoral;
			border-radius: 10%;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 11px;
			margin-left: 44%;
			margin-top: 20%;
			font-family: 'Jura', sans-serif;

		}

	</style>
	</head>

	<body>
		<div class="p3">
	    <ul class="unordered_list">
	      <li><img class="logo" src="logo.gif" hieght="90px" width="90px"></li> &nbsp;
	      <a href="index.php"><li id="name">PaperPy</li></a>
	      <div class="p4">
	        <li><a id ="home" href="index.php">Home</a></li>
	        <li><a id = "future" href="form.php">OCR</a></li>
			<li><a id = "edit" href="edit.php">Edit form</a></li>
	        <li><a id = "2" href="whatwedo.php">What we do</a></li>
	        <li><a id = "1" href="Contact.php">Contact Us</a></li>
	      </div>
	    </ul>
	  </div>
		<button href='form.php' type="submit" class="button" onclick="location.href='form.php';"  align='center'>Get started</button>
	</body>
</html>
