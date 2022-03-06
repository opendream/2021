<?php

$handle = fopen("php://stdin","r");

function count_string($data)
{
  $main = array_unique(str_split($data));
  $compares = str_split($data);

  foreach($main as $char):
    $i = 0;
    echo $char;
    foreach($compares as $compare):
      if($char == $compare):
        $i++;
        $cut = $compare;
      endif;
    endforeach;
    echo $i;
  endforeach;

}

// $a = "GOOGLE";
// $b = "SCHOOL";
// $c = "HELLOWORLD";

echo "Input messages : ";
$input = fgets($handle);
$input = trim($input);

count_string($input);
