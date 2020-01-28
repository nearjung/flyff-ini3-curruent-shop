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
    document.form1.action = "RepOUTList.php";
    document.form1.submit();
}

function goPage(nPage,szCategoryID)
{
    document.form1.target ="_self";
    document.form1.action ="ItemList.php";
    document.form1.currpage.value = nPage;
    document.form1.categoryid.value = szCategoryID;
    document.form1.submit();
}

function goList(szURL,szCategoryID)
{
    document.form1.target = "_self";
    document.form1.action = szURL;
    document.form1.currpage.value = 1;
    document.form1.categoryid.value = szCategoryID;
    document.form1.submit();
}

function ViewItemDtl(nItemID)
{
    document.form1.target = "ItemDtlArea";
    document.form1.action = "ItemDtl.php";
    document.form1.itemid.value = nItemID;
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
        if(confirm("คุณต้องการซื้อไอเทมใช่หรือไม?"))
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
</SCRIPT>
</head>

<body bgcolor="#0C3675" onselectstart="return false" ondragstart="return false" oncontextmenu="return false">
<form name="form1" method="post" OnSubmit="return goPage('1','<?php echo $_POST['categoryid']; ?>');">
<input type="hidden" name="currpage" value="">
<input type="hidden" name="itemid" value="">
<input type="hidden" name="categoryid" value="<?php echo $_POST['categoryid']; ?>">
<input type="hidden" name="itemname" value="">
<input type="hidden" name="gameindex" value="">
<input type="hidden" name="itempiece" value="">
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
    
       <?php
	   $catalog = substr($_POST['categoryid'],8,9);
	   	if($catalog == "A")
		{
			?>
        <td style="padding-left:1; padding-right:1;"><img src="images/item_menu_06_on.gif" width="72" height="36" alt="" border="0" name="tmenu6"></td>
            
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAB')" hidefocus="true" onMouseOver="tmenu7.src='images/item_menu_07_on.gif'" onMouseOut="tmenu7.src='images/item_menu_07_off.gif'"><img src="images/item_menu_07_off.gif" width="72" height="36" alt="" border="0" name="tmenu7"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAC')" hidefocus="true" onMouseOver="tmenu1.src='images/item_menu_01_on.gif'" onMouseOut="tmenu1.src='images/item_menu_01_off.gif'"><img src="images/item_menu_01_off.gif" width="72" height="36" alt="" border="0" name="tmenu1"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAD')" hidefocus="true" onMouseOver="tmenu2.src='images/item_menu_02_on.gif'" onMouseOut="tmenu2.src='images/item_menu_02_off.gif'"><img src="images/item_menu_02_off.gif" width="72" height="36" alt="" border="0" name="tmenu2"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAE')" hidefocus="true" onMouseOver="tmenu3.src='images/item_menu_03_on.gif'" onMouseOut="tmenu3.src='images/item_menu_03_off.gif'"><img src="images/item_menu_03_off.gif" width="72" height="36" alt="" border="0" name="tmenu3"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAF')" hidefocus="true" onMouseOver="tmenu4.src='images/item_menu_04_on.gif'" onMouseOut="tmenu4.src='images/item_menu_04_off.gif'"><img src="images/item_menu_04_off.gif" width="72" height="36" alt="" border="0" name="tmenu4"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAG')" hidefocus="true" onMouseOver="tmenu5.src='images/item_menu_05_on.gif'" onMouseOut="tmenu5.src='images/item_menu_05_off.gif'"><img src="images/item_menu_05_off.gif" width="72" height="36" alt="" border="0" name="tmenu5"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAH')" hidefocus="true" onMouseOver="tmenu8.src='images/item_menu_08_on.gif'" onMouseOut="tmenu8.src='images/item_menu_08_off.gif'"><img src="images/item_menu_08_off.gif" width="72" height="36" alt="" border="0" name="tmenu8"></a></td>
        
        <?php 
		}
		else if($catalog == "B")
		{
		?>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAA')" hidefocus="true" onMouseOver="tmenu6.src='images/item_menu_06_on.gif'" onMouseOut="tmenu6.src='images/item_menu_06_off.gif'"><img src="images/item_menu_06_off.gif" width="72" height="36" alt="" border="0" name="tmenu6"></td>
            
        <td style="padding-left:1; padding-right:1;"><img src="images/item_menu_07_on.gif" width="72" height="36" alt="" border="0"></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAC')" hidefocus="true" onMouseOver="tmenu1.src='images/item_menu_01_on.gif'" onMouseOut="tmenu1.src='images/item_menu_01_off.gif'"><img src="images/item_menu_01_off.gif" width="72" height="36" alt="" border="0" name="tmenu1"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAD')" hidefocus="true" onMouseOver="tmenu2.src='images/item_menu_02_on.gif'" onMouseOut="tmenu2.src='images/item_menu_02_off.gif'"><img src="images/item_menu_02_off.gif" width="72" height="36" alt="" border="0" name="tmenu2"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAE')" hidefocus="true" onMouseOver="tmenu3.src='images/item_menu_03_on.gif'" onMouseOut="tmenu3.src='images/item_menu_03_off.gif'"><img src="images/item_menu_03_off.gif" width="72" height="36" alt="" border="0" name="tmenu3"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAF')" hidefocus="true" onMouseOver="tmenu4.src='images/item_menu_04_on.gif'" onMouseOut="tmenu4.src='images/item_menu_04_off.gif'"><img src="images/item_menu_04_off.gif" width="72" height="36" alt="" border="0" name="tmenu4"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAG')" hidefocus="true" onMouseOver="tmenu5.src='images/item_menu_05_on.gif'" onMouseOut="tmenu5.src='images/item_menu_05_off.gif'"><img src="images/item_menu_05_off.gif" width="72" height="36" alt="" border="0" name="tmenu5"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAH')" hidefocus="true" onMouseOver="tmenu8.src='images/item_menu_08_on.gif'" onMouseOut="tmenu8.src='images/item_menu_08_off.gif'"><img src="images/item_menu_08_off.gif" width="72" height="36" alt="" border="0" name="tmenu8"></a></td>
        
        <?php	
		}
		else if($catalog == "C")
		{
		?>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAA')" hidefocus="true" onMouseOver="tmenu6.src='images/item_menu_06_on.gif'" onMouseOut="tmenu6.src='images/item_menu_06_off.gif'"><img src="images/item_menu_06_off.gif" width="72" height="36" alt="" border="0" name="tmenu6"></td>
            
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAB')" hidefocus="true" onMouseOver="tmenu7.src='images/item_menu_07_on.gif'" onMouseOut="tmenu7.src='images/item_menu_07_off.gif'"><img src="images/item_menu_07_off.gif" width="72" height="36" alt="" border="0" name="tmenu7"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><img src="images/item_menu_01_on.gif" width="72" height="36" alt="" border="0" name="tmenu1"></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAD')" hidefocus="true" onMouseOver="tmenu2.src='images/item_menu_02_on.gif'" onMouseOut="tmenu2.src='images/item_menu_02_off.gif'"><img src="images/item_menu_02_off.gif" width="72" height="36" alt="" border="0" name="tmenu2"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAE')" hidefocus="true" onMouseOver="tmenu3.src='images/item_menu_03_on.gif'" onMouseOut="tmenu3.src='images/item_menu_03_off.gif'"><img src="images/item_menu_03_off.gif" width="72" height="36" alt="" border="0" name="tmenu3"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAF')" hidefocus="true" onMouseOver="tmenu4.src='images/item_menu_04_on.gif'" onMouseOut="tmenu4.src='images/item_menu_04_off.gif'"><img src="images/item_menu_04_off.gif" width="72" height="36" alt="" border="0" name="tmenu4"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAG')" hidefocus="true" onMouseOver="tmenu5.src='images/item_menu_05_on.gif'" onMouseOut="tmenu5.src='images/item_menu_05_off.gif'"><img src="images/item_menu_05_off.gif" width="72" height="36" alt="" border="0" name="tmenu5"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAH')" hidefocus="true" onMouseOver="tmenu8.src='images/item_menu_08_on.gif'" onMouseOut="tmenu8.src='images/item_menu_08_off.gif'"><img src="images/item_menu_08_off.gif" width="72" height="36" alt="" border="0" name="tmenu8"></a></td>
        
        <?php	
		}
		else if($catalog == "D")
		{
		?>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAA')" hidefocus="true" onMouseOver="tmenu6.src='images/item_menu_06_on.gif'" onMouseOut="tmenu6.src='images/item_menu_06_off.gif'"><img src="images/item_menu_06_off.gif" width="72" height="36" alt="" border="0" name="tmenu6"></td>
            
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAB')" hidefocus="true" onMouseOver="tmenu7.src='images/item_menu_07_on.gif'" onMouseOut="tmenu7.src='images/item_menu_07_off.gif'"><img src="images/item_menu_07_off.gif" width="72" height="36" alt="" border="0" name="tmenu7"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAC')" hidefocus="true" onMouseOver="tmenu1.src='images/item_menu_01_on.gif'" onMouseOut="tmenu1.src='images/item_menu_01_off.gif'"><img src="images/item_menu_01_off.gif" width="72" height="36" alt="" border="0" name="tmenu1"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><img src="images/item_menu_02_on.gif" width="72" height="36" alt="" border="0" name="tmenu2"></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAE')" hidefocus="true" onMouseOver="tmenu3.src='images/item_menu_03_on.gif'" onMouseOut="tmenu3.src='images/item_menu_03_off.gif'"><img src="images/item_menu_03_off.gif" width="72" height="36" alt="" border="0" name="tmenu3"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAF')" hidefocus="true" onMouseOver="tmenu4.src='images/item_menu_04_on.gif'" onMouseOut="tmenu4.src='images/item_menu_04_off.gif'"><img src="images/item_menu_04_off.gif" width="72" height="36" alt="" border="0" name="tmenu4"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAG')" hidefocus="true" onMouseOver="tmenu5.src='images/item_menu_05_on.gif'" onMouseOut="tmenu5.src='images/item_menu_05_off.gif'"><img src="images/item_menu_05_off.gif" width="72" height="36" alt="" border="0" name="tmenu5"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAH')" hidefocus="true" onMouseOver="tmenu8.src='images/item_menu_08_on.gif'" onMouseOut="tmenu8.src='images/item_menu_08_off.gif'"><img src="images/item_menu_08_off.gif" width="72" height="36" alt="" border="0" name="tmenu8"></a></td>
        
        <?php	
		}
		else if($catalog == "E")
		{
		?>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAA')" hidefocus="true" onMouseOver="tmenu6.src='images/item_menu_06_on.gif'" onMouseOut="tmenu6.src='images/item_menu_06_off.gif'"><img src="images/item_menu_06_off.gif" width="72" height="36" alt="" border="0" name="tmenu6"></td>
            
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAB')" hidefocus="true" onMouseOver="tmenu7.src='images/item_menu_07_on.gif'" onMouseOut="tmenu7.src='images/item_menu_07_off.gif'"><img src="images/item_menu_07_off.gif" width="72" height="36" alt="" border="0" name="tmenu7"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAC')" hidefocus="true" onMouseOver="tmenu1.src='images/item_menu_01_on.gif'" onMouseOut="tmenu1.src='images/item_menu_01_off.gif'"><img src="images/item_menu_01_off.gif" width="72" height="36" alt="" border="0" name="tmenu1"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAD')" hidefocus="true" onMouseOver="tmenu2.src='images/item_menu_02_on.gif'" onMouseOut="tmenu2.src='images/item_menu_02_off.gif'"><img src="images/item_menu_02_off.gif" width="72" height="36" alt="" border="0" name="tmenu2"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><img src="images/item_menu_03_on.gif" width="72" height="36" alt="" border="0" name="tmenu3"></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAF')" hidefocus="true" onMouseOver="tmenu4.src='images/item_menu_04_on.gif'" onMouseOut="tmenu4.src='images/item_menu_04_off.gif'"><img src="images/item_menu_04_off.gif" width="72" height="36" alt="" border="0" name="tmenu4"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAG')" hidefocus="true" onMouseOver="tmenu5.src='images/item_menu_05_on.gif'" onMouseOut="tmenu5.src='images/item_menu_05_off.gif'"><img src="images/item_menu_05_off.gif" width="72" height="36" alt="" border="0" name="tmenu5"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAH')" hidefocus="true" onMouseOver="tmenu8.src='images/item_menu_08_on.gif'" onMouseOut="tmenu8.src='images/item_menu_08_off.gif'"><img src="images/item_menu_08_off.gif" width="72" height="36" alt="" border="0" name="tmenu8"></a></td>
        
        <?php	
		}
		else if($catalog == "F")
		{
		?>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAA')" hidefocus="true" onMouseOver="tmenu6.src='images/item_menu_06_on.gif'" onMouseOut="tmenu6.src='images/item_menu_06_off.gif'"><img src="images/item_menu_06_off.gif" width="72" height="36" alt="" border="0" name="tmenu6"></td>
            
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAB')" hidefocus="true" onMouseOver="tmenu7.src='images/item_menu_07_on.gif'" onMouseOut="tmenu7.src='images/item_menu_07_off.gif'"><img src="images/item_menu_07_off.gif" width="72" height="36" alt="" border="0" name="tmenu7"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAC')" hidefocus="true" onMouseOver="tmenu1.src='images/item_menu_01_on.gif'" onMouseOut="tmenu1.src='images/item_menu_01_off.gif'"><img src="images/item_menu_01_off.gif" width="72" height="36" alt="" border="0" name="tmenu1"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAD')" hidefocus="true" onMouseOver="tmenu2.src='images/item_menu_02_on.gif'" onMouseOut="tmenu2.src='images/item_menu_02_off.gif'"><img src="images/item_menu_02_off.gif" width="72" height="36" alt="" border="0" name="tmenu2"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAE')" hidefocus="true" onMouseOver="tmenu3.src='images/item_menu_03_on.gif'" onMouseOut="tmenu3.src='images/item_menu_03_off.gif'"><img src="images/item_menu_03_off.gif" width="72" height="36" alt="" border="0" name="tmenu3"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><img src="images/item_menu_04_on.gif" width="72" height="36" alt="" border="0" name="tmenu4"></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAG')" hidefocus="true" onMouseOver="tmenu5.src='images/item_menu_05_on.gif'" onMouseOut="tmenu5.src='images/item_menu_05_off.gif'"><img src="images/item_menu_05_off.gif" width="72" height="36" alt="" border="0" name="tmenu5"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAH')" hidefocus="true" onMouseOver="tmenu8.src='images/item_menu_08_on.gif'" onMouseOut="tmenu8.src='images/item_menu_08_off.gif'"><img src="images/item_menu_08_off.gif" width="72" height="36" alt="" border="0" name="tmenu8"></a></td>
        
        <?php	
		}
		else if($catalog == "G")
		{
		?>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAA')" hidefocus="true" onMouseOver="tmenu6.src='images/item_menu_06_on.gif'" onMouseOut="tmenu6.src='images/item_menu_06_off.gif'"><img src="images/item_menu_06_off.gif" width="72" height="36" alt="" border="0" name="tmenu6"></td>
            
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAB')" hidefocus="true" onMouseOver="tmenu7.src='images/item_menu_07_on.gif'" onMouseOut="tmenu7.src='images/item_menu_07_off.gif'"><img src="images/item_menu_07_off.gif" width="72" height="36" alt="" border="0" name="tmenu7"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAC')" hidefocus="true" onMouseOver="tmenu1.src='images/item_menu_01_on.gif'" onMouseOut="tmenu1.src='images/item_menu_01_off.gif'"><img src="images/item_menu_01_off.gif" width="72" height="36" alt="" border="0" name="tmenu1"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAD')" hidefocus="true" onMouseOver="tmenu2.src='images/item_menu_02_on.gif'" onMouseOut="tmenu2.src='images/item_menu_02_off.gif'"><img src="images/item_menu_02_off.gif" width="72" height="36" alt="" border="0" name="tmenu2"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAE')" hidefocus="true" onMouseOver="tmenu3.src='images/item_menu_03_on.gif'" onMouseOut="tmenu3.src='images/item_menu_03_off.gif'"><img src="images/item_menu_03_off.gif" width="72" height="36" alt="" border="0" name="tmenu3"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAF')" hidefocus="true" onMouseOver="tmenu4.src='images/item_menu_04_on.gif'" onMouseOut="tmenu4.src='images/item_menu_04_off.gif'"><img src="images/item_menu_04_off.gif" width="72" height="36" alt="" border="0" name="tmenu4"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><img src="images/item_menu_05_on.gif" width="72" height="36" alt="" border="0" name="tmenu5"></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAH')" hidefocus="true" onMouseOver="tmenu8.src='images/item_menu_08_on.gif'" onMouseOut="tmenu8.src='images/item_menu_08_off.gif'"><img src="images/item_menu_08_off.gif" width="72" height="36" alt="" border="0" name="tmenu8"></a></td>
        
        <?php	
		}
		else if($catalog == "H")
		{
		?>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAA')" hidefocus="true" onMouseOver="tmenu6.src='images/item_menu_06_on.gif'" onMouseOut="tmenu6.src='images/item_menu_06_off.gif'"><img src="images/item_menu_06_off.gif" width="72" height="36" alt="" border="0" name="tmenu6"></td>
            
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAB')" hidefocus="true" onMouseOver="tmenu7.src='images/item_menu_07_on.gif'" onMouseOut="tmenu7.src='images/item_menu_07_off.gif'"><img src="images/item_menu_07_off.gif" width="72" height="36" alt="" border="0" name="tmenu7"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAC')" hidefocus="true" onMouseOver="tmenu1.src='images/item_menu_01_on.gif'" onMouseOut="tmenu1.src='images/item_menu_01_off.gif'"><img src="images/item_menu_01_off.gif" width="72" height="36" alt="" border="0" name="tmenu1"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAD')" hidefocus="true" onMouseOver="tmenu2.src='images/item_menu_02_on.gif'" onMouseOut="tmenu2.src='images/item_menu_02_off.gif'"><img src="images/item_menu_02_off.gif" width="72" height="36" alt="" border="0" name="tmenu2"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAE')" hidefocus="true" onMouseOver="tmenu3.src='images/item_menu_03_on.gif'" onMouseOut="tmenu3.src='images/item_menu_03_off.gif'"><img src="images/item_menu_03_off.gif" width="72" height="36" alt="" border="0" name="tmenu3"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAF')" hidefocus="true" onMouseOver="tmenu4.src='images/item_menu_04_on.gif'" onMouseOut="tmenu4.src='images/item_menu_04_off.gif'"><img src="images/item_menu_04_off.gif" width="72" height="36" alt="" border="0" name="tmenu4"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList('ItemList.php','AAAAAAAAG')" hidefocus="true" onMouseOver="tmenu5.src='images/item_menu_05_on.gif'" onMouseOut="tmenu5.src='images/item_menu_05_off.gif'"><img src="images/item_menu_05_off.gif" width="72" height="36" alt="" border="0" name="tmenu5"></a></td>
        
        <td style="padding-left:1; padding-right:1;"><img src="images/item_menu_08_on.gif" width="72" height="36" alt="" border="0" name="tmenu8"></td>
        
        <?php	
		}
		?>
    
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
    <td height="24" background="images/shop_top_message_bg.gif" style="color:#FFFFFF; padding-left:30; padding-bottom:1;">ขอบคุณที่แวะเยี่ยม Flyff Plaza นะคะ</td>
    </tr>
    <tr>	
    <td height="455" valign="top" background="images/shop_sub_bg.gif" style="padding-left:18;"> 
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
<td>
<?php
// Itemlist
$sub = substr($_POST['categoryid'],8,9);
$itemcount_sql = $sql->prepare("SELECT COUNT(*) FROM ".MSSQL_FUDB.".dbo.ITEMMALL_TBL WHERE item_catagory = :p1 AND hide = :p2");
$itemcount_sql->BindParam(":p1",$sub);
$itemcount_sql->BindParam(":p2",$num0);
$itemcount_sql->execute();
$num_rows = $itemcount_sql->fetchColumn();
			  
$per_page = 9;   // Per Page
$page  = 1;

if(isset($_POST["currpage"]))
{
	$page = $_POST["currpage"];
}

$prev_page = $page-1;
$next_page = $page+1;
$row_start = (($per_page*$page)-$per_page);
if($num_rows<=$per_page)
{
	$num_pages =1;
}
else if(($num_rows % $per_page)==0)
{
	$num_pages =($num_rows/$per_page) ;
}
else
{
	$num_pages =($num_rows/$per_page)+1;
	$num_pages = (int)$num_pages;
}
$row_end = $per_page * $page;
if($row_end > $num_rows)
{
	$row_end = $num_rows;
}

echo"<table border=\"0\"  cellspacing=\"0\" cellpadding=\"0\"><tr>";
$intRows = 0;
$item_sql = $sql->prepare("SELECT c.* FROM (SELECT ROW_NUMBER() OVER(ORDER BY id DESC) AS RowID,*  FROM ".MSSQL_FUDB.".dbo.ITEMMALL_TBL WHERE item_catagory = :p2 AND hide = :p1) AS c WHERE c.RowID > $row_start AND c.RowID <= $row_end ");
$item_sql->BindParam(":p1",$num0);
$item_sql->BindParam(":p2",$sub);
$item_sql->execute();
while($item = $item_sql->fetch(PDO::FETCH_ASSOC))
{
	echo "<td>";
	$intRows++;
		
	$item2_sql = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspGetItemInfo :p1");
	$item2_sql->BindParam(":p1",$item['item_id']);
	$item2_sql->execute();
	$item2 = $item2_sql->fetch(PDO::FETCH_ASSOC);
	?>
<table bgcolor='#50A6ED' border='0' cellpadding='0' cellspacing='0' width='180' height='135' style='border:1 solid #B7B7B7; margin-top:6;'>
<tr>
<td colspan='2' align='center' valign='top' style='padding:4 5 3 5;'>
<table border='0' cellpadding='0' cellspacing='0' width='165' height='21'>
<tr>
<td background='images/itembox_name_bg.gif' align='center' style='padding-top:3;'><?php echo $item['item_name']; ?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td valign='top' style='padding:0 5 0 5;'>
<table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='' style='border:1 solid #999999;'>
<tr>
<td style='padding:2;'><img src='images/item/<?php if($item['images_name'] != NULL){ echo $item['images_name']; } else { echo $api->img_ext($item2['szIcon']); } ?>' width='64' height='64' alt=''></td>
</tr>
</table>
</td>
<td valign='top' style='padding:0 6 0 0;'>
<table border='0' cellpadding='0' cellspacing='0' width='92'>
<col width='20'>
<col width='72'>
<tr>
<td colspan='2'><img src='images/itembox_info_top.gif' width='93' height='4' alt=''></td>
</tr>
<tr bgcolor='#DBF5FF'>
<td height='14' style='padding-left:6;'><img src='images/icon_price.gif' width='27' height='14' alt=''></td>
<td align='right' class='d8' style='padding-top:2; padding-right:5;'><?php echo number_format($api->discount($item['item_price'])); ?>  คุกกี้</td>
</tr>
<tr bgcolor='#DBF5FF'>
<td colspan='2' valign='top' style='padding:4 5 0 6;' class='d9' height='46'>จำนวน : <?php echo $item['item_count']; ?> ชิ้น</td>
</tr>
<tr>
<td colspan='2'><img src='images/itembox_info_bottom.gif' width='93' height='4' alt=''></td>
</tr>
</table>
</td>
</tr>
<tr>
<td valign='top' style='padding:3 0 4 5;' colspan='2' align='center'>
<a href="Javascript:ViewItemDtl(<?php echo $item['id']; ?>);"><img src='images/btn_detail_off.gif' id='btndetail1' onMouseOver="btndetail1.src='images/btn_detail_off.gif'" onMouseOut="btndetail1.src='images/btn_detail_off.gif'"></a>
<a href="javascript:PurchaseItem('<?php echo $item['id']; ?>','<?php echo $item['item_name']; ?>',<?php echo $item['item_count']; ?>,<?php echo $item['item_id']; ?>,<?php echo $item['item_count']; ?>);"><img src='images/btn_buy_off.gif' id='btnbuy1' onMouseOver="btnbuy1.src='images/btn_buy_off.gif'" onMouseOut="btnbuy1.src='images/btn_buy_off.gif'"></a>
</td>
</tr>
</table>
<?php
echo"</td>";
if(($intRows)%3==0)
{
	echo '</tr>';
}
}
echo"</tr></table>";
?>


</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<tr> 
        <td height="30" colspan="3" align="center">
            <table width='30%' border='0' cellspacing='0' cellpadding='0'><tr><td width='6%'></td><td align='center' style='color:#999999; font-weight: bold;'><font color='FDCC05'><?php
		  
			echo "<center>";
  	if($prev_page)
	{
		?>
            <a href="javascript:goPage('<?php echo $prev_page; ?>','<?php echo $_POST['categoryid']; ?>');">กลับ</a>
        <?php
	}
	
	for($i=1; $i<=$num_pages; $i++){
		if($i != $page)
		{
			?>
            <a href="javascript:goPage('<?php echo $i; ?>','<?php echo $_POST['categoryid']; ?>');"><?php echo $i; ?></a>
            <?php 
		}
		else
		{
			echo "<b> $i </b>";
		}
	}
	if($page!=$num_pages)
	{
		?>
		<a href="javascript:goPage('<?php echo $next_page; ?>','<?php echo $_POST['categoryid']; ?>');"> ถัดไป</a>
        <?php 
	}
			echo "</center>";
			?> </td></tr></table>
        </td>
        </tr>
        </table>
    </td>
    </tr>
    <tr>
    <td><img src="images/shop_main_bottom.gif" width="585" height="9" alt=""></td>
    </tr>
    </table>
</td>
<td valign="top">
    <iframe src="AttendItem.php?server_index=7&m_idPlayer=1534650&user_id=banktakungs&md5=03f8aeb9ea1e099bcd796b5179d49eb0&check=a4e789f2f5ecb17383fc2ea0f8f18768" name="ItemDtlArea" width="100%" height="100%" frameborder="0" border="0"></iframe>
</td>
</tr>
</table>
<iframe name="HiddenArea" width=0 height=0> </iframe>

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
