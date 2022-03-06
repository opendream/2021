<?php

function collator_th($data)
{
  $coll = collator_create('th_TH');
  collator_asort($coll, $data, Collator::SORT_STRING);
  print_r($data);
}

$a = ["ไก่", "กา", "ขา", "แก", "แขวน", "เกีย"];
$b = ["ขอ","ให้","เจริญ","นะ","จ๊ะ","หนุ่ม","สาว","ทั้ง","หลาย"];
$c = ["เสือ","สาว","ใส่","แว่น","แวว","วาว"];

collator_th($a);
collator_th($b);
collator_th($c);