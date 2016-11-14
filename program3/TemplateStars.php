<?php

	include_once('TemplateAbstract.php');  
	   
	class TemplateStars extends TemplateAbstract {
	         
		function processTitle($title) {
			return Str_replace(' ','*',$title); 
			}
		}


?>

