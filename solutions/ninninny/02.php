<?php 
    include 'assets/inc/head.php';
    include 'assets/inc/mainNav.php';
    ?>
<html>
    <head>
    <?php echo mainHead(); ?>
        <title>ninninny : Solution 2</title>
    </head>
    <body>
        <div class="divWrapper">
            <h1>Solution 2 : เรียงลำดับ string ภาษาไทย</h1>
            <p><strong>ใส่คำที่ต้องการเรียงลำดับ</strong> โดยใช้เครื่องหมายจุลภาค (,) ในการแยกแต่ละคำ</p>
            <form method="post">
            <textarea name="theword"></textarea>
            <button>เรียงลำดับ</button>
            </form>
            <div class="respondText">
                <?php if(isset($_POST['theword'])): ?>
                    <div>
                        <div>Input:</div> 
                        <?php echo $_POST['theword']; ?>
                    </div>
                    <div>
                        <div>Output:</div> 
                        <?php echo thaiWordSorting($_POST['theword']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php echo mainNav(); ?>
    </body>
</html>

<?php
// Normally I'll separate it to the new file, but I keep it here for your more comfortable checking. 

function thaiWordSorting($input){

    if($input): 
        $arrString = preg_replace('/\s+/', '', $input); 
        $arrWord = explode(',',$arrString);
        usort($arrWord, 'customSort');
        
    endif;
    return displayArray($arrWord);
    //return '<pre>'; print_r($newArray); echo '</pre>';
}


/*function prepareArray($array){
    $thaiChars = array('ก','ข','ฃ','ค','ฅ','ฆ','ง','จ','ฉ','ช','ซ','ฌ','ญ','ฎ','ฏ','ฐ','ฑ','ฒ','ณ','ด','ต','ถ','ท','ธ','น','บ','ป','ผ','ฝ','พ','ฟ','ภ','ม','ย','ร','ฤ','ล','ฦ','ว','ศ','ษ','ส','ห','ฬ','อ','ฮ');
    $newArray = array();
    $arrString = preg_replace('/\s+/', '', $array); 
    $arrWord = explode(',',$arrString);

    foreach($arrWord as $word):
        $chars = '';

        for($i=0; $i<mb_strlen($word); $i++):
            $c = mb_substr($word, $i, 1);
            if(in_array($c,$thaiChars)) $chars .= $c;
        endfor;
        
        array_push($newArray, $chars);
    endforeach;

    return $newArray;
}*/

function customSort($a, $b) { // NOT YET SUCCESS
    $charOrder = array('ก','ข','ฃ','ค','ฅ','ฆ','ง','จ','ฉ','ช','ซ','ฌ','ญ','ฎ','ฏ','ฐ','ฑ','ฒ','ณ','ด','ต','ถ','ท','ธ','น','บ','ป','ผ','ฝ','พ','ฟ','ภ','ม','ย','ร','ฤ','ล','ฦ','ว','ศ','ษ','ส','ห','ฬ','อ','ฮ');


    for($i=0;$i<mb_strlen($a) && $i<mb_strlen($b);$i++) :

        $chA = mb_substr($a, $i, 1);
        $chB = mb_substr($b, $i, 1);

        if(in_array($chA, $charOrder)): $valA = array_search($chA, $charOrder);
        else: $chA = mb_substr($a, $i+1, 1);
        endif;
        
        if(in_array($chA, $charOrder)): $valB = array_search($chB, $charOrder);
        else: $chB = mb_substr($b, $i+1, 1);
        endif;

        if($valA == $valB) continue;
        if($valA > $valB) return 1;
        return -1;
    endfor;

    if(mb_strlen($a) == mb_strlen($b)) return 0;
    if(mb_strlen($a) > mb_strlen($b))  return -1;
    return 1;

}
// Modified from function
//Ref: https://stackoverflow.com/questions/7929796/how-can-i-sort-an-array-of-utf-8-strings-in-php

function displayArray($array){
    $result = '';
    if(!$array): return 'NULL';
    else:
        foreach($array as $key=>$word):
            if(!$key==0) $result .= ', ';
            $result .= $word;
        endforeach;
        return $result;
    endif;
}

?>