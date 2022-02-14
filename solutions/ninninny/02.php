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
                    <div class="disclaimer">Sorting Logic by <a href="https://zrevig.medium.com/%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%87%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AB%E0%B8%99%E0%B8%B1%E0%B8%87%E0%B8%AA%E0%B8%B7%E0%B8%AD%E0%B8%A0%E0%B8%B2%E0%B8%A9%E0%B8%B2%E0%B9%84%E0%B8%97%E0%B8%A2%E0%B8%94%E0%B9%89%E0%B8%A7%E0%B8%A2-php-46af43838bf2" target="_blank" rel="noopener noreferrer">Tanin Srivaraphong</a></div>
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
        $arrWords = cleanArray($input);
        usort($arrWords, 'th_strcoll');        
    endif;
    return displayArray($arrWords);
}

function cleanArray($array){
    $pattern = '/([0-9\@\.\;\" "])+/';
    $arrString = preg_replace($pattern, '', $array); 
    $arrWord = explode(',',$arrString);
    return $arrWord;
}

function th_strcoll($stringA, $stringB)
{
    $regex = '(^[เแโใไ]*)((.)(.*))';
    $matchesA = $matchesB = null;
    mb_ereg($regex, $stringA, $matchesA);
    mb_ereg($regex, $stringB, $matchesB);
 
    if ($matchesA[1] !== $matchesB[1] && $matchesA[3] === $matchesB[3]) {
        if ($matchesA[1] === false) {
            return -1;
        } else if ($matchesB[1] === false) {
            return 1;
        } else {
            return strcoll($matchesA[1], $matchesB[1]);
        }
    }
    
    return strcoll($matchesA[2], $matchesB[2]);
}
// By Tanin Srivaraphong
//Ref: https://zrevig.medium.com/%E0%B9%80%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%87%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AB%E0%B8%99%E0%B8%B1%E0%B8%87%E0%B8%AA%E0%B8%B7%E0%B8%AD%E0%B8%A0%E0%B8%B2%E0%B8%A9%E0%B8%B2%E0%B9%84%E0%B8%97%E0%B8%A2%E0%B8%94%E0%B9%89%E0%B8%A7%E0%B8%A2-php-46af43838bf2


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