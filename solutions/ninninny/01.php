
<html>
    <head>
    <?php // Hello Opendream, I'm Kwansuda Tarn Tusamran (aka ninninny :D)
    include 'assets/inc/head.php';
    ?>
        <title>ninninny : Solution 1</title>
    </head>
    <body>
        <div class="divWrapper">
            <h1>Solution 1 : FizzBuzz</h1>
            <p><strong>Please fill in the number between 1 to 100.</strong> Use comma (,) to separate the numbers in case you want to try it in a set. Let's see what will happen.</p>
            <form method="post">
            <textarea name="thenumber"></textarea>
            <button>TRY IT!</button>
            </form>
            <div class="respondText">
                <?php if(isset($_POST['thenumber'])) respondTheNumbers($_POST['thenumber']); ?>
            </div>
        </div>
    </body>
</html>

<?php
// Normally I'll separate it to the new file, but I keep it here for your more comfortable checking. 

function respondTheNumbers($input){

    $respondText = '';

    if(!$input):
        $respondText = 'Please fill in the number between 1 to 100';
    else:

    $arrString = preg_replace('/\s+/', '', $input); 
    $arrNum = explode(',',$arrString);

        foreach($arrNum as $key=>$num):

            if(!$key==0) $respondText .= ', ';
            
            if(!is_numeric($num)): 
                $respondText .= 'NaN';

            elseif(1>$num || $num>100):
                $respondText .= 'Not in Range';

            elseif($num%3==0 && $num%5==0):
                $respondText .= 'FizzBuzz';

            elseif($num%3==0):
                $respondText .= 'Fizz';

            elseif($num%5==0):
                $respondText .= 'Buzz';

            else :
                $respondText .= $num;
            endif;

        endforeach;
    endif;
    echo $respondText;
}
?>