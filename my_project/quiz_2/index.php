<?php

    // Start the page
    require_once 'views.php';
 
    $site_title = 'BACS 350 - Quiz 2 Screenshots - Nick Alm';
    $page_title = 'Quiz 2';
    begin_page($site_title, $page_title);

    echo
    '<div class="card">
        <h1>Version Control Proficiency Demonstration</h1>
        <div class="note">
            <h3>A one note for clarification:</h3><br>
            For my local development environment, I have not placed my files directly into c:/xampp/htdocs.<br>
            I have done this because of disk size limitations on my C: drive.<br>
            I instead have my repo stored on a different drive and have XAMPP use this directory for the root directory for my site.<br>
            This is why my screenshot shows D:\Nick\Documents\web-root\BACS_350_2018_Fall instead of C:\xampp\htdocs.<br>
            The directory in my D drive is the correct directory for my local deployment.<br>
        </div>
        <h2>GitHub Page:</h2>
        <p><img  class="large_image" src="./github350repo.JPG" alt="GitHub Repo"/></p>
        <h2>Local Git Repo:</h2>
        <p><img src="./gitlocalrepo.JPG" alt="GitHub Local Repo"/></p>
        <h2>GitHub Desktop is Working:</h2>
        <p><img src="./githubdesktopworking.JPG" alt="GitHub Desktop"/></p>
        <h2>Git CLI Usage:</h2>
        <p><img class="large_image" src="./git_cli_history.JPG" alt="Git CLI"/></p>
        <h2>GitHub Desktop After Merging Upstream Changes:</h2>
        <p><img class="large_image" src="./githubdesktopaftermerge.JPG" alt="GitHub Repo"/></p>
    </div> ';

    end_page();