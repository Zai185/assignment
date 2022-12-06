<?php

$db_host = "sql109.epizy.com";
$db_username = "epiz_33123690";
$db_password = "yuoYIf7ZnNgmYk";
$db_name = "epiz_33123690_multilibrary";

// $db_host= 'sql210.epizy.com';
// $db_username = 'epiz_33108038';
// $db_password = 'kmu7aNvNbj8hfe';
// $db_name = 'epiz_33108038_bookstore';


// $db_host = 'localhost';
// $db_username = 'root';
// $db_password = '';
// $db_name = 'multilibrary';

$conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);

if(!$conn){
    echo mysqli_connect_error();
}