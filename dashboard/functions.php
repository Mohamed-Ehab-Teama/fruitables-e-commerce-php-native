<?php

require_once '../connection.php';


function get_user_data ( $connection , $id )
{
    $sql = "SELECT * FROM  users WHERE id = '$id' ";
    return mysqli_query( $connection, $sql );
}


function get_all_data_from_table ($connection, $table) {
    $sql = " SELECT * FROM $table ";
    return mysqli_query( $connection, $sql );
}



function get_all_data_from_2_table ( $connection, $table1 , $table2 , $col1 , $col2 , $orderBY){
    $sql = " SELECT * FROM $table1 JOIN $table2 ON $table1.$col1 = $table2.$col2 ORDER BY $orderBY ";
    return mysqli_query( $connection, $sql );
}