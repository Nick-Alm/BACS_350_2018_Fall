<?php
    $email    = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    echo "
        <a href='index.php'>Return to Main Page</a>
        <h1>Login Page<h1>
        <p>$email , $password</p>";
    
    require_once 'auth.php';
    require_once 'db.php';
    
    validate($db, $email, $password);
?>