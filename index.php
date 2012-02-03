<?php
/*
 *      index.php
 *      
 *      Copyright 2011 Phanindra Srungavarapu <pahninsd@gmail.com>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 *      
 *      
 */

require('vars.php');
if(INSTALLED==1){
error_reporting(E_ALL);
ini_set('display_errors', '1');

if(!isset($_GET['v'])){
	$view='home';
}
else{
	$view=$_GET['v'];
}

if(isset($_GET['u'])&&$_GET['u']=="admin"){
	//authenticate
	$user='admin_';
}
else{
	$user='';
}


include('controller.php');
}
else{
	header("Location: install/");
}
?>
