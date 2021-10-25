<!DOCTYPE html>
<!--
    Date of creation: 25/10/2021.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Custom matrix</title>
    </head>
    <body>
        <form action="formTable.php" method="post">
            <table>
                <tr>
                    <td><label for="rows">Líneas: </label></td>
                    <td><input type="number" id="rows" name="rows"></td>
                </tr>
                <tr>
                    <td><label for="columns">Columnas: </label></td>
                    <td><input type="number" id="columns" name="columns"></td>
                </tr>
            </table>
            <input type="submit" name="submit">
        </form>
    </body>
</html>
