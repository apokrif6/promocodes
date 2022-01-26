<?php
include_once "autoloader.php";
include_once "error_handler.php";

?>
<title>promocodes generator</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
<form action="generateCodes.php" method="POST"">
    <section class='FlexContainer'>
        <div><input name="number_of_codes" placeholder="Wpisz ilość kodów" required></div>
        <div><input name="length_of_codes" placeholder="First długość kodów" required></div>
        <div><input type="submit" value="Wygeneruj kody"></div>
    </section>
</form>

<?php

?>