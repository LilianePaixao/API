<?php

function execute_connection($connect, $sql)
{
    try {
        if (!$mysqli = mysqli_query($connect, $sql)) {
            printf("Houve problema na conexão. Tente novamente mais tarde. Error: %s\n", mysqli_connect_error());
        } 
        else {
            return $mysqli;
        }
    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    } 
    return FALSE;
}