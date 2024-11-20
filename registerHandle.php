<?php 

require_once './connection.php';


if (!$connection)
{
    $_SESSION['error'] = "Connection Went Wrong ";
    header('location:register.php');
    die();
}



if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    // Making Variables
    foreach ( $_POST as $key => $value )
    {
        $$key = $value;
    }
    // echo $name . "<br>" . $email . "<br>" . $password . "<br>" . $confirmPassword;


    // Check if empty:
    if ( empty($name) or empty($email) or empty($password) or empty($confirmPassword) )
    {
        $_SESSION['error'] = "Fields cannot be Empty";
        header('location:register.php');
        die;
    }


    // Sanitize fields
    $name = htmlentities( htmlspecialchars( $name ) );
    $email = htmlentities( htmlspecialchars( $email ) );
    $password = htmlentities( htmlspecialchars( $password ) );
    $confirmPassword = htmlentities( htmlspecialchars( $confirmPassword ) );


    // Check if email is a valid email:
    if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) )
    {
        $_SESSION['error'] = "Please, Enter a valid Email";
        header('location:register.php');
        die;
    }



    // Sanitize Email:
    $email = filter_var( $email , FILTER_SANITIZE_EMAIL );



    // Check if email exists:
    $sql = 'SELECT * FROM users' ;

    $result = mysqli_query( $connection, $sql );

    $emails = [];

    if ( mysqli_num_rows($result) > 0 )
    {
        
        while ($row = mysqli_fetch_assoc($result))
        {
            $emails[] = $row['email'];
        }

        foreach( $emails as $DBemail ){
            if ( $DBemail == $email )
            {
                $_SESSION['error'] = "Email is Existed";
                header('location:register.php');
                die;
            }
        }
        
    }


    // Chcek if password match eachother:
    if ( $password != $confirmPassword )
    {
        $_SESSION['error'] = "Password and its Confirm must be the same";
        header('location:register.php');
        die;
    }


    // Encrypt Password
    $password = md5($password);


    // Store Data in DB:
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password') ";

    if (mysqli_query($connection, $sql)) {
        $_SESSION['success'] = "Account Created Successfully";
        header('location:register.php');
        die;
    } else {
        $_SESSION['error'] = "Something Went Wrong";
        header('location:register.php');
        die;
    }




}else{
    echo$_SESSION['error'] = " Method Problem ";
    header('location:register.php');
    die;
}