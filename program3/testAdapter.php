<?php
	
	include_once('SimpleBook.php');
	include_once('BookAdapter.php');


	define('BR', '<'.'BR'.'>');


	echo 'Begin Adapter Test'.BR;
	echo BR;

	$book = new SimpleBook("Jack Kerouac", "On the Road");
					      
	$bookAdapter = new BookAdapter($book);
						  
	echo 'Author and Title: '.$bookAdapter->getAuthorAndTitle();

	echo BR.BR;
	echo 'END TESTING ADAPTER PATTERN'.BR;

?>

