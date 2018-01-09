<?php
    error_reporting(0);
    $dbcon=new mysqli("localhost","root","","php");
    // $dbcon=new mysqli("servername","username","password","databasename");

    //check databse is connected
    if($dbcon->connect_error)
    {
        die("Error : ".$dbcon->connect_error);
    }

    //signup function
    function signup($fullname,$username,$password)
    {
        global $dbcon;
        $sql="INSERT INTO `user` (`user_id`, `username`, `fullname`, `password`) VALUES ('', '$username', '$fullname', '$password')";
        $result=$dbcon->query($sql);
        if($result===true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //performing signup
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username=$_POST['username'];
        $fullname=$_POST['fullname'];
        $password=$_POST['password'];

        if($username=="")
        {
            echo json_encode(array("error"=>true,"message"=>"Please Provide Username"));
        }
        else if(signup($fullname,$username,$password))
        {
            echo json_encode(array("error"=>false,"message"=>"Data save in database"));
        }
        else
        {
            echo json_encode(array("error"=>true,"message"=>"Same data not allows"));
        }
        
    }
    else
    {
        echo json_encode(array("error"=>true,"message"=>"Only POST Method allows"));
    }
    

