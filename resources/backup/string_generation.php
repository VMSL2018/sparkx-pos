<?php
/**
 * Created by PhpStorm.
 * User: shovon
 * Date: 8/7/18
 * Time: 8:41 PM
 */


function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
    $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

for($i=0;$i<30000;$i++ ){
    $a = random_str(20, 'abcdefghijklmnopqrstuvwxyz');
    echo $i;echo ". ";echo $a; echo "<br>";
}
