<?php

    $input = 'GOOGLE';
    
    $input_split = str_split($input);                 //แยก string ของ input ออกมาเป็น array ทีละตัวอักษร
    $result = array_count_values($input_split);       //นับจำนวนข้อมูลใน array โดยแบ่งตามค่าของข้อมูล
    foreach($result as $key=>$value){
        echo $key.$value;
    }

    
?>