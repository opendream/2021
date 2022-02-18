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
            <button>COUNT IT!</button>
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
    //$stakeArr = array();

    if(!$input): $outputText = 'Please fill in some words';
    else:
        $arrChar = str_split($input);
        $count = array_count_values($arrChar);

    endif;

    $outputText = displayResult($count);
    return $outputText;
}

function displayResult($array){
    $result = '';
    if(!$array): return 'NULL';
    else:
        foreach($array as $k=>$v):
            $result .= $k.$v.', ';
        endforeach;
        return $result;
    endif;
}
?>