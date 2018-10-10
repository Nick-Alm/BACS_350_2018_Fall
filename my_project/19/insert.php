<?php

    // Connect to the database
    require_once 'note_db.php';
    $db = notes_connect();


    // Pick out the inputs
    $title = filter_input(INPUT_GET, 'title');
    $date = date('YYYY-mm-dd');
    $body = filter_input(INPUT_GET, 'body');


    // Add record
    add_note($db, $title, $date, $body, 'index.php');

?>
