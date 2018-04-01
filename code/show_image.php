<?php
session_start(); 
$img_name = $_SESSION['img_name'];
?>
<img src=<?php echo $img_name; ?> alt="Uploaded Image" >