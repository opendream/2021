<?php 
    include 'assets/inc/head.php';
    include 'assets/inc/mainNav.php';
    ?>
<html>
    <head>
    <?php echo mainHead(); ?>
        <title>ninninny : Solution 3</title>
    </head>
    <body>
        <div class="divWrapper">
            <h1>Solution 3 : นับอักขระใน string</h1>
            <p><strong>Please fill in some words or sentences</strong> and I'll count its characters for you.</p>
            <form method="post">
            <textarea name="input"></textarea>
            <button>TRY IT!</button>
            </form>
            <div class="respondText">
            <?php if(isset($_POST['input'])): ?>
                    <div>
                        Input: <?php echo $_POST['input']; ?>
                    </div>
                    <div>
                        Output: <?php echo characterCount($_POST['input']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php echo mainNav(); ?>
    </body>
</html>

<?php
// Normally I'll separate it to the new file, but I keep it here for your more comfortable checking. 

function characterCount($input){

    $outputText = '';
    $stakeArr = array();

    if(!$input): $outputText = 'Please fill in some words';
    else:
        $arrString = preg_replace('/\s+/', '', $input); 

        for($i=0;$i<mb_strlen($arrString);$i++) : 
            $char = mb_substr($arrString, $i, 1);
            
            if(!in_array($char, $stakeArr)):
                array_push($stakeArr, $char);
                array_push($stakeArr, 1);
            else:
                $index = array_search($char,$stakeArr);
                $stakeArr[$index+1] +=1;
            endif;

        endfor;

    endif;

    $outputText = displayResult($stakeArr);
    return $outputText;
}

function displayResult($array){
    $result = '';
    if(!$array): return 'NULL';
    else:
        foreach($array as $word):
            $result .= $word;
        endforeach;
        return $result;
    endif;
}
?>