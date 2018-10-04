<?php

    // Start the page
    require_once 'views.php';

    $site_title = 'MVC Project';
    $page_title = 'MVC Project - Nick Alm';
    begin_page($site_title, $page_title);

    require 'db.php';


    // Your page content goes here

    // Include other content
    require 'pattern.html';


    // End the page
    end_page();

?>
