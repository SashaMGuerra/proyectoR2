<!DOCTYPE html>
<!--
Autor: Isabel Martínez Guerra
Fecha de creación: 28/10/2021
-->
<html lang="es">
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
            define("MAX_RANGO", 5);
            define("MIN_RANGO", 0);

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
                'inputTfnoObligatorio' => '',
                'inputTfnoOpcional' => '',
                'inputCPObligatorio' => '',
                'inputCPOpcional' => '',
                'inputEmailObligatorio' => '',
                'inputEmailOpcional' => '',
                'inputUrlObligatorio' => '',
                'inputUrlOpcional' => '',
                'inputMesObligatorio' => '',
                'inputMesOpcional' => '',
                'inputSemanaObligatorio' => '',
                'inputSemanaOpcional' => '',
                'inputRangoObligatorio' => '',
                'inputRangoOpcional' => '',
                'inputPasswordObligatorio' => ''
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
                'inputTfnoObligatorio' => '',
                'inputTfnoOpcional' => '',
                'inputCPObligatorio' => '',
                'inputCPOpcional' => '',
                'inputEmailObligatorio' => '',
                'inputEmailOpcional' => '',
                'inputUrlObligatorio' => '',
                'inputUrlOpcional' => '',
                'inputMesObligatorio' => '',
                'inputMesOpcional' => '',
                'inputSemanaObligatorio' => '',
                'inputSemanaOpcional' => '',
                'inputRangoObligatorio' => '',
                'inputRangoOpcional' => '',
                'inputPasswordObligatorio' => ''
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
                $aErrores['inputTfnoObligatorio'] = validacionFormularios::validarTelefono($_REQUEST['inputTfnoObligatorio'], OBLIGATORIO);
                $aErrores['inputTfnoOpcional'] = validacionFormularios::validarTelefono($_REQUEST['inputTfnoOpcional']);
                $aErrores['inputCPObligatorio'] = validacionFormularios::validarCp($_REQUEST['inputCPObligatorio'], OBLIGATORIO);
                $aErrores['inputCPOpcional'] = validacionFormularios::validarCp($_REQUEST['inputCPOpcional']);
                $aErrores['inputEmailObligatorio'] = validacionFormularios::validarEmail($_REQUEST['inputEmailObligatorio'], OBLIGATORIO);
                $aErrores['inputEmailOpcional'] = validacionFormularios::validarEmail($_REQUEST['inputEmailOpcional']);
                $aErrores['inputUrlObligatorio'] = validacionFormularios::validarURL($_REQUEST['inputUrlObligatorio'], OBLIGATORIO);
                $aErrores['inputUrlOpcional'] = validacionFormularios::validarURL($_REQUEST['inputUrlOpcional']);
                $aErrores['inputMesObligatorio'] = validacionFormularios::validarFecha($_REQUEST['inputMesObligatorio'], FECHA_MAXIMA, FECHA_MINIMA, OBLIGATORIO);
                $aErrores['inputMesOpcional'] = validacionFormularios::validarFecha($_REQUEST['inputMesOpcional']);
                $aErrores['inputSemanaObligatorio'] = validacionFormularios::validarFecha($_REQUEST['inputSemanaObligatorio'], FECHA_MAXIMA, FECHA_MINIMA, OBLIGATORIO);
                $aErrores['inputSemanaOpcional'] = validacionFormularios::validarFecha($_REQUEST['inputSemanaOpcional']);
                $aErrores['inputRangoObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['inputRangoObligatorio'], MAX_RANGO, MIN_RANGO, OBLIGATORIO);
                $aErrores['inputRangoOpcional'] = validacionFormularios::comprobarEntero($_REQUEST['inputRangoOpcional'], MAX_RANGO, MIN_RANGO);
                $aErrores['inputPasswordObligatorio'] = validacionFormularios::validarPassword($_REQUEST['inputPasswordObligatorio']);
                
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
                $aFormulario['inputTfnoObligatorio'] = $_REQUEST['inputTfnoObligatorio'];
                $aFormulario['inputTfnoOpcional'] = $_REQUEST['inputTfnoOpcional'];
                $aFormulario['inputCPObligatorio'] = $_REQUEST['inputCPObligatorio'];
                $aFormulario['inputCPOpcional'] = $_REQUEST['inputCPOpcional'];
                $aFormulario['inputEmailObligatorio'] = $_REQUEST['inputEmailObligatorio'];
                $aFormulario['inputEmailOpcional'] = $_REQUEST['inputEmailOpcional'];
                $aFormulario['inputUrlObligatorio'] = $_REQUEST['inputUrlObligatorio'];
                $aFormulario['inputUrlOpcional'] = $_REQUEST['inputUrlOpcional'];
                $aFormulario['inputMesObligatorio'] = $_REQUEST['inputMesObligatorio'];
                $aFormulario['inputMesOpcional'] = $_REQUEST['inputMesOpcional'];
                $aFormulario['inputSemanaObligatorio'] = $_REQUEST['inputSemanaObligatorio'];
                $aFormulario['inputSemanaOpcional'] = $_REQUEST['inputSemanaOpcional'];
                $aFormulario['inputRangoObligatorio'] = $_REQUEST['inputRangoObligatorio'];
                $aFormulario['inputRangoOpcional'] = $_REQUEST['inputRangoOpcional'];
                $aFormulario['inputPasswordObligatorio'] = $_REQUEST['inputPasswordObligatorio'];
                

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
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Inputs de tiempo</legend>
                        <table>
                            <!--
                                Los input relacionados con fechas diferentes a date
                                no son bien validados cuando son de tipo diferente
                                al que les corresponde.
                            -->
                            <tr>
                                <td><label for="inputMesObligatorio">Mes obligatorio</label></td>
                                <td><input class="inputObligatorio" type="month" name="inputMesObligatorio" id="inputMesObligatorio" value="<?php echo $_REQUEST['inputMesObligatorio'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputMesObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputMesOpcional">Mes opcional</label></td>
                                <td><input type="month" name="inputMesOpcional" id="inputMesOpcional" value="<?php echo $_REQUEST['inputMesOpcional'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputMesOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputSemanaObligatorio">Semana obligatoria</label></td>
                                <td><input class="inputObligatorio" type="week" name="inputSemanaObligatorio" id="inputSemanaObligatorio" value="<?php echo $_REQUEST['inputSemanaObligatorio'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputSemanaObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputSemanaOpcional">Semana opcional</label></td>
                                <td><input type="week" name="inputSemanaOpcional" id="inputSemanaOpcional" value="<?php echo $_REQUEST['inputSemanaOpcional'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputSemanaOpcional'] . '</span>' ?></td>
                            </tr>
                        </table>
                    </fieldset>
                    <fieldset>
                        <legend>Inputs de introducción de datos concretos</legend>
                        <!--
                            Inputs que se pueden realizar tanto con input text
                            como con su propio modelo de input.
                            Todos están probados con input text para comprobar
                            su correcta validación en servidor.
                        -->
                        <table>
                            <tr>
                                <td><label for="inputTfnoObligatorio">Teléfono obligatorio</label></td>
                                <td><input class="inputObligatorio" type="tel" name="inputTfnoObligatorio" id="inputTfnoObligatorio" value="<?php echo $_REQUEST['inputTfnoObligatorio'] ?? '' ?>" placeholder="987654321"></td>
                                <td><?php echo '<span>' . $aErrores['inputTfnoObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputTfnoOpcional">Teléfono obligatorio</label></td>
                                <td><input type="tel" name="inputTfnoOpcional" id="inputTfnoOpcional" value="<?php echo $_REQUEST['inputTfnoOpcional'] ?? '' ?>" placeholder="987654321"></td>
                                <td><?php echo '<span>' . $aErrores['inputTfnoOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputCPObligatorio">Código postal obligatorio</label></td>
                                <td><input class="inputObligatorio" type="text" name="inputCPObligatorio" id="inputCPObligatorio" value="<?php echo $_REQUEST['inputCPObligatorio'] ?? '' ?>" placeholder="00000"></td>
                                <td><?php echo '<span>' . $aErrores['inputCPObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputCPOpcional">Código postal opcional</label></td>
                                <td><input type="text" name="inputCPOpcional" id="inputCPOpcional" value="<?php echo $_REQUEST['inputCPOpcional'] ?? '' ?>" placeholder="00000"></td>
                                <td><?php echo '<span>' . $aErrores['inputCPOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputEmailObligatorio">Email obligatorio</label></td>
                                <td><input class="inputObligatorio" type="email" name="inputEmailObligatorio" id="inputEmailObligatorio" value="<?php echo $_REQUEST['inputEmailObligatorio'] ?? '' ?>" placeholder='mail@ejemplo.com'></td>
                                <td><?php echo '<span>' . $aErrores['inputEmailObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputEmailOpcional">Email opcional</label></td>
                                <td><input type="email" name="inputEmailOpcional" id="inputEmailOpcional" value="<?php echo $_REQUEST['inputEmailOpcional'] ?? '' ?>" placeholder='mail@ejemplo.com'></td>
                                <td><?php echo '<span>' . $aErrores['inputEmailOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputUrlObligatorio">Enlace obligatorio</label></td>
                                <td><input class="inputObligatorio" type="url" name="inputUrlObligatorio" id="inputUrlObligatorio" value="<?php echo $_REQUEST['inputUrlObligatorio'] ?? '' ?>" placeholder="http://ejemplo.com"></td>
                                <td><?php echo '<span>' . $aErrores['inputUrlObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputUrlOpcional">Enlace obligatorio</label></td>
                                <td><input type="url" name="inputUrlOpcional" id="inputUrlOpcional" value="<?php echo $_REQUEST['inputUrlOpcional'] ?? '' ?>" placeholder="http://ejemplo.com"></td>
                                <td><?php echo '<span>' . $aErrores['inputUrlOpcional'] . '</span>' ?></td>
                            </tr>
                            <!--
                                Los rangos tienen definido constantes para el máximo y el mínimo para su validación.
                                Además, aquí en el input se le indica cuáles son también,
                                para que el input no sea de 0 a 100, como es por defecto.
                            -->
                            <tr>
                                <td><label for="inputRangoObligatorio">Rango obligatorio</label></td>
                                <td><input class="inputObligatorio" type="range" name="inputRangoObligatorio" id="inputRangoObligatorio" max=<?php echo MAX_RANGO ?> min=<?php echo MIN_RANGO ?> value="<?php echo $_REQUEST['inputRangoObligatorio'] ?? '0' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputRangoObligatorio'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputRangoOpcional">Rango opcional</label></td>
                                <td><input type="range" name="inputRangoOpcional" id="inputRangoOpcional" max=<?php echo MAX_RANGO ?> min=<?php echo MIN_RANGO ?>  value="<?php echo $_REQUEST['inputRangoOpcional'] ?? '0' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputRangoOpcional'] . '</span>' ?></td>
                            </tr>
                            <tr>
                                <td><label for="inputPasswordObligatorio">Contraseña obligatoria</label></td>
                                <td><input class="inputObligatorio" type="password" name="inputPasswordObligatorio" id="inputPasswordObligatorio" value="<?php echo $_REQUEST['inputPasswordObligatorio'] ?? '' ?>"></td>
                                <td><?php echo '<span>' . $aErrores['inputPasswordObligatorio'] . '</span>' ?></td>
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
