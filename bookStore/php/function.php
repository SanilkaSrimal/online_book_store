<?php


function emptyInputLogin($username,$password){


    $result;
    if(empty($username)||empty($password)){

        $result = true;



    }
    else{

        $result = false;


    }

    return $result;

}


function emptyInput($name,$email,$password,$cpassword){

    $result;
    if(empty($name)||empty($email)||empty($password)||empty($cpassword)){

        $result = true;



    }
    else{

        $result = false;


    }

    return $result;
}
function invalidname($name){

    $result;
    if(!preg_match("/^[a-zA-z0-9]*$/",$name)){

        $result = true;



    }
    else{

        $result = false;


    }

    return $result;
}
function invalidEmail($email){

    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $result = true;



    }
    else{

        $result = false;


    }

    return $result;
}
function passwordMatch($password,$cpassword){

    $result;
    if($password !== $cpassword){

        $result = true;



    }
    else{

        $result = false;


    }

    return $result;
}


function createUser($conn,$name,$email,$password){

   /* $sql = "INSERT INTO users (f_name,email,password) VALUES ('{$name}','{$email}','{$password}')";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepair($stmt,$sql)){

        header("Location:./signUp.php?error=stmtfailed");
        exit();



    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
    mysqli_stmt_bind_param($stmt,"sss",$name,$email,$hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:./signUp.php?error=none");
    exit();*/

    $query = "INSERT INTO users(f_name,email,password) VALUES('{$name}','{$email}','{$password}')";

    $result = mysqli_query($connection,$query);

    if($result){

       echo"1 record added";
    }
    else{

     echo"Database query failed";
    }
}

?>
