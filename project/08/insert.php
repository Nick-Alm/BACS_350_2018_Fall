<?php

    $name = filter_input(INPUT_POST, 'my_name');
    $email = filter_input(INPUT_POST, 'my_email');

    // Connect to the database
    require_once 'db.php';


    echo '<h2>Add Subscriber</h2>';


    // Add database row
    $query = "INSERT INTO subscribers (name, email) VALUES (:name, :email);";

    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);

    $statement->execute();
    $statement->closeCursor();


    // Display subscriber records
    require 'select.php';

    echo '<a href="./index.php">Back to Project Page</a>'

?>
