<?php

// $servername='localhost';
// $username ='root';
// $password ='';
// $dbname ='school';

// $conn = mysqli_connect($servername, $username,$password,$dbname);
// if (!$conn){

//     die("connection fail :".mysqli_connect());
    
// }
// else{

//     echo "Connection successfull";
// }


$connection = mysqli_connect('localhost','root','','school');

if(mysqli_connect_errno()){

    die('Database connection fail'.mysqli_connect_error());
}
else{

    //echo "connected";
}


?>