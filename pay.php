<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SatOpen.cc Best Cardsharing Server">
    <meta name="author" content="SatOpen.cc">
    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Require Pay info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <style media="screen" type="text/css">
        body, html {
            background: #FFFFFF;
        }

        /* The CSS */
        select {
            padding: 1px;
            margin: 0;
            -webkit-border-radius: 1px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
            -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
            box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
            background: #f8f8f8;
            color: #888;
            border: none;
            outline: none;
            display: inline-block;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
        }

        /* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
        @media screen and (-webkit-min-device-pixel-ratio: 0) {
            select {
                padding-right: 5px
            }
        }


    </style>
    <script type="text/javascript">
        var onloadCallback = function () {
            grecaptcha.render('html_element', {
                'sitekey': '6Ldnjx0TAAAAAECzybAYturFS-C7ZYjNQHulFLV-'
            });
        };
    </script>
</head>

<?php

require "state.php";
require "checkSecurity.php";
require "packageInfo.php";
require "generateEmail.php";
require "errorMessage.php";
if (isset($_POST["submit"])) {
    require_once('recaptchalib.php');
    $privatekey = "6LdhjA4TAAAAADgNOLtvrd-k6mMOYvc52lmN_37B";
    $resp = recaptcha_check_answer($privatekey,
        $_SERVER["REMOTE_ADDR"],
        $_POST["recaptcha_challenge_field"],
        $_POST["recaptcha_response_field"]);

    $secret = '6LcBEUcUAAAAAFaiOUhSfpRquXUVXm3vrpGg_vNI';

    if (!(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))) {
        $error = "ERROR: Please click on the reCAPTCHA box.";
        echo  "<div style='color:#ffa605'> <b>" . $error."</b></div><br>";
        header("refresh:5;url=http://opensat.ddns.net/pay.php");
    } else {
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            /* Set Var */
            $email = $_POST['email'];
            $status = $_POST['status'];
            $cline = $_POST['cline'];
            $typeAccount = $_POST['typeAccount'];
            $ip_addr = $_SERVER['REMOTE_ADDR'];

            if (!empty($_POST['packCs']) && $typeAccount === "cs") $pack = $_POST['packCs'];
            if (!empty($_POST['packIptv']) && $typeAccount === "iptv" && $_POST['packIptv'] !== "NULL") $pack = $_POST['packIptv'];
            if (!empty($_POST['packCombo']) && $typeAccount === "combo" && $_POST['packCombo'] !== "NULL") $pack = $_POST['packCombo'];
            if (!empty($_POST['limitedOffer']) && $typeAccount === "offer" && $_POST['limitedOffer'] !== "NULL") $pack = $_POST['limitedOffer'];
            $validateLink = 'http://www.satopen.cc/correct-payment.html';
            /* End Set Var */

            $country = findState($ip_addr);
            $errSecurity = checkSecurity($ip_addr, $email);
            list ($errPack, $errEmail, $errCline) = errorMessage($status, $email, $pack, $cline);
            list($price, $coinsPrice, $linkCreditCard, $paysafecardEn, $paysafecardIt,$cryptocurrency) = packageInfo($pack);

            if (!$errPack && !$errEmail && !$errCline && $errSecurity != "error") {
                list($emailBody, $headers) = generateEmail($country, $pack, $linkCreditCard, $price, $coinsPrice, $paysafecardEn, $paysafecardIt,$cryptocurrency);
                mail($email, "SatOpen.cc Info for Payment", $emailBody, $headers);
                $lastMessage = '<div class="alert alert-success">Info for payment or renewal has been sent to your email.<br>
                      If dont see email, check in SPAM FOLDER </div><br>                   
                      <br>REMEMBER - AFTER YOUR PAYMENT VALIDATE IT  <a href=' . $validateLink . '>HERE</a></div>';
            } else {
                if ($errSecurity == "error")
                    $lastMessage = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
            }
            ?>
            <script type='text/javascript'>
                $(document).ready(function () {
                    $('#myModal').modal('show');
                });
            </script>
            <div class="modal fade" tabindex="-1" id="myModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Conferm</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo $lastMessage; ?>
                            <?php echo "<p class='text-warning'>$errEmail</p>"; ?>
                            <?php echo "<p class='text-warning'>$errPack</p>"; ?>
                            <?php echo "<p class='text-warning'>$errCline</p>"; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <?php
        }
        else {
            $error = "ERROR: Please click on the reCAPTCHA box.";
            echo  "<div style='color:#ffa605'> <b>" . $error."</b></div><br>";
            header("refresh:5;url=http://opensat.ddns.net/pay.php");
    }
    }
}
?>


<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="page-header text-center">Selecting your pack</h1>
            <form class="form-horizontal" role="form" method="post" action="pay.php"
                  onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the TOS and Validate Payment after to paid.'); return false; }">
                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="example@domain.com"
                               value="<?php echo htmlspecialchars($_POST['email']); ?>">
                        <?php echo "<p class='text-danger'>$errEmail</p>"; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-sm-5 control-label">NEW OR RENEWAL</label>
                    <div class="col-sm-5">
                        <select name="status" id="status" onchange="update_type()">
                            <option value="new">NEW - NUOVA LINEA</option>
                            <option value="renewal">RENEWAL - RINNOVO LINEA</option>
                        </select>
                    </div>
                </div>


                <div class="form-group" id="clineDiv">
                    <label for="cline" class="col-sm-5 control-label">Your Account<br>(Only if renewal/Solo se rinnovo)</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="cline" name="cline"
                               placeholder="EX: 'username password'">
                        <?php echo "<p class='text-danger'>$errCline </p>"; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="typeAccount" class="col-sm-5 control-label">TYPE ACCOUNT</label>
                    <div class="col-sm-5">
                        <select name="typeAccount" id="typeAccount" onchange="update_typeaccount()">
                            <option value=""></option>
                            <option value="cs">CARDSHARING</option>
                            <option value="iptv">IPTV</option>
                            <option value="combo">CARDSHARING + IPTV</option>
                            <option value="offer">*LIMITED TIME OFFER*</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" id="cardsharingPackDiv">
                    <label for="packCs" class="col-sm-5 control-label">Package</label>
                    <div class="col-sm-5">
                        <select name="packCs">
                            <option value="NULL"></option>
                            <option value="NULL">*******CARDSHARING FULL VIP OFFER *******</option>
                            <option value="NULL"></option>
                            <option value="Full_Vip_1_Month">* CARDSHARING FULL VIP - 1 MONTH - 12E *</option>
                            <option value="Full_Vip_3_Month">* CARDSHARING FULL VIP - 3 MONTHS - 30E *</option>
                            <option value="Full_Vip_6_Month">* CARDSHARING FULL VIP - 6 MONTHS - 55E *</option>
                            <option value="NULL"></option>
                            <option value="NULL">*******CARDSHARING SINGLE PACK OFFER *******</option>
                            <option value="NULL"></option>
                            <option value="Sky_UK_Full_1_Month">CARDSHARING SKY UK - FULL PACK - 1 MONTH - 4E</option>
                            <option value="Sky_UK_Full_3_Month">CARDSHARING SKY UK - FULL PACK - 3 MONTHS - 10E</option>
                            <option value="Sky_UK_Full_6_Month">CARDSHARING SKY UK - FULL PACK - 6 MONTHS - 20E</option>
                            <option value="Sky_UK_Full_12_Month">CARDSHARING SKY UK - FULL PACK - 12 MONTHS - 40E
                            </option>
                            <option value="NULL"></option>
                            <option value="Sky_DE_Full_1_Month">CARDSHARING SKY DE - FULL PACK - 1 MONTH - 4E</option>
                            <option value="Sky_DE_Full_3_Month">CARDSHARING SKY DE - FULL PACK - 3 MONTHS - 10E</option>
                            <option value="Sky_DE_Full_6_Month">CARDSHARING SKY DE - FULL PACK - 6 MONTHS - 20E</option>
                            <option value="Sky_DE_Full_12_Month">CARDSHARING SKY DE - FULL PACK - 12 MONTHS - 40E
                            </option>
                            <option value="NULL"></option>
                            <option value="CSAT_Full_1_Month">CARDSHARING CANALSAT - FULL PACK - 1 MONTH - 4E</option>
                            <option value="CSAT_Full_3_Month">CARDSHARING CANALSAT - FULL PACK - 3 MONTHS - 10E</option>
                            <option value="CSAT_Full_6_Month">CARDSHARING CANALSAT- FULL PACK - 6 MONTHS - 20E</option>
                            <option value="CSAT_Full_12_Month">CARDSHARING CANALSAT - FULL PACK - 12 MONTHS - 40E
                            </option>
                            <option value="NULL"></option>
                            <option value="Mediaset_Premium_1_Month">CARDSHARING MEDIASET PREMIUM - FULL PACK - 1 MONTH
                                - 4E
                            </option>
                            <option value="Mediaset_Premium_3_Month">CARDSHARING MEDIASET PREMIUM - FULL PACK - 3 MONTHS
                                - 10E
                            </option>
                            <option value="Mediaset_Premium_6_Month">CARDSHARING MEDIASET PREMIUM - FULL PACK - 6 MONTHS
                                - 20E
                            </option>
                            <option value="Mediaset_Premium_12_Month">CARDSHARING MEDIASET PREMIUM - FULL PACK - 12
                                MONTHS - 40E
                            </option>
                            <option value="NULL"></option>
                            <option value="CSPAIN_Full_1_Month">CARDSHARING DIGITAL+ SPAIN - FULL PACK - 1 MONTH - 4E
                            </option>
                            <option value="CSPAIN_Full_3_Month">CARDSHARING DIGITAL+ SPAIN - FULL PACK - 3 MONTHS -
                                10E
                            </option>
                            <option value="CSPAIN_Full_6_Month">CARDSHARING DIGITAL+ SPAIN - FULL PACK - 6 MONTHS -
                                20E
                            </option>
                            <option value="CSPAIN_Full_12_Month">CARDSHARING DIGITAL+ SPAIN - FULL PACK - 12 MONTHS -
                                40E
                            </option>
                            <option value="NULL"></option>
                            <option value="CDIGITAAL_Full_1_Month">CARDSHARING CANALDIGITAAL - FULL PACK - 1 MONTH -
                                4E
                            </option>
                            <option value="CDIGITAAL_Full_3_Month">CARDSHARING CANALDIGITAAL - FULL PACK - 3 MONTHS -
                                10E
                            </option>
                            <option value="CDIGITAAL_Full_6_Month">CARDSHARING CANALDIGITAAL - FULL PACK - 6 MONTHS -
                                20E
                            </option>
                            <option value="CDIGITAAL_Full_12_Month">CARDSHARING CANALDIGITAAL - FULL PACK - 12 MONTHS -
                                40E
                            </option>
                            <option value="NULL"></option>
                            <option value="Tivusat_1_Month">CARDSHARING TIVUSAT 1 MONTH - 2E</option>
                            <option value="Tivusat_12_Month">CARDSHARING TIVUSAT 12 MONTHS - 20E</option>
                            <option value="NULL"></option>
                            <option value="NC+_1_Month">CARDSHARING NC+ 1 MONTH - 2E</option>
                            <option value="NC+_12_Month">CARDSHARING NC+ 12 MONTHS - 20E</option>
                            <option value="NULL"></option>
                            <option value="ORF_1_Month">CARDSHARING ORF 1 MONTH - 2E</option>
                            <option value="ORF_12_Month">CARDSHARING ORF 12 MONTHS - 20E</option>
                            <option value="NULL"></option>
                            <option value="Polsat_1_Month">CARDSHARING POLSAT 1 MONTH - 2E</option>
                            <option value="Polsat_12_Month">CARDSHARING POLSAT 12 MONTHS - 20E</option>
                            <option value="NULL"></option>
                            <option value="SRG_1_Month">CARDSHARING SRG 1 MONTH - 2E</option>
                            <option value="SRG_12_Month">CARDSHARING SRG 12 MONTHS - 20E</option>
                            <option value="NULL"></option>
                            <option value="MaxTv_1_Month">CARDSHARING MAXTV 1 MONTH - 2E</option>
                            <option value="MaxTv_12_Month">CARDSHARING MAXTV 12 MONTHS - 20E</option>
                            <option value="NULL"></option>
                            <option value="Adult_1_Month">CARDSHARING ADULT PACK - FULL PACK - 1 MONTH - 5E</option>
                            <option value="Adult_6_Month">CARDSHARING ADULT PACK - FULL PACK - 3 MONTHS - 10E</option>
                            <option value="Adult_6_Month">CARDSHARING ADULT PACK - FULL PACK - 6 MONTHS - 20E</option>
                            <option value="Adult_12_Month">CARDSHARING ADULT PACK - FULL PACK - 12 MONTHS - 40E</option>
                            <option value="NULL"></option>
                            <option value="NULL">*******CARDSHARING COMBO OFFER *******</option>
                            <option value="NULL"></option>
                            <option value="Combo_Full_Vip_1_Month">CARDSHARING COMBO: 5 FULLVIP PACK - 1 MONTH - 40E
                            </option>
                            <option value="Combo_Full_Vip_3_Month">CARDSHARING COMBO: 5 FULLVIP PACK - 3 MONTH - 100E
                            </option>
                            <option value="Combo_Full_Vip_6_Month">CARDSHARING COMBO: 5 FULLVIP PACK - 6 MONTH - 200E
                            </option>
                            <option value="NULL"></option>
                            <option value="Combo_SkyDe_SkyUk_1_Month">CARDSHARING COMBO: SKY DE + SKY UK - 1 MONTH -
                                8E
                            </option>
                            <option value="Combo_SkyDe_SkyUk_3_Month">CARDSHARING COMBO: SKY DE + SKY UK - 3 MONTH -
                                20E
                            </option>
                            <option value="Combo_SkyDe_SkyUk_6_Month">CARDSHARING COMBO: SKY DE + SKY UK - 6 MONTH -
                                40E
                            </option>
                            <option value="NULL"></option>
                            <option value="Combo_Canal+Spain_Sky_Uk_1_Month">CARDSHARING COMBO: CANAL+ SPAIN + SKY UK -
                                1 MONTH - 8E
                            </option>
                            <option value="Combo_Canal+Spain_Sky_Uk_3_Month">CARDSHARING COMBO: CANAL+ SPAIN + SKY UK -
                                3 MONTH - 20E
                            </option>
                            <option value="Combo_Canal+Spain_Sky_Uk_6_Month">CARDSHARING COMBO: CANAL+ SPAIN + SKY UK -
                                6 MONTH - 40E
                            </option>
                            <option value="NULL"></option>
                            <option value="Combo_Tivusat_Mediaset_1_Month">CARDSHARING COMBO: TIVUSAT + MEDIASET PREMIUM
                                - 1 MONTH - 5E
                            </option>
                            <option value="Combo_Tivusat_Mediaset_12_Month">CARDSHARING COMBO: TIVUSAT + MEDIASET
                                PREMIUM - 12 MONTH - 50E
                            </option>
                            <option value="NULL"></option>
                            <option value="Combo_Tivusat_Mediaset_MaxTv_12_Month">CARDSHARING COMBO: TIVUSAT + MEDIASET
                                PREMIUM + MAXTV - 12 MONTH - 50E
                            </option>
                        </select>
                    </div>
                    <?php echo "<p class='text-danger'>$errPack </p>"; ?>
                </div>

                <div class="form-group" id="iptvPackDiv">
                    <label for="packIptv" class="col-sm-5 control-label">Package</label>
                    <div class="col-sm-5">
                        <select name="packIptv">
                            <option value="NULL"></option>
                            <option value="NULL">******* IPTV OFFER *******</option>
                            <option value="NULL"></option>
                            <option value="IPTV_1_Month">IPTV - 1 MONTH - 12E + CARDSHARING ACCOUNT FREE (LIMITED PROMO)</option>
                            <option value="IPTV_3_Month">IPTV - 3 MONTHS - 35E + CARDSHARING ACCOUNT FREE (LIMITED PROMO)</option>
                            <option value="IPTV_6_Month">IPTV - 6 MONTHS - 70E + CARDSHARING ACCOUNT FREE (LIMITED PROMO)</option>
                        </select>
                    </div>
                    <?php echo "<p class='text-danger'>$errPack </p>"; ?>
                </div>

                <div class="form-group" id="comboPackDiv">
                    <label for="packCombo" class="col-sm-5 control-label">Package</label>
                    <div class="col-sm-5">
                        <select name="packCombo">
                            <option value="NULL"></option>
                            <option value="NULL">*******CARDSHARING FULL VIP OFFER + IPTV*******</option>
                            <option value="NULL"></option>
                            <option value="Full_Vip_1_Month_+_IPTV">* CARDSHARING FULL VIP + IPTV - 1 MONTH - 20E *
                            </option>
                            <option value="Full_Vip_3_Month_+_IPTV">* CARDSHARING FULL VIP + IPTV - 3 MONTHS - 55E *
                            </option>
                            <option value="Full_Vip_6_Month_+_IPTV">* CARDSHARING FULL VIP + IPTV - 6 MONTHS - 100E *
                            </option>
                            <option value="NULL"></option>
                        </select>
                    </div>
                    <?php echo "<p class='text-danger'>$errPack </p>"; ?>
                </div>

                <div class="form-group" id="offerPackDiv">
                    <label for="limitedOffer" class="col-sm-5 control-label">Package</label>
                    <div class="col-sm-5">
                        <select name="limitedOffer">
                            <option value="NULL"></option>
                            <option value="NULL">******* LIMITED TIME OFFER *******</option>
                            <option value="NULL"></option>
                            <option value="Promo_CS_1_Year">* LIMITED CARDSHARING FULL VIP - 12 MONTHS - 20E *</option>
                        </select>
                    </div>
                    <?php echo "<p class='text-danger'>$errPack </p>"; ?>
                </div>


                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-2" style="float: right;">
                        <div id="html_element"></div>
                    </div>
                </div>
                <!--                --><?php
                //                require_once('recaptchalib.php');
                //                $publickey = "6LdhjA4TAAAAALCToFKJAgFXb54FkYIGRYR6Kt2Z"; // you got this from the signup page
                //                echo recaptcha_get_html($publickey);
                //                ?>

                <div class="g-recaptcha" data-sitekey="6LcBEUcUAAAAAElycP2nlHVk2d9Q9khY-SJ4__Di"></div>


                <input type="checkbox" name="checkbox" value="check" id="agree"/> I have read and agree to <a
                        href="http://www.satopen.cc/correct-payment.html">Validate payment</a> after to paid.
                I have read and agree to <a href="http://www.satopen.cc/TOS.html">TOS</a>.
                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-2" style="float: right;">
                        <input id="submit" name="submit" type="submit" value="Send Pay Info" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("clineDiv").style.display = "none";
    function update_type() {
        if (document.getElementById("status").value == "new") {
            document.getElementById("clineDiv").style.display = "none";
        }
        else {
            document.getElementById("clineDiv").style.display = "block";
        }
    }
</script>

<script>
    document.getElementById("cardsharingPackDiv").style.display = "none";
    document.getElementById("iptvPackDiv").style.display = "none";
    document.getElementById("comboPackDiv").style.display = "none";
    document.getElementById("offerPackDiv").style.display = "none";

    function update_typeaccount() {
        if (document.getElementById("typeAccount").value == "cs") {
            document.getElementById("cardsharingPackDiv").style.display = "block";
            document.getElementById("iptvPackDiv").style.display = "none";
            document.getElementById("comboPackDiv").style.display = "none";
            document.getElementById("offerPackDiv").style.display = "none";
        }
        if (document.getElementById("typeAccount").value == "iptv") {
            document.getElementById("iptvPackDiv").style.display = "block";
            document.getElementById("cardsharingPackDiv").style.display = "none";
            document.getElementById("comboPackDiv").style.display = "none";
            document.getElementById("offerPackDiv").style.display = "none";
        }
        if (document.getElementById("typeAccount").value == "combo") {
            document.getElementById("iptvPackDiv").style.display = "none";
            document.getElementById("cardsharingPackDiv").style.display = "none";
            document.getElementById("comboPackDiv").style.display = "block";
            document.getElementById("offerPackDiv").style.display = "none";
        }
        if (document.getElementById("typeAccount").value == "offer") {
            document.getElementById("iptvPackDiv").style.display = "none";
            document.getElementById("cardsharingPackDiv").style.display = "none";
            document.getElementById("comboPackDiv").style.display = "none";
            document.getElementById("offerPackDiv").style.display = "block";
        }
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
                <?php echo "<p class='text-danger'>$errEmail</p>"; ?>
                <?php echo "<p class='text-danger'>$errPack</p>"; ?>
                <?php echo "<p class='text-danger'>$errCline </p>"; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</body>
</html>