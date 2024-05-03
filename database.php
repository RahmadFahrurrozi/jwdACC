<?php 

$connectdb = mysqli_connect("localhost","root","","umbulbening");

function query($query) {
    global $connectdb;
    $result = mysqli_query($connectdb, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

