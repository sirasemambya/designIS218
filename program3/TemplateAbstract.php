<?php

	include_once('SimpleBook.php');  
	   
	abstract class TemplateAbstract {
	         
	public final function showBookTitleInfo($book_in) {
		$title = $book_in->getTitle();
		$author = $book_in->getAuthor();
		$processedTitle = $this->processTitle($title);
		$processedAuthor = $this->processAuthor($author);
		
		if (NULL == $processedAuthor) {
			$processed_info = $processedTitle;
			} 
		else {
			$processed_info = $processedTitle.' by '.$processedAuthor;
			}
		
		return $processed_info;
		}

	abstract function processTitle($title);
														     
	function processAuthor($author) {
		return NULL;
		} 
	           
	}

?>
