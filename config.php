<?php

$sname="localhost";
$uname="root";
$password="";
$dbname="scrap";
  
$conn= mysqli_connect($sname,$uname,$password,$dbname);
if($conn)
{
    //echo "connection successfull";
    
}
else
{
    echo "connection failed";

}
?>