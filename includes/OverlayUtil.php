<?php

class OverlayUtil {
 
    function GetThemeForGame($game) {
        switch ($game) {
            case "Dead_by_Daylight":
                return 'DBD';
            case "Black_Desert":
                return 'BDO';
        }
    }   
}

?>