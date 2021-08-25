<?php

    function validareCNP($cnp_p)
    {

        if(strlen($cnp_p) != 13)
        {
            return false;
        };

        $cnp = str_split($cnp_p);

        $rezultat = 0;
        $constanta = array (2,7,9,1,4,6,3,5,8,2,7,9);

        for( $i=1 ; $i< 13 ;$i++)
        {
            $cnp[$i] = (int) $cnp[$i];

            if( $i < 12)
            {
                $rezultat += (int) $cnp[$i] * $constanta[$i];
            };  

        }

        $rezultat = $rezultat % 11 ;
        if($rezultat === 10)
        {
            $rezultat = 1 ;
        };


        $cnp['luna'] =$cnp[3].$cnp[4];
        $cnp['zi'] =$cnp[5].$cnp[6];
        $cnp['judet'] =$cnp[7].$cnp[8];

        if($cnp['luna'] > 12 || $cnp['luna'] ==0){
            return false;
        }

        if($cnp['zi'] > 31 || $cnp['zi'] == 0){
            return false;
        }

        if($cnp['judet'] > 52 || $cnp['judet'] == 0){
            return false;
        }

        $an = ($cnp[1] * 10) + $cnp[2];

        switch($cnp[0]){

            case 1 : $an += 1900;
            case 2 : $an += 2000;
        };   

        return ($cnp[12]=== $rezultat && $an >1900 && $an < 2099);
    };

        


?>