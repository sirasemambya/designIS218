<?php

	include_once('SimpleBook.php');
	include_once('TemplateExclaim.php');
	include_once('TemplateStars.php');


	define('BR', '<'.'BR'.'>');

	echo 'Begin Template Test'.BR;
	echo BR;
		     
	$book = new SimpleBook('Jack Kerouac','On the Road');
		         
	$exclaimTemplate = new TemplateExclaim();  
	$starsTemplate = new TemplateStars();
			       
	echo 'First Test: Exclamation Mark Template'.BR;
	echo $exclaimTemplate->showBookTitleInfo($book);
	echo BR.BR;

	echo 'Second Test: Stars Template'.BR;
	echo $starsTemplate->showBookTitleInfo($book);
	echo BR.BR; 

	echo 'End of Template Test'.BR;

?>
