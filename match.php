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
    echo "Your match is: ";
    print_r($ret);
} else {
    echo "Please specify a time to find a match";
}