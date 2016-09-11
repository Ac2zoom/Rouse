<?php

// Add new user to database
function register($collection, $first_name, $last_name, $email, $password_hash, $phone,
                  $interests, $goals) {
    $a = array("email" => $email);
    $cursor = $collection->find($a);
    if ($cursor->count() === 0) {
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
function login($collection, $email, $password_hash) {
    $a = array("email" => $email, "password_hash" => $password_hash);
    $cursor = $collection->find($a);
    if (count($cursor) === 0) {
        return "Incorrect Password";
    } else {
        return $cursor[0];
    }
}

// Add time to call for next day
function addTime($collection, $email, $time) {
    $query = array("email" => $email);
    $update = array("$set" => array("matches." . date("m-d-y") => array('time' => $time)));
    $collection->update($query, $update);
}

// Change passion
function changePassion($collection, $email, $new_passion) {
    $query = array("email" => $email);
    $update = array("$set" => array("passion" => $new_passion));
    $collection->update($query, $update);
}

// Change goal
function changeGoal($collection, $email, $new_goal) {
    $query = array("email" => $email);
    $update = array("$set" => array("goal" => $new_goal));
    $collection->update($query, $update);
}
