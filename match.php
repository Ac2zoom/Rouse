<?php
/**
 * Created by PhpStorm.
 * User: achalana
 * Date: 9/11/2016
 * Time: 3:07 AM
 */
include "rouse.php";
if (isset($_POST['usr_time'])) {
    $m = new MongoClient("mongodb://main:rouse@ds029456.mlab.com:29456/rouse");
    $db = $m->rouse;
    $collection = $db->users;
    addTime($collection, $_POST['usr_email'], $_POST['usr_time']);
    $ret = findMatch($collection, $_POST['usr_email'], $_POST['usr_type'], $_POST['usr_time']);
} else {
    echo "Please specify a time to find a match";
}
?>
<DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap Core CSS -->
        <link href="startbootstrap-new-age/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="startbootstrap-new-age/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="startbootstrap-new-age/vendor/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="startbootstrap-new-age/vendor/device-mockups/device-mockups.min.css">

        <!-- Theme CSS -->
        <link href="startbootstrap-new-age/css/new-age.min.css" rel="stylesheet">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="jumbotron">
            <h1><?php echo "Your match is: " . $ret['first_name'] . " " . $ret['last_name']; ?></h1>
            <p><?php echo ".  Give them a call at " . $ret['phone'] . " tomorrow morning"; ?></p>
<!--            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
        </div>
    </body>
</html>