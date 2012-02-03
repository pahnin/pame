<?php
session_start();
include('../vars.php');
if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	$_SESSION['msg']='';
}
if(INSTALLED!=1){
	include('form.tpl');
}
else{
	include('redirect.tpl');
	exit;
}
?>
