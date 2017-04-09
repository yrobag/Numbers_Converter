<!DOCTYPE html>
<?php
require_once __DIR__ . '/functions.php';
if (isset($_GET['type']) && $_GET['type'] == 2) {
    $firstInput = ['Binary'];
    $firstInput[] = isset($_POST[$firstInput[0]]) ? $_POST[$firstInput[0]] : 0; //checking if form was sent, when it wasn't we set the input = 0
    $secoundInput = ['Decimal', binaryToDecimal($firstInput[1])]; //changing input to decimal
    $thirdInput = ['Octal', convertDecimal($secoundInput[1], 8)]; //converting decimal to others types
    $fourthInput = ['Hexadecimal', convertDecimal($secoundInput[1], 16)];
    $id = ['','select','','']; //checking which type of conversion is select to change seleced link 
} elseif (isset($_GET['type']) && $_GET['type'] == 8) {
    $firstInput = ['Octal'];
    $firstInput[] = isset($_POST[$firstInput[0]]) ? $_POST[$firstInput[0]] : 0;
    $secoundInput = ['Decimal', octalToDecimal($firstInput[1])];
    $thirdInput = ['Binary', convertDecimal($secoundInput[1], 2)];
    $fourthInput = ['Hexadecimal', convertDecimal($secoundInput[1], 16)];
    $id = ['','','select',''];
} elseif (isset($_GET['type']) && $_GET['type'] == 16) {
    $firstInput = ['Hexadecimal'];
    $firstInput[] = isset($_POST[$firstInput[0]]) ? $_POST[$firstInput[0]] : 0;
    $secoundInput = ['Decimal', hexadecimalToDecimal($firstInput[1])];
    $thirdInput = ['Binary', convertDecimal($secoundInput[1], 2)];
    $fourthInput = ['Octal', convertDecimal($secoundInput[1], 8)];
    $id = ['','','','select'];
} else {
    $firstInput = ['Decimal'];
    $firstInput[] = isset($_POST[$firstInput[0]]) ? $_POST[$firstInput[0]] : 0;
    $secoundInput = ['Binary', convertDecimal($firstInput[1], 2)];
    $thirdInput = ['Octal', convertDecimal($firstInput[1], 8)];
    $fourthInput = ['Hexadecimal', convertDecimal($firstInput[1], 16)];
    $id = ['select2','','',''];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title>Deciaml/Binary/Octal/Hexadecimal numbers converter</title>
    </head>
    <body>
        <div id="container">
            <div id="headers">
                <div class="header">Convert:</div>
                <a class="header" id="<?php echo $id[0];?>" href="index.php">Decimal</a> 
                <a class="header" id="<?php echo $id[1];?>" href="?type=2">Binary</a>
                <a class="header" id="<?php echo $id[2];?>" href="?type=8">Octal</a>
                <a class="header" id="<?php echo $id[3];?>" href="?type=16">Hexadecimal</a>
                <div style="clear: both"></div>
            </div>
            <br>
            <div id="mainpage">
                <form action="" method="post">
                    <div class="sector">
                    <span><?php echo $firstInput[0] . ':' ?></span><div id="inputForm"><input type="text" id="inputNumber" 
                           name="<?php echo $firstInput[0] ?>" value="<?php echo $firstInput[1] ?>"/>               
                        <input type="submit" id="button" value="Convert!" /></div></div>
                <br>
                    <div class="sector">
                    <span><?php echo $secoundInput[0] . ':' ?></span><input type="text" class="outputNumber" 
                           name="<?php echo $secoundInput[0] ?>" value="<?php echo $secoundInput[1] ?>" readonly/>
                    <div style="clear: both"></div></div>
                    <br>
                    <div class="sector">
                    <span><?php echo $thirdInput[0] . ':' ?></span><input type="text" class="outputNumber" 
                            name="<?php echo $thirdInput[0] ?>" value="<?php echo $thirdInput[1] ?>" readonly/>
                    <div style="clear: both"></div></div>
                    <br>
                    <div class="sector">
                    <span><?php echo $fourthInput[0] . ':' ?></span><input type="text" class="outputNumber" 
                            name="<?php echo $fourthInput[0] ?>"  value="<?php echo $fourthInput[1] ?>" readonly/>
                    <div style="clear: both"></div></div>                  
                    <br>
                </form>
            </div>
        </div>
    </body>
</html>
