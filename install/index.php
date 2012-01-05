<?php
if (file_exists('db.xml')) {
	$config = simplexml_load_file('db.xml');	
}
if($config->installed!=1){
	include('form.php');
}
?>
