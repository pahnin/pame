<?php
$menu=$db->getTableasArray("SELECT * FROM `mod_nav_links`");
echo "<ul>";
foreach ($menu as $submenu){
	if($submenu){
		echo "<li";
		if($submenu['view']==$view){ 
			echo " class='active' ";
			}
		echo "> <a href='?v=".$submenu['view']."'>".$submenu['title']."</a></li>";
	}
}
echo "</ul>";
?>
