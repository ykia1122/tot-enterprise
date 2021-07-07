<?php

function validateQuery($query){
    $query = htmlspecialchars($query);
    $query = mysql_real_escape_string($query);
    return $query;
}

?>