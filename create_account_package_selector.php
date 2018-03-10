<?php
/**
 * Created by PhpStorm.
 * User: francesco
 * Date: 23/09/17
 * Time: 19:27
 */

function packageSelectorUserCreator($pack) {
    $mod = "CS";
    $ident='ident                         =';
    $date = date("Y-m-d");
    $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 day");
    $date = date("Y-m-d",$date);

        if ($pack == "Full_Vip_1_Month"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "Full_Vip_1_Month_+_IPTV"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "Full_Vip_3_Month"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
        }

        if ($pack == "Full_Vip_3_Month_+_IPTV"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
        }


        if ($pack == "Full_Vip_6_Month"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
        }

        if ($pack == "Full_Vip_12_Month"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }


        if ($pack == "Full_Vip_6_Month_+_IPTV"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
        }




        if ($pack == "Sky_DE_Full_1_Month"){
            $caid = "098C";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "Sky_DE_Full_3_Month"){
            $caid = "098C";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
        }

        if ($pack == "Sky_DE_Full_6_Month"){
            $caid = "098C";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
        }

        if ($pack == "Sky_DE_Full_12_Month"){
            $caid = "098C";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }

        if ($pack == "Sky_UK_Full_1_Month"){
            $caid = "0963";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }
        if ($pack == "Sky_UK_Full_3_Month"){
            $caid = "0963";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
        }

        if ($pack == "Sky_UK_Full_6_Month"){
            $caid = "0963";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
        }

        if ($pack == "Sky_UK_Full_12_Month"){
            $caid = "0963";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }



        if ($pack == "CSAT_Full_1_Month"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,canalsat,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";

        }

        if ($pack == "CSAT_Full_3_Month"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,canalsat,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";

        }

        if ($pack == "CSAT_Full_6_Month"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,canalsat,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";

        }

        if ($pack == "CSAT_Full_12_Month"){
            $caid = "09CD,0963,0100,1805,1810,1830,183D,1841,098C,0500,0B01,0BAA,0B00,091F,0D05,0D06,09B2,093E,0B00,0D96,0B01,4AEE,0629,1838,098E,0648";
            $services                      = "!sky_blocked,canalsat,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";

        }



        if ($pack == "CSPAIN_Full_1_Month"){
            $caid = "1810";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";

        }

        if ($pack == "CSPAIN_Full_3_Month"){
            $caid = "1810";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
        }

        if ($pack == "CSPAIN_Full_6_Month"){
            $caid = "1810";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
        }

        if ($pack == "CSPAIN_Full_12_Month"){
            $caid = "1810";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }

        if ($pack == "CDIGITAAL_Full_1_Month"){
            $caid = "0100";
            $services                      = "canaldigitaal_tvlaanderen";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";

        }

        if ($pack == "CDIGITAAL_Full_3_Month"){
            $caid = "0100";
            $services                      = "canaldigitaal_tvlaanderen";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
        }

        if ($pack == "CDIGITAAL_Full_6_Month"){
            $caid = "0100";
            $services                      = "canaldigitaal_tvlaanderen";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
        }

        if ($pack == "CDIGITAAL_Full_12_Month"){
            $caid = "0100";
            $services                      = "canaldigitaal_tvlaanderen";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }


        if ($pack == "Mediaset_Premium_1_Month"){
            $caid = "1805";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "Mediaset_Premium_3_Month"){
            $caid = "1805";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
        }
        if ($pack == "Mediaset_Premium_6_Month"){
            $caid = "1805";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
        }

        if ($pack == "Mediaset_Premium_12_Month"){
            $caid = "1805";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }
        if ($pack == "SRG_1_Month"){
            $caid = "0500";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot,srgssr";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "SRG_12_Month"){
            $caid = "0500";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot,srgssr";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }

        if ($pack == "Tivusat_1_Month"){
            $caid = "183D";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "Tivusat_12_Month"){
            $caid = "183D";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }


        if ($pack == "NC+_1_Month"){
            $caid = "0100,0B01";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot,NC+,NC+Conax";
            $ident = "ident                         = 0100:000068";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "NC+_12_Month"){
            $caid = "0100,0B01";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot,NC+,NC+Conax";
            $ident = "ident                         = 0100:000068";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }


        if ($pack == "Polsat_1_Month"){
            $caid = "1803";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "Polsat_12_Month"){
            $caid = "1803";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }

        if ($pack == "ORF_1_Month"){
            $caid = "0648,0D95";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "ORF_12_Month"){
            $caid = "0648,0D95";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }


        if ($pack == "MaxTv_1_Month"){
            $caid = "1830";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "MaxTv_12_Month"){
            $caid = "1830";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }

        if ($pack == "Adult_1_Month"){
            $caid = "0500";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot,adult";
            $ident = "ident                         = 0500:043800;0500:032500";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }
        if ($pack == "Adult_3_Month"){
            $caid = "0500";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot,adult";
            $ident = "ident                         = 0500:043800;0500:032500";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
        }

        if ($pack == "Adult_6_Month"){
            $caid = "0500";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot,adult";
            $ident = "ident                         = 0500:043800;0500:032500";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
        }
        if ($pack == "Adult_12_Month"){
            $caid = "0500";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot,adult";
            $ident = "ident                         = 0500:043800;0500:032500";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }


        if ($pack == "IPTV_1_Month"){
            $mod = "IPTV";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
            $crediti_scalare = "1";
        }

        if ($pack == "IPTV_2_Month"){
            $mod = "IPTV";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+2 months");
            $month_renew = "+2 months";
            $crediti_scalare = "2";
        }
        if ($pack == "IPTV_3_Month"){
            $mod = "IPTV";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
            $crediti_scalare = "3";
        }
        if ($pack == "IPTV_6_Month"){
            $mod = "IPTV";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
            $crediti_scalare = "6";
        }

    if ($pack == "IPTV_12_Month"){
        $mod = "IPTV";
        $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
        $month_renew = "+12 months";
        $crediti_scalare = "12";
    }

        if ($pack == "Combo_Full_Vip_1_Month"){
            $caid = "09CD,0963,0100,1810,1702,098C,0500,1805,183D,1830,1843,1830";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $multiple = 5;
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "Combo_Full_Vip_3_Month"){
            $caid = "09CD,0963,0100,1810,1702,098C,0500,1805,183D,1830,1843,1830";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $multiple = 5;
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
        }

        if ($pack == "Combo_Full_Vip_6_Month"){
            $caid = "09CD,0963,0100,1810,1702,098C,0500,1805,183D,1830,1843,1830";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $multiple = 5;
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
        }



        if ($pack == "Combo_SkyDe_SkyUk_1_Month"){
            $caid = "0963,1702,098C";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }



        if ($pack == "Combo_SkyDe_SkyUk_3_Month"){
            $caid = "0963,1702,098C";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 month";
        }


        if ($pack == "Combo_SkyDe_SkyUk_6_Month"){
            $caid = "0963,1702,098C";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 month";
        }



        if ($pack == "Combo_Canal+Spain_Sky_Uk_1_Month"){
            $caid = "1810,0963";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+6 month";
        }

        if ($pack == "Combo_Canal+Spain_Sky_Uk_3_Month"){
            $caid = "1810,0963";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+3 months");
            $month_renew = "+3 months";
        }


        if ($pack == "Combo_Canal+Spain_Sky_Uk_6_Month"){
            $caid = "1810,0963";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+6 months");
            $month_renew = "+6 months";
        }





        if ($pack == "Combo_Tivusat_Mediaset_1_Month"){
            $caid = "1805,183D";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "Combo_Tivusat_Mediaset_12_Month"){
            $caid = "1805,183D";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }

        if ($pack == "Combo_Calcio_Europe"){
            $caid = "1805,09CD,1702,098C";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot,calcio_mediaset,calcio,calcio_skyde";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+1 month");
            $month_renew = "+1 month";
        }

        if ($pack == "Combo_Tivusat_Mediaset_MaxTv_12_Month"){
            $caid = "1805,183D,1830";
            $services                      = "!sky_blocked,!shopping,!servizio,!test,!promo,!primafila_hot";
            $date = strtotime(date("Y-m-d", strtotime($date)) . "+12 months");
            $month_renew = "+12 months";
        }
    return array($caid,$ident, $services,$date,$month_renew,$mod);
}


function generateUserPwdCs (){
    $characters = '0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPORSTUVWXYZ';
    $usernameCs = "CLI-";
    $pwdCs= "PWD-";
    for ($j = 0; $j < 8; $j++) {
        $usernameCs .= $characters[mt_rand(0, strlen($characters) - 1)];
        $pwdCs .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    return array($usernameCs,$pwdCs);
}

function makeUserPwdCsFile ($usernameCs,$pwdCs,$email,$id_code,$caid,$date,$services,$ident){
    $new_user = "\n\n[account]\nuser                          = $usernameCs\npwd                           = $pwdCs\ndescription                   = $email $id_code\ncaid                          = $caid\nexpdate                       = $date\nallowedprotocols              = cccam\ngroup                         = 1,4,25,50\nservices                      = $services\ncccmaxhops                    = 3\n";
    return $new_user;
}

function computeDate ($oscamFile1,$numeroLineaDataUtenteFile1,$monthRenew) {
    $dataEstratta = substr($oscamFile1[$numeroLineaDataUtenteFile1], -11);
    $todayDate = date("Y-m-d");
        echo "Data estratta $dataEstratta TodayDate $todayDate";
    if ($dataEstratta < $todayDate) {			//SE GIA SCADUTO RINNOVA DALLA DATA DI OGGI
        $date4=new DateTime();
        $result = $date4->format('Y-m-d');
        echo "Scaduto il $dataEstratta<br>";
        $dataNuova = date('Y-m-d', strtotime("$monthRenew", strtotime($todayDate))); //aggiunta mesi

    }
    else {$dataNuova = date('Y-m-d', strtotime("$monthRenew", strtotime($dataEstratta))); }//aggiunta mesi}

    echo "Data nuova $dataNuova Mesi da rinnovare $monthRenew";
    return $dataNuova;
}

function makeNewDataForAccount ($data_nuova,$email,$id_code,$caid,$services){

    $linea_data 			= "expdate                       = $data_nuova\n";
    $linea_description 		= "description                   = $email $id_code\n";
    $linea_caid 			= "caid                          = $caid\n";
    $linea_services 		= "services                      = $services\n";

    return array($linea_data,$linea_description,$linea_caid,$linea_services);
}

?>