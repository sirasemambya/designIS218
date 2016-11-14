<?php

	include_once('SimpleBook.php');
	include_once('StrategyContext.php');

	define('BR', '<'.'BR'.'>');

	echo 'Begin Strategy Test'.BR;
	echo BR;
		  
	$book = new SimpleBook('Jack Kerouac', 'On the Road');

	    
	$strategyContextC = new StrategyContext('C');
	$strategyContextE = new StrategyContext('E');
	$strategyContextS = new StrategyContext('S');
			      
	echo 'First Test: Capital Letters'.BR;
	echo $strategyContextC->showBookTitle($book);
	 echo BR.BR;

	
	echo 'Second Test: Exclamation Marks'.BR;
	echo $strategyContextE->showBookTitle($book);
	echo BR.BR;
					    
	echo 'Third Test: Stars'.BR;
	echo $strategyContextS->showBookTitle($book);
	echo BR.BR;  

	echo 'End of Strategy Test'.BR;
?>
