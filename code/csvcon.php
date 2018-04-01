<?php
	session_start();
	$path_pwd=dirname(__DIR__);
	$path_temp = $path_pwd."/temp/data.txt";
	$path_temp2 =  $path_pwd."/temp/file.csv";
	$radioVal = $_SESSION['form_type'];
	#$radioVal = 'APP1';
	echo ($radioVal);
	$handle = fopen($path_temp, "r");
	$lines = [];
	if (($handle = fopen($path_temp, "r")) !== FALSE) {
		while (($data = fgetcsv($handle,
		1000, "\t")) !== FALSE) {
			$lines[] = $data;
		}
	    fclose($handle);
	}
	$fp = fopen($path_temp2, 'w');
	foreach ($lines as $line) {
		fputcsv($fp, $line);
	}
	fclose($fp);
	exec("python $path_pwd.'/code/check_file.py'  $radioVal");
?>
