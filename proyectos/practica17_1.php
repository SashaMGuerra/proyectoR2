<!DOCTYPE html>
<!--
Autor: Isabel Martínez Guerra
Fecha de creación: 24/10/2021
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>IMG - DWES 3 - 17</title>
        <style>
            h1{
                text-align: center;
            }
            table{
                width: 100%;
                text-align: center;
                border-collapse: collapse;
                table-layout: fixed;
            }
            td, th{
                border: 1px solid gainsboro;
            }
        </style>
    </head>
    <body>
        <?php
        /**
         * Fecha de creación: 24/10/2021
         * Fecha de última modificación: 24/10/2021
         * 
         * Inicialización de un arrray bidimensional con los nombres de personas
         * que han reservado un asiento en un teatro de 20 filas de 15 asientos
         * cada una.
         * Recorrido del array con distintas técnicas.
         */
        //Inicialización del array.
        $aFilasAsientos = [
            ["", "Bor", "Bestla", "", "Frigga", "Odín", "", "", "", "", "", "Ra", "", "", ""],
            ["Buri", "", "", "Heimdall", "", "Balder", "Forseti", "Tyr", "", "", "", "", "", "", ""],
            ["", "Sigyn", "Loki", "Hela", "", "Thor", "Sif", "", "", "", "", "", "", "Atón", ""],
            ["", "Býleistr", "Farbauti", "Helblindi", "", "Bragi", "Idunn", "", "", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "", "", "Isis", "Osiris", "Horus", "Hathor", "", "", ""],
            ["", "", "", "Frey", "Freyja", "", "", "", "", "", "", "", "", "Amón", "Mut"],
            ["Nótt", "Máni", "Sól", "Dagr", "", "", "", "", "", "", "", "", "", "", ""],
            ["", "Urdr", "Verdandi", "Skuld", "", "", "", "Bastet", "Anubis", "", "", "", "", "", ""],
            ["", "", "", "", "", "", "Nut", "Geb", "", "Neth", "Neftis", "", "", "", ""],
            ["", "Cloto", "Láquesis", "Átropos", "", "", "", "", "Cibeles", "", "", "", "", "", ""],
            ["", "", "", "", "", "Penélope", "Ulises", "", "Aquiles", "Patroclo", "", "Mitra", "", "", ""],
            ["Iris", "Hestia", "Hermes", "", "", "Teseo", "Perseo", "", "", "", "", "", "", "", ""],
            ["", "Helios", "Apolo", "", "", "Heracles", "", "Dioniso", "Pan", "", "", "", "", "", ""],
            ["Nix", "Selene", "Hipnos", "Tánatos", "", "Hefesto", "", "", "", "", "", "", "", "", ""],
            ["Ares", "Afrodita", "", "Asclepio", "", "", "Ganesha", "Indra", "Agni", "", "Krishná", "Balarama", "", "", ""],
            ["", "", "", "Atenea", "", "Construcción", "", "", "", "Destrucción", "", "", "Sarasvati", "Brahmá", ""],
            ["", "", "", "", "", "", "Cosmos", "Jesucristo", "Caos", "", "", "Laksmí", "Vishnú", "", ""],
            ["", "", "", "Rea", "Cronos", "", "Padre Tiempo", "Amante Irrealidad", "Madre Naturaleza", "", "Durgá", "Shivá", "", "", ""],
            ["Deméter", "Perséfone", "Hades", "Poseidón", "", "", "", "Existencia", "", "", "", "", "", "", ""],
            ["Uranos", "Gea", "", "Hera", "Zeus", "", "", "Dios", "", "", "", "", "", "", ""]
        ];

        $iFilasAsientosSize = sizeof($aFilasAsientos);

        /*
         * Recorrido del array.
         */

        //Recorrido mediante foreach().
        echo '<h1>Recorrido mediante foreach()</h1>';
        //Creación de la tabla para mostrar los datos.
        echo '<table>';
        asientos(sizeof($aFilasAsientos[0]));
        //Se sacan tanto la clave como el valor para mostrar la fila que corresponde.
        foreach ($aFilasAsientos as $iKey => $aFila) {
            
            echo '<tr><th>Fila ' . ($iKey + 1) . '</th>';
            foreach ($aFila as $sAsiento) {
                echo "<td>$sAsiento</td>";
            }
            echo '</tr>';
        }
        echo '</table>';

        //Recorrido mediante for(). Crea una tabla con los datos.
        echo '<h1>Recorrido mediante for()</h1>';
        //Creación de la tabla para mostrar los datos.
        echo '<table>';
        asientos(sizeof($aFilasAsientos[0]));
        /* Inicialización y aumento del contador de filas recorridas
         * hasta el máximo de filas.
         */
        for ($iFila = 0; $iFila < $iFilasAsientosSize; $iFila++) {
            echo '<tr><th>Fila ' . ($iFila + 1) . '</th>';
            //Inicialización de una variable con los datos del array de la fila.
            $aFila = $aFilasAsientos[$iFila];
            /* Inicialización del contador de asientos recorridos
             * hasta el máximo de asientos en la fila.
             */
            for ($iAsiento = 0; $iAsiento < sizeof($aFila); $iAsiento++) {
                echo '<td>' . $aFila[$iAsiento] . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

        //Recorrido mediante while(). Crea una tabla con los datos.
        echo '<h1>Recorrido mediante while()</h1>';
        //Creación de la tabla para mostrar los datos.
        echo '<table>';
        asientos(sizeof($aFilasAsientos[0]));
        //Inicialización del contador de filas recorridas.
        $iFila = 0;
        while ($iFila < $iFilasAsientosSize) {
            echo '<tr><th>Fila ' . ($iFila + 1) . '</th>';
            //Inicialización de una variable con los datos del array de la fila.
            $aFila = $aFilasAsientos[$iFila];
            //Inicialización del contador de asientos recorridos.
            $iAsiento = 0;
            while($iAsiento < sizeof($aFila)) {
                echo '<td>' . $aFila[$iAsiento] . '</td>';
                //Aumento del contador de asientos recorridos en 1.
                $iAsiento++;
            }
            echo '</tr>';
            //Aumento del contador de filas recorridas en 1.
            $iFila++;
        }
        echo '</table>';
        
        function asientos($iCantidad){
            echo '<tr><th>Asientos: </th>';
            for($iAsiento = 0;$iAsiento < $iCantidad;$iAsiento++){
                echo '<th>'.($iAsiento+1).'</th>';
            }
            echo '</tr>';
        }
        ?>
    </body>
</html>
