<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'Brain';
    $page_title = 'Notes';
    begin_page($site_title, $page_title);


    // Page Content

    

    // Use subscriber code
    require_once 'note_views.php';
    require_once 'note_db.php';


    // Connect the appropriate database
    $db =  notes_connect();


    // View for listing subscribers
    render_list(query_notes($db));


    // Form view to add subscriber
    add_note_form();


    // Button to clear
    echo '<a href="delete.php">Reset Note</a>';

        
    // End the page
    end_page();
?>