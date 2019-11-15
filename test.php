<?php

$string = "         ";
// $string = htmlspecialchars($string);
if($string === null){
  $msg = " string is null";
}else {
  $msg = " string is not null";
}

echo "\r\n".$msg;


if(trim($string) === null){
  $msg = " string is null";
}else {
  $msg = " string is not null";
}
echo "\r\n".$msg;

if(is_null($string)){
  $msg = " string is null";
}else {
  $msg = " string is not null";
}
echo "\r\n".$msg;

if(empty($string)){
  $msg = " string is null";
}else {
  $msg = " string is not null";
}
echo "\r\n".$msg;


if(trim($string) === ""){
  $msg = " string is null";
}else {
  $msg = " string is not null";
}

echo "\r\n".$msg;
