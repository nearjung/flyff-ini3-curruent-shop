<title>::::: PLAZA :::::</title>
<?php
session_start();
include_once("Lib/config.php");

if($account == "")
{
	$api->go("http://google.com");
}
if($charid == "")
{
	$api->go("http://google.com");
}
?>
<SCRIPT LANGUAGE="JavaScript">
<!--
function page_reload()
{
    document.form1.target = "_top";
    document.form1.action = "RepOUTList.php";
    document.form1.submit();
}
</script>
<?php 
$attend = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspGetAttenList :p1,:p2");
$attend->BindParam(":p1",$num2);
$attend->BindParam(":p2",$_POST['itemid']);
$attend->execute();
$att = $attend->fetch(PDO::FETCH_ASSOC);

if($point < $api->discount($att['item_price']))
{
	$api->popup("ยอดเงินไม่เพียงพอ กรุณาเติมเงินด้วยค่ะ");
	echo '<form name="form1"><script>page_reload();</script></form>';
}
else if($point == 0 )
{
	$api->popup("ยอดเงินไม่เพียงพอ กรุณาเติมเงินด้วยค่ะ");
	echo '<form name="form1"><script>page_reload();</script></form>';
}
else if($att['stock'] == 0)
{
	$api->popup("ไอเท็มหมดสต็อก");
	echo '<form name="form1"><script>page_reload();</script></form>';
}
else
{
	$api->purchase_item($att['item_id'],$att['item_name'],$att['item_count'],$charid,$api->discount($att['item_price']),$account,$att['id']);
	echo '<form name="form1"><script>page_reload();</script></form>';
}

?>