<?php

function tc($ts){
    date_default_timezone_set('Asia/Manila');

    $ud = date('M-d-Y h:i', $ts);
    if (date('H', $ts) > 12) {
        $ap = "pm";
    }else{
        $ap = "am";
    }
    
    $ct = $ud.' '.$ap;
    return $ct;
}
