<?php 
require_once('class_translate.php');
$t = new Translate('en'); // initi class and set default language

$helloworld = $t->translateText('helloworld', 'pl');
if($helloworld)
{
	echo $helloworld;
}
else
{
	echo 'Can not translate! Maybe the default language does not exist? Check translations.php file and make sure that the phrase or the language you wish to translate existst';
}

?>