<?php
session_start();
include("../vars.php");
include("../classes/connect.php");
if(isset($_REQUEST['name']) && isset($_REQUEST['pass']) && isset($_REQUEST['repeat']) && isset($_REQUEST['email'])){
	if($_REQUEST['pass']!=$_REQUEST['repeat']){
		$_SESSION['msg']="Passwords do not match";
		header("Location: save.php");
	}
	else{
		//Insert
		if($db->Insert("INSERT INTO `admins` (`id`, `name`, `pass`, `email`, `privilege`, `keyring`) VALUES (NULL, '".$db->__($_REQUEST['name'])."', '".$db->__($_REQUEST['pass'])."', '".$db->__($_REQUEST['email'])."', '1', '');")){
			echo "Installation successful";
		}
		else{
			//header("refresh: 3 URL=save.php");
			echo "\nYou'll be redirected in three seconds! \nPlease enter correct details!";
		}
		
	}
}
else{
	$_SESSION['msg']="Please provide all the details";
	header("Location: save.php");
}
?>
