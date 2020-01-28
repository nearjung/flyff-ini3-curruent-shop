<?php
session_start();
include_once("config.php");
 $transaction_id = $_GET['transaction_id'];
 $password = $_GET['password'];
 $amount = $_GET['amount'];
 $status = $_GET['status'];
 
 if( $status == 1 )
 {
	 if($amount == 1)
	 {
		 $cash = $true_50;
		 $itemid = $itemid_50;
		 $itemcount = $itemcount_50;
		 $itemtype = $itemtype_50;
		 $coupon = $coupon_50;
		 
		 if($itemtype == 2)
		 {
			 $lock = 1;
		 }
		 else if($itemtype == 1)
		 {
			 $lock = 0;
		 }
	 }
	 else if($amount == 2)
	 {
		 $cash = $true_90;
		 $itemid = $itemid_90;
		 $itemcount = $itemcount_90;
		 $itemtype = $itemtype_90;
		 $coupon = $coupon_90;
		 if($itemtype == 2)
		 {
			 $lock = 1;
		 }
		 else if($itemtype == 1)
		 {
			 $lock = 0;
		 }
	 }
	 else if($amount == 3)
	 {
		 $cash = $true_150;
		 $itemid = $itemid_150;
		 $itemcount = $itemcount_150;
		 $itemtype = $itemtype_150;
		 $coupon = $coupon_150;
		 if($itemtype == 2)
		 {
			 $lock = 1;
		 }
		 else if($itemtype == 1)
		 {
			 $lock = 0;
		 }
	 }
	 else if($amount == 4)
	 {
		 $cash = $true_300;
		 $itemid = $itemid_300;
		 $itemcount = $itemcount_300;
		 $itemtype = $itemtype_300;
		 $coupon = $coupon_300;
		 if($itemtype == 2)
		 {
			 $lock = 1;
		 }
		 else if($itemtype == 1)
		 {
			 $lock = 0;
		 }
	 }
	 else if($amount == 5)
	 {
		 $cash = $true_500;
		 $itemid = $itemid_500;
		 $itemcount = $itemcount_500;
		 $itemtype = $itemtype_500;
		 $coupon = $coupon_500;
		 if($itemtype == 2)
		 {
			 $lock = 1;
		 }
		 else if($itemtype == 1)
		 {
			 $lock = 0;
		 }
	 }
	 else if($amount == 6)
	 {
		 $cash = $true_1000;
		 $itemid = $itemid_1000;
		 $itemcount = $itemcount_1000;
		 $itemtype = $itemtype_1000;
		 $coupon = $coupon_1000;
		 if($itemtype == 2)
		 {
			 $lock = 1;
		 }
		 else if($itemtype == 1)
		 {
			 $lock = 0;
		 }
	 }
 // TRUEMONEY
 $top_sql = $sql->prepare("SELECT TOP 1 * FROM ACCOUNT_DBF.dbo.truemoney WHERE password = :pw");
 $top_sql->BindParam(":pw",$password);
 $top_sql->execute();
 $top = $top_sql->fetch(PDO::FETCH_ASSOC);
 if(empty($top['user_no'])) die('ERROR|INVALID_USER_NO');
 
 
 $card_sql = $sql->prepare("UPDATE ACCOUNT_DBF.dbo.truemoney SET status = :status, amount = :amount WHERE card_id = :id");
 $card_sql->BindParam(":status",$status);
 $card_sql->BindParam(":amount",$amount);
 $card_sql->BindParam(":id",$top['card_id']);
 $card_sql->execute();
 /*
$member_sql = $sql->prepare("EXEC ACCOUNT_DBF.dbo.WebAccInfo :p1");
$member_sql->BindParam(":p1",$top['user_no']);
$member_sql->execute();
$member = $member_sql->fetch(PDO::FETCH_ASSOC);
*/
if($amount > 0)
{
	/* $num1 = 1;
	 $upcash_sql = $sql->prepare("UPDATE MHCMember.dbo.chr_log_info SET MallMoney = MallMoney + :cash WHERE id_loginid = :account");
	 $upcash_sql->BindParam(":cash",$cash);
	 $upcash_sql->BindParam(":account",$top['user_no']);
	 $upcash_sql->execute();
	 */
	 //$api->updatecash(1,$cash,$top['user_no']);
	 
	 $update = $sql->prepare("UPDATE ACCOUNT_DBF.dbo.ACCOUNT_TBL SET cash = cash+:p1 WHERE account = :p2");
	 $update->BindParam(":p1",$cash);
	 $update->BindParam(":p2",$top['user_no']);
	 $update->execute();
	 
	 // Promotion
	 $pro_sql = $sql->prepare("SELECT * FROM WebFlyff.dbo.promotion_tbl WHERE price_id = :p1");
	 $pro_sql->BindParam(":p1",$amount);
	 $pro_sql->execute();
	 while($pro = $pro_sql->fetch(PDO::FETCH_ASSOC))
	 {
		 $api->sendItem($pro['item_id'],$pro['item_name'],$pro['item_count'],$top['charid']);
	 }
/*
	 $bonus_sql = $sql->prepare("UPDATE MHCMember.dbo.chr_log_info SET BonusPoint = BonusPoint + :cash WHERE id_loginid = :account");
	 $bonus_sql->BindParam(":cash",$bonus);
	 $bonus_sql->BindParam(":account",$top['user_no']);
	 $bonus_sql->execute();
*/
	// Topup with Item
	/*if($topupitem == 1)
	{
		// Insert Item
		$svindex = "01";
		$sendchar = "0000000";
		$senditem = $sql->prepare("EXEC CHARACTER_01_DBF.dbo.shopSendItem :p1,:p2,:p3,:p4");
		$senditem->BindParam(":p1",$top['charid']);
		$senditem->BindParam(":p2",$itemname);
		$senditem->BindParam(":p3",$count);
		$senditem->BindParam(":p4",$itemid);		$senditem->execute();
		
		if(!$senditem)
		{
			$api->popup("เกิดข้อผิดพลาดขณะรันข้อมูล");
		}
	}
*/
}
 die('SUCCEED|TOPPED_UP_THB_' . $amount . '_TO_' . $user_id_refill);
 }
 else
 {
 /* ไม่สามารถเติมเงินได ้ */
 die('ERROR|ANY_REASONS');
 }
?>