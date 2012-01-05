<?php
if(isset($$hookname)){
	foreach($$hookname as $modulename){
		if($modulename){
			if(file_exists('modules/'.$modulename.'/index.php')){
				include('modules/'.$modulename.'/index.php');
			}
			else{
				echo "Missing module $modulename";
			}
		}
	}
}
?>
