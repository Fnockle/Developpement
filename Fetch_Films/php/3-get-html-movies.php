<?php
/*
 * Push images names and other required values in an array
 * When a new image is added or deleted in the ../images directory
 * the array should be updated...
 *
 *  scandir(); // to read files in a directory
 *  rand(); // to "simulate" a movie duration
 *  strtr(); or str_replace(); // if you need to replace characters
 *  pathinfo(); // if you need some specific part of a filename
 *  ucwords();  // if you need to upperCase first word of each letter (like CamelCase)
 *
 * finally return a json value
 */



$images = '../images';
$imagesArray = array_diff(scandir($images), array('..', '.'));
foreach ($imagesArray as $key => $value) {

  $movies []= ['cover'=>'images/'.$value,'nom'=> ucwords(str_replace("-"," ",(pathinfo('../images/'.$value)['filename']))),'duration'=>rand(90,150)." minutes"];

}
echo json_encode($movies);
