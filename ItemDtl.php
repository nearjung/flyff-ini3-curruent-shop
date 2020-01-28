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
// Item Info
$attend = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspGetAttenList :p1,:p2");
$attend->BindParam(":p1",$num2);
$attend->BindParam(":p2",$_POST['itemid']);
$attend->execute();
$att = $attend->fetch(PDO::FETCH_ASSOC);

$item_sql = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspGetItemInfo :p1");
$item_sql->BindParam(":p1",$att['item_id']);
$item_sql->execute();
$item = $item_sql->fetch(PDO::FETCH_ASSOC);

?>
<!-- saved from url=(0047)http://bill.ini3.co.th/Charge/Flyff/ItemDtl.asp -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>::::: PLAZA :::::</title>

<link rel="stylesheet" href="style/the_shop.css" type="text/css">
<script language="JavaScript">
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
        alert("คุณมีคุกกี้ไม่พอ \n\n จะใช้ได้หลังจากที่คุณเติมคุกกี้แล้ว");
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
//-->
</script>
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
<tbody><tr>
<td valign="top">
    <table border="0" cellpadding="0" cellspacing="0" width="215">
    <tbody><tr>
    <td valign="top"><img src="images/shop_detail_title.gif" width="215" height="35" alt=""></td>
    </tr>
    <tr>
    <td height="252" background="images/shop_attention_bg.gif" valign="top" align="center" style="padding-right:4;">
        <table bgcolor="#50A6ED" border="0" cellpadding="0" cellspacing="0" width="180" style="border:1 solid #B7B7B7; margin-top:10;">
        <tbody><tr> 
        <td colspan="2" align="center" valign="top" style="padding:4 5 3 5;"> 
            <table border="0" cellpadding="0" cellspacing="0" width="168" height="21">
            <tbody><tr> 
            <td background="images/itembox_name_bg.gif" align="center" style="padding-top:3;"><?php echo $att['item_name']; ?> </td>
            </tr>
            </tbody></table>
        </td>
        </tr>
        <tr> 
        <td height="72" valign="top" style="padding:0 5 0 5;"> 
            <table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="" style="border:1 solid #999999;">
            <tbody><tr> 
            <td style="padding:2;"><img src="images/item/<?php if($att['images_name'] != NULL){ echo $att['images_name']; } else { echo $api->img_ext($item['szIcon']); } ?>" width="64" height="64" alt=""></td>
            </tr>
            </tbody></table>
        </td>
        <td valign="top" style="padding:0 6 0 0;"> <table border="0" cellpadding="0" cellspacing="0" width="92">
        <colgroup><col width="20">
        <col width="72">
        </colgroup><tbody><tr> 
        <td colspan="2"><img src="images/itembox_info_top.gif" width="93" height="4" alt=""></td>
        </tr>
        <tr bgcolor="#DBF5FF"> 
        <td height="14" style="padding-left:6;"><img src="images/icon_price.gif" width="27" height="14" alt=""></td>
        <td align="right" class="d8" style="padding-top:2; padding-right:5;"><?php echo $api->discount($att['item_price']); ?><img src="images/icon_cash.gif" width="26" height="11" alt="" style="margin-left:2; margin-bottom:-1;"></td>
        </tr>
        <tr bgcolor="#DBF5FF"> 
        <td colspan="2" valign="top" class="d9" style="padding:4 5 0 6;" height="46">จำนวน : <?php echo $att['item_count']; ?>ชิ้น<br><?php echo $att['item_name']; ?> </td>
        </tr>
        <tr> 
        <td colspan="2"><img src="images/itembox_info_bottom.gif" width="93" height="4" alt=""></td>
        </tr>
        </tbody></table>
    </td>
    </tr>
    <tr> 
    <td colspan="2" valign="top">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr> 
        <td height="33" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="176">
            <colgroup><col width="20">
            <col width="72">
            </colgroup><tbody><tr> 
            <td colspan="2"><img src="images/itembox_info_top01.gif" width="176" height="4" alt=""></td>
            </tr>
            <tr bgcolor="#DBF5FF" height="120"> 
            <td width="22%" valign="top" class="d9" style="padding:4 5 0 6;"><img src="images/icon_explanation.gif" width="27" height="14" alt=""></td>
            <td valign="top" class="d9" style="padding:4 5 0 6;"><?php echo $att['item_description']; ?></td>
            </tr>
            <tr> 
            <td colspan="2"><img src="images/itembox_info_bottom01.gif" width="176" height="4" alt=""></td>
            </tr>
            </tbody></table>
        </td>
        </tr>
        </tbody></table>
    </td>
    </tr>
    <tr> 
    <td height="3"></td>
    </tr>
    </tbody></table>
    </td>
    </tr>
    <tr> 
    <td valign="top"><img src="images/shop_buy_list_bottom.gif" width="215" height="35" alt=""></td>
    </tr>
    <tr> 
    <td height="155" align="center" background="images/shop_attention_bg.gif" style="padding-right:4;">
        <table width="86%" border="0" cellpadding="0" cellspacing="0" bgcolor="#50A6ED">
        <tbody><tr> 
        <td height="36" align="center">
        <table width="168" height="28" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr>
        <td background="images/shop_buy_paycash.gif" align="right" valign="top" style="padding:6 12 0 0; color:#739516;" class="gb14"><?php echo number_format($point); ?></td>
        </tr>
        </tbody></table>
    </td>
    </tr>
    <tr> 
    
    </tr>
    <tr>
    <td height="36" align="center">
        <table width="168" height="28" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr> 
        <td align="right" valign="top" style="padding:6 12 0 0; color:#739516;" class="gb14"><font color="#FF00CC">-<?php echo number_format($api->discount($att['item_price'])); ?></font></td>
        </tr>
        </tbody></table>
    </td>
    </tr>
    <tr>
    <td height="30" align="center"><a href="javascript:PurchaseItem('<?php echo $att['id']; ?>','<?php echo $att['item_name']; ?>','<?php echo $att['item_price']; ?>','<?php echo $att['item_id']; ?>','<?php echo $att['item_count']; ?>');" hidefocus="true" onMouseOver="paybt1.src=&#39;images/bt_buy_on.gif&#39;" onMouseOut="paybt1.src=&#39;images/bt_buy.gif&#39;"><img src="images/bt_buy.gif" width="91" height="20" border="0" alt="" name="paybt1"></a></td>
    </tr>
    </tbody></table>
</td>
</tr>
<tr>
<td valign="top"><img src="images/shop_buy_bottom01.gif" width="215" height="11" alt=""></td>
</tr>
</tbody></table>

<iframe name="HiddenArea" width="0" height="0">
</iframe>


</td></tr></tbody></table></form></body></html>