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
function goList(szURL,szCategoryID)
{
    document.form1.target = "_self";
    document.form1.action = szURL;
    document.form1.categoryid.value = szCategoryID;
    document.form1.submit();
}
//-->
</SCRIPT>
</head>

<body bgcolor="#0C3675" onselectstart="return false" ondragstart="return false" oncontextmenu="return false">
<form name="form1" method="post" OnSubmit="return goPage('1');">
<input type="hidden" name="categoryid" value="">
<input type="hidden" name="server_index" value="<?php echo $server_index; ?>">
<input type="hidden" name="m_idPlayer" value="<?php echo $charid; ?>">
<input type="hidden" name="user_id" value="<?php echo $account; ?>">
<input type="hidden" name="check" value="<?php echo $password; ?>">

<table border="0" cellpadding="0" cellspacing="0" width="790" style="margin-left:5;">
<tr>
<td width="198"><a href="javascript:goList('ItemShopMain.php','');"><img src="images/shop_shoplogo.gif" width="198" height="46" alt="" border="0"></a></td>
<td width="592" background="images/shop_tmenu_bg.gif" valign="top">
    <table border="0" cellpadding="0" cellspacing="0" width="592">
    <tr>
    <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAA')" hidefocus="true" onMouseOver="tmenu6.src='images/item_menu_06_on.gif'" onMouseOut="tmenu6.src='images/item_menu_06_off.gif'"><img src="images/item_menu_06_off.gif" width="72" height="36" alt="" border="0" name="tmenu6"></a></td>
    <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAB')" hidefocus="true" onMouseOver="tmenu7.src='images/item_menu_07_on.gif'" onMouseOut="tmenu7.src='images/item_menu_07_off.gif'"><img src="images/item_menu_07_off.gif" width="72" height="36" alt="" border="0" name="tmenu7"></a></td>
    <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAC')" hidefocus="true" onMouseOver="tmenu1.src='images/item_menu_01_on.gif'" onMouseOut="tmenu1.src='images/item_menu_01_off.gif'"><img src="images/item_menu_01_off.gif" width="72" height="36" alt="" border="0" name="tmenu1"></a></td>
    <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAD')" hidefocus="true" onMouseOver="tmenu2.src='images/item_menu_02_on.gif'" onMouseOut="tmenu2.src='images/item_menu_02_off.gif'"><img src="images/item_menu_02_off.gif" width="72" height="36" alt="" border="0" name="tmenu2"></a></td>
    <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAE')" hidefocus="true" onMouseOver="tmenu3.src='images/item_menu_03_on.gif'" onMouseOut="tmenu3.src='images/item_menu_03_off.gif'"><img src="images/item_menu_03_off.gif" width="72" height="36" alt="" border="0" name="tmenu3"></a></td>
    <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAF')" hidefocus="true" onMouseOver="tmenu4.src='images/item_menu_04_on.gif'" onMouseOut="tmenu4.src='images/item_menu_04_off.gif'"><img src="images/item_menu_04_off.gif" width="72" height="36" alt="" border="0" name="tmenu4"></a></td>
    <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAG')" hidefocus="true" onMouseOver="tmenu5.src='images/item_menu_05_on.gif'" onMouseOut="tmenu5.src='images/item_menu_05_off.gif'"><img src="images/item_menu_05_off.gif" width="72" height="36" alt="" border="0" name="tmenu5"></a></td>
    <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAH')" hidefocus="true" onMouseOver="tmenu8.src='images/item_menu_08_on.gif'" onMouseOut="tmenu8.src='images/item_menu_08_off.gif'"><img src="images/item_menu_08_off.gif" width="72" height="36" alt="" border="0" name="tmenu8"></a></td>
    </tr>
    </table>
</td>
</tr>
</table>

<table border="0" cellpadding="0" cellspacing="0" width="800" height="488">
<tr>
<td>
    <table border="0" cellpadding="0" cellspacing="0" width="585">
    <tr>
    <td height="24" background="images/shop_top_message_bg.gif" style="color:#FFFFFF; padding-left:30; padding-bottom:1;">ขอบคุณที่ใช้บริการ Flyff Plaza</td>
    </tr>
    <tr>
    <td height="455" background="images/shop_main_bg.jpg" align="center" style="padding-left:12;">
        <table border="0" cellpadding="0" cellspacing="0" width="500">
        <tr>
        <td width="496" background="images/shop_notice_title_bg.gif"><img src="images/shop_notice_title.gif" width="80" height="37" alt=""></td>
        <td width="4"><img src="images/shop_notice_title_end.gif" width="4" height="37" alt=""></td>
        </tr>
        <tr>
        <td colspan="2" background="images/shop_notice_bg.gif" style="padding:20 0 10 10;" valign="top" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="450">
            <col width="24"><col width="426">
            <tr>
            <td colspan="2" style="padding-bottom:5;"><img src="images/shop_notice_subtitle01.gif" width="120" height="23" alt=""></td>
            </tr>
            <tr>
            <td><img src="images/spacer.gif" width="24" height="1" alt=""></td>
            <td style="padding-bottom:10;" class="g9h13">กรุณาอย่าแจ้งข้อมูลการเติมเงินให้แก่ผู้อื่นโดยเด็ดขาด เราจะไม่รับผิดชอบและไม่สามารถให้ความช่วยเหลือใดๆ ได้&nbsp;</td>
            </tr>
            <tr>
            <td colspan="2" style="padding-bottom:5;"><img src="images/shop_notice_subtitle02.gif" width="120" height="23" alt=""></td>
            </tr>
            <tr>
            <td></td>
            <td style="padding-bottom:10;" class="g9h13">สามารถซื้อไอเทมในร้าน flyff ได้โดยใช้คุกกี้<br>
			สามารถเติมเงินได้ตามวิธีที่เลือก<br>
			ไอเทมที่ซื้อใน Flyff plaza ไม่สามารถเปลี่ยนหรือแลกคืนได้<br>
			หากมีคำถามหรือข้อสงสัยสามารถติดต่อสอบถามได้ที่เว็บไซต์
            </tr>
            </table>
        </td>
        </tr>
        <tr>
        <td colspan="2"><img src="images/shop_notice_bottom.gif" width="500" height="4" alt=""></td>
        </tr>
        <tr><td colspan="2" height="20"></td></tr>
        </table>
    </td>
    </tr>
    <tr>
    <td><img src="images/shop_main_bottom.gif" width="585" height="9" alt=""></td>
    </tr>
    </table>
</td>
<td valign="top">
    <iframe src="AttendItem.php" name="AttendItemArea" width="100%" height="100%" frameborder="0" border="0"></iframe>
</td>
</tr>
</table>

<table border="0" cellpadding="0" cellspacing="0" width="790" style="margin-left:5;">
<col width="116"><col width="210"><col width=""><col width="288"><col width="10">
<tr>
<td><img src="images/shop_btbar_logo.gif" width="116" height="36" alt=""></td>
<td background="images/shop_btbar_keep.gif" align="right" valign="top" style="padding-top:11; padding-right:12; color:#739516;" class="gb14"><?php echo number_format($point); ?></td>
<td background="images/shop_btbar_bg.gif" align="right"><img src="images/shop_btbar_center.gif" width="10" height="36" alt=""></td>
<td background="images/shop_btbar_bg2.gif">
    <table border="0"  cellpadding="0" cellspacing="0" width="288">
    <tr>
    <td style="padding-right:3;"><a href="Javascript:goList('RepINList.php','');" hidefocus="true" onMouseOver="bmenu1.src='images/bt_bmenu_01_on.gif'" onMouseOut="bmenu1.src='images/bt_bmenu_01.gif'"><img src="images/bt_bmenu_01.gif" width="94" height="35" alt="" border="0" name="bmenu1"></a></td>
    <td style="padding-right:3;"><a href="Javascript:goList('RepOUTList.php','');" hidefocus="true" onMouseOver="bmenu2.src='images/bt_bmenu_02_on.gif'" onMouseOut="bmenu2.src='images/bt_bmenu_02.gif'"><img src="images/bt_bmenu_02.gif" width="94" height="35" alt="" border="0" name="bmenu2"></a></td>
    <td><a href="Javascript:goList('FillUpMain.php','');" hidefocus="true" onMouseOver="bmenu3.src='images/bt_bmenu_03_on.gif'" onMouseOut="bmenu3.src='images/bt_bmenu_03.gif'"><img src="images/bt_bmenu_03.gif" width="94" height="35" alt="" border="0" name="bmenu3"></a></td>
    </tr>
    </table>
</td>
<td width="10"><img src="images/shop_btbar_end.gif" width="10" height="36" alt=""></td>
</tr>
</table>
</form>
</body>
</html>
