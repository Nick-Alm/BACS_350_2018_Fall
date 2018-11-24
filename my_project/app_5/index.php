<?php
    // Start the page
    require_once 'requirements.php';
 
    $site_title = 'BACS 350 - Index of Project 31';
    $page_title = 'Music Album Manager';
    begin_page($site_title, $page_title);
    // Page Content
    echo '<p><a href="pagelog.php">Page Log</a></p>';
    
    
    //TODOS ------------------------------------------------------------------------------------------------------------
    $log->log_page("project/31/index.php");
    // Add record from form
    $albums->handle_actions();
    $log->handle_actions();
    // Show the add form
    $albums->add_view();
    //TODOS ------------------------------------------------------------------------------------------------------------


    
    // Clear the list by sending "action" of "clear" to this view
    echo '<p><a href="index.php?action=clear" class="btn">Clear Log</a></p>';
    end_page();
?>