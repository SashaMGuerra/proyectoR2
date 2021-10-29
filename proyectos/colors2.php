<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Colorcillos</title>
        <link href="../webroot/style/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php

        function toLetter($iNum) {
            $aLetras = array(10 => 'A', 11 => 'B', 12 => 'C', 13 => 'D', 14 => 'E', 15 => 'F');
            if ($iNum > 9) {
                $sLetra = $aLetras[$iNum];
                return $sLetra;
            } else {
                return $iNum;
            }
        }

        echo '<h1>Proyecto R2</h1>';

        for ($iLetra1 = 0; $iLetra1 < 16; $iLetra1++) {
            $v1 = toLetter($iLetra1);
            for ($iLetra2 = 0; $iLetra2 < 16; $iLetra2++) {
                $v2 = toLetter($iLetra2);
                for ($iLetra3 = 0; $iLetra3 < 16; $iLetra3++) {
                    $v3 = toLetter($iLetra3);
                    echo "<div style='background-color: #$v1$v1$v2$v2$v3$v3'></div>";
                }
            }
        }
        ?>
    </body>
</html>
