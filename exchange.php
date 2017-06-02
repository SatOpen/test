<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SatOpen.cc Best Cardsharing Server">
    <meta name="author" content="SatOpen.cc">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Generate Exchange info</title>
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
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 18/03/17
 * Time: 13:27
 */
if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $typeAccount = $_POST['typeAccount'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dns = $_POST['dns'];
    $port = $_POST['port'];
    $contact = $_POST['contact'];
    $nickname = $_POST['nickname'];
    $attempdata = '';
    $newserver = '';
    $ip_addr = $_SERVER['REMOTE_ADDR'];

    $caid = '0963,0100,1810,1803,0b01,098C,0500,1805,183D,1830,1843,1830,0648,0B00,093E,090F,0940';
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomusername = '';
    for ($i = 0; $i < 6; $i++) {
        $randomusername .= $characters[rand(0, $charactersLength - 1)];

    }
    $randompassword = '';
    for ($i = 0; $i < 10; $i++) {
        $randompassword .= $characters[rand(0, $charactersLength - 1)];
    }


    if ($typeAccount == "CEX2"){
        $newuser = "<b>[account]</b><br>
                user                          = $typeAccount-$randomusername<br>
                pwd                           = $randompassword<br>
                description                   = $dns $port $username $password $contact $nickname<br>
                caid                          = $caid<br>
                services                      = !sky_blocked<br>
                uniq                          = 2<br>
                group                         = 25,50<br>
                cacheex                       = 2<br>
                cacheex_maxhop                = 3<br>
                no_wait_time                  = 1<br>
                cacheex_block_fakecws         = 1<br>
                cccmaxhops                    = 3<br>
                cccreshare                    = 1<br><br><br>";

        if ($username!='' && $password!='' && $dns!='' && $port!='') {
        $newserver = "<b>[reader]</b><br>
                            label                         = $typeAccount-$randompassword<br>
                            description                   = $dns $port $username $password $contact $nickname<br>
                            protocol                      = cs378x<br>
                            device                        = $dns,$port<br>
                            user                          = $username<br>
                            password                      = $password<br>
                            keepalive                     = 1<br>
                            cacheex                       = 2<br>
                            cacheex_maxhop                = 3<br>
                            cacheex_block_fakecws         = 1<br>
                            caid                          = $caid<br>
                            group                         = 25,50<br>
                            dropbadcws                    = 1<br><br><br>";
        }
        else { $attempdata = "<b>My data are active for 48 Hour and attemp your data.</b>";}
        $infotosend =  "<b>Info for User</b><br>
                        <b>Cache-Ex Mode 2</b><br>
                        Dns: satopen-exchange.ddns.net<br>
                        Port Cs378x Protocol: 18000<br>
                        Username: $typeAccount-$randomusername<br>
                        Password: $randompassword<br>
                        Caid: $caid<br>
                        cacheex_maxhop                = 3<br>
                        My Email = cardsharezone@gmail.com<br>
                        My Skype = speaksat@hotmail.com<br><br><br>";
    }
    else {
        $newuser = "<b>[account]</b><br>
                user                          = $typeAccount-$randomusername<br>
                pwd                           = $randompassword<br>
                description                   = $dns $port $username $password $contact $nickname<br>
                caid                          = $caid<br>
                services                      = !sky_blocked<br>
                uniq                          = 2<br>
                group                         = 1,25,50<br>
                cacheex_maxhop                = 3<br>
                no_wait_time                  = 1<br>
                cacheex_block_fakecws         = 1<br>
                cccmaxhops                    = 3<br>
                cccreshare                    = 1<br><br><br>";
        if ($username!='' && $password!='' && $dns!='' && $port!='') {
            $newserver = "<b>[reader]</b><br>
                label                         = $typeAccount-$dns<br>
                description                   = $dns $port $username $password $contact $nickname<br>
                protocol                      = cccam<br>
                device                        = $dns,$port<br>
                user                          = $username<br>
                password                      = $password<br>
                caid                          = $caid<br>
                group                         = 1<br>
                dropbadcws                    = 1<br>
                cccversion                    = 2.2.1<br>
                cccwantemu                    = 1<br>
                ccckeepalive                  = 1<br><br><br>";
        }
        else { $attempdata = "<b>My data are active for 48 Hour and attemp your data.</b>";}

        $infotosend =  "<b>Info for User</b><br>
                        <b>Cccam</b><br>
                        Dns: satopen-exchange.ddns.net<br>
                        Port CCcam Protocol: 23000<br>
                        Username: $typeAccount-$randomusername<br>
                        Password: $randompassword<br>
                        Caid: $caid<br>
                        cccmaxhops                    = 3<br>
                        My Email = cardsharezone@gmail.com<br>
                        My Skype = speaksat@hotmail.com<br><br><br>";

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
                    <h4 class="modal-title">Exchange Data</h4>
                </div>
                <div class="modal-body">
                    <?php echo $newuser; ?>
                    <?php echo $newserver; ?>
                    <?php echo $infotosend; ?>
                    <?php echo $attempdata; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php

}
?>




<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <br/>
            <form class="form-horizontal" role="form" method="post" action="exchange.php" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the TOS and Validate Payment after to paid.'); return false; }">

                <div class="form-group" id="comboPackDiv">
                    <label for="typeAccount" class="col-sm-5 control-label">Type</label>
                    <div class="col-sm-5">
                        <select name="typeAccount">
                            <option value="CEX2">Cache-ex Mod2</option>
                            <option value="CCAM">CCcam</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" id="comboPackDiv">
                    <label for="contact" class="col-sm-5 control-label">Contact</label>
                    <div class="col-sm-5">
                        <select name="contact">
                            <option value="multics.info">MultiCs</option>
                            <option value="sat-sharing.info">Sat-Sharing.info</option>
                            <option value="cardsharing.ws">CardSharing.ws</option>
                            <option value="skype">Skype</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="username" class="col-sm-5 control-label">Nickname</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                    </div>
                </div>

                <br/>    <br/>    <br/>    <br/>
                <div class="form-group">
                    <label for="username" class="col-sm-5 control-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-5 control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                </div>




                <div class="form-group">
                    <label for="dns" class="col-sm-5 control-label">Dns</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="dns" name="dns" placeholder="dns">
                    </div>
                </div>

                <div class="form-group">
                    <label for="port" class="col-sm-5 control-label">Port</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="port" name="port" placeholder="port">
                    </div>
                </div>


                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">Email Or Skype</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                    </div>
                </div>




                <div class="form-group" >
                    <div class="col-sm-5 col-sm-offset-2" style="float: right;">
                        <input id="submit" name="submit" type="submit" value="Generate" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>