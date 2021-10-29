<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matrix fill</title>
        <style>
            form{
                text-align: center;
            }
            table{
                text-align: center;
                border-collapse: collapse;
                margin: auto;
                table-layout: fixed;
            }
            td{
                border: 1px solid black;
            }
            input{
                text-align: center;
                border: none;
            }
            input#rows, input#columns{
                display: none;
            }
            input#submitTable{
                background-color: lavender;
                border: 2px solid blueviolet;
            }
        </style>
    </head>
    <body>
        <?php
        if(isset($_REQUEST['submitTable'])){
            $iRows = $_REQUEST['rows'];
            $iColumns = $_REQUEST['columns'];
            
            echo '<table>';
            for ($iRow = 0; $iRow < $iRows; $iRow++) {
                echo '<tr>';
                for ($iColumn = 0; $iColumn < $iColumns; $iColumn++) {
                    $sName = "text:$iRow:$iColumn";
                    echo "<td>$_REQUEST[$sName]</td>";
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        else{
        ?>
        <form action="formTable.php" method="post">
            <table>
                <?php
                $iRows = $_REQUEST['rows'];
                $iColumns = $_REQUEST['columns'];
                echo "<input name='rows' id='rows' value='$iRows'>";
                echo "<input name='columns' id='columns' value='$iColumns'>";

                for ($iRow = 0; $iRow < $iRows; $iRow++) {
                    echo '<tr>';
                    for ($iColumn = 0; $iColumn < $iColumns; $iColumn++) {
                        $sName = "text:$iRow:$iColumn";
                        echo "<td><input type='text' id='$sName' name='$sName'></td>";
                    }
                    echo '</tr>';
                }
                ?>
            </table>
            <input type="submit" id="submitTable" name="submitTable">
        </form>
        <?php
        }
        ?>
    </body>
</html>
