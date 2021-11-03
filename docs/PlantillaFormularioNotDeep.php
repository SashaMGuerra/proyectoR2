<!DOCTYPE html>
<!--
Autor: Isabel Martínez Guerra
Fecha de creación: 28/10/2021
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>IMG - Plantilla Formulario</title>
        <link href="../webroot/css/common.css" rel="stylesheet" type="text/css"/>
        <style>
            h2{
                text-align: center;
            }
            
            /*Formato del formulario*/
            table{
                table-layout: fixed;
                margin: auto;
                width: 100%;
            }
            span{
                color: red;
                font-size: small;
            }
            tr:nth-child(even) td:first-child{
                border-bottom: 1px solid lightsteelblue;
            }
            fieldset{
                margin-bottom: 1%;
                border: 2px lightsteelblue groove;
            }
            legend{
                font-variant: small-caps;
                text-align: center;
                border: 2px lightsteelblue groove;
                padding: 3px;
            }
            
            /*Formato de campos obligatorios*/
            .inputObligatorio{
                background: lightsteelblue;
            }
            input:hover{
                background-color: gainsboro;
            }
            
            
            /*Formato de la tabla de la información enviada*/
            table.showVariables{
                width: 95%;
                border-collapse: collapse;
                border: 1px solid gainsboro;
            }
            table.showVariables tr:nth-child(even) td:first-child{
                border-bottom: none;
            }
            table.showVariables tr:nth-child(even){
                background-color: gainsboro;
            }
            table.showVariables td{
                padding: 4px;
            }

            /*Bloqueo del ancho del textarea*/
            textarea{
                width: 95%;
                resize: vertical;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Plantilla de formulario</h1>
        </header>
        <main>
            <?php
            /**
             * Fecha de creación: 28/10/2021
             * Fecha de última modificación: 28/10/2021
             * @version 1.0
             * @author Sasha
             * 
             * Plantilla para formularios.
             * 
             */
            //Librería de validación.
            include '../core/210322ValidacionFormularios.php';

            //Definición de constatnes para el parámetro "obligatorio"
            define("OBLIGATORIO", 1);
            define("OPCIONAL", 0);
            define("MAX_TAMANIO_ALFA", 1000);
            define("MIN_TAMANIO_ALFA", 1);
            define("FECHA_MAXIMA", '01/01/2200');
            define("FECHA_MINIMA", "01/01/1900");

            /*
             * Inicialización del array de elementos del formulario.
             */
            $aFormulario = [
                'inputAlfanumericoObligatorio' => '',
                'inputAlfanumericoOpcional' => '',
                'inputAlfabeticoObligatorio' => '',
                'inputAlfabeticoOpcional' => '',
                'inputEnteroObligatorio' => '',
                'inputEnteroOpcional' => '',
                'inputFloatObligatorio' => '',
                'inputFloatOpcional' => '',
                'inputFechaObligatorio' => '',
                'inputFechaOpcional' => '',
                'inputHoraObligatorio' => '',
                'inputHoraOpcional' => '',
                'inputFechaHoraObligatorio' => '',
                'inputFechaHoraOpcional' => '',
                'inputTextareaObligatorio' => '',
                'inputTextareaOpcional' => '',
                'inputListaDesplegableObligatorio' => '',
                'inputListaDesplegableOpcional' => '',
                'inputRadioObligatorio' => '',
                'inputRadioOpcional' => '',
                'inputCheckboxObligatorio' => '',
                'inputCheckboxOpcional' => ''
            ];

            /*
             * Inicialización del array de errores.
             */
            $aErrores = [
                'inputAlfanumericoObligatorio' => '',
                'inputAlfanumericoOpcional' => '',
                'inputAlfabeticoObligatorio' => '',
                'inputAlfabeticoOpcional' => '',
                'inputEnteroObligatorio' => '',
                'inputEnteroOpcional' => '',
                'inputFloatObligatorio' => '',
                'inputFloatOpcional' => '',
                'inputFechaObligatorio' => '',
                'inputFechaOpcional' => '',
                'inputHoraObligatorio' => '',
                'inputHoraOpcional' => '',
                'inputFechaHoraObligatorio' => '',
                'inputFechaHoraOpcional' => '',
                'inputTextareaObligatorio' => '',
                'inputTextareaOpcional' => '',
                'inputListaDesplegableObligatorio' => '',
                'inputListaDesplegableOpcional' => '',
                'inputRadioObligatorio' => '',
                'inputRadioOpcional' => '',
                'inputCheckboxObligatorio' => '',
                'inputCheckboxOpcional' => ''
            ];

            /*
             * Confirmación si el formulario ha sido enviado.
             * Si ha sido enviado, valida los campos y registra los errores.
             */
            if (isset($_REQUEST['submit'])) {
                /*
                 * Manejador de errores. Por defecto asume que no hay ningún
                 * error (true). Si encuentra alguno se pone a false.
                 */
                $bEntradaOK = true;

                /*
                 * Registro de errores. Valida todos los campos.
                 */
                $aErrores['inputAlfanumericoObligatorio'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['inputAlfanumericoObligatorio'], MAX_TAMANIO_ALFA, MIN_TAMANIO_ALFA, OBLIGATORIO);
                $aErrores['inputAlfanumericoOpcional'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['inputAlfanumericoOpcional']);
                $aErrores['inputAlfabeticoObligatorio'] = validacionFormularios::comprobarAlfabetico($_REQUEST['inputAlfabeticoObligatorio'], MAX_TAMANIO_ALFA, MIN_TAMANIO_ALFA, OBLIGATORIO);
                $aErrores['inputAlfabeticoOpcional'] = validacionFormularios::comprobarAlfabetico($_REQUEST['inputAlfabeticoOpcional']);
                $aErrores['inputEnteroObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['inputEnteroObligatorio'], PHP_INT_MAX, PHP_INT_MIN, OBLIGATORIO);
                $aErrores['inputEnteroOpcional'] = validacionFormularios::comprobarEntero($_REQUEST['inputEnteroOpcional']);
                $aErrores['inputFloatObligatorio'] = validacionFormularios::comprobarFloat($_REQUEST['inputFloatObligatorio'], PHP_FLOAT_MAX, PHP_INT_MIN, OBLIGATORIO);
                $aErrores['inputFloatOpcional'] = validacionFormularios::comprobarFloat($_REQUEST['inputFloatOpcional']);
                /*
                 * NOTA: validarFecha no funciona correctamente con campo texto.
                 * Admite la introducción de una sola letra.
                 */
                $aErrores['inputFechaObligatorio'] = validacionFormularios::validarFecha($_REQUEST['inputFechaObligatorio'], FECHA_MAXIMA, FECHA_MINIMA, OBLIGATORIO);
                $aErrores['inputFechaOpcional'] = validacionFormularios::validarFecha($_REQUEST['inputFechaOpcional']);
                $aErrores['inputHoraObligatorio'] = validacionFormularios::validarFecha($_REQUEST['inputHoraObligatorio'], FECHA_MAXIMA, FECHA_MINIMA, OBLIGATORIO);
                $aErrores['inputHoraOpcional'] = validacionFormularios::validarFecha($_REQUEST['inputHoraOpcional']);
                $aErrores['inputFechaHoraObligatorio'] = validacionFormularios::validarFecha($_REQUEST['inputFechaHoraObligatorio'], FECHA_MAXIMA, FECHA_MINIMA, OBLIGATORIO);
                $aErrores['inputFechaHoraOpcional'] = validacionFormularios::validarFecha($_REQUEST['inputFechaHoraOpcional']);
                $aErrores['inputTextareaObligatorio'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['inputTextareaObligatorio'], MAX_TAMANIO_ALFA, MIN_TAMANIO_ALFA, OBLIGATORIO);
                $aErrores['inputTextareaOpcional'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['inputTextareaOpcional']);
                $aErrores['inputListaDesplegableObligatorio'] = validacionFormularios::validarSeleccion($_REQUEST['inputListaDesplegableObligatorio']);
                $aErrores['inputListaDesplegableOpcional'] = validacionFormularios::validarSeleccion($_REQUEST['inputListaDesplegableOpcional'], OPCIONAL);
                /*
                 * Dado que por defecto no hay ninguna opción elegida, y si no
                 * la hay el $_REQUEST no lo guarda y da error por índice indefinido,
                 * requiere una comprobación si está definido el índica antes
                 * de validarse la entrada.
                 * Si no lo está, lleva a la validación una cadena vacía.
                 */
                $aErrores['inputRadioObligatorio'] = validacionFormularios::validarSeleccion($_REQUEST['inputRadioObligatorio']??''); //Toma el value, no el name del input.
                $aErrores['inputRadioOpcional'] = validacionFormularios::validarSeleccion($_REQUEST['inputRadioOpcional']??'', OPCIONAL); //Toma el value, no el name del input.
                /*
                 * Al igual que con los input radio, si no se elige la única
                 * opción, no la guarda en el $_REQUEST y da error por índice 
                 * indefinido.
                 * Comprueba si está definido antes de validar la entrada. Si no
                 * lo está, lleva a la validación una cadena vacía.
                 */
                $aErrores['inputCheckboxObligatorio'] = validacionFormularios::validarSeleccion($_REQUEST['inputCheckboxObligatorio']??'');
                $aErrores['inputCheckboxOpcional'] = validacionFormularios::validarSeleccion($_REQUEST['inputCheckboxOpcional']??'', OPCIONAL);
                
                /*
                 * Recorrido del array de errores.
                 * Si existe alguno, cambia el manejador de errores a false
                 * y limpia el campo en el $_REQUEST.
                 */
                foreach ($aErrores as $sCampo => $sError) {
                    if ($sError != null) {
                        $_REQUEST[$sCampo] = ''; //Limpieza del campo.
                        $bEntradaOK = false;
                    }
                }
            }
            /*
             * Si el formulario no ha sido enviado, pone el manejador de errores
             * a false para poder mostrar el formulario.
             */ else {
                $bEntradaOK = false;
            }

            /*
             * Si el formulario ha sido enviado y no ha tenido errores
             * muestra la información enviada.
             */
            if ($bEntradaOK) {
                /*
                 * Recogida de la información enviada.
                 */
                $aFormulario['inputAlfanumericoObligatorio'] = $_REQUEST['inputAlfanumericoObligatorio'];
                $aFormulario['inputAlfanumericoOpcional'] = $_REQUEST['inputAlfanumericoOpcional'];
                $aFormulario['inputAlfabeticoObligatorio'] = $_REQUEST['inputAlfabeticoObligatorio'];
                $aFormulario['inputAlfabeticoOpcional'] = $_REQUEST['inputAlfabeticoOpcional'];
                $aFormulario['inputEnteroObligatorio'] = $_REQUEST['inputEnteroObligatorio'];
                $aFormulario['inputEnteroOpcional'] = $_REQUEST['inputEnteroOpcional'];
                $aFormulario['inputFloatObligatorio'] = $_REQUEST['inputFloatObligatorio'];
                $aFormulario['inputFloatOpcional'] = $_REQUEST['inputFloatOpcional'];
                $aFormulario['inputFechaObligatorio'] = $_REQUEST['inputFechaObligatorio'];
                $aFormulario['inputFechaOpcional'] = $_REQUEST['inputFechaOpcional'];
                $aFormulario['inputHoraObligatorio'] = $_REQUEST['inputHoraObligatorio'];
                $aFormulario['inputHoraOpcional'] = $_REQUEST['inputHoraOpcional'];
                $aFormulario['inputFechaHoraObligatorio'] = $_REQUEST['inputFechaHoraObligatorio'];
                $aFormulario['inputFechaHoraOpcional'] = $_REQUEST['inputFechaHoraOpcional'];
                $aFormulario['inputTextareaObligatorio'] = $_REQUEST['inputTextareaObligatorio'];
                $aFormulario['inputTextareaOpcional'] = $_REQUEST['inputTextareaOpcional'];
                $aFormulario['inputListaDesplegableObligatorio'] = $_REQUEST['inputListaDesplegableObligatorio'];
                $aFormulario['inputListaDesplegableOpcional'] = $_REQUEST['inputListaDesplegableOpcional'];
                /*
                 * Al igual que con el array de errores, estos input que sin
                 * elección dada no son guardados en $_REQUEST, se comprueban
                 * antes si están definidos. Si no lo están, devuelven una
                 * cadena vacía.
                 */
                $aFormulario['inputRadioObligatorio'] = $_REQUEST['inputRadioObligatorio']??'';
                $aFormulario['inputRadioOpcional'] = $_REQUEST['inputRadioOpcional']??'';
                $aFormulario['inputCheckboxObligatorio'] = $_REQUEST['inputCheckboxObligatorio']??'';
                $aFormulario['inputCheckboxOpcional'] = $_REQUEST['inputCheckboxOpcional']??'';

                /*
                 * Mostrado del contenido de las variables
                 * en una tabla.
                 */
                echo '<h2>Contenido del array de elementos del formulario</h2>';
                echo '<table class="showVariables">';
                foreach ($aFormulario as $key => $value) {
                    echo '<tr>';
                    echo "<td>$key</td><td>$value</td>";
                    echo '</tr>';
                }
                echo '</table>';
            }

            /*
             * Si el formulario no ha sido enviado o ha tenido errores
             * muestra el formulario.
             */ else {

                /*
                 * Por cada input, el valor por defecto se inicializa al que tiene
                 * $_REQUEST, si es que tiene alguna.
                 * Si tiene algún error, lo muestra al lado del input.
                 */
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <fieldset>
                        <legend>Inputs de introducción de datos</legend>
                        <table>
                            <tr>
                                <td><label for="inputAlfanumericoObligatorio">Alfanumérico obligatorio</label></td>
                                <td><input class="inputObligatorio" type="text" name="inputAlfanumericoObligatorio" id="inputAlfanumericoObligatorio" value="<?php echo $_REQUEST['inputAlfanumericoObligatorio'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputAlfanumericoObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputAlfanumericoOpcional">Alfanumérico opcional</label></td>
                                <td><input type="text" name="inputAlfanumericoOpcional" id="inputAlfanumericoOpcional" value="<?php echo $_REQUEST['inputAlfanumericoOpcional'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputAlfanumericoOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputAlfabeticoObligatorio">Alfabético obligatorio</label></td>
                                <td><input class="inputObligatorio" type="text" name="inputAlfabeticoObligatorio" id="inputAlfabeticoObligatorio" value="<?php echo $_REQUEST['inputAlfabeticoObligatorio'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputAlfabeticoObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputAlfabeticoOpcional">Alfabético opcional</label></td>
                                <td><input type="text" name="inputAlfabeticoOpcional" id="inputAlfabeticoOpcional" value="<?php echo $_REQUEST['inputAlfabeticoOpcional'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputAlfabeticoOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputEnteroObligatorio">Entero obligatorio</label></td>
                                <td><input class="inputObligatorio" type="number" name="inputEnteroObligatorio" id="inputEnteroObligatorio" value="<?php echo $_REQUEST['inputEnteroObligatorio'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputEnteroObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputEnteroOpcional">Entero opcional</label></td>
                                <td><input type="number" name="inputEnteroOpcional" id="inputEnteroOpcional" value="<?php echo $_REQUEST['inputEnteroOpcional'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputEnteroOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputFloatObligatorio">Float obligatorio</label></td>
                                <td><input class="inputObligatorio" type="text" name="inputFloatObligatorio" id="inputFloatObligatorio" value="<?php echo $_REQUEST['inputFloatObligatorio'] ?? '' ?>" placeholder="Ej.: 1.75"></td>
                                <td><?php echo '<span>' . $aErrores['inputFloatObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputFloatOpcional">Float opcional</label></td>
                                <td><input type="text" name="inputFloatOpcional" id="inputFloatOpcional" value="<?php echo $_REQUEST['inputFloatOpcional'] ?? '' ?>" placeholder="Ej.: -3.9"></td>
                                <td><?php echo '<span>' . $aErrores['inputFloatOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputFechaObligatorio">Fecha obligatoria</label></td>
                                <td><input class="inputObligatorio" type="date" name="inputFechaObligatorio" id="inputFechaObligatorio" value="<?php echo $_REQUEST['inputFechaObligatorio'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputFechaObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputFechaOpcional">Fecha opcional</label></td>
                                <td><input type="date" name="inputFechaOpcional" id="inputFechaOpcional" value="<?php echo $_REQUEST['inputFechaOpcional'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputFechaOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputHoraObligatorio">Hora obligatoria</label></td>
                                <td><input class="inputObligatorio" type="time" name="inputHoraObligatorio" id="inputHoraObligatorio" value="<?php echo $_REQUEST['inputHoraObligatorio']??'' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputHoraObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputHoraOpcional">Hora opcional</label></td>
                                <td><input type="time" name="inputHoraOpcional" id="inputHoraOpcional" value="<?php echo $_REQUEST['inputHoraOpcional']??'' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputHoraOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputFechaHoraObligatorio">Fecha-hora obligatoria</label></td>
                                <td><input class="inputObligatorio" type="datetime-local" name="inputFechaHoraObligatorio" id="inputFechaHoraObligatorio" value="<?php echo $_REQUEST['inputFechaHoraObligatorio'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputFechaHoraObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputFechaHoraOpcional">Fecha-hora opcional</label></td>
                                <td><input type="datetime-local" name="inputFechaHoraOpcional" id="inputFechaHoraOpcional" value="<?php echo $_REQUEST['inputFechaHoraOpcional'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputFechaHoraOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputTextareaObligatorio">Textarea obligatoria</label></td>
                                <td>
                                    <textarea class="inputObligatorio" name="inputTextareaObligatorio" id="inputTextareaObligatorio" placeholder="Introduzca texto"><?php echo $_REQUEST['inputTextareaObligatorio'] ?? '' ?></textarea>
                                </td>
                                <td><?php echo '<span>' . $aErrores['inputTextareaObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputTextareaOpcional">Textarea opcional</label></td>
                                <td>
                                    <textarea name="inputTextareaOpcional" id="inputTextareaOpcional" placeholder="Introduzca texto"><?php echo $_REQUEST['inputTextareaOpcional'] ?? '' ?></textarea>
                                </td>
                                <td><?php echo '<span>' . $aErrores['inputTextareaOpcional'] . '</span>' ?></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Inputs de selección de datos</legend>
                        <table>
                            <tr>
                                <td><label for="inputListaDesplegableObligatorio">Lista desplegable obligatoria</label></td>
                                <td>
                                    <select class="inputObligatorio" name="inputListaDesplegableObligatorio" id="inputListaDesplegableObligatorio">
                                        <option value=""></option>
                                        <optgroup label="Grupo de opciones">
                                            <option value="opcion1" <?php echo (isset($_REQUEST['inputListaDesplegableObligatorio']) ? ($_REQUEST['inputListaDesplegableObligatorio'] == 'opcion1' ? 'selected' : '') : '') ?>>Opción 1</option>
                                            <option value="opcion2" <?php echo (isset($_REQUEST['inputListaDesplegableObligatorio']) ? ($_REQUEST['inputListaDesplegableObligatorio'] == 'opcion2' ? 'selected' : '') : '') ?>>Opción 2</option>
                                            <option value="opcion3" <?php echo (isset($_REQUEST['inputListaDesplegableObligatorio']) ? ($_REQUEST['inputListaDesplegableObligatorio'] == 'opcion3' ? 'selected' : '') : '') ?>>Opción 3</option>
                                        </optgroup>
                                    </select>
                                </td>
                                <td><?php echo '<span>' . $aErrores['inputListaDesplegableObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputListaDesplegableOpcional">Lista desplegable opcional</label></td>
                                <td>
                                    <select name="inputListaDesplegableOpcional" id="inputListaDesplegableOpcional">
                                        <option value=""></option>
                                        <optgroup label="Grupo de opciones">
                                            <option value="opcion1" <?php echo (isset($_REQUEST['inputListaDesplegableOpcional']) ? ($_REQUEST['inputListaDesplegableOpcional'] == 'opcion1' ? 'selected' : '') : '') ?>>Opción 1</option>
                                            <option value="opcion2" <?php echo (isset($_REQUEST['inputListaDesplegableOpcional']) ? ($_REQUEST['inputListaDesplegableOpcional'] == 'opcion2' ? 'selected' : '') : '') ?>>Opción 2</option>
                                            <option value="opcion3" <?php echo (isset($_REQUEST['inputListaDesplegableOpcional']) ? ($_REQUEST['inputListaDesplegableOpcional'] == 'opcion3' ? 'selected' : '') : '') ?>>Opción 3</option>
                                        </optgroup>
                                    </select>
                                </td>
                                <td><?php echo '<span>' . $aErrores['inputListaDesplegableOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td>Input radio obligatorio</td>
                                <td class="inputObligatorio">
                                    <input type="radio" id="inputRadioObligatorioOpcion1" name="inputRadioObligatorio" value="inputRadioObligatorioOpcion1" <?php
                                    if (isset($_REQUEST['inputRadioObligatorio'])) {
                                        echo ($_REQUEST['inputRadioObligatorio'] == 'inputRadioObligatorioOpcion1' ? 'checked' : '');
                                    }
                                    ?>>
                                    <label for="inputRadioObligatorioOpcion1">Opción 1</label>
                                    
                                    <input type="radio" id="inputRadioObligatorioOpcion2" name="inputRadioObligatorio" value="inputRadioObligatorioOpcion2" <?php
                                    if (isset($_REQUEST['inputRadioObligatorio'])) {
                                        echo ($_REQUEST['inputRadioObligatorio'] == 'inputRadioObligatorioOpcion2' ? 'checked' : '');
                                    }
                                    ?>>
                                    <label for="inputRadioObligatorioOpcion2">Opción 2</label>
                                </td>
                                <td><?php echo '<span>' . $aErrores['inputRadioObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td>Input radio opcional</td>
                                <td>
                                    <?php
                                    /*
                                     * Si la variable está definida (si hay alguna elección hecha)
                                     * comprueba cuál es la que está elegida, y si es esa,
                                     * pone el input en checked.
                                     * 
                                     * Si no está definida, o no es esa la que lo está,
                                     * no lo hace.
                                     */
                                    ?>
                                    <input type="radio" id="inputRadioOpcionalOpcion1" name="inputRadioOpcional" value="inputRadioOpcionalOpcion1" <?php
                                    if (isset($_REQUEST['inputRadioOpcional'])) {
                                        echo ($_REQUEST['inputRadioOpcional'] == 'inputRadioOpcionalOpcion1' ? 'checked' : '');
                                    }
                                    ?>>
                                    <label for="inputRadioOpcionalOpcion1">Opción 1</label>

                                    <input type="radio" id="inputRadioOpcionalOpcion2" name="inputRadioOpcional" value="inputRadioOpcionalOpcion2" <?php
                                    if (isset($_REQUEST['inputRadioOpcional'])) {
                                        echo ($_REQUEST['inputRadioOpcional'] == 'inputRadioOpcionalOpcion2' ? 'checked' : '');
                                    }
                                    ?>>
                                    <label for="inputRadioOpcionalOpcion2">Opción 2</label>
                                </td>
                                <td><?php echo '<span>' . $aErrores['inputRadioOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td>Input checkbox obligatorio</td>
                                <td class="inputObligatorio">
                                    <?php
                                    /*
                                     * Si la variable está definida (el checkbox está checado)
                                     * y no está vacía, pone el input en checked.
                                     */
                                    ?>
                                    <input type="checkbox" id="inputCheckboxObligatorio" name="inputCheckboxObligatorio" value="checkboxObligatorio" <?php
                                    if(isset($_REQUEST['inputCheckboxObligatorio'])){
                                        if($_REQUEST['inputCheckboxObligatorio']!=''){
                                            echo 'checked';
                                        }
                                    }
                                    ?>>
                                    <label for="inputCheckboxObligatorio">Opción</label>
                                </td>
                                <td><?php echo '<span>' . $aErrores['inputCheckboxObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td>Input checkbox opcional</td>
                                <td>
                                    <input type="checkbox" id="inputCheckboxOpcional" name="inputCheckboxOpcional" value="checkboxOpcional" <?php
                                    if(isset($_REQUEST['inputCheckboxOpcional'])){
                                        if($_REQUEST['inputCheckboxOpcional']!=''){
                                            echo 'checked';
                                        }
                                    }
                                    ?>>
                                    <label for="inputCheckboxOpcional">Opción</label>
                                </td>
                                <td><?php echo '<span>' . $aErrores['inputCheckboxOpcional'] . '</span>' ?></td>
                            </tr>
                        </table>
                    </fieldset>
                    <input type="submit" name="submit" id="submit">
                </form>
                <?php
            }
            ?>
        </main>
        <footer>
            <div>Modificado el 29/10/2021 - Mª Isabel Martínez Guerra</div>
        </footer>
    </body>
</html>
