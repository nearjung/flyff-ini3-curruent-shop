<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 13px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<?php
session_start();
include_once("Lib/config.php");

$account = $_GET['account'];
$password = $_GET['password'];

// login
$login_sql = $sql->prepare("SELECT * FROM ACCOUNT_DBF.dbo.ACCOUNT_TBL WHERE account = :p1 AND password = :p2");
$login_sql->BindParam(":p1",$account);
$login_sql->BindParam(":p2",$password);
$login_sql->execute();
$login = $login_sql->fetch(PDO::FETCH_ASSOC);

if(!$login)
{
	$api->popup("Error while login.");
	$api->go("ItemShopMain.php");
}
else
{
	echo '<center><br><table class="rate_topup">
                    <thead>
                        <tr>
                            <th width="152">ราคาบัตรเงินสด</th>
                            <th width="137">CASH</th>
                        </tr>
                    </thead>
                    <tr>
                        <td align="center">50 บาท</td>
                        <td align="center">500 CASH</td>
                    </tr>
                    <tr>
                        <td align="center">90 บาท</td>
                        <td align="center">900 CASH</td>
                    </tr>
                    <tr>
                        <td align="center">150 บาท</td>
                        <td align="center">1,500 CASH</td>
                    </tr>
                    <tr>
                        <td align="center">300 บาท</td>
                        <td align="center">3,000 CASH</td>
                    </tr>
                    <tr>
                        <td align="center">500 บาท</td>
                        <td align="center">5,000 CASH</td>
                    </tr>
                    <tr>
                        <td align="center">1,000 บาท</td>
                        <td align="center">10,000 CASH</td>
                    </tr>
                </table>
<form name="refill_truemoney" action="" method="post">
  <div class="topup_box">
    <label class="ui green label">Serial code:	</label>
    <input type="text" name="truemoney_password" placeholder="กรอกรหัสบัตรทรูมันนี่ 14 หลัก" maxlength="14" style="width:300px;" autocomplete="off"> <input type="submit" name="refill" value="เติมเงิน" class="ui green button">
    
  </div></form></center>';
  				if(isset($_POST['refill']))
				{
					if(!is_numeric($_POST['truemoney_password']))
					{
						$api->popup("รูปแบบรหัสเลขบัตรไม่ถูกต้อง");
					}
					else if($_POST['truemoney_password'] == "")
					{
						$api->popup("กรุณากรอกรหัสบัตรเติมเงินค่ะ");
					}
					else if(strlen($_POST['truemoney_password']) > 14)
					{
						$api->popup("กรุณากรอกรหัสบัตรทรูมันนี่ 14 หลักค่ะ");
					}
					else if(strlen($_POST['truemoney_password']) < 14)
					{
						$api->popup("กรุณากรอกรหัสบัตรทรูมันนี่ 14 หลักค่ะ");
					}
					else
					{
						refill_sendcard($account,$_POST['truemoney_password'],$_SESSION['character']);
						$api->popup("ทำการเติมเงินสำเร็จ กรุณารอการตรวจสอบจากระบบค่ะ");
						$api->go("RepINList.php");
					}
				}
}
?>