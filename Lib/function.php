<?php
class API
{	
	public function img_ext($text)
	{
		$te = str_replace(".dds",".png",$text);
		return $te;
	}
	
	public function popup($text)
	{
		echo "<script>alert('".$text."');</script>";
	}
	
	public function go($link)
	{
		echo "<script>location='".$link."';</script>";
	}
	
	public function wait($link,$time)
	{
		echo '<script> window.setTimeout(function(){
        window.location.href = "'.$link.'"; }, '.$time.');</script>';
	}

	
	/*
	public function giftItem($itemid, $itemname, $itemcount, $player_to)
	{
		global $sql;
			$user_online = $sql->prepare("SELECT [MultiServer] FROM [CHARACTER_01_DBF].[dbo].[CHARACTER_TBL] WHERE [m_idPlayer] = :p1");
			$user_online->BindParam(":p1",$player_to);
			$user_online->execute();
			$ison = $user_online->fetch(PDO::FETCH_ASSOC);
			if( $ison['MultiServer'] != 0 ){
				$Server_IP = '127.0.0.1';
				$m_idPlayer = (INT)$player_to;
				$ItemIDa = $itemid;
				$ItemCnt = $itemcount;
		
				$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
				$packet = pack("VVVVV", 01, $m_idPlayer, 0, $ItemIDa, $ItemCnt) . str_pad("e591a261ac7e25a6640fb07f", 21, ' ') . pack("V", 1), 4325164, 4168476, 9634258;
	
				if(socket_connect($socket, $Server_IP, 29000))
					socket_write($socket, $packet, strlen($packet));
				socket_close($socket);
				$return = 1;
			}else{
				// Send Item
				$number = "01";
				$friend = "0000007";
				$send = $sql->prepare("EXEC CHARACTER_01_DBF.dbo.shopSendItem :p1,:p2,:p3,:p4,:p5,:p6");
				$send->BindParam(":p1",$player_to);
				$send->BindParam(":p2",$number);
				$send->BindParam(":p3",$itemname);
				$send->BindParam(":p4",$itemcount);
				$send->BindParam(":p5",$itemid);
				$send->BindParam(":p6",$friend);
				$send->execute();
			}
		return $return;
	}  
	*/
	public function sendItem($itemid, $itemname, $itemcount, $player_to)
	{
		global $sql;
			// Send Item
			$number = "01";
			$friend = "0000000";
			$send = $sql->prepare("EXEC CHARACTER_01_DBF.dbo.shopSendItem :p1,:p2,:p3,:p4,:p5,:p6");
			$send->BindParam(":p1",$player_to);
			$send->BindParam(":p2",$number);
			$send->BindParam(":p3",$itemname);
			$send->BindParam(":p4",$itemcount);
			$send->BindParam(":p5",$itemid);
			$send->BindParam(":p6",$friend);
			$send->execute();
		return $return;
	}  
	
	
	
	public function purchase_item($itemid, $itemname, $itemcount, $player_id, $item_price, $account, $id)
	{
		global $sql;
		global $point;
		global $current_time;
		global $date;
		$new_point = $point-$item_price;
		// LOG
		$log_sql = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspLogPurchase :p1,:p2,:p3,:p4,:p5,:p6");
		$log_sql->BindParam(":p1",$account);
		$log_sql->BindParam(":p2",$itemname);
		$log_sql->BindParam(":p3",$item_price);
		$log_sql->BindParam(":p4",$current_time);
		$log_sql->BindParam(":p5",$player_id);
		$log_sql->BindParam(":p6",$id);
		$log_sql->execute();
		// Update Cash
		$update = $sql->prepare("UPDATE ACCOUNT_DBF.dbo.ACCOUNT_TBL SET cash = :p1 WHERE account = :p2");
		$update->BindParam(":p1",$new_point);
		$update->BindParam(":p2",$account);
		$update->execute();
		if(!$update)
		{
			$api->popup("Error");
		}
		else
		{
			// Send Item
			$this->sendItem($itemid,$itemname,$itemcount,$player_id);
		}
	}
	
	public function catalog_menu($catalog)
	{
		if($catalog == "A")
		{
			$menu = '<td style="padding-left:1; padding-right:1;"><img src="./images/item_menu_06_on.gif" width="72" height="36" alt="" border="0"></td>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAB")" hidefocus="true" onMouseOver="tmenu7.src="images/item_menu_07_on.gif"" onMouseOut="tmenu7.src="images/item_menu_07_off.gif""><img src="images/item_menu_07_off.gif" width="72" height="36" alt="" border="0" name="tmenu7"></a></td>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAC")" hidefocus="true" onMouseOver="tmenu1.src="images/item_menu_01_on.gif"" onMouseOut="tmenu1.src="images/item_menu_01_off.gif""><img src="images/item_menu_01_off.gif" width="72" height="36" alt="" border="0" name="tmenu1"></a></td>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAD")" hidefocus="true" onMouseOver="tmenu2.src="images/item_menu_02_on.gif"" onMouseOut="tmenu2.src="images/item_menu_02_off.gif""><img src="images/item_menu_02_off.gif" width="72" height="36" alt="" border="0" name="tmenu2"></a></td>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAE")" hidefocus="true" onMouseOver="tmenu3.src="images/item_menu_03_on.gif"" onMouseOut="tmenu3.src="images/item_menu_03_off.gif""><img src="images/item_menu_03_off.gif" width="72" height="36" alt="" border="0" name="tmenu3"></a></td>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAF")" hidefocus="true" onMouseOver="tmenu4.src="images/item_menu_04_on.gif"" onMouseOut="tmenu4.src="images/item_menu_04_off.gif""><img src="images/item_menu_04_off.gif" width="72" height="36" alt="" border="0" name="tmenu4"></a></td>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAG")" hidefocus="true" onMouseOver="tmenu5.src="images/item_menu_05_on.gif"" onMouseOut="tmenu5.src="images/item_menu_05_off.gif""><img src="images/item_menu_05_off.gif" width="72" height="36" alt="" border="0" name="tmenu5"></a></td>
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAH")" hidefocus="true" onMouseOver="tmenu8.src="images/item_menu_08_on.gif"" onMouseOut="tmenu8.src="images/item_menu_08_off.gif""><img src="images/item_menu_08_off.gif" width="72" height="36" alt="" border="0" name="tmenu8"></a></td>';
		}
		else if($catalog == "B")
		{
			$menu = '<td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAA")" hidefocus="true" onMouseOver="tmenu1.src="images/item_menu_06_on.gif"" onMouseOut="tmenu1.src="images/item_menu_01_off.gif""><img src="images/item_menu_06_off.gif" width="72" height="36" alt="" border="0"></a></td>
			
        <td style="padding-left:1; padding-right:1;"><img src="images/item_menu_07_on.gif" width="72" height="36" alt="" border="0" name="tmenu7"></td>
		
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAC")" hidefocus="true" onMouseOver="tmenu1.src="images/item_menu_01_on.gif"" onMouseOut="tmenu1.src="images/item_menu_01_off.gif""><img src="images/item_menu_01_off.gif" width="72" height="36" alt="" border="0" name="tmenu1"></a></td>
		
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAD")" hidefocus="true" onMouseOver="tmenu2.src="images/item_menu_02_on.gif"" onMouseOut="tmenu2.src="images/item_menu_02_off.gif""><img src="images/item_menu_02_off.gif" width="72" height="36" alt="" border="0" name="tmenu2"></a></td>
		
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAE")" hidefocus="true" onMouseOver="tmenu3.src="images/item_menu_03_on.gif"" onMouseOut="tmenu3.src="images/item_menu_03_off.gif""><img src="images/item_menu_03_off.gif" width="72" height="36" alt="" border="0" name="tmenu3"></a></td>
		
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAF")" hidefocus="true" onMouseOver="tmenu4.src="images/item_menu_04_on.gif"" onMouseOut="tmenu4.src="images/item_menu_04_off.gif""><img src="images/item_menu_04_off.gif" width="72" height="36" alt="" border="0" name="tmenu4"></a></td>
		
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAG")" hidefocus="true" onMouseOver="tmenu5.src="images/item_menu_05_on.gif"" onMouseOut="tmenu5.src="images/item_menu_05_off.gif""><img src="images/item_menu_05_off.gif" width="72" height="36" alt="" border="0" name="tmenu5"></a></td>
		
        <td style="padding-left:1; padding-right:1;"><a href="javascript:goList("ItemList.php","AAAAAAAAH")" hidefocus="true" onMouseOver="tmenu8.src="images/item_menu_08_on.gif"" onMouseOut="tmenu8.src="images/item_menu_08_off.gif""><img src="images/item_menu_08_off.gif" width="72" height="36" alt="" border="0" name="tmenu8"></a></td>';
		}
		
		return $menu;
	}
	
	public function charname($charid)
	{
		global $sql;
		global $account;
		$query = $sql->prepare("EXEC ".MSSQL_FUDB.".dbo.uspGetCharacter :p1,:p2");
		$query->BindParam(":p1",$account);
		$query->BindParam(":p2",$charid);
		$query->execute();
		$char = $query->fetch(PDO::FETCH_ASSOC);
		$name = $char['m_szName'];
		return $name;
	}
	
	public function stamp_to_date($stamp)
	{
		$time = date('d/m/Y', $stamp);
		return $time;
	}
	
	public function date_full($stamp)
	{
		$time = date('d/m/Y H:i:s', $stamp);
		return $time;
	}
	
	public function discount($price)
	{
		global $discount;
		
		$sum = $price*$discount/100;
		$real_sum = $price-$sum;
		
		return $real_sum;
	}
	
	public function price_value($price)
	{
		if($price == 1)
		{
			$true = 50;
		}
		else if($price == 2)
		{
			$true = 90;
		}
		else if($price == 3)
		{
			$true = 150;
		}
		else if($price == 4)
		{
			$true = 300;
		}
		else if($price == 5)
		{
			$true = 500;
		}
		else if($price == 6)
		{
			$true = 1000;
		}
		else
		{
			$true = 0;
		}
		return $true;
	}
	
	public function status_card($status)
	{
		if($status == 0)
		{
			$s = "<strong>กำลังตรวจสอบ</strong>";
		}
		else if($status == 1)
		{
			$s = "<strong><font color='green'>สำเร็จ</font></strong>";
		}
		else if($status == 3)
		{
			$s = "<strong><font color='red'>บัตรถูกใช้แล้ว</font></strong>";
		}
		else if($status == 4 )
		{
			$s = "<strong><font color='red'>รหัสบัตรไม่ถูกต้อง</font></strong>";
		}
		else if($status == 5 )
		{
			$s = "<strong><font color='red'>เป็นบัตรทรูมูฟ</font></strong>";
		}
		else if($status == 10 )
		{
			$s = "<strong><font color='red'>Paypal สำเร็จ</font></strong>";
		}
		return $s;
	}
}
function refill_sendcard($user_no,$password,$charid)
	{
		global $_CONFIG;
		global $sql;
		/*$dates = date("h");
		if($dates > 19)
		{*/
			$merchant = 'FI15042902';
		/*}
		else
		{*/
		//	$merchant = $_CONFIG['tmpay']['merchant_id'];
		//}
		$curl = curl_init('https://203.146.127.112/tmpay.net/TPG/backend.php?merchant_id=' .$_CONFIG['tmpay']['merchant_id'] . '&password=' . $password . '&resp_url=' . $_CONFIG['tmpay']['resp_url']);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_HEADER, FALSE);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
		$curl_content = curl_exec($curl);
		if($curl_content === false)
		{
			$curl_content = curl_errno($curl) . ':' . curl_error($curl);
		}
		curl_close($curl);
		if(strpos($curl_content,'SUCCEED') !== FALSE)
		{
			$num_zero = 0;
			$insert = $sql->prepare("EXEC ACCOUNT_DBF.dbo.WebRefillTrueMoney :pw,:user,:amount,:stat,:charid");
			$insert->BindParam(":pw",$password);
			$insert->BindParam(":user",$user_no);
			$insert->BindParam(":amount",$num_zero);
			$insert->BindParam(":stat",$num_zero);
			$insert->BindParam(":charid",$charid);
			$insert->execute();
			return TRUE;
		}
	else return $curl_content;
	}
?>