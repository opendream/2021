<?php

  $input = 30;
  
  if(($input>=1) && ($input<=100)){      //เช็คเงื่อนไขว่าค่าใน input อยู่ระหว่าง 1 - 100 หรือไม่
    if(($input%3==0) && ($input%5==0)){  //เช็คเงื่อนไขว่า input หาร 3 และ 5 ลงตัวทั้งคู่หรือไม่
        echo "FizzBuzz";
    }else if($input%3==0){               //เช็คเงื่อนไขว่า input หาร 3 ลงตัว
        echo "Fizz";
    }else if($input%5==0){               //เช็คเงื่อนไขว่า input หาร 5 ลงตัว
        echo "Buzz";
    }else{
        echo $input;
    }
  }else{
        echo $input;
  }

  
?>