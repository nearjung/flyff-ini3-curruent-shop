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
<html>
<head>
<title>::::: PLAZA :::::</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK rel="stylesheet" href="style/the_shop.css" type="text/css">
<SCRIPT LANGUAGE="JavaScript">
<!--
function page_reload()
{
    document.form1.target = "_top";
    document.form1.action = "RepOUTList.asp";
    document.form1.submit();
}

function PurchaseItem(nItemID,szItemName,nCookieAmt,nGameIndex,nItemPiece)
{
    if(<?php echo $point; ?> < nCookieAmt)
    {
        alert("คุณมีคุกกี้ไม่พอ \n\n จะใช้ได้หลังจากที่คุณเติมคุกกี้แล้");
        return;
    }
    else
    {
        if(confirm("คุณต้องการซื้อไอเทม "+szItemName+" ใช่หรือไม่?"))
        {
            document.form1.target = "HiddenArea";
            document.form1.action = "ChargeItem.php";
            document.form1.itemid.value = nItemID;
            document.form1.itemname.value = szItemName;
            document.form1.gameindex.value = nGameIndex;
            document.form1.itempiece.value = nItemPiece;
            document.form1.submit();
        }
        else
            return;
    }
}

function ViewItemDtl(nItemID)
{
    document.form1.action = "ItemDtl.php";
    document.form1.itemid.value = nItemID;
    document.form1.submit();
}
//-->
</SCRIPT>
</head>
<body bgcolor="#0C3675" topmargin="0" leftmargin="0" onselectstart="return false" ondragstart="return false" oncontextmenu="return false" scroll="no">
<form name="form1" method="post">
<input type="hidden" name="itemid" value="">
<input type="hidden" name="itemname" value="">
<input type="hidden" name="gameindex" value="">
<input type="hidden" name="itempiece" value="">
<input type="hidden" name="server_index" value="<?php echo $server_index; ?>">
<input type="hidden" name="m_idPlayer" value="<?php echo $charid; ?>">
<input type="hidden" name="user_id" value="<?php echo $account; ?>">
<input type="hidden" name="check" value="<?php echo $password; ?>">

<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td>
  <table border='0' cellpadding='0' cellspacing='0' width='215'>
<tr>
<td><img src='images/shop_attention_title.gif' width='215' height='35' alt=''></td>
</tr>
<tr>
<td height='292' background='images/shop_attention_bg.gif' valign='top' align='center' style='padding-right:4;'>

<?php
// AttendItem List
$attend = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspGetAttenList :p1,:p2");
$attend->BindParam(":p1",$num1);
$attend->BindParam(":p2",$num0);
$attend->execute();
while($row = $attend->fetch(PDO::FETCH_ASSOC))
{
	// Item Info
	$item_sql = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspGetItemInfo :p1");
	$item_sql->BindParam(":p1",$row['item_id']);
	$item_sql->execute();
	$item = $item_sql->fetch(PDO::FETCH_ASSOC);
	echo "<table bgcolor='#50A6ED' border='0' cellpadding='0' cellspacing='0' width='180' height='135' style='border:1 solid #B7B7B7; margin-top:10;'>
	<tr>
	<td colspan='2' align='center' valign='top' style='padding:4 5 3 5;'>
	<table border='0' cellpadding='0' cellspacing='0' width='168' height='21'>
	<tr>
	<td background='images/itembox_name_bg.gif' align='center' style='padding-top:3;'>".$row['item_name']."</td>
	</tr>
	</table>
	</td>
	</tr>
	<tr>
	<td valign='top' style='padding:0 5 0 5;'>
	<table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='' style='border:1 solid #999999;'>
	<tr>
	<td style='padding:2;'><img src='images/item/".$api->img_ext($item['szIcon'])."' width='64' height='64' alt=''></td>
	</tr>
	</table>
	</td>
	<td valign='top' style='padding:0 6 0 0;'>
	<table border='0' cellpadding='0' cellspacing='0' width='92'>
	<col width='20'><col width='72'>
	<tr>
	<td colspan='2'><img src='images/itembox_info_top.gif' width='93' height='4' alt=''></td>
	</tr>
	<tr bgcolor='#DBF5FF'>
	<td height='14' style='padding-left:6;'><img src='images/icon_price.gif' width='27' height='14' alt=''></td>
	<td align='right' class='d8' style='padding-top:2; padding-right:5;'>".$api->discount($row['item_price'])."<img src='images/icon_cash.gif' width='26' height='11' alt='' style='margin-left:2; margin-bottom:-1;'></td>
	</tr>
	<tr bgcolor='#DBF5FF'>
	<td colspan='2' valign='top' style='padding:4 5 0 6;' class='d9' height='46'>จำนวน: ".$row['item_count']."ชิ้น<br>".$row['item_name']."</td>
	</tr>
	<tr>
	<td colspan='2'><img src='images/itembox_info_bottom.gif' width='93' height='4' alt=''></td>
	</tr>
	</table>
	</td>
	</tr>
	<tr>";
	?>
	<td valign='top' style='padding:3 0 4 5;'><a href="Javascript:ViewItemDtl(<?php echo $row['id']; ?>);"><img src='images/bt_detail2.gif' width='70' height='20' alt=''></a></td>
	<td valign='top' style='padding-bottom:4; padding-top:3;'><a href="javascript:PurchaseItem(<?php echo $row['id']; ?>,'<?php echo $row['item_name']; ?>',<?php echo $api->discount($row['item_price']); ?>,<?php echo $row['item_id']; ?>,<?php echo $row['item_count']; ?>);" hidefocus='true' onMouseOver="'buybt2.src=images/bt_buy_on.gif'" onMouseOut="'buybt2.src=images/bt_buy.gif'"><img src='images/bt_buy.gif' width='91' height='20' border='0' alt='' name='buybt2'></a></td>
	<?php echo "</tr>
	</table>";
}
?>
</td>
</tr>
<tr>
<td><img src="images/shop_attention_bottom.gif" width="215" height="17" alt=""></td>
</tr>
<tr>
<td><img src="images/shop_help.gif" width="215" height="144" alt=""></td>
</tr>
</table>
</td>
</tr>
</table>
</form>
<iframe name="HiddenArea" width=0 height=0>
</iframe>
</body>
</html>
