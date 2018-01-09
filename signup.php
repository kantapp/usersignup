<?php
    error_reporting(0);
    $dbcon=new mysqli("loalhost","root","","php");
    // $dbcon=new mysqli("servername","username","password","databasename");

    //check databse is connected
    if($dbcon->connect_error)
    {
        die("Error : ".$dbcon->connect_error);
    }

