<?php
$con = mysqli_connect("localhost", "root", "");
$con->select_db("multiple_uploads");
// $q = "create database multiple_uploads";
// $q = "create table re1g (name varchar(20),email varchar(20))";
$q = "insert into re1g (`name`,`email`) values('hello','janki')";
try {
    if ($con->query($q)) {
        echo "database created";
    }
} catch (Exception $e) {
    echo "Error in creating database";
}
