<?php 
    ini_set('max_execution_time', 0); 
    session_start();
    $radioVal = $_POST['value'];
    $_SESSION['form_type'] = $radioVal;

    if(isset($_POST['submit']))
    {
        #all attributes related to current file
        $file = $_FILES['uploadedfile'];
        print_r($file);
        $file_name = $_FILES['uploadedfile']['name'];
        $temp_name = $_FILES['uploadedfile']['tmp_name'];
        $error = $_FILES['uploadedfile']['error'];
        $size= $_FILES['uploadedfile']['size'];
        $type = $_FILES['uploadedfile']['type'];

        $file_ext = explode('.',$file_name);
        $file_actual_ext = strtolower(end($file_ext));# take the second(end) of file name
        #which files to allow
        $allowed = array('jpg','jpeg','png','tif','tiff');
        $path_pwd = $_SESSION['path_pwd'];
        if(in_array($file_actual_ext,$allowed)){
            if($error === 0){
                $file_new_name =  $radioVal.'_'.$file_name;
                $_SESSION['img_name'] = $file_new_name;
                #echo($file_name);
                $fileDestination  = $path_pwd.'\\input\\'.$radioVal.'\\'.$file_new_name;
                $fileDestination2  = $path_pwd.'\\code\\'.$file_new_name;
                move_uploaded_file($temp_name,$fileDestination);
                #header("location: edit.php?radioVal=".$radioVal);
                if(!copy($fileDestination,$fileDestination2)){
                    echo "failed to copy $file";
                }
                else{
                    echo "copied $file";
                }
                exec("C:/Python27/python ".$path_pwd."/code/all_paths.py $radioVal $file_new_name");
                exec("C:/Python27/python ".$path_pwd."/code/main.py");
                header("location: edit.php?radioVal=".$radioVal);
            }
            else{
                echo "<script type='text/javascript'>alert('There is in error in your file.')</script>";            
            }
        }
        else{
            echo "<script type='text/javascript'>alert('You can upload only image files')</script>";            
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Error')</script>";            
    }
?>
