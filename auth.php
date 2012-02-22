<?php
session_start();
if(isset($_COOKIE['cookname'])){// && isset($_COOKIE['cookid'])){
	$_SESSION['username'] = $_COOKIE['cookname'];
//	$_SESSION['userid']   = $_COOKIE['cookid'];
}
if(isset($_SESSION['username'])){// && isset($_SESSION['userid'])){
	//user logged in
}
else{
	if(isset($_REQUEST['login'])){
		if(isset($_REQUEST['username'])&&isset($_REQUEST['password'])){
			if($_REQUEST['username']!=''&&$_REQUEST['password']!=''){
				$userdetails=$db->getTableasArray("select user from user where name='".$db->__($_REQUEST['username'])."'");
				if($userdetails){
					if($userdetails[0]['password']==$_REQUEST['password']){
						//sucessfull login set cookies and sessions
						$_SESSION['username'] = $userdetails[0]['name'];
						//$_SESSION['userid']   = $_COOKIE['cookid'];
						if($_REQUEST['remember']=='yes'){
							setcookie("cookname", $userdetails[0]['password'], time()+(3600*24*7));
						}
					}
					else{
						$_SESSION['err']="Incorrect password! Please check your password and re-enter";
						header("Location: ?v=login");
						exit;
					}
				}
				else{
					$_SESSION['err']="This username doesnot exist in our database! plz check and enter you login details again!";
					header("Location: ?v=login");
					exit;
				}
			}
			else{
				$_SESSION['err']="Username and password cannot be blank";
				header("Location: ?v=login");
				exit;
			}
		}	
	}
	else{
		//goto login form
		header("Location: ?v=login");
		exit;
	}
}
?>
