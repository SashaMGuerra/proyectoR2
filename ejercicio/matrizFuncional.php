<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo de matriz funcional</title>
        <link href="../webroot/style/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        $aAver = [
            ["Alexander", "Sidérea"],
            ["Cavonatro", "Foramenigro"],
            ["Leónidsa", "Azar"]
        ];

        echo '<table>';
        foreach ($aAver as $names) {
            echo "<tr>";
            foreach ($names as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo '</table>';
        ?>
    </body>
</html>
