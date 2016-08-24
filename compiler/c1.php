<?php
include_once("analyticstracking.php");
	$code=$_POST["code"];
	$input=$_POST["custom_textarea"];
	$filename_code="main.c";
	$empty=" ";
	$c="./";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="main";
	$command='gcc -Wall main.c -o main -lm';	
	$command_error=$command.' 2> '.$filename_error;
	$filename_output="output.txt";

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	
	$file_input=fopen($filename_in,"w+");
	fwrite($file_input,$input);
	fclose($file_input);
	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	$scan=file_get_contents($filename_code);
	
	
	
	if(!strpos($error,"error") && !strpos($error,"undefined")){
		if(trim($input)==""){
			shell_exec($command);
			shell_exec($c.$executable." > ".$filename_output);
			
			
		}
		/*else if(strpos($scan,"scanf")){
			echo "Please enter input by clicking on the checkbox above"."<br>";
			exit();
		}*/
		else{
			shell_exec($command);
			shell_exec($c.$executable." < ".$filename_in." > ".$filename_output);
			
			
		}
		echo "Input"."<br>";
		$input_file=fopen($filename_in,"r");
		while(!feof($input_file)){
			echo "<pre>".fgets($input_file)."</pre>";
		}
		fclose($input_file);
		echo "Output"."<br>";
		$output_file=fopen($filename_output,"r");
		while(!feof($output_file)){
			echo "<pre>".fgets($output_file)."</pre>";
		}
		fclose($output_file);
	}
		else{
			echo "Error"."<br>";
			$error_print=fopen($filename_error,"r");
			while(!feof($error_print))
		{
			echo "<pre>".fgets($error_print)."</pre>";
		}
		fclose($error_print);
		}
		
	
	exec("rm $filename_code");
	exec("rm $executable");
	exec("rm $filename_in");
	exec("rm $filename_error");
	exec("rm $filename_output");
	
?>
