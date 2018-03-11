<?php

require_once "classes/StudentGroupInterface.php";
require_once "classes/Studens.php";

$stud = new Students('classes/students.txt');
$stud->get(2);
