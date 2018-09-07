<?php

    // Connect to the database
    require_once 'db.php';


    echo '<h2>Delete Test User</h2>';


    // Modify database row
    $query = "DELETE from subscribers WHERE name = 'Test User'";

    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();


    // Display subscriber records
    require 'select.php';

?>
