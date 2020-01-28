<?php
session_start();
include_once("Lib/config.php");

$sv_index = $_POST['server_index'];
$idplayer = $_POST['m_idPlayer'];
$userid = $_POST['user_id'];
$md5 = $_POST['md5'];
$check = $_POST['check'];
$character = str_pad($idplayer,7,0,STR_PAD_LEFT);

$login_sql = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspGetAccount :p1,:p2");
$login_sql->BindParam(":p1",$userid);
$login_sql->BindParam(":p2",$check);
$login_sql->execute();
$login = $login_sql->fetch(PDO::FETCH_ASSOC);
if(!$login)
{
	$api->popup("Error To Login");
	$api->go("http://www.google.com");
}
else
{
	// Get Char
	$char_sql = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspGetCharacter :p1,:p2");
	$char_sql->BindParam(":p1",$userid);
	$char_sql->BindParam(":p2",$character);
	$char_sql->execute();
	$char = $char_sql->fetch(PDO::FETCH_ASSOC);
	if(!$char)
	{
		$api->popup("Error. No Character");
		$api->go("http://www.google.com");
	}
	else
	{
		$_SESSION['account'] = $userid;
		$_SESSION['password'] = $check;
		$_SESSION['character'] = $character;
		$_SESSION['server'] = $sv_index;
		session_write_close();
		$api->go("ItemShopMain.php");
	}
}
?>