<?php
$connect=mysqli_connect(
hostname:'MySQL-5.7',
username:'root', 
password:'',
database: 'Users'
);
if(!$connect){
    die('Error connect to database!');
}

?>