<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SatOpen.cc Best Cardsharing Server">
    <meta name="author" content="SatOpen.cc">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Require Pay info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <style media="screen" type="text/css">
        body, html {background:#FFFFFF; }

        /* The CSS */
        select {
            padding:1px;
            margin: 0;
            -webkit-border-radius:1px;
            -moz-border-radius:2px;
            border-radius:2px;
            -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
            -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
            box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
            background: #f8f8f8;
            color:#888;
            border:none;
            outline:none;
            display: inline-block;
            -webkit-appearance:none;
            -moz-appearance:none;
            appearance:none;
            cursor:pointer;
        }

        /* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
        @media screen and (-webkit-min-device-pixel-ratio:0) {
            select {padding-right:5px}
        }




    </style>
</head>

<?php

require "state.php";
require "checkSecurity.php";
require "packageInfo.php";
require "generateEmailValidate.php";
require "errorMessage.php";
require "saveIdCode.php";

if (isset($_POST["submit"])) {
    require_once('recaptchalib.php');
    $privatekey = "6LdhjA4TAAAAADgNOLtvrd-k6mMOYvc52lmN_37B";
    $resp = recaptcha_check_answer ($privatekey,
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]);
    if (!$resp->is_valid) {
        //What happens when the CAPTCHA was entered incorrectly
        die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
            "(reCAPTCHA said: " . $resp->error . ")");
        header( "refresh:8;url=http://opensat.ddns.net/pay.php" );
    } else {
        /* Set Var */
        $emailSatOpen = "satopen1@gmail.com";
        $email = $_POST['email'];
        $email2 = $_POST['email2'];
        $status = $_POST['status'];
        $usernameCs = $_POST['usernameCs'];
        $passwordCs = $_POST['passwordCs'];
        $usernameIptv = $_POST['usernameIptv'];
        $passwordIptv = $_POST['passwordIptv'];
        $paySystem = $_POST['paySystem'];
        $codeId = $_POST['codeId'];
        $typeAccount = $_POST['typeAccount'];
        $note = $_POST['note'];

        $ip_addr = $_SERVER['REMOTE_ADDR'];

        if (!empty($_POST['packCs']) && $typeAccount ==="cs") $pack = $_POST['packCs'];
        if (!empty($_POST['packIptv']) && $typeAccount ==="iptv" && $_POST['packIptv']!== "NULL") $pack = $_POST['packIptv'];
        if (!empty($_POST['packCombo']) && $typeAccount ==="combo" && $_POST['packCombo']!== "NULL") $pack = $_POST['packCombo'];
        if (!empty($_POST['limitedOffer']) && $typeAccount ==="offer" && $_POST['limitedOffer']!== "NULL") $pack = $_POST['limitedOffer'];
        $validateLink = 'http://www.satopen.cc/correct-payment.html';
        /* End Set Var */

        $country = findState($ip_addr);
        $errSecurity = checkSecurity($ip_addr, $email);
        list ($errPack, $errEmail, $errCline, $errIdCode) = errorMessageValidate($status, $email,$email2,$pack,$typeAccount,$usernameIptv,$passwordIptv,$usernameCs,$passwordCs,$codeId);
        list($price, $coinsPrice, $linkCreditCard, $paysafecardEn, $paysafecardIt) = packageInfo($pack);

        if (!$errPack && !$errEmail && !$errCline && !$errIdCode && $errSecurity!=="error") {
            list($emailBody,$emailObject,$headers,$successMessage) = generateEmailValidate($email,$status,$country, $pack, $paySystem, $price, $coinsPrice,$paysafecardEn, $paysafecardIt, $codeId,$usernameIptv,$passwordIptv,$usernameCs,$passwordCs,$note,$ip_addr);
            mail($email,$emailObject, $emailBody, $headers);
            mail($emailSatOpen,$emailObject, $emailBody, $headers);
            saveIdCode($codeId,$email);
            $lastMessage = "<div class='alert alert-success'>$successMessage<br></div>";
        } else {
             if ($errSecurity==="error")
                $lastMessage = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
        }
        ?>
        <script type='text/javascript'>
            $(document).ready(function(){
                $('#myModal').modal('show');
            });
        </script>
        <div class="modal fade" tabindex="-1"  id="myModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Conferm</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $lastMessage; ?>
                        <?php echo "<p class='text-warning'>$errEmail</p>";?>
                        <?php echo "<p class='text-warning'>$errPack</p>";?>
                        <?php echo "<p class='text-warning'>$errCline</p>";?>
                        <?php echo "<p class='text-warning'>$errIdCode</p>";?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
            <?php
    }
}
?>


<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="page-header text-center">Validate your Payment</h1>
            <form class="form-horizontal" role="form" method="post" action="validate.php" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the TOS and Validate Payment after to paid.'); return false; }">
                <!--Email-->
                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                        <?php echo "<p class='text-danger'>$errEmail</p>";?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">Email Confirmation</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="email2" name="email2" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email2']); ?>">
                        <?php echo "<p class='text-danger'>$errEmail</p>";?>
                    </div>
                </div>
                <!--PaySystem-->
                <div class="form-group" id="paySystemDiv">
                    <label for="paySystem" class="col-sm-5 control-label">Payment System</label>
                    <div class="col-sm-5">
                        <select name="paySystem" id="paySystem" onchange="update_type_paySystem()">
                            <option value="">             </option>
                            <option value="creditCardMyCommerce">CreditCard by Mycommerce.com</option>
                            <option value="neteller">Neteller</option>
                            <option value="skrill">Skrill</option>
                            <option value="bitcoin">Bitcoin</option>
                            <option value="paySafeCard">PaySafeCard</option>
                        </select>
                    </div>
                </div>
                <!--Id Code-->
                <div class="form-group" id="codeIdDiv">
                    <label for="codeId" class="col-sm-5 control-label">Id-Code</label>
                    <div class="col-sm-5">
                        <input type="text" name="codeId" id="codeId" class="required" />
                        <?php echo "<p class='text-danger'>$errIdCode </p>";?>
                    </div>
                </div>

                <!--Type account-->
                <div class="form-group">
                    <label for="typeAccount" class="col-sm-5 control-label">Type Account</label>
                    <div class="col-sm-5">
                        <select name="typeAccount" id="typeAccount" onchange="update_typeaccount()">
                            <option value="">             </option>
                            <option value="cs">CARDSHARING</option>
                            <option value="iptv">IPTV</option>
                            <option value="combo">CARDSHARING + IPTV</option>
                            <option value="offer">*LIMITED TIME OFFER*</option>
                        </select>
                    </div>
                </div>

                <!--Package-->
                <div class="form-group" id="cardsharingPackDiv">
                    <label for="packCs" class="col-sm-5 control-label">Package</label>
                    <div class="col-sm-5">
                        <select name="packCs">
                            <option value="NULL">                                           </option>
                            <option value="NULL">*******CARDSHARING  FULL VIP OFFER *******</option>
                            <option value="NULL">                                          </option>
                            <option value="Full_Vip_1_Month">* CARDSHARING FULL VIP - 1 MONTH - 12E *</option>
                            <option value="Full_Vip_3_Month">* CARDSHARING FULL VIP - 3 MONTHS - 30E *</option>
                            <option value="Full_Vip_6_Month">* CARDSHARING FULL VIP - 6 MONTHS - 55E *</option>
                            <option value="NULL">                                            </option>
                            <option value="NULL">*******CARDSHARING SINGLE PACK OFFER *******</option>
                            <option value="NULL">                                            </option>
                            <option value="Sky_UK_Full_1_Month">CARDSHARING SKY UK - FULL PACK - 1 MONTH - 4E</option>
                            <option value="Sky_UK_Full_3_Month">CARDSHARING SKY UK - FULL PACK - 3 MONTHS - 10E</option>
                            <option value="Sky_UK_Full_6_Month">CARDSHARING SKY UK - FULL PACK - 6 MONTHS - 20E</option>
                            <option value="Sky_UK_Full_12_Month">CARDSHARING SKY UK - FULL PACK - 12 MONTHS - 40E</option>
                            <option value="NULL">                                            </option>
                            <option value="Sky_DE_Full_1_Month">CARDSHARING SKY DE - FULL PACK - 1 MONTH - 4E</option>
                            <option value="Sky_DE_Full_3_Month">CARDSHARING SKY DE - FULL PACK - 3 MONTHS - 10E</option>
                            <option value="Sky_DE_Full_6_Month">CARDSHARING SKY DE - FULL PACK - 6 MONTHS - 20E</option>
                            <option value="Sky_DE_Full_12_Month">CARDSHARING SKY DE - FULL PACK - 12 MONTHS - 40E</option>
                            <option value="NULL">                                            </option>
                            <option value="CSAT_Full_1_Month">CARDSHARING CANALSAT - FULL PACK - 1 MONTH - 4E</option>
                            <option value="CSAT_Full_3_Month">CARDSHARING CANALSAT - FULL PACK - 3 MONTHS - 10E</option>
                            <option value="CSAT_Full_6_Month">CARDSHARING CANALSAT- FULL PACK - 6 MONTHS - 20E</option>
                            <option value="CSAT_Full_12_Month">CARDSHARING CANALSAT - FULL PACK - 12 MONTHS - 40E</option>
                            <option value="NULL">                                            </option>
                            <option value="Mediaset_Premium_1_Month">CARDSHARING MEDIASET PREMIUM - FULL PACK - 1 MONTH - 4E</option>
                            <option value="Mediaset_Premium_3_Month">CARDSHARING MEDIASET PREMIUM - FULL PACK - 3 MONTHS - 10E</option>
                            <option value="Mediaset_Premium_6_Month">CARDSHARING MEDIASET PREMIUM - FULL PACK - 6 MONTHS - 20E</option>
                            <option value="Mediaset_Premium_12_Month">CARDSHARING MEDIASET PREMIUM - FULL PACK - 12 MONTHS - 40E</option>
                            <option value="NULL">                                            </option>
                            <option value="CSPAIN_Full_1_Month">CARDSHARING DIGITAL+ SPAIN - FULL PACK - 1 MONTH - 4E</option>
                            <option value="CSPAIN_Full_3_Month">CARDSHARING DIGITAL+ SPAIN - FULL PACK - 3 MONTHS - 10E</option>
                            <option value="CSPAIN_Full_6_Month">CARDSHARING DIGITAL+ SPAIN - FULL PACK - 6 MONTHS - 20E</option>
                            <option value="CSPAIN_Full_12_Month">CARDSHARING DIGITAL+ SPAIN - FULL PACK - 12 MONTHS - 40E</option>
                            <option value="NULL">                                            </option>
                            <option value="Tivusat_1_Month">CARDSHARING TIVUSAT 1 MONTH - 2E</option>
                            <option value="Tivusat_12_Month">CARDSHARING TIVUSAT 12 MONTHS - 20E</option>
                            <option value="NULL">                                            </option>
                            <option value="NC+_1_Month">CARDSHARING NC+ 1 MONTH - 2E</option>
                            <option value="NC+_12_Month">CARDSHARING NC+ 12 MONTHS - 20E</option>
                            <option value="NULL">                                            </option>
                            <option value="ORF_1_Month">CARDSHARING ORF 1 MONTH - 2E</option>
                            <option value="ORF_12_Month">CARDSHARING ORF 12 MONTHS - 20E</option>
                            <option value="NULL">                                            </option>
                            <option value="Polsat_1_Month">CARDSHARING POLSAT 1 MONTH - 2E</option>
                            <option value="Polsat_12_Month">CARDSHARING POLSAT 12 MONTHS - 20E</option>
                            <option value="NULL">                                            </option>
                            <option value="SRG_1_Month">CARDSHARING SRG 1 MONTH - 2E</option>
                            <option value="SRG_12_Month">CARDSHARING SRG 12 MONTHS - 20E</option>
                            <option value="NULL">                                            </option>
                            <option value="MaxTv_1_Month">CARDSHARING MAXTV 1 MONTH - 2E</option>
                            <option value="MaxTv_12_Month">CARDSHARING MAXTV 12 MONTHS - 20E</option>
                            <option value="NULL">                                            </option>
                            <option value="Adult_1_Month">CARDSHARING ADULT PACK - FULL PACK - 1 MONTH - 5E</option>
                            <option value="Adult_6_Month">CARDSHARING ADULT PACK - FULL PACK - 3 MONTHS - 10E</option>
                            <option value="Adult_6_Month">CARDSHARING ADULT PACK - FULL PACK - 6 MONTHS - 20E</option>
                            <option value="Adult_12_Month">CARDSHARING ADULT PACK - FULL PACK - 12 MONTHS - 40E</option>
                            <option value="NULL">                                      </option>
                            <option value="NULL">*******CARDSHARING COMBO OFFER *******</option>
                            <option value="NULL">                                      </option>
                            <option value="Combo_Full_Vip_1_Month">CARDSHARING COMBO: 5 FULLVIP PACK - 1 MONTH - 40E</option>
                            <option value="Combo_Full_Vip_3_Month">CARDSHARING COMBO: 5 FULLVIP PACK - 3 MONTH - 100E</option>
                            <option value="Combo_Full_Vip_6_Month">CARDSHARING COMBO: 5 FULLVIP PACK - 6 MONTH - 200E</option>
                            <option value="NULL">                                      </option>
                            <option value="Combo_SkyDe_SkyUk_1_Month">CARDSHARING COMBO: SKY DE + SKY UK - 1 MONTH - 8E</option>
                            <option value="Combo_SkyDe_SkyUk_3_Month">CARDSHARING COMBO: SKY DE + SKY UK - 3 MONTH - 20E</option>
                            <option value="Combo_SkyDe_SkyUk_6_Month">CARDSHARING COMBO: SKY DE + SKY UK - 6 MONTH - 40E</option>
                            <option value="NULL">                                      </option>
                            <option value="Combo_Canal+Spain_Sky_Uk_1_Month">CARDSHARING COMBO: CANAL+ SPAIN + SKY UK - 1 MONTH - 8E</option>
                            <option value="Combo_Canal+Spain_Sky_Uk_3_Month">CARDSHARING COMBO: CANAL+ SPAIN + SKY UK - 3 MONTH - 20E</option>
                            <option value="Combo_Canal+Spain_Sky_Uk_6_Month">CARDSHARING COMBO: CANAL+ SPAIN + SKY UK - 6 MONTH - 40E</option>
                            <option value="NULL">                                                             </option>
                            <option value="Combo_Tivusat_Mediaset_1_Month">CARDSHARING COMBO: TIVUSAT + MEDIASET PREMIUM - 1 MONTH - 5E</option>
                            <option value="Combo_Tivusat_Mediaset_12_Month">CARDSHARING COMBO: TIVUSAT + MEDIASET PREMIUM - 12 MONTH - 50E</option>
                            <option value="NULL">                                                             </option>
                            <option value="Combo_Tivusat_Mediaset_MaxTv_12_Month">CARDSHARING COMBO: TIVUSAT + MEDIASET PREMIUM + MAXTV - 12 MONTH - 50E</option>
                        </select>
                    </div>
                    <?php echo "<p class='text-danger'>$errPack </p>";?>
                </div>

                <div class="form-group" id="iptvPackDiv">
                    <label for="packIptv" class="col-sm-5 control-label">Package</label>
                    <div class="col-sm-5">
                        <select name="packIptv">
                            <option value="NULL">                             </option>
                            <option value="NULL">******* IPTV OFFER *******</option>
                            <option value="NULL">                             </option>
                            <option value="IPTV_1_Month">IPTV - 1 MONTH - 12E</option>
                            <option value="IPTV_3_Month">IPTV - 3 MONTHS - 35E</option>
                            <option value="IPTV_6_Month">IPTV - 6 MONTHS - 70E</option>
                        </select>
                    </div>
                    <?php echo "<p class='text-danger'>$errPack </p>";?>
                </div>

                <div class="form-group" id="comboPackDiv">
                    <label for="packCombo" class="col-sm-5 control-label">Package</label>
                    <div class="col-sm-5">
                        <select name="packCombo">
                            <option value="NULL">                                                </option>
                            <option value="NULL">*******CARDSHARING  FULL VIP OFFER + IPTV*******</option>
                            <option value="NULL">                                                </option>
                            <option value="Full_Vip_1_Month_+_IPTV">* CARDSHARING FULL VIP + IPTV - 1 MONTH - 20E *</option>
                            <option value="Full_Vip_3_Month_+_IPTV">* CARDSHARING FULL VIP + IPTV - 3 MONTHS - 55E *</option>
                            <option value="Full_Vip_6_Month_+_IPTV">* CARDSHARING FULL VIP + IPTV - 6 MONTHS - 100E *</option>
                            <option value="NULL">                                      </option>
                        </select>
                    </div>
                    <?php echo "<p class='text-danger'>$errPack </p>";?>
                </div>

                <div class="form-group" id="offerPackDiv">
                    <label for="limitedOffer" class="col-sm-5 control-label">Package</label>
                    <div class="col-sm-5">
                        <select name="limitedOffer">
                            <option value="NULL">                             </option>
                            <option value="NULL">******* LIMITED TIME OFFER *******</option>
                            <option value="NULL">                             </option>
                            <option value="Promo_CS_1_Year">* LIMITED CARDSHARING FULL VIP - 12 MONTHS - 20E *</option>
                        </select>
                    </div>
                    <?php echo "<p class='text-danger'>$errPack </p>";?>
                </div>

                <!--New or Renewal-->
                <div class="form-group">
                    <label for="status" class="col-sm-5 control-label">New Or Renewal</label>
                    <div class="col-sm-5">
                        <select name="status" id="status" onchange="update_type()">
                            <option value="">             </option>
                            <option value="new">NEW - NUOVA LINEA</option>
                            <option value="renewal">RENEWAL - RINNOVO LINEA</option>
                        </select>
                    </div>
                </div>

                <!--Renewal Info-->
                <div class="form-group" id="cardsharingRenewalDiv">
                    <label class="col-sm-5 control-label">Your C-line<br>(Only If Renewal)</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="usernameCs" name="usernameCs" placeholder="EX: 'username'">
                        <input type="text" class="form-control" id="passwordCs" name="passwordCs" placeholder="EX: 'password'">
                    </div>
                </div>

                <div class="form-group" id="iptvRenewalDiv">
                    <label class="col-sm-5 control-label">Your IPTV Account<br>(Only If renewal)</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="usernameIptv" name="usernameIptv" placeholder="EX: 'usernameIptv'">
                        <input type="text" class="form-control" id="passwordIptv" name="passwordIptv" placeholder="EX: 'password'">
                    </div>
                </div>


                <!--Additional Note-->
                <div class="form-group" id="paysafetxtDiv">
                    <div class="col-sm-5"  style="color:#ff0000">
                        <b>In case of PaySafeCard paymenth with more of one Pin write here all other Pin (with the amount to be withdrawn from it)</b>
                    </div>
                </div>
                <div class="form-group" id="devicetxtDiv">
                <div class="col-sm-5" style="color:#ff0000">
                        <b>In case of IPTV Package write here your device (If MAG device write here your MAC address)</b>
                    </div>
                </div>
                <div class="form-group" id="noteDiv">
                    <label for="note" class="col-sm-5 control-label">Note</label>
                    <div class="col-sm-5">
                        <textarea cols="40" rows="3" name="note" id="note"></textarea>
                    </div>
                </div>



                <?php
                require_once('recaptchalib.php');
                $publickey = "6LdhjA4TAAAAALCToFKJAgFXb54FkYIGRYR6Kt2Z"; // you got this from the signup page
                echo recaptcha_get_html($publickey);
                ?>

                <input type="checkbox" name="checkbox" value="check" id="agree" /> I have read and agree to <a href="http://www.satopen.cc/correct-payment.html">Validate payment</a> after to paid.
                I have read and agree to <a href="http://www.satopen.cc/TOS.html">TOS</a>.
                <div class="form-group" >
                    <div class="col-sm-5 col-sm-offset-2" style="float: right;">
                        <input id="submit" name="submit" type="submit" value="Validate" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("cardsharingRenewalDiv").style.display = "none";
    document.getElementById("iptvRenewalDiv").style.display = "none";

    function update_type() {
        if ( document.getElementById("status").value == "new" ) {
            document.getElementById("cardsharingRenewalDiv").style.display = "none";
            document.getElementById("iptvRenewalDiv").style.display = "none";
        }
        else {
            /* Case Only Iptv*/
            if ( document.getElementById("typeAccount").value == "iptv" ){
                document.getElementById("cardsharingRenewalDiv").style.display = "none";
                document.getElementById("iptvRenewalDiv").style.display = "block";
            }
            /* Case Only Cs*/
            if(document.getElementById("typeAccount").value == "cs")  {
                document.getElementById("cardsharingRenewalDiv").style.display = "block";
                document.getElementById("iptvRenewalDiv").style.display = "none";
            }
            /* Case Combo*/
            if(document.getElementById("typeAccount").value == "combo")  {
                document.getElementById("cardsharingRenewalDiv").style.display = "block";
                document.getElementById("iptvRenewalDiv").style.display = "block";
            }
        }
    }
</script>

<script>
    document.getElementById("cardsharingPackDiv").style.display = "none";
    document.getElementById("iptvPackDiv").style.display = "none";
    document.getElementById("comboPackDiv").style.display = "none";
    document.getElementById("offerPackDiv").style.display = "none";
    document.getElementById("devicetxtDiv").style.display = "none";

    function update_typeaccount() {
        if ( document.getElementById("typeAccount").value == "cs" ) {
            document.getElementById("cardsharingPackDiv").style.display = "block";
            document.getElementById("iptvPackDiv").style.display = "none";
            document.getElementById("comboPackDiv").style.display = "none";
            document.getElementById("offerPackDiv").style.display = "none";
            document.getElementById("devicetxtDiv").style.display = "none";
        }
        if ( document.getElementById("typeAccount").value == "iptv" )  {
            document.getElementById("iptvPackDiv").style.display = "block";
            document.getElementById("cardsharingPackDiv").style.display = "none";
            document.getElementById("comboPackDiv").style.display = "none";
            document.getElementById("offerPackDiv").style.display = "none";
            document.getElementById("devicetxtDiv").style.display = "block";

        }
        if ( document.getElementById("typeAccount").value == "combo" )  {
            document.getElementById("iptvPackDiv").style.display = "none";
            document.getElementById("cardsharingPackDiv").style.display = "none";
            document.getElementById("comboPackDiv").style.display = "block";
            document.getElementById("offerPackDiv").style.display = "none";
            document.getElementById("devicetxtDiv").style.display = "block";

        }
        if ( document.getElementById("typeAccount").value == "offer" )  {
            document.getElementById("iptvPackDiv").style.display = "none";
            document.getElementById("cardsharingPackDiv").style.display = "none";
            document.getElementById("comboPackDiv").style.display = "none";
            document.getElementById("offerPackDiv").style.display = "block";
            document.getElementById("devicetxtDiv").style.display = "none";

        }
    }
</script>


<script>
    document.getElementById("codeIdDiv").style.display = "none";
    document.getElementById("paysafetxtDiv").style.display = "none";

    function update_type_paySystem() {
            document.getElementById("codeIdDiv").style.display = "block";
        if ( document.getElementById("paySystem").value == "paySafeCard" )  {
            document.getElementById("paysafetxtDiv").style.display = "block";}
        else {            document.getElementById("paysafetxtDiv").style.display = "none";}

    }
</script>






<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error!</h4>
            </div>
            <div class="modal-body">
                <?php echo "<p class='text-danger'>$errEmail</p>";?>
                <?php echo "<p class='text-danger'>$errPack</p>";?>
                <?php echo "<p class='text-danger'>$errCline </p>";?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</body>
</html>