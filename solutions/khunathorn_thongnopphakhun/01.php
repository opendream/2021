<?php
  
$handle = fopen("php://stdin","r");

echo "Input Number 1 - 100: ";
$input = fgets($handle);
$input = trim($input);

if($input >= 1 && $input <=100):
  for($i=$input; $i<=100; $i++):
    echo ($i%15 == 0) ? "FizzBuzz \n" : null;
    echo ($i%3 == 0) ? "Fizz \n" : $input."\n";
    echo ($i%5 == 0) ? "Buzz \n" : $input."\n";
  endfor;
else:
  echo 'input fail';
endif;