<?php

// Connect to mLab
$m = new MongoClient("mongodb://main:rouse@ds029456.mlab.com:29456");
$db = $m->rouse;
$collection = $db->users;

// Add new user to database
function register($first_name, $last_name, $email, $password_hash, $phone,
                  $interests, $goals) {
    $a = array("email" => $email);
    $cursor = $GLOBALS['collection']->find($a);
    if (count($cursor) === 0) {
        $a = array("first_name" => $first_name, "last_name" => $last_name, "email" => $email,
                   "password_hash" => $password_hash, "phone" => $phone, "interests" => $interests,
                   "goals" => $goals);
        $GLOBALS['collection']->insert($a);
        return "Success";
    } else {
        return "Failure: User Already Exists";
    }
}

// Get user information
function login($email, $password_hash) {
    $a = array("email" => $email, "password_hash" => $password_hash);
    $cursor = $GLOBALS['collection']->find($a);
    if (count($cursor) === 0) {
        return "Incorrect Password";
    } else {
        return $cursor[0];
    }
}

// Add time to call for next day
function addTime($email, $time) {
    $query = array("email" => $email);
    $update = array("matches." . )
}

// Change passion
function changePassion() {

}

// Change goal
function changeGoal() {

}
