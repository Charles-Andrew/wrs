<?php

function CG(){
    $tll = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ");

    $x1 = random_int(1,9);
    $x2 = $tll[random_int(0,25)];
    $x3 = random_int(1,9);
    $x4 = strtolower($tll[random_int(0,25)]);
    $x5 = random_int(1,9);

    $tlc = [$x1,$x2,$x3,$x4,$x5];
    $rtlc = [];
    
    $code = strval($x1).strval($x2).strval($x3).strval($x4).strval($x5);
    return $code;
}