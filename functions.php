<?php
function debug($var=null,$die=true) {
	echo "<pre>";print_r($var);echo "</pre>";
	if($die) die();
}
function autoLinkUrls($text, $options = array()) {
	$this->_placeholders = array();
	$options += array('escape' => true);

	$pattern = '#(?<!href="|src="|">)((?:https?|ftp|nntp)://[\p{L}0-9.\-:]+(?:[/?][^\s<]*)?)#ui';
	$text = preg_replace_callback(
		$pattern,
		array(&$this, '_insertPlaceHolder'),
		$text
	);
	$text = preg_replace_callback(
		'#(?<!href="|">)(?<!\b[[:punct:]])(?<!http://|https://|ftp://|nntp://)www.[^\n\%\ <]+[^<\n\%\,\.\ <](?<!\))#i',
		array(&$this, '_insertPlaceHolder'),
		$text
	);
	if ($options['escape']) {
		$text = htmlspecialchars($text);
	}
	debug($text,false);
	debug($options);
	//return $this->_linkUrls($text, $options);
}

autoLinkUrls('Ini hanya percobaan http://www.sitti.co.id/ bagus ga yaa');