<?php
session_start();
if(isset($_REQUEST['host']) && isset($_REQUEST['user']) && isset($_REQUEST['pass']) && isset($_REQUEST['dbname'])){
	$_SESSION['msg']='';
	if(!$vars_file=fopen('../vars.php','w')){
		$_SESSION['msg']="vars.php file in root directory of pame folder is not writable please change its permission";	
		header("Location: index.php");
	}
	else{
		
		/* Creating database tables */
		
		$sql1="CREATE TABLE IF NOT EXISTS `hooks` (
		`hook` varchar(25) NOT NULL,
		`order` int(11) NOT NULL,
		`enabled` tinyint(1) NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		
		$sql2="INSERT INTO `hooks` (`hook`, `order`, `enabled`) VALUES
		('header', 1, 1),
		('containerleft', 2, 1),
		('containermiddle', 3, 1),
		('containerright', 4, 1),
		('footer', 5, 1);";
		
		$sql3="CREATE TABLE IF NOT EXISTS `pages` (
		`page` varchar(25) NOT NULL,
		`hook` varchar(25) NOT NULL,
		`module` varchar(25) NOT NULL,
		`order` int(11) NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		
		$sql4="CREATE TABLE IF NOT EXISTS `admins` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`name` varchar(16) NOT NULL,
		`pass` varchar(128) NOT NULL,
		`email` varchar(32) NOT NULL,
		`privilege` tinyint(1) NOT NULL,
		`keyring` varchar(128) NOT NULL,
		PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

		$_SESSION['installing']="true";
		define('DB_HOST',$_REQUEST['host']);
		define('DB_USER',$_REQUEST['user']);
		define('DB_PASS',$_REQUEST['pass']);
		define('DB_NAME',$_REQUEST['dbname']);
		
		$settings= array(
		'DB_HOST'=>$_REQUEST['host'],
		'DB_USER'=>$_REQUEST['user'],
		'DB_PASS'=>$_REQUEST['pass'],
		'DB_NAME'=>$_REQUEST['dbname'],
		'INSTALLED'=>'1'
		);
		fwrite($vars_file,"<?php\n");	
		foreach($settings as $setthis=>$tothis){
			fwrite($vars_file,"define('".$setthis."', '".$tothis."');\n");
			}
		fwrite($vars_file,'?>');	
		fclose($vars_file);
		
		include("../classes/connect.php");
		
		if($db->Query($sql1)&&$db->Query($sql2)&&$db->Query($sql3)&&$db->Query($sql4)){



			include("register.tpl");
		}
		else{
			header("refresh: 3 URL=index.php");
			echo "\nYou'll be redirected in three seconds! \nPlease enter correct database details!";
		}		
	}
	
}
else{
	if($_SESSION['installing']=="true"){
		echo $_SESSION['msg'];
		include("register.tpl");
	}
	else{
	$_SESSION['msg']="Missing something! Make sure you have enetered everything!";	
	header("Location: index.php");
}
}
?>
