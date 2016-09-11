<?php
include "rouse.php";
$first_name = $last_name = $email = $password_hash = $phone = $interests = $goals = "";

if(isset($_POST['add'])) {
	$m = new MongoClient("mongodb://main:rouse@ds029456.mlab.com:29456/rouse");
	if (!$m) {
		echo "Could not connect to MongoDB";
	} else {
		$db = $m->rouse;
        $collection = $db->users;
        $ret = register($collection, $_POST['firstname'], $_POST['lastname'], $_POST['email'],
                 hash("sha256", $_POST['password']), $_POST['phonenumber'], $_POST['expl'],
                 $_POST['personalgoals']);
        if (strcmp($ret, "Success") === 0) {
            header("Location: http://localhost:8000/main.php");
        } else {
            echo $ret;
        }
	}
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Rouse </title>
        </head>
        </html>