<?php
session_start();
error_reporting(0);
require "db/connection.php";
$email = "";
$name = "";
$errors = array();
