<?php

    // Connect to the database
    require_once 'subscriber_db.php';
    $db = subscribers_connect();

    $id = filter_input(INPUT_GET, 'id');

    // Delete all records
    if (delete_subscriber($id, $db, 'index.php')) {
        header("Location: index.php");
    }

?>
