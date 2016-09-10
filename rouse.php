<?php

// Connect to mLab
$m = new MongoClient("mongodb://main:rouse@ds029456.mlab.com:29456");
$db = $m->rouse;
$collection = $db->users;

// Add new user to database
function addUser($name, $email, $password_hash, $goal, $passion) {

}

// Add time to call for next day
function addTime() {

}

// Change passion
function changePassion() {

}

// Change goal
function changeGoal() {

}

// Get user information
function getUserInfo() {

}
