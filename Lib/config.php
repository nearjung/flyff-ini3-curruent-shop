<?php
ini_set('display_errors', '0');
define("MSSQL_HOST","WIN-2MKNQVRTCLN\SQLEXPRESS"); // MSSQL Host
define("MSSQL_USER","sa"); // MSSQL User
define("MSSQL_PASS","Thelastwizard01"); // MSSQL Pass
define("MSSQL_DB","ACCOUNT_DBF"); // Account DB
define("MSSQL_FUDB","ITEM_DBF"); // Function DB

//ห้ามแก้ไข
include_once("function.php");
$sql = new PDO("sqlsrv:server=".MSSQL_HOST."; Database=".MSSQL_DB."",MSSQL_USER,MSSQL_PASS);
$api = new API(true);
date_default_timezone_set('Asia/Bangkok');
$date = date("d/m/Y H:i:s");
// Account Info
$acc_sql = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspGetAccount :p1,:p2");
$acc_sql->BindParam(":p1",$_SESSION['account']);
$acc_sql->BindParam(":p2",$_SESSION['password']);
$acc_sql->execute();
$acc = $acc_sql->fetch(PDO::FETCH_ASSOC);

$account = $acc['account'];
$password = $acc['password'];
$point = $acc['cash'];
$server_index = $_SESSION['server'];
$charid = $_SESSION['character'];
$num0 = 0;
$num1 = 1;
$num2 = 2;
$num3 = 3;
$num4 = 4;
$num5 = 5;
$current_time = time();

$discount = "0"; // ส่วนลด

$ip = $_SERVER['REMOTE_ADDR'];
// IP ของ TMPAY.NET ที่อนุญาติให้รับส่งข้อมูลบัตรเงินสด (ไม่ควรแก้ไข)
$_CONFIG['tmpay']['access_ip'] = '203.146.127.112';
// รหัสร้านค้า ของบัญชี TMPAY.NET
$_CONFIG['tmpay']['merchant_id'] = '9IAU170423'; //9EDT170418
// URL ที่ได้ติดตั้งไฟล์ tmpay.php
$_CONFIG['tmpay']['resp_url'] = 'http://103.7.57.33/shop/Lib/topup.php'; 

// แก้ไขราคาบัตร // จำนวนแคชที่จะได้รับ
$true_0		=	0; // ล้มเหลว
$true_50	=	500; // บัตร 50
$true_90	=	900; // บัตร 90
$true_150	=	1500; // บัตร 150
$true_300	=	3000; // บัตร 300
$true_500	=	5000; // บัตร 500
$true_1000	=	10000; // บัตร 1,000

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>