<?php

$csv = file('tasks.csv');
$tasks=[];
foreach ($csv as $line){
    $tasks []=explode(',', $line);
}


// MUST BE THE LAST INSTRUCTION OF THIS FILE!!!
include_once 'index.phtml';
