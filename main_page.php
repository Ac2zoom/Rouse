<?php
include "rouse.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Rouse </title>
    </head>
<body>
    <h2> <?php if(isset($_GET['first_name'])){echo $_GET["first_name"];} ?> </h2> <!-- the stuff inside the $_GET[] is just parameter names-->
    <h3> <?php if(isset($_GET['phonenumber'])){echo $_GET["phonenumber"];} ?> </h3>
    <h3> <?php if(isset($_GET['interests'])){echo $_GET["interests"];} ?> </h3>
    <h3> <?php if(isset($_GET['personalgoals'])){echo $_GET["personalgoals"];} ?> </h3>
</body>
</html>