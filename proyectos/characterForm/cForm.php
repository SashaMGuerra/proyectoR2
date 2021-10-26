<!DOCTYPE html>
<!--
    Author: Sasha.
    Date: 26/10/2021.
--> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Character form</title>
        <link href="formStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        /*
         * @author Sasha
         * @version 1.0
         * @description Character form.
         */
        ?>
        <form action="processing.php" method="post">
            <fieldset>
                <legend>Basic information</legend>
                <table>
                    <tr>
                        <td><label for="name">Name: </label></td>
                        <td><label for="birthday">Birthday: </label></td>
                        <td><label for="height">Height: </label></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="name" name="name"></td>
                        <td><input type="date" id="birthday" name="birthday"></td>
                        <td><input type="number" id="height" name="height" placeholder="cm"></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Color palette</legend>
                <input type="color" id="color1" name="color1">
                <input type="color" id="color2" name="color2">
                <input type="color" id="color3" name="color3">
                <input type="color" id="color4" name="color4">
                <input type="color" id="color5" name="color5">
                <input type="color" id="color6" name="color6">
            </fieldset>
            <input type="submit" name="submit">
        </form>
    </body>
</html>
