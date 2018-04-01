<?php
  ini_set('max_execution_time', 0); 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>PaperPy</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="head.css">
   <link href="https://fonts.googleapis.com/css?family=Acme|Lato|Butcherman|Dancing+Script|Jura|Changa|Permanent+Marker|Rammetto+One|Righteous" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Acme|Lato|Butcherman|Dancing+Script|Nunito|Changa|Permanent+Marker|Rammetto+One|Righteous" rel="stylesheet">
<script>$(document).ready(function(){
$("button").click(function(){
var file_text;
file_text = $( "#y1f_1" ).text( );
$.post( "val.php", {file_data : file_text} , function( data ){
alert('Successfully Saved');
});
});
});
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
function myFunction() {
    if (confirm("This will delete all your data!")) {
    window.location.href = "future.php";
   }
   else {
       die();
   }
}
</script>
<style>
   .*{
    margin: 0;
   }
   #edit{
			background-color: #db0404;
			color: white;
	}
   .unordered_list li a {
    	font-family: 'Jura',sans-serif;
    	font-size: 20px;
    }
	body{
		background: white;
		padding: 0;
		margin: 0;
	}
	section{
	    max-width: 1100px;
		background: #edf0f2;
		margin: auto;
		padding: 10px;
		height: auto;
		clear: both;
	}
	table, th, td {
	    border-collapse:collapse;
	    width:auto;
	    align-content: center;
	    color:white;
	    font-family: 'Nunito', sans-serif;
	    font-size: 20px;
	    margin-left: 0;
	    text-align: center;
	}

    th, td {
    	display: block;
    }
		table{
			margin: auto;
			text-align: center;
		}
    tr {
	    float: left;
	    background-color:#293d3d;
    }
    td:nth-child(even){
    	background-color:#c2d6d6;
    	color:black;
    }
	.uploads{
		margin: auto;
		margin-top:2%;
		width: auto;
		height: auto;
		padding: 15px;
		text-align: center;
	}
	.button {
		background-color: #008CBA;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
		float:left;
	}	
	html, body {
		max-width: 100%;
		overflow-x: hidden;
	}
	h1{
		color:#4d79ff;
		text-shadow: 0px 2px 2px rgba(255, 255, 255, 0.4);
	}
	.image_icon{
		float: right;
		margin-top: 40px;
		margin-right: 40px;
	}
	#buttonSubmit{
		background-color: #4CAF50;
		border: 1.5px solid lightgreen;
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
	}
	</style>
	</head>
	<body>
		<div class="p3">
	    	<ul class="unordered_list">
		      	<li><img class="logo" src="logo.gif" hieght="90px" width="90px"></li> &nbsp;
		      	<a href="index.php"><li id="name">PaperPy</li></a>
		      	<div class="p4">
			        <li><a id = "home" href="index.php">Home</a></li>
			        <li><a id = "future" href="form.php">OCR</a></li>
			        <li><a id = "edit" href="edit.php">Edit form</a></li>                    
			        <li><a id = "whatwedo" href="whatwedo.php">What we do</a></li>
			        <li><a id = "contact" href="Contact.php">Contact Us</a></li>
		        </div>
	    	</ul>
  		</div>
			<div class="set">

  		<section>
					<div class="image_icon">
							<a href="show_image.php" class="btn btn-info btn-lg" target='_blank'>
							<span class="glyphicon glyphicon-picture"></span> View Image
							</a>
					</div>

		<div class="container">
			<div class="uploads">
				<div class="table-responsive">
					<?php
						// Create a table from a csv file
						echo "<table class='table table-dark' >\n\n";
						$row = 1;
						$form_type = $_SESSION['form_type'];
						$img_name = $_SESSION['img_name'];
						#$form_type = 'Donation';
						#$img_name ='Donation_Form011.jpg';
						$path_pwd = dirname(__DIR__);
						echo"<h2>".$form_type."</h2>";
						$_SESSION['form_type'] = $form_type;
						$path_temp_value = $path_pwd.'/temp/value.csv';
						$path_configfile = $path_pwd.'//config//'.$form_type.'.csv';
						$handle = fopen($path_configfile, "r");
						echo $handle;
						if ($handle !=NULL) {
							echo 'kajaljkjkl';
							echo "<tr class='noBorder'>";
							$data = fgetcsv($handle, 5000, "~");
							while (($data = fgetcsv($handle, 1000, "~")) !== FALSE) {
								echo "<td>" . ' ' . $data[0] . "</td>" ;
							}
							echo "</tr>";
							fclose($handle);
						}
						else{
							echo "<script type='text/javascript'>alert('Can't find value.csv')</script>";
						}
						$f = fopen($path_temp_value, "r");
						if($f){            	
						
						while (($line = fgetcsv($f)) !== false) {
							$row = $line[0];    // We need to get the actual row (it is the first element in a 1-element array)
							$cells = explode("~",$row);
							echo "<tr class='noBorder' id='y1f_1'>";
							foreach ($cells as $cell) {
								echo "<td contenteditable='true'>" . htmlspecialchars($cell). "\t"  . "</td>";
							}
							echo "</tr>\n";
						}}
						else{
						echo "<script type='text/javascript'>alert('Can't find config.csv file')</script>";
						}
						fclose($f);
						echo "\n</table>";
					
						?>
				</div>
				</br>
				<div class="containers">
					<button class="btn btn-primary" onclick="location.href='csvcon.php'"; data-toggle="tooltip" data-placement="left" title="Save" id="buttonSubmit">
		            Save
		            </button>
					<button class="btn btn-primary" onclick="myFunction()" data-toggle="tooltip" data-placement="right" title="Cancel" id="buttonSubmit">
		            Cancel
		            </button>
		        </div>
		    </div>
		</div>
	</div>
		</section>
</body>
</html>