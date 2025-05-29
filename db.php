<?php

/* 
connect first ...
 */

// db.php
function getDB() {
    $db = new PDO('sqlite:/Applications/MAMP/db/sqlite/rdl.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

?>