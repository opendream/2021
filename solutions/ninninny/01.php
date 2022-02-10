<?php 
// Hello Opendream, I'm Kwansuda Tarn Tusamran (aka ninninny :D)
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ninninny : Solution 1</title>
        <style>
            .divWrapper{max-width: 360px; margin:30px auto;}
        </style>
    </head>
    <body>
        <div class="divWrapper">
            <h1>Solution 1 : FizzBuzz</h1>
            <p>Please fill in the number between 1 to 100 and let's see what will happen.</p>
            <form method="post">
            <input type="text" name="thenumber">
            <button>TRY IT!</button>
            </form>
            <div class="respondText">
                <?php respondTheNumber($_POST['thenumber']); ?>
            </div>
        </div>
    </body>
</html>

<?php 
function respondTheNumber($num){
    $respondText = '';
    if(!$num){
        $respondText = '';
    } elseif(!is_numeric($num) || 1>$num || $num>100){
        $respondText = 'Your input is not a number between 1 to 100, try again.';
    } elseif( $num%3==0 && $num%5==0){
        $respondText = 'FizzBuzz';
    } elseif($num%3==0){
        $respondText = 'Fizz';
    } elseif($num%5==0){
        $respondText = 'Buzz';
    } else{
        $respondText = $num;
    }
    echo $respondText;
}
?>