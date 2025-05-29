// keeping it by seperately creating it for running once.

<?php
  $db = new SQLite3('/Applications/MAMP/db/sqlite/rdl.db');
  $db->exec("CREATE TABLE IF NOT EXISTS visitors (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE
)");
 
?>
