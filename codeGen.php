<?php

function CG($path){
    $pdo = new PDO('sqlite:'.$path);

    function numgen(){
        $numbers = range(1, 5);
        shuffle($numbers);
        return $numbers;
    }

    $tll = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ");

    $x1 = random_int(1,9);
    $x2 = $tll[random_int(0,25)];
    $x3 = random_int(1,9);
    $x4 = strtolower($tll[random_int(0,25)]);
    $x5 = random_int(1,9);

    $tlc = [$x1,$x2,$x3,$x4,$x5];
    $son = numgen();
    $rtlc = [];
    foreach ($son as $val) {
        $rtlc[] = $tlc[$val-1];
    }
    
    $code = 'S.A-'.implode('',$rtlc);
    $sql = "SELECT * FROM transactions WHERE tCode = '$code'";
    $statement = $pdo -> query($sql);
    $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) != 0) {
        CG($path);
    }else{
        return $code;
    }
}

