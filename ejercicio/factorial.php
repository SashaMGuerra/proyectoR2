<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Factorial</title>
    </head>
    <body>
        <?php
        $iNum = 2;
        
        if(esPrimo($iNum)){
            echo 'Es primo';
        }
        else{
            echo 'No es primo';
        }
        
        
        /*
        echo "$iNum! = ".show_factorial($iNum).' = '.calculate_factorial($iNum);

        function show_factorial($num){
            $sMult;
            for($iToMult = 1;$iToMult<$num;$iToMult++){
                $sMult.=$iToMult.' * ';
            }
            return $sMult.$num;
        }
        
        function calculate_factorial($num) {
            if($num==0){
                $iFactorial = 0;
            }
            else{
                $iFactorial = 1;
            }
            for ($mult = 2; $mult <= $num; $mult++) {
                $iFactorial*= $mult;
            }
            return $iFactorial;
        }
         * */
        ?>
    </body>
</html>
