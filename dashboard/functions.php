<?php

require_once '../connection.php';


function get_user_data ( $connection , $id )
{
    $sql = "SELECT * FROM  users WHERE id = '$id' ";
    return mysqli_query( $connection, $sql );
}