<?php
require_once './connection.php';

function get_all_records ( $connection,  $table ) {
    $sql = " SELECT * FROM $table ";
    return mysqli_query($connection, $sql);
}

