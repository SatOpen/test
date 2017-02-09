    <?php
    /**
     * Created by PhpStorm.
     * User: francesco
     * Date: 06/02/17
     * Time: 20:37
     */
    function checkSecurity($ip_addr, $email)
    {
        $errMessageInv = "";
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip_addr . '?key=rmv3iz2cimdrsWH'));

        /* IP */
        if (strpos($ip_addr, '81.47.192.13') !== false) {
            $errMessageInv = 'Error System';}
        if (strpos($ip_addr, '79.12.156.26') !== false) {
            $errMessageInv = 'Error System';}
        /*ISP*/
        if (strpos($query['isp'], 'Sky Italia') !== false) {
            $errMessageInv = 'Error System';
        }
        if (strpos($query['isp'], 'Videotime Spa') !== false) {
            $errMessageInv = 'Error System';
        }
        if (strpos($query['isp'], 'Videotime Spa') !== false) {
            $errMessageInv = 'Error System';
        }
        if (strpos($query['isp'], 'Akamai Technologies') !== false) {
            $errMessageInv = 'Error System';
        }
        if (strpos($query['isp'], 'Digital River') !== false) {
            $errMessageInv = 'Error System';
        }
        if (strpos($query['isp'], 'Aciinfo') !== false) {
            $errMessageInv = 'Error System';
        }
        if (strpos($query['isp'], 'Amazon.com') !== false) {
            $errMessageInv = 'Error System';
        }
        if (strpos($query['isp'], 'Digital River') !== false) {
            $errMessageInv = 'Error System';
        }
        if (strpos($query['isp'], 'Paypal') !== false) {
            $errMessageInv = 'Error System';
        }
        if (strpos($query['isp'], 'Atos Information') !== false) {
            $errMessageInv = 'Error System';
        }
        if (strpos($query['isp'], 'BT Italia') !== false) {
            $errMessageInv = 'Error System';
        }

        if (strpos($query['isp'], 'Aruba') !== false) {
            $errMessageInv = 'Error System';
        }

        /*Email*/
        if (strpos($email, 'giustizia.it ') !== false) {
            $errMessageInv = 'Error System';
        }

        if (strpos($email, 'iene') !== false) {
            $errMessage = 'Error System';
        }

        if (strpos($email, '2co.com') !== false) {
            $errMessageInv = 'Error System';
        }

        if (strpos($email, '2checkout.com') !== false) {
            $errMessageInv = 'Error System';
        }

        if (strpos($email, '2co.com') !== false) {
            $errMessageInv = 'Error System';
        }


        if (strpos($email, 'paypal') !== false) {
            $errMessageInv = 'Error System';
        }


        if (strpos($email, 'TempEmail.net') !== false) {
            $errMessageInv = 'Error System';
        }

        if (strpos($email, 'paypal.it') !== false) {
            $errMessageInv = 'Error System';
        }

        if (strpos($email, 'paypal.com') !== false) {
            $errMessageInv = 'Error System';
        }


        if (strpos($email, 'paypal.pl') !== false) {
            $errMessageInv = 'Error System';
        }


        if (strpos($email, 'paypal.co.uk') !== false) {
            $errMessageInv = 'Error System';


        }

        if (strpos($email, 'paypal.co.uk') !== false) {
            $errMessageInv = 'Error System';


        }
        if (strpos($email, 'polizia') !== false) {
            $errMessageInv = 'Error System';


        }
        if (strpos($email, 'mininterno.it') !== false) {
            $errMessageInv = 'Error System';


        }
        if (strpos($email, 'poliziapostale') !== false) {
            $errMessageInv = 'Error System';


        }
        if (strpos($email, 'mediaset') !== false) {
            $errMessageInv = 'Error System';


        }
        if (strpos($email, 'sky') !== false) {
            $errMessageInv = 'Error System';


        }
        if (strpos($email, 'sky') !== false) {
            $errMessageInv = 'Error System';


        }
        if (strpos($email, 'digital-plus.net') !== false) {
            $errMessageInv = 'Error System';


        }
        if (strpos($email, 'carabinieri.it') !== false) {
            $errMessageInv = 'Error System';


        }
        if (strpos($email, '@ebay.com') !== false) {
            $errMessageInv = 'Error System';


        }
        if (strpos($email, 'euaup') !== false) {
            $errMessageInv = 'Error System';


        }

        if (strpos($email, 'gdf.it') !== false) {
            $errMessageInv = 'Error System';


        }

        if (strpos($email, 'gov.it') !== false) {
            $errMessageInv = 'Error System';
        }


        if (strpos($email, 'iene') !== false) {
            $errMessageInv = 'Error System';


        }

        if (strpos($email, '@brinkscompany.com') !== false) {
            $errMessageInv = 'Error System';
        }


        if (strpos($email, 'stripe.com') !== false) {
            $errMessageInv = 'Error System';
        }


        if (strpos($email, 'allenheap@tiscali.co.uk') !== false) {
            $errMessageInv = 'Error System';
        }


        if (strpos($email, 'support') !== false) {
            $errMessageInv = 'Error System';
        }

        if (strpos($email, 'stripe') !== false) {
            $errMessageInv = 'Error System';
        }


        if (strpos($email, 'pec.gdf.it') !== false) {
            $errMessageInv = 'Error System';
        }


        if (strpos($email, 'francescopaparo.it') !== false) {
            $errMessageInv = 'Error System';
        }

        if ($errMessageInv != '') {
            return "error";
        } else {
            return "passed";
        }
    }

    ?>