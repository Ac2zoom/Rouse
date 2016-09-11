<?php
include "rouse.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Rouse </title>
        <h2> <?php echo $_GET["first_name"]; ?> </h2> <!-- the stuff inside the $_GET[] is just parameter names-->
        <h3> <?php echo $_GET["phonenumber"]; ?> </h3>
        <h3> <?php echo $_GET["interests"]; ?> </h3>
        <h3> <?php echo $_GET["personalgoals"]; ?> </h3>

        </head>
        </html>