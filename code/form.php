<!DOCTYPE html>
<?php
  ini_set('max_execution_time', 0); 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>PaperPy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Acme|Lato|Butcherman|Dancing+Script|Jura|Changa|Permanent+Marker|Rammetto+One|Righteous" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="head.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 </head>

 <script>
    jQuery(document).ready(function(){
    jQuery("input:radio[name=value]:first").attr('checked', true);
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    function unlock(){
        document.getElementById('buttonSubmit').removeAttribute("disabled");
    }
</script>

<style>
  #name{
    color: white;
    bottom: 0;
    font-family: 'Righteous', cursive;
  }
  .unordered_list li a {
    font-family: 'Jura',sans-serif;
    font-size: 20px;
  }
  #future{
    background-color: #db0404;
    color: white;
  }
  section{
    max-width: 1100px;
    background: #edf0f2;
    margin: auto;
    padding: 10px;
    height: auto;
    clear: both;
  }
  #para1{
    margin-left: 100px;
    margin-top: 5%;
    font-family: 'Righteous', cursive;
    font-size: 40px;
    text-shadow: 1.5px 1.5px white;
    color: #2e4a68;
  }
  #para2{
    margin-left: 100px;
    margin-top: 5%;
    font-family: 'Righteous', cursive;
    font-size: 40px;
    text-shadow: 1.5px 1.5px white;
    color: #2e4a68;
  }
  #para3{
    margin-left: 100px;
    margin-top: 5%;
    font-family: 'Righteous', cursive;
    font-size: 40px;
    text-shadow: 1.5px 1.5px white;
    color: #2e4a68;
  }
  #box1,#box2,#box3{
    clear: both;
    font-size: 20px;
    border-radius: 25px;
    padding: 5%;
    margin: 0;
    width: 60%;
    margin-left: 100px;
    border: 2px solid #d3504a;
    color: #25722f;
    font-family: 'Lato', sans-serif;
  }
  span.category{
    margin-left: 25px;
  }
  ::-webkit-file-upload-button{
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
<?php
$dir =dirname(__DIR__).'/temp/';
if(file_exists ( $dir)){
  foreach(glob($dir.'*.*') as $v){
    unlink($v);
  }
}
else{
  echo "<script type='text/javascript'>alert('Temp folder not found')</script>";            
}
?>
<body>
  <div class="p3">
    <ul class="unordered_list">
      <li><img class="logo" src="logo.gif" height="90px" width="90px"></li> &nbsp;
      <a href="index.php"><li id="name">PaperPy</li></a>
      <div class="p4">
        <li><a href="index.php">Home</a></li>
        <li><a id = "future" href="form.php">OCR</a></li>
        <li><a id = "edit" href="edit.php">Edit form</a></li>
        <li><a id = "2" href="whatwedo.php">What we do</a></li>
        <li><a id = "1" href="Contact.php">Contact Us</a></li>
      </div>
    </ul>
  </div>
  <section>

  <form action = "chdir.php" method="post" enctype="multipart/form-data">
      <p id="para1"> Choose a file </p>
      <div id = box1 >
          <input type="file" name="uploadedfile"  data-toggle="tooltip" data-placement="left" title="Choose a file" onchange="unlock();" >
      </div>

      <p id="para2" data-toggle="tooltip" data-placement="left" title="Category"
      class = "category" align="left">Choose a Category</p>

      </div><div id="box2" >

      <?php
          $path_pwd = dirname(__DIR__);
          $path_input = $path_pwd.'/input';
          $_SESSION['path_pwd'] = $path_pwd;
          #Sort in ascending order - this is default
          $a = scandir($path_input);
          $files = array_slice($a, 2);
          $arrayKeys = array_keys($files);
          for ($i=0; $i<count($files); $i++) {
              echo "<input type=radio class=buttons_test name=value value='". $files[$arrayKeys[$i]] ."'>";
              echo $files[$arrayKeys[$i]]."<br>";
          }
      ?>
      </div>

      <p id="para3">Start Recognition</p>
      <div id = "box3" >
         <button type="submit" name = "submit" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="submit" id="buttonSubmit" value="submit" disabled>
            Submit
          </button>
      </div>

    </form>
  </section>
</body>
</html>
