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
                        <?php //echo '<pre>'; print_r(thaiWordSorting($_POST['theword'])); echo '</pre>'; ?>
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

//static $thChars = array('ก','ข','ฃ','ค','ฅ','ฆ','ง','จ','ฉ','ช','ซ','ฌ','ญ','ฎ','ฏ','ฐ','ฑ','ฒ','ณ','ด','ต','ถ','ท','ธ','น','บ','ป','ผ','ฝ','พ','ฟ','ภ','ม','ย','ร','ฤ','ล','ฦ','ว','ศ','ษ','ส','ห','ฬ','อ','ฮ');

function thaiWordSorting($input){

    if($input):
        //global $thChars;
        $thChars = array('ก','ข','ฃ','ค','ฅ','ฆ','ง','จ','ฉ','ช','ซ','ฌ','ญ','ฎ','ฏ','ฐ','ฑ','ฒ','ณ','ด','ต','ถ','ท','ธ','น','บ','ป','ผ','ฝ','พ','ฟ','ภ','ม','ย','ร','ฤ','ล','ฦ','ว','ศ','ษ','ส','ห','ฬ','อ','ฮ');

        //$wordsElement 
        //$arrString = preg_replace('/\s+/', '', $input); 
        //$arrWord = explode(',',$arrString);
        //usort($newArray, 'customSort');
        /*$wordArray = array();
        foreach($newArray as $word):
           array_push($wordArray, $word['word']);
        endforeach;*/
        $arrWords = cleanArray($input);
        $elementWords = getLeadChar($arrWords, $thChars);
        sort($elementWords);
        $reArrWords = inGroupSort($elementWords);
        $arrWords = justWords($reArrWords);

        
    endif;
    return displayArray($arrWords);
    //return $elementWords['word'];
    //return displayArray($elementWords['word']);
    //return $reArrWords;
}

/* ตั้งสติ รวบรวมความคิดก่อน ควรจะทำไง
- หาอักษรนำ <--- ต้องรู้อักษรนำ
- เรียงคำจากอักษรนำ
- เรียงคำจากกรุ๊ปที่มีอักษรนำร่วมกัน
    - มีตัวสะกดมั้ย 
        - ไม่มี ขึ้นก่อน
            - เรียงสระ
        - มี เรียงตัวสะกด
*/ 

function inGroupSort($arr){
    for($i=0; $i<count($arr); $i++):
        if($arr[$i]['lead']==$arr[$i+1]['lead']):
            if($arr[$i]['vowel'] && !$arr[$i+1]['vowel']):
                $tmp = ['lead'=>$arr[$i]['lead'], 'word'=>$arr[$i]['word'], 'vowel'=>$arr[$i]['vowel']];
                $arr[$i] = $arr[$i+1];
                $arr[$i+1] = $tmp;
            endif;
        endif;
    endfor;
    return $arr;
}

function justWords($arr){
    $newArr = array();
    foreach($arr as $a):
        array_push($newArr, $a['word']);
    endforeach;
    return $newArr;
}
function getLeadChar($arr, $charsRef){
    $wordsWithLead = array();
    foreach($arr as $word):
        $lead = '';
        
        for($i=0; $i<mb_strlen($word); $i++):
            if(in_array(mb_substr($word, $i, 1),$charsRef)):
                $lead .= mb_substr($word, $i, 1);
            endif;
        endfor;

        // Check if the word start with vowel
        if(in_array(mb_substr($word, 0, 1),$charsRef)): $vwAtStart = false;
        else: $vwAtStart = true;
        endif;
        $e = ['lead'=>$lead, 'word'=>$word, 'vowel'=>$vwAtStart];
        array_push($wordsWithLead, $e);
    endforeach;

    return $wordsWithLead;
}

function cleanArray($array){
    $pattern = '/([0-9\@\.\;\" "])+/';
    $arrString = preg_replace($pattern, '', $array); 
    $arrWord = explode(',',$arrString);
    return $arrWord;
}

/*function customSort($a, $b) { // NOT YET SUCCESS
    //global $thChars;
    $thChars = array('ก','ข','ฃ','ค','ฅ','ฆ','ง','จ','ฉ','ช','ซ','ฌ','ญ','ฎ','ฏ','ฐ','ฑ','ฒ','ณ','ด','ต','ถ','ท','ธ','น','บ','ป','ผ','ฝ','พ','ฟ','ภ','ม','ย','ร','ฤ','ล','ฦ','ว','ศ','ษ','ส','ห','ฬ','อ','ฮ');


    $lengthA = mb_strlen($a);
    $lenghtB = mb_strlen($a);

    for($i=0;$i<$lengthA && $i<$lenghtB;$i++) :

        $chA = mb_substr($a, $i, 1);
        $chB = mb_substr($b, $i, 1);
        print($chA."---".$chB);

        $valA = array_search($chA, $thChars);
        $valB = array_search($chB, $thChars);

        if($valA == $valB): continue;
        endif;
        if($valA > $valB) : return 1;
        else: return -1;
        endif;
        
    endfor;

    if(mb_strlen($a) == mb_strlen($b)) return 0;
    if(mb_strlen($a) > mb_strlen($b)):  return -1;
    else: return 1;
    endif;

}*/
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