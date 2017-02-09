        <?php
        require "dbip-client.class.php";

        function findState($ip_addr) {
        try {
            $api_key = "1921d361a3266fa50eb00b2f5b664de85fe90266";
            $dbip = new DBIP_Client($api_key);

        //echo "keyinfo:\n";
        //foreach ($dbip->Get_Key_Info() as $k => $v) {
        //	echo "{$k}: {$v}\n";
        //	}


            foreach ($dbip->Get_Address_Info($ip_addr) as $k => $v) {
                if (	$k  == "country")
                    $state = $v;
            }

        } catch (Exception $e) {

            die("error: {$e->getMessage()}\n");

        }
        return $state;
        }
        ?>