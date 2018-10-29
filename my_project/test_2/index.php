<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Album Manager';
    $page_title = 'Test 2';
    begin_page($site_title, $page_title);
 

    // Use album code
    require_once 'album_views.php';
    require_once 'album_db.php';
    require_once 'album.php';


    // Connect the appropriate database
    $db =  albums_connect();


    // View for listing albums
    render_list(query_albums($db));


    // Form view to add album
    add_album_form();

        
    // End the page
    end_page();
?>