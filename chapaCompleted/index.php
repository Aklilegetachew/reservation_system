<?php
// ob_start();
session_start();
require  '../admin/includes/db.php';
require  '../admin/includes/functions.php';
require '../vendor/autoload.php';

use Mailgun\Mailgun;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(dirname(__FILE__)));
$dotenv->load();

date_default_timezone_set('Africa/Addis_Ababa');

$received_data = json_decode(file_get_contents("php://input"));

$tx_ref = $received_data->trx_ref;
$status = $received_data->status;
file_put_contents("chapa.txt", $received_data->trx_ref . PHP_EOL . PHP_EOL, FILE_APPEND);
file_put_contents("chapa.txt", $received_data->success . PHP_EOL . PHP_EOL, FILE_APPEND);


$mg = Mailgun::create($_ENV['MAILGUN_API_KEY']);

$Message = <<<EOD
<!DOCTYPE html>
<html  style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
body {
  margin: 0;
  padding: 0;
}
img {
  border: 0 !important;
  outline: none !important;
}
p {
  Margin: 0px !important;
  Padding: 0px !important;
}
table {
  border-collapse: collapse;
  mso-table-lspace: 0px;
  mso-table-rspace: 0px;
}
td, a, span {
  border-collapse: collapse;
  mso-line-height-rule: exactly;
}
</style>

</head>
<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap" align="center"  bgcolor="#efefef">
    <tr>
      <td align="center" valign="top"><table align="center" width="650" border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:650px; table-layout:fixed;">
          <tr>
            <td align="center" valign="top" style="padding:0 25px;" class="em_aside10"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td height="26" style="height:26px;" class="em_h20">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="#" target="_blank" style="text-decoration:none;"><img src="/assets/pilot/images/templates/header_logo.png" width="208" height="41" alt="meowgun" border="0" style="display:block; font-family:Arial, sans-serif; font-size:18px; line-height:25px; text-align:center; color:#1d4685; font-weight:bold; max-width:208px;" class="em_w150" /></a></td>
              </tr>
              <tr>
                <td height="28" style="height:28px;" class="em_h20">&nbsp;</td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap" align="center" bgcolor="#efefef">
    <tr>
      <td align="center" valign="top" class="em_aside5"><table align="center" width="650" border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:650px; table-layout:fixed;">
          <tr>
            <td align="center" valign="top" style="padding:0 25px; background-color:#ffffff;" class="em_aside10"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td height="25" style="height:25px;" class="em_h10">&nbsp;</td>
              </tr>
              <tr>
              	<td valign="top" align="center"><img src="/assets/pilot/images/templates/cat_1.jpg" width="380" height="200" class="em_full_img2" alt="Alt tag goes here" border="0" style="display:block; max-width:380px; font-family:Arial, sans-serif; font-size:17px; line-height:20px; color:#000000; font-weight:bold;" /></td>
              </tr>
              <tr>
                <td height="22" style="height:22px;" class="em_h20">&nbsp;</td>
              </tr>
              <tr>
                <td class="em_blue em_font_22" align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 26px; line-height: 29px; color:#264780; font-weight:bold;">Your Cat Thanks You</td>
              </tr>
              <tr>
                <td height="15" style="height:15px; font-size:0px; line-height:0px;">&nbsp;</td>
              </tr>
              <tr>
                <td class="em_grey" align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 22px; color:#434343;">Fluffy, thanks so much for choosing Meowgun for your litter box needs.<br class="em_hide" />
We’ve received your order, and the herding of cats has&nbsp;begun.</td>
              </tr>
              <tr>
                <td height="15" style="height:15px; font-size:1px; line-height:1px;">&nbsp;</td>
              </tr>
              <tr>
                <td class="em_grey" align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 22px; color:#434343;"><strong>Order #:</strong> <span style="color:#da885b; text-decoration:underline;">123456789</span> <span class="em_hide2">&nbsp;|&nbsp;</span><span class="em_mob_block"></span> <strong>Order Date:</strong> October 29, 2019</td>
              </tr>
              <tr>
                <td height="20" style="height:20px; font-size:1px; line-height:1px;">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top"><table width="145" style="width:145px; background-color:#6bafb2; border-radius:4px;" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#6bafb2">
                  <tr>
                    <td class="em_white" height="42" align="center" valign="middle" style="font-family: Arial, sans-serif; font-size: 16px; color:#ffffff; font-weight:bold; height:42px;"><a href="https://www.mailgun.com" target="_blank" style="text-decoration:none; color:#ffffff; line-height:42px; display:block;">Order Status</a></td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td height="40" style="height:40px;" class="em_h10">&nbsp;</td>
              </tr>

            </table>
            </td>
          </tr>
          <tr>
          	<td height="15" class="em_h10" style="height:15px; font-size:1px; line-height:1px;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="padding:0 50px; background-color:#ffffff;" class="em_aside10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td height="35" style="height:35px;" class="em_h10">&nbsp;</td>
              </tr>
              <tr>
                <td class="em_grey" align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 18px; line-height: 22px; color:#434343; font-weight:bold;">BILLED TO:</td>
              </tr>
              <tr>
                <td height="10" style="height:10px; font-size:1px; line-height:1px;">&nbsp;</td>
              </tr>

              <tr>
                <td class="em_grey" align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; color:#434343;">Fluffy McFluffers<br />
XXXX XXXXXXX XX<br />
XXXXXX, XX XXXXX</td>
              </tr>
              <tr>
                <td height="20" style="height:20px; font-size:1px; line-height:1px;">&nbsp;</td>
              </tr>

              <tr>
                <td height="1" bgcolor="#efefef" style="height:1px; background-color:#efefef; font-size:0px; line-height:0px;"><img src="/assets/pilot/images/templates/spacer.gif" width="1" height="1" alt="" border="0" style="display:block;" /></td>
              </tr>

              <tr>
                <td height="25" class="em_h20" style="height:25px; font-size:1px; line-height:1px;">&nbsp;</td>
              </tr>

              <tr>
              	<td valign="top" align="center">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td valign="top">
                        	<table width="120" border="0" cellspacing="0" cellpadding="0" align="left" style="width:120px;" class="em_wrapper">
                              <tr>
                                <td valign="top" align="center"><img src="/assets/pilot/images/templates/cat_2.jpg" width="120" height="120" alt="Alt tag goes here" border="0" style="display:block; max-width:120px; font-family:Arial, sans-serif; font-size:17px; line-height:20px; color:#000000; font-weight:bold;" /></td>
                              </tr>
                            </table>
                            <table width="25" border="0" cellspacing="0" cellpadding="0" align="left" style="width:25px;" class="em_hide">
                              <tr>
                                <td valign="top" align="left" width="25" style="width:25px;" class="em_hide">&nbsp;</td>
                              </tr>
                            </table>
                            <table width="405" border="0" cellspacing="0" cellpadding="0" align="left" style="width:405px;" class="em_wrapper">
                              <tr>
                                <td height="16" style="height:16px; font-size:1px; line-height:1px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="em_grey" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 18px; line-height: 22px; color:#434343; font-weight:bold;">Master Kitty Enterprise Edition</td>
                              </tr>
                              <tr>
                                <td height="13" style="height:13px; font-size:1px; line-height:1px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="em_grey" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; color:#434343;">Quantity: <span style="color:#da885b; font-weight:bold;">1</span></td>
                              </tr>
                              <tr>
                                <td height="13" style="height:13px; font-size:1px; line-height:1px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="em_grey" align="left" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; color:#434343;">Amount ($): <span style="color:#da885b; font-weight:bold;">$850</span></td>
                              </tr>

                            </table>
                        </td>
                      </tr>
                    </table>
                </td>
              </tr>
              <tr>
                <td height="25" class="em_h20" style="height:25px; font-size:1px; line-height:1px;">&nbsp;</td>
              </tr>
              <tr>
                <td height="1" bgcolor="#efefef" style="height:1px; background-color:#efefef; font-size:0px; line-height:0px;"><img src="/assets/pilot/images/templates/spacer.gif" width="1" height="1" alt="" border="0" style="display:block;" /></td>
              </tr>
              <tr>
                <td height="21" class="em_h20" style="height:21px; font-size:1px; line-height:1px;">&nbsp;</td>
              </tr>
              <tr>
              	<td valign="top" align="right" style="padding-bottom:5px;">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
                      <tr>
                        <td>&nbsp;</td>
                        <td class="em_grey" width="100" align="right" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; color:#434343; width:100px;">Subtotal</td>
                        <td width="20" style="width:20px; font-size:0px; line-height:0px;"></td>
                        <td width="100" class="em_grey" align="right" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; color:#434343; width:100px;">$850</td>
                      </tr>
                    </table>
                </td>
              </tr>
              <tr>
              	<td valign="top" align="right" style="padding-bottom:10px;">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
                      <tr>
                        <td>&nbsp;</td>
                        <td class="em_grey" width="100" align="right" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; color:#434343; width:100px;">Sales Tax </td>
                        <td width="20" style="width:20px; font-size:0px; line-height:0px;"></td>
                        <td width="100" class="em_grey" align="right" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; color:#434343; width:100px;">$76.50</td>
                      </tr>
                    </table>
                </td>
              </tr>
              <tr>
              	<td valign="top" align="right">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
                      <tr>
                        <td>&nbsp;</td>
                        <td class="em_grey" width="100" align="right" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; color:#434343; width:100px; font-weight:bold;">Total</td>
                        <td width="20" style="width:20px; font-size:0px; line-height:0px;"></td>
                        <td width="100" class="em_grey" align="right" valign="top" style="font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; color:#434343; width:100px; font-weight:bold;">$926.50</td>
                      </tr>
                    </table>
                </td>
              </tr>
              <tr>
                <td height="36" style="height:36px;" class="em_h10">&nbsp;</td>
              </tr>
            </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="em_full_wrap" align="center" bgcolor="#efefef">
    <tr>
      <td align="center" valign="top"><table align="center" width="650" border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:650px; table-layout:fixed;">
          <tr>
            <td align="center" valign="top" style="padding:0 25px;" class="em_aside10"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td height="40" style="height:40px;" class="em_h20">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                      <td width="30" style="width:30px;" align="center" valign="middle"><a href="#" target="_blank" style="text-decoration:none;"><img src="/assets/pilot/images/templates/fb.png" width="30" height="30" alt="Fb" border="0" style="display:block; font-family:Arial, sans-serif; font-size:18px; line-height:25px; text-align:center; color:#000000; font-weight:bold; max-width:30px;" /></a></td>
                      <td width="12" style="width:12px;">&nbsp;</td>
                      <td width="30" style="width:30px;" align="center" valign="middle"><a href="#" target="_blank" style="text-decoration:none;"><img src="/assets/pilot/images/templates/tw.png" width="30" height="30" alt="Tw" border="0" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:25px; text-align:center; color:#000000; font-weight:bold; max-width:30px;" /></a></td>
                      <td width="12" style="width:12px;">&nbsp;</td>
                      <td width="30" style="width:30px;" align="center" valign="middle"><a href="#" target="_blank" style="text-decoration:none;"><img src="/assets/pilot/images/templates/insta.png" width="30" height="30" alt="Insta" border="0" style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:25px; text-align:center; color:#000000; font-weight:bold; max-width:30px;" /></a></td>
                    </tr>
                  </table>
                 </td>
              </tr>
              <tr>
                <td height="16" style="height:16px; font-size:1px; line-height:1px; height:16px;">&nbsp;</td>
              </tr>
              <tr>
                <td class="em_grey" align="center" valign="top" style="font-family: Arial, sans-serif; font-size: 15px; line-height: 18px; color:#434343; font-weight:bold;">Problems or questions?</td>
              </tr>
              <tr>
                <td height="10" style="height:10px; font-size:1px; line-height:1px;">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top" style="font-size:0px; line-height:0px;"><table border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td width="15" align="left" valign="middle" style="font-size:0px; line-height:0px; width:15px;"><a href="mailto:meow@meowgun.com" style="text-decoration:none;"><img src="/assets/pilot/images/templates/email_img.png" width="15" height="12" alt="" border="0" style="display:block; max-width:15px;" /></a></td>
                    <td width="9" style="width:9px; font-size:0px; line-height:0px;" class="em_w5"><img src="/assets/pilot/images/templates/spacer.gif" width="1" height="1" alt="" border="0" style="display:block;" /></td>
                    <td class="em_grey em_font_11" align="left" valign="middle" style="font-family: Arial, sans-serif; font-size: 13px; line-height: 15px; color:#434343;"><a href="mailto:meow@meowgun.com" style="text-decoration:none; color:#434343;">meow@meowgun.com</a> <a href="mailto:marketing@mailgun.com" style="text-decoration:none; color:#434343;">[mailto:marketing@mailgun.com]</a></td>
                  </tr>
                </table>
                </td>
              </tr>
               <tr>
                <td height="9" style="font-size:0px; line-height:0px; height:9px;" class="em_h10"><img src="/assets/pilot/images/templates/spacer.gif" width="1" height="1" alt="" border="0" style="display:block;" /></td>
              </tr>
               <tr>
                <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td width="12" align="left" valign="middle" style="font-size:0px; line-height:0px; width:12px;"><a href="#" target="_blank" style="text-decoration:none;"><img src="/assets/pilot/images/templates/img_1.png" width="12" height="16" alt="" border="0" style="display:block; max-width:12px;" /></a></td>
                    <td width="7" style="width:7px; font-size:0px; line-height:0px;" class="em_w5">&nbsp;</td>
                    <td class="em_grey em_font_11" align="left" valign="middle" style="font-family: Arial, sans-serif; font-size: 13px; line-height: 15px; color:#434343;"><a href="#" target="_blank" style="text-decoration:none; color:#434343;">Meowgun</a> &bull; 123 Meow Way &bull; Cattown, CA 95389</td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td height="35" style="height:35px;" class="em_h20">&nbsp;</td>
              </tr>
            </table>
            </td>
          </tr>
           <tr>
            <td height="1" bgcolor="#dadada" style="font-size:0px; line-height:0px; height:1px;"><img src="/assets/pilot/images/templates/spacer.gif" width="1" height="1" alt="" border="0" style="display:block;" /></td>
          </tr>
           <tr>
            <td align="center" valign="top" style="padding:0 25px;" class="em_aside10"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td height="16" style="font-size:0px; line-height:0px; height:16px;">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0" align="left" class="em_wrapper">
                  <tr>
                    <td class="em_grey" align="center" valign="middle" style="font-family: Arial, sans-serif; font-size: 11px; line-height: 16px; color:#434343;">&copy; Meowgun 2019  &nbsp;|&nbsp;  <a href="#" target="_blank" style="text-decoration:underline; color:#434343;">Unsubscribe</a></td>
                  </tr>
                </table>
                </td>
              </tr>
              <tr>
                <td height="16" style="font-size:0px; line-height:0px; height:16px;">&nbsp;</td>
              </tr>
            </table>
            </td>
          </tr>
          <tr>
            <td class="em_hide" style="line-height:1px;min-width:650px;background-color:#efefef;"><img alt="" src="/assets/pilot/images/templates/spacer.gif" height="1" width="650" style="max-height:1px; min-height:1px; display:block; width:650px; min-width:650px;" border="0" /></td>
          </tr>
        </table>
      </td>
    </tr>
</table>
</body>
</html>
EOD;

if ($status == "success") {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.chapa.co/v1/transaction/verify/' . $tx_ref);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


    $headers = array();
    $headers[] = 'Authorization: Bearer ' . $_ENV['CHAPA_SECK'];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $result = json_decode($result);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    // file_put_contents("chapa.txt", $result . PHP_EOL . PHP_EOL, FILE_APPEND);

    var_dump($result);

    // echo $result->status;

    if ($result->status == 'success') {
        $queryFetch = "SELECT * FROM temp_res WHERE userGID = '$tx_ref'";
        $temp_res = mysqli_query($connection, $queryFetch);

        confirm($temp_res);
        $temp_row = mysqli_fetch_assoc($temp_res);

        $firstName = $temp_row['firstName'];
        $lastName = $temp_row['lastName'];
        $email = $temp_row['email'];
        $address = $temp_row['resAddress'];
        $city = $temp_row['city'];
        $country = $temp_row['country'];
        $phonNum = $temp_row['phoneNum'];
        $zipCode = $temp_row['zipCode'];
        $specReq = $temp_row['specialRequest'];
        $promoCode = $temp_row['promoCode'];
        $total = $temp_row['total'];
        $cart2 = $temp_row['cart'];
        $created_at = $temp_row['created_at'];
        $payment_confirmed_at = date('Y-m-d h:i:s');
        $PayMethod = $temp_row['paymentMethod'];
        $cart = json_decode($cart2);
        $room_ids = json_decode($temp_row['room_id']);
        $guestInfos = json_decode($temp_row['guestInfo']);
        $room_nums = json_decode($temp_row['room_num']);
        $room_accs = json_decode($temp_row['room_acc']);
        $room_locs = json_decode($temp_row['room_location']);
        $CiCos = json_decode($temp_row['CinCoutInfo']);
        $board = json_decode($temp_row['temp_board']);

        $res_confirmID = getName(5);


        $numofRooms = count($room_ids);
        $i = 0;
        $carts = array();
        $oldCI = '';
        $oldCO = '';
        while ($i < $numofRooms) {

            $queryRoom = "SELECT room_price from rooms WHERE room_id = '$room_ids[$i]'";
            $last_record_result = mysqli_query($connection,  $queryRoom);
            confirm($last_record_result);
            $row = mysqli_fetch_assoc($last_record_result);

            $oneReservation = array(
                'Checkin' => $CiCos[$i][0],
                'Checkout' => $CiCos[$i][1],
                'room_id' => $room_ids[$i],
                'adults' => $guestInfos[$i][0],
                'teens' => $guestInfos[$i][1],
                'kids' => $guestInfos[$i][2],
                'room_number' => $room_nums[$i],
                'room_acc' => $room_accs[$i],
                'room_location' => $room_locs[$i],
                'guestnums' => [$guestInfos[$i][0], $guestInfos[$i][1], $guestInfos[$i][2]],
                "room_price" => $row,
                "res_board" => $board[$i]

            );

            array_push($carts, $oneReservation);

            $i++;
        }
        $cartStingfy = json_encode($carts);
        foreach ($carts  as $value) {
            $guestNums = json_encode($value['guestnums']);
            $cartStingfy = json_encode($carts);
            $nowCI = strtotime($value['Checkin']);
            $nowCO = strtotime($value['Checkout']);
            if (($nowCI != $oldCI || $nowCO != $oldCO) || ($oldCI == '' && $oldCO == '')) {
                $query = "INSERT INTO reservations(res_firstname, res_lastname, res_phone, res_email, res_checkin, res_checkout, res_country, res_address, res_city, res_zipcode, res_paymentMethod, res_roomIDs, res_price, res_location, res_confirmID, res_specialRequest, res_guestNo, 	res_agent, res_cart, res_roomType, res_roomNo, created_at, payment_confirmed_at) ";
                $query .= "VALUES('$firstName', '$lastName', '$phonNum', '$email', '{$value['Checkin']}', '{$value['Checkout']}', '$country', '$address', '$city', '$zipCode', '$PayMethod', '{$value['room_id']}',
             '{$total}', '{$value['room_location']}', '{$res_confirmID}', '$specReq', '{$temp_row['guestInfo']}', 'website', '$cartStingfy', '{$temp_row['room_acc']}', '{$temp_row['room_num']}', '$created_at', '$payment_confirmed_at') ";

                $result = mysqli_query($connection, $query);
                confirm($result);
                $oldCI = strtotime($value['Checkin']);
                $oldCO = strtotime($value['Checkout']);
            }


            $last_record_query = "SELECT * FROM reservations WHERE res_confirmID = '$res_confirmID'";
            $last_record_result = mysqli_query($connection, $last_record_query);
            confirm($last_record_result);
            $row = mysqli_fetch_assoc($last_record_result);

            $res_Id = $row['res_id'];

            $booked_query = "INSERT INTO booked_rooms(b_res_id, b_roomId, b_roomType, b_roomLocation, b_checkin, b_checkout) ";
            $booked_query .= "VALUES ('$res_Id', '{$value['room_id']}', '{$value['room_acc']}', '{$value['room_location']}',  '{$value['Checkin']}', '{$value['Checkout']}')";

            $booked_result = mysqli_query($connection, $booked_query);

            confirm($booked_result);

            $booked_query = "INSERT INTO guest_info(info_res_id, info_adults, info_kids, info_teens, info_room_id, info_room_number, info_room_acc, info_room_location, info_board) ";
            $booked_query .= "VALUES ('$res_Id', '{$value['adults']}', '{$value['kids']}',  '{$value['teens']}', '{$value['room_id']}', '{$value['room_number']}', '{$value['room_acc']}', '{$value['room_location']}', '{$value['res_board']}')";
            $booked_result = mysqli_query($connection, $booked_query);
            confirm($booked_result);

            $status_query = "UPDATE `rooms` SET `room_status` = 'booked' WHERE `room_id` = '{$value['room_id']}'";
            $result_status = mysqli_query($connection, $status_query);
            confirm($result_status);
        }


        $delete_temp_query = "DELETE FROM temp_res WHERE userGID = '$tx_ref'";
        $delete_result = mysqli_query($connection, $delete_temp_query);


        $mg->messages()->send('reservations.kurifturesorts.com', [
            'from'    => 'Kuriftu Resort@kurifturesorts.com',
            'to'      => 'nattynengeda@gmail.com',
            'subject' => 'Kuriftu Resort and Spa',
            'html'    =>  $Message
        ]);
    }
}
