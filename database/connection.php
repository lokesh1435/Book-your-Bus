<?php
$host='localhost';
$name='root';
$pwd='8919';
$db='busbooking';

$connection = new mysqli ($host,$name,$pwd,$db);

if($connection -> connect_errno){
    echo "Failed to connect to MySQL: " . $connection -> connect_errno;
    exit();
}

?>