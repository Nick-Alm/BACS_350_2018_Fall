<?php
    $email    = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $first    = filter_input(INPUT_POST, 'first');
    $last     = filter_input(INPUT_POST, 'last');

    echo "
        <a href='index.php'>Return to Main</a>
        <p>$email , $password , $first , $last</p>";
    
    require_once 'auth.php';
    require_once 'db.php';
    
    register_user($db, $email, $password, $first, $last);
?>