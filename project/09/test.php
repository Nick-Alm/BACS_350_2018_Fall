<?php

    $page_title = "lesson 9 test";
    require 'header.php';

    // Decide on the domain and page to test
    $domain = "http://qyd.wpr.mybluehost.me";
    $page = "$domain/bacs_350/project/09/test.php";
    

    // Create a link for the page
    echo "<h2>Test Page for $page</h2>
        <p>Start simple but start now.</p>
        <p>Make sure that the page exists and has valid HTML.";

    echo '<h3>Page Exists</h3>
        <p><a href="' . $page . '">' . $page . '</a></p>';

    // Run your page through the validator
    echo '<h3>Valid HTML</h3>
        <p><a href="http://validator.w3.org">HTML Validator</a></p>';
    
    require 'footer.php';
?>