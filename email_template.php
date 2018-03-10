<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 23/09/17
 * Time: 12:12
 */
function emailTemplate($username, $password, $idcode ,$expiredate ,$package, $typePackage, $note,$isMagDevice)
{

    if ($typePackage == "IPTV")  {
            if ($isMagDevice == "1") {
                $corpo_credenziali = '<b>Link Portal:</b> ';
                $corpo_credenziali .= "http://satopen-iptv.ddns.net:8000/c/";
                $corpo_credenziali .= '<br><br><b>Package:</b> ';
                $corpo_credenziali .= "IPTV $package";
                $corpo_credenziali .= '<br><b>Expire Date:</b> ';
                $corpo_credenziali .= "$expiredate (Year/Month/Day)";
                $corpo_credenziali .= '<br><b>Payment Id-Code:</b> ';
                $corpo_credenziali .= "$idcode";
                $corpo_credenziali .= '<br><b>Note:</b> ';
                $corpo_credenziali .= "$note";
                $corpo_credenziali .= '<br><br><b>Iptv Note:</b> ';
                $corpo_credenziali .= '<br>Usage Google DNS on your device or router: 8.8.8.8 (Primary) 8.8.4.4 (Secondary)<br>Download and Install Our Enigma 2 Plugin http://satopen-panel.ddns.net/Download/IptvGate_World.ipk<br>Automatic Update Of Channel List, Personalizate Bouquet Channel, Play & Pause, Forward & Rewind, Search VOD, Account Info and many more<br>';
        
            }
            else {
                $corpo_credenziali = '<b>Username:</b> ';
                $corpo_credenziali .= "$username";
                $corpo_credenziali .= '<br><b>Password:</b> ';
                $corpo_credenziali .= "$password";
                $corpo_credenziali .= '<br><br><b>Your IPTV Account Data - AutoScript Enigma2:</b> ';
                $corpo_credenziali .= "wget -O /etc/enigma2/iptv.sh \"http://satopen-iptv.ddns.net:8000/get.php?username=$username&password=$password&type=enigma22_script&output=mpegts\" && chmod 777 /etc/enigma2/iptv.sh && /etc/enigma2/iptv.sh";
                $corpo_credenziali .= '<br><br><b>Your IPTV Account Data - Link VLC/Android/IOS/Smart-Tv Player:</b> ';
                $corpo_credenziali .= "http://satopen-iptv.ddns.net:8000/get.php?username=$username&password=$password&type=m3u_plus&output=mpegts";
                $corpo_credenziali .= '<br><br><b>Plugin WorldTeam 2.0:</b> ';
                $corpo_credenziali .= "wget -q -O /tmp/IptvGate_World.ipk http://app-world.dyndns.tv/addons/plugin/tar/IptvGate_World.ipk; chmod 777 /tmp/IptvGate_World.ipk; opkg install /tmp/IptvGate_World.ipk; sleep 5; killall -9 enigma2";
                $corpo_credenziali .= '<br><b>After open the Plugina and insert your Username and Password</b>';
                $corpo_credenziali .= '<br><br><b>Package:</b> ';
                $corpo_credenziali .= "IPTV $package";
                $corpo_credenziali .= '<br><b>Expire Date:</b> ';
                $corpo_credenziali .= "$expiredate (Year/Month/Day)";
                $corpo_credenziali .= '<br><b>Payment Id-Code:</b> ';
                $corpo_credenziali .= "$idcode";
                $corpo_credenziali .= '<br><b>Note:</b> ';
                $corpo_credenziali .= "$note";
                $corpo_credenziali .= '<br><br><b>Iptv Note:</b> ';
                $corpo_credenziali .= '<br>Usage Google DNS on your device or router: 8.8.8.8 (Primary) 8.8.4.4 (Secondary)<br>Download and Install Our Enigma 2 Plugin http://satopen-panel.ddns.net/Download/IptvGate_World.ipk<br>Automatic Update Of Channel List, Personalizate Bouquet Channel, Play & Pause, Forward & Rewind, Search VOD, Account Info and many more<br>';
            }  
    }
    else {
                $corpo_credenziali = '<b>Username:</b> ';
                $corpo_credenziali .= "$username";
                $corpo_credenziali .= '<br><b>Password:</b> ';
                $corpo_credenziali .= "$password";
                $corpo_credenziali .= '<br><br><b>Your CardSharing Account Data - CLine:</b><br>';
                $corpo_credenziali .= "C: satopen-client.ddns.net 23000 $username $password";
                $corpo_credenziali .= '<br><br><b>Package:</b> ';
                $corpo_credenziali .= "Cardsharing $package";
                $corpo_credenziali .= '<br><b>Expire Date:</b> ';
                $corpo_credenziali .= "$expiredate (Year/Month/Day)";
                $corpo_credenziali .= '<br><b>Payment Id-Code:</b> ';
                $corpo_credenziali .= "$idcode";
                $corpo_credenziali .= '<br><b>Note:</b> ';
                $corpo_credenziali .= "$note";
                $corpo_credenziali .= '<br><br><b>CardSharing Note:</b> ';
                $corpo_credenziali .= '<br>Usage Google DNS on your device or router: 8.8.8.8 (Primary) 8.8.4.4 (Secondary)<br>Download and Install Our CCcam.prio in your decoder for fast zapping and zero freeze<br>http://www.satopen.cc/setup-cccam.html<br>';

    }

    
    
    $GLOBALS['head_email'] = '<html xmlns="http://www.w3.org/1999/xhtml"> <head>
				  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				  <meta name="viewport" content="width=device-width, initial-scale=1" />
				  <title>SatOpen Email</title>
				  <style type="text/css"> 
				  img {
				    max-width: 600px;
				    outline: none;
				    text-decoration: none;
				    -ms-interpolation-mode: bicubic;
				  }

				  a {
				    border: 0;
				    outline: none;
				  }

				  a img {
				    border: none;
				  }

				  /* General styling */

				  td, h1, h2, h3  {
				    font-family: Helvetica, Arial, sans-serif;
				    font-weight: 400;
				  }

				  td {
				    font-size: 13px;
				    line-height: 19px;
				    text-align: left;
				  }

				  body {
				    -webkit-font-smoothing:antialiased;
				    -webkit-text-size-adjust:none;
				    width: 100%;
				    height: 100%;
				    color: #37302d;
				    background: #ffffff;
				  }

				  table {
				    border-collapse: collapse !important;
				  }


				  h1, h2, h3, h4 {
				    padding: 0;
				    margin: 0;
				    color: #444444;
				    font-weight: 400;
				    line-height: 110%;
				  }

				  h1 {
				    font-size: 35px;
				  }

				  h2 {
				    font-size: 30px;
				  }

				  h3 {
				    font-size: 24px;
				  }

				  h4 {
				    font-size: 18px;
				    font-weight: normal;
				  }

				  .important-font {
				    color: #21BEB4;
				    font-weight: bold;
				  }

				  .hide {
				    display: none !important;
				  }

				  .force-full-width {
				    width: 100% !important;
				  }

				  </style>

				  <style type="text/css" media="screen">
				      @media screen {
					@import url(http://fonts.googleapis.com/css?family=Open+Sans:400);

					/* Thanks Outlook 2013! */
					td, h1, h2, h3 {
					  font-family:  Open Sans, Helvetica Neue, Arial, sans-serif !important;
					}
				      }
				  </style>

				  <style type="text/css" media="only screen and (max-width: 600px)">
				    /* Mobile styles */
				    @media only screen and (max-width: 600px) {

				      table[class="w320"] {
					width: 320px !important;
				      }

				      table[class="w300"] {
					width: 300px !important;
				      }

				      table[class="w290"] {
					width: 290px !important;
				      }

				      td[class="w320"] {
					width: 320px !important;
				      }

				      td[class~="mobile-padding"] {
					padding-left: 14px !important;
					padding-right: 14px !important;
				      }

				      td[class*="mobile-padding-left"] {
					padding-left: 14px !important;
				      }

				      td[class*="mobile-padding-right"] {
					padding-right: 14px !important;
				      }

				      td[class*="mobile-padding-left-only"] {
					padding-left: 14px !important;
					padding-right: 0 !important;
				      }

				      td[class*="mobile-padding-right-only"] {
					padding-right: 14px !important;
					padding-left: 0 !important;
				      }

				      td[class*="mobile-block"] {
					display: block !important;
					width: 100% !important;
					text-align: left !important;
					padding-left: 0 !important;
					padding-right: 0 !important;
					padding-bottom: 15px !important;
				      }

				      td[class*="mobile-no-padding-bottom"] {
					padding-bottom: 0 !important;
				      }

				      td[class~="mobile-center"] {
					text-align: center !important;
				      }

				      table[class*="mobile-center-block"] {
					float: none !important;
					margin: 0 auto !important;
				      }

				      *[class*="mobile-hide"] {
					display: none !important;
					width: 0 !important;
					height: 0 !important;
					line-height: 0 !important;
					font-size: 0 !important;
				      }

				      td[class*="mobile-border"] {
					border: 0 !important;
				      }
				    }
				  </style>
				</head>';

if ($typePackage == "IPTV")  {
    $corpo_email = $GLOBALS['head_email'];
    $corpo_email .= ' 
				<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
				<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
				  <tr>
				    <td align="center" valign="top" bgcolor="#ffffff"  width="100%">

				    <table cellspacing="0" cellpadding="0" width="100%">
				      <tr>
					<td style="background:#1f1f1f" width="100%">

					  <center>
					    <table cellspacing="0" cellpadding="0" width="600" class="w320">
					      <tr>
						<td valign="top" class="mobile-block mobile-no-padding-bottom mobile-center" width="270" style="background:#1f1f1f;padding:10px 10px 10px 20px;">
						  <a data-click-track-id="1262" href="#" style="text-decoration:none;">
						    <img src="http://www.satopen.cc/uploads/1/3/3/0/13301587/1460553356.png" width="142" height="30" alt="Your Logo"/>
						  </a>
						</td>
						<td valign="top" class="mobile-block mobile-center" width="270" style="background:#1f1f1f;padding:10px 15px 10px 10px">
						  <table border="0" cellpadding="0" cellspacing="0" class="mobile-center-block" align="right">
						    <tr>
						      <td align="right">
							<a data-click-track-id="2952" href="https://www.facebook.com/Satopencc-Best-CardSharingIPTV-Server-1738104009796186">
							<img src="http://keenthemes.com/assets/img/emailtemplate/social_facebook.png"  width="30" height="30" alt="social icon"/>
							</a>
						      </td>
						    </tr>
						  </table>
						</td>
					      </tr>
					    </table>
					  </center>

					</td>
				      </tr>
				      <tr>
					<td style="border-bottom:1px solid #e7e7e7;">

					  <center>
					    <table cellpadding="0" cellspacing="0" width="600" class="w320">
					      <tr>
						<td align="left" class="mobile-padding" style="padding:20px 20px 0">

						  <br class="mobile-hide" />

						  <h1>Account Data on SatOpen.cc!</h1>

						   <br>
						  <b>Your Data for Help Area:</b><br><br>';
                $corpo_email .= $corpo_credenziali;
            $corpo_email .= '
						<br>
						  <br>

						  <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
						    <tr>
						      <td style="width:130px;background:#D84A38;">
							<div>
							  <!--[if mso]>
							  <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:33px;v-text-anchor:middle;width:130px;" stroke="f" fillcolor="#D84A38">
							    <w:anchorlock/>
							    <center>
							  <![endif]-->
							      <a href="http://satopen.cc"
							style="background-color:#D84A38;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:18px;font-weight:bold;line-height:33px;text-align:center;text-decoration:none;width:130px;-webkit-text-size-adjust:none;">SatOpen.CC</a>
							  <!--[if mso]>
							    </center>
							  </v:rect> 
							  <![endif]-->
							</div>
						      </td>
						      <td width="316" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td>
						    </tr>
						  </table>
						  <br><br>
						</td>
						<td class="mobile-hide" style="padding-top:20px;padding-bottom:0;vertical-align:bottom">
						  <table cellspacing="0" cellpadding="0" width="100%">
						    <tr>
						      <td align="right" valign="bottom" width="220" style="padding-right:20px; padding-bottom:0; vertical-align:bottom;">
						      <img  style="display:block" src="https://www.filepicker.io/api/file/AvB8yENR7OdiUqonW05y"  width="174" height="294" alt="iphone"/>
						      </td>
						    </tr>
						  </table>
						</td>
					      </tr>
					    </table>
					  </center>

					</td>
				      </tr>
				      <tr>
					<td valign="top" style="background-color:#f8f8f8;border-bottom:1px solid #e7e7e7;">

					</td>
				      </tr>
				      <tr>
					<td style="background-color:#1f1f1f;">
					  <center>
					    <table border="0" cellpadding="0" cellspacing="0" width="600" class="w320" style="height:100%;color:#ffffff" bgcolor="#1f1f1f" >
					      <tr>
						<td align="right" valign="middle" class="mobile-padding" style="font-size:12px;padding:20px; background-color:#1f1f1f; color:#ffffff; text-align:left; ">
						  <a style="color:#ffffff;"  href="http://www.satopen.cc/support.html">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						  <a style="color:#ffffff;" href="https://www.facebook.com/Satopencc-Best-CardSharingIPTV-Server-1738104009796186">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						  <a style="color:#ffffff;" href="http://www.satopen.cc/support.html">Support</a>
						</td>
					      </tr>
					    </table>
					  </center>
					</td>
				      </tr>
				    </table>

				    </td>
				  </tr>
				</table>
				</body>
				</html>
				';
}

else {
    $corpo_email = $GLOBALS['head_email'];
    $corpo_email .= ' 
				<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
				<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
				  <tr>
				    <td align="center" valign="top" bgcolor="#ffffff"  width="100%">

				    <table cellspacing="0" cellpadding="0" width="100%">
				      <tr>
					<td style="background:#1f1f1f" width="100%">

					  <center>
					    <table cellspacing="0" cellpadding="0" width="600" class="w320">
					      <tr>
						<td valign="top" class="mobile-block mobile-no-padding-bottom mobile-center" width="270" style="background:#1f1f1f;padding:10px 10px 10px 20px;">
						  <a data-click-track-id="1262" href="#" style="text-decoration:none;">
						    <img src="http://www.satopen.cc/uploads/1/3/3/0/13301587/1460553356.png" width="142" height="30" alt="Your Logo"/>
						  </a>
						</td>
						<td valign="top" class="mobile-block mobile-center" width="270" style="background:#1f1f1f;padding:10px 15px 10px 10px">
						  <table border="0" cellpadding="0" cellspacing="0" class="mobile-center-block" align="right">
						    <tr>
						      <td align="right">
							<a data-click-track-id="2952" href="https://www.facebook.com/Satopencc-Best-CardSharingIPTV-Server-1738104009796186">
							<img src="http://keenthemes.com/assets/img/emailtemplate/social_facebook.png"  width="30" height="30" alt="social icon"/>
							</a>
						      </td>
						    </tr>
						  </table>
						</td>
					      </tr>
					    </table>
					  </center>

					</td>
				      </tr>
				      <tr>
					<td style="border-bottom:1px solid #e7e7e7;">

					  <center>
					    <table cellpadding="0" cellspacing="0" width="600" class="w320">
					      <tr>
						<td align="left" class="mobile-padding" style="padding:20px 20px 0">

						  <br class="mobile-hide" />

						  <h1>Account Data on SatOpen.cc!</h1>

						  <br>
						  <b>Your Data for Help Area:</b><br><br>';
                            $corpo_email .= $corpo_credenziali;
                            $corpo_email .= '

						<br>
						  <br>

						  <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
						    <tr>
						      <td style="width:130px;background:#D84A38;">
							<div>
							  <!--[if mso]>
							  <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:33px;v-text-anchor:middle;width:130px;" stroke="f" fillcolor="#D84A38">
							    <w:anchorlock/>
							    <center>
							  <![endif]-->
							      <a href="http://satopen.cc"
							style="background-color:#D84A38;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:18px;font-weight:bold;line-height:33px;text-align:center;text-decoration:none;width:130px;-webkit-text-size-adjust:none;">SatOpen.cc</a>
							  <!--[if mso]>
							    </center>
							  </v:rect> 
							  <![endif]-->
							</div>
						      </td>
						      <td width="316" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td>
						    </tr>
						  </table>
						  <br><br>
						</td>
						<td class="mobile-hide" style="padding-top:20px;padding-bottom:0;vertical-align:bottom">
						  <table cellspacing="0" cellpadding="0" width="100%">
						    <tr>
						      <td align="right" valign="bottom" width="220" style="padding-right:20px; padding-bottom:0; vertical-align:bottom;">
						      <img  style="display:block" src="https://www.filepicker.io/api/file/AvB8yENR7OdiUqonW05y"  width="174" height="294" alt="iphone"/>
						      </td>
						    </tr>
						  </table>
						</td>
					      </tr>
					    </table>
					  </center>

					</td>
				      </tr>
				      <tr>
					<td valign="top" style="background-color:#f8f8f8;border-bottom:1px solid #e7e7e7;">

					</td>
				      </tr>
				      <tr>
					<td style="background-color:#1f1f1f;">
					  <center>
					    <table border="0" cellpadding="0" cellspacing="0" width="600" class="w320" style="height:100%;color:#ffffff" bgcolor="#1f1f1f" >
					      <tr>
						<td align="right" valign="middle" class="mobile-padding" style="font-size:12px;padding:20px; background-color:#1f1f1f; color:#ffffff; text-align:left; ">
						  <a style="color:#ffffff;"  href="http://www.satopen.cc/support.html">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						  <a style="color:#ffffff;" href="https://www.facebook.com/Satopencc-Best-CardSharingIPTV-Server-1738104009796186">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						  <a style="color:#ffffff;" href="http://www.satopen.cc/support.html">Support</a>
						</td>
					      </tr>
					    </table>
					  </center>
					</td>
				      </tr>
				    </table>

				    </td>
				  </tr>
				</table>
				</body>
				</html>
				';

}

    return array($corpo_email,$corpo_credenziali);
}

?>