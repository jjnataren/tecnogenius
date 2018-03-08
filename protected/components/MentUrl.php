<?php

 class MentUrl{
	
	/**
	 * Returns an standar path that url path uses 
	 * @param string $path
	 * @param string $default
	 */
	public static function getStandarPathString($path,$default='componente'){
		
		/**
		 * you can add as many as you need, although you have to respect an index
		 * @var unknown
		 */
		// generar una exprecion regular para los espacios
		$vowels = array      ("á", "é", "í", "ó", "ú","ñ","ü"," ", "," ,"&",".","!","?","¿","(",")","  ");
		
		$vowelsResult = array("a", "e", "i", "o", "u","n","u","-", ""  ,"y","","","","","","","-");
		
		$path = str_replace($vowels, $vowelsResult,  strtolower( $path ?: $default  ));
		
		return htmlspecialchars($path);
		
	}
	
	
}