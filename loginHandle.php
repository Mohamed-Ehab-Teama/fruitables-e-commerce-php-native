<?php 

require_once './connection.php';


if (!$connection)
{
    $_SESSION['error'] = "Connection Went Wrong ";
    header('location:login.php');
    die();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    // Making Variables
    foreach ( $_POST as $key => $value )
    {
        $$key = $value;
    }
    // echo $email . "<br>" . $password ;




    // Check if empty:
    if ( empty($email) or empty($password) )
    {
        $_SESSION['error'] = "Fields cannot be Empty";
        header('location:login.php');
        die;
    }

    // Encrypt Password
    $password = md5($password);


    // Check if email and password are correct:
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'; " ;

    $result = mysqli_query( $connection, $sql );

    $row = mysqli_fetch_assoc($result);

    // echo $row['id'];
    // echo "<br>";
    // echo $row['name'];
    // echo "<br>";
    // echo $row['email'];
    // echo "<br>";
    // echo $row['password'];
    // die;

    
    if ( $row['email'] == $email and $row['password'] == $password )
    {

        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $row['id'];

        if ( $row['is_admin'] )
        {
            $_SESSION['admin'] = true;
            header('location:dashboard.php');
            die;
        }
        else{
            header('location:index.php');
            die;
        }

    }else{
        $_SESSION['error'] = " Incorrect Inputs ";
        header('location:login.php');
        die;
    }


        

        






}else{
    echo$_SESSION['error'] = " Method Problem ";
    header('location:login.php');
    die;
}