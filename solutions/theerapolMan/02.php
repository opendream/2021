<?php

    setlocale(LC_COLLATE, 'en_US.utf8');
    $input = ["ไก่", "กา", "ขา", "แก", "แขวน", "เกีย"];
    usort($input, 'strcoll');        //จัดเรียงค่าใน input โดยอ้างอิงจากการตั้งค่า setlocale 
    print_r($input);

?>
