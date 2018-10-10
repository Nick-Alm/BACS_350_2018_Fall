<?php

    // Connect to the database
    require_once 'note_db.php';
    $db = notes_connect();


    // Delete all records
    if (clear_notes($db, 'index.php')) {
        header("Location: index.php");
    }

?>
