<?php

    // Connect to the database
    require_once 'album_db.php';
    require_once 'album.php';
    $db = albums_connect();


    // Pick out the inputs
    $name = filter_input(INPUT_GET, 'album');
    $artist = filter_input(INPUT_GET, 'artist');
    $artwork = filter_input(INPUT_GET, 'artwork');
    $purchase_url = filter_input(INPUT_GET, 'purchase_url');
    $description = filter_input(INPUT_GET, 'description');
    $review = filter_input(INPUT_GET, 'review');
    
    
    // Add record
    add_album($db, $name, $artist, $artwork, $purchase_url, $description, $review, 'index.php');

?>
