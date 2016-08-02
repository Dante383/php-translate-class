<?php 

/* PHP Translate Class by Dante383 */
/* https://github.com/Dante383/php-translate-class */

require_once('translations.php');

class Translate 
{
	private $defaultLanguage;
	
	function __construct ( $defaultLang )
	{
		global $translations;
		if (!isset($defaultLang) || !isset($translations[$defaultLang]))
		{
			return false;
		}
		$this->defaultLanguage = $defaultLang;
		return true;
	}
	
	function translateText ( $text, $language)
	{
		global $translations;
		if (!isset($this->defaultLanguage))
		{
			// not initialized
			return false;
		}
		if (!isset($text))
		{
			return false;
		}
		if (!isset($language)) // yes, we can do it in a function definition, but first we have to check if the class has been initialized
		{
			$language = $this->defaultLanguage;
		}
		if (!isset($translations[$language])) // does language exists?
		{
			// if not, set it to default
			$language = $this->defaultLanguage; 
			return false;
		}
		if (isset($translations[$language][$text])) //finally..
		{
			return $translations[$language][$text];
		}
		else
		{
			// whoops, not translated
			if (isset($translations[$this->defaultLanguage][$text])) // translated to default language?
			{
				error_log('[Translate]: '.$text.' not translated in '.$this->defaultLanguage.'!'); // output to log
				return $translations[$this->defaultLanguage][$text];
			}
			else
			{
				// if not, return $text parametr (better than nothing) and output exception to log
				error_log('[Translate]: '.$text.' not translated in '.$this->defaultLanguage.'!');
				return $text;
			}
		}
		return false;
	}
	
}







?>