<?php
    print("This is for test #2 \n");
    // Take 1 hour

    // กำหนดให้ array N เป็น input ที่บรรรจุตัวเลข 1 ถึง 100
    // ให้เขียนโปรแกรมหาคู่ตัวเลขทั้งหมดใน N ที่ บวก กันแล้วได้ผลลัพธ์เป็น จำนวนเฉพาะ
    // ให้เขียนโปรแกรมหาคู่ตัวเลขทั้งหมดใน N ที่ ลบ กันแล้วได้ผลลัพธ์เป็น จำนวนเฉพาะ
    function isPrimeNumber($value) {
        if($value <= 1) return false;
        for ( $devide = 2; $devide < $value; $devide++) {
            $result = fmod($value, $devide);
            if($result == 0) return false;
        }
        return true;
    }

    class Pair {
        public $first;
        public $second;
        public function __construct($first, $second) {
            $this->first = $first;
            $this->second = $second;
          }
    }

    function findPairPlusPrimeNumber($begin, $end) {
        $results[] = [];
        for ($begin ; $begin < $end ; $begin++ ) {
            for ($val = $begin+1 ; $val <= $end ; $val++){
                $sum = $begin+$val;
                $isPrime = isPrimeNumber($sum);
                if($isPrime) {
                    array_push($results, new Pair($begin,$val));
                }
            }
        }
        return $results;
    }

    function findPairMinusPrimeNumber($begin, $end) {
        $results = array();
        for ($end ; $end > $begin ; $end-- ) {

            for ($val = $end-1 ; $val > $begin ; $val--){
                $total = $end-$val;
                $isPrime = isPrimeNumber($total);
                if($isPrime) {
                    array_push($results, new Pair($end,$val));
                }
            }

        }
        return $results;
    }

    
    $plusPairResults = findPairPlusPrimeNumber(1,100);
    $minusPairResults = findPairMinusPrimeNumber(1,100);

    foreach($plusPairResults as $item) {
        echo $item->first."+".$item->second."=".($item->first+$item->second).", ";
        echo "\n";
    }

    foreach($minusPairResults as $item) {
        echo $item->first."-".$item->second."=".($item->first-$item->second).", ";
        echo "\n";
    }

    // echo isPrimeNumber(199)?"Prime":"No Prime";
    ?>
