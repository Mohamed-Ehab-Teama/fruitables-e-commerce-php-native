<?php
require_once './connection.php';

function get_all_records ( $connection,  $table ) {
    $sql = " SELECT * FROM $table ";
    return mysqli_query($connection, $sql);
}



function get_all_records_from_column ( $connection, $table1 ,  $column,  $value){
    $sql = " SELECT * FROM $table1 WHERE $column = '$value' ";
    return mysqli_query ( $connection, $sql );
}




function get_all_records_from_two_tables( $connection, $table1 , $table2 , $column1, $column2  ){
    $sql = " SELECT * FROM $table1 INNER JOIN $table2 ON $column1 = $column2 ";
    return mysqli_query ( $connection, $sql );
}


function get_all_records_from_two_tables_on_check ( $connection, $table1 , $table2 , $column1, $column2 , $check , $value ){
    $sql = " SELECT * FROM $table1 INNER JOIN $table2 ON $column1 = $column2 WHERE $check = '$value' ";
    return mysqli_query ( $connection, $sql );
}

