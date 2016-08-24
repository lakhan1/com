<?php
include_once("analyticstracking.php");
	$languageID=$_POST["language"];
	
	switch($languageID)
			{ 

				case "text/x-csrc":
				{
					include("compiler/c1.php");
					break;
				}
				case "text/x-c++src":
				{
					include("compiler/c++.php");
					break;
				}
				case "text/x-java":
				{
					include("compiler/java.php");
					break;
				}
				case "application/x-httpd-php":
				{	
					include("compiler/php.php");
					break;
				}
			case "text/x-python":
				{	
					include("compiler/python.php");
					break;
				}
						
			}
?>
