<?php

    // Setup a page title variable
    $page_title = "Add a Subscriber";

    // Include the page start
    include 'header.php';
?>

    <h2>Enter Your Information Below</h2>

    <form action="insert.php" method="post">
        <label>Name:</label>
        <input type="text" name="my_name">
        <br>
        <label>Email:</label>
        <input type="text" name="my_email">
        <input type="submit" value="Save"/>
    </form>

<?php
    // Include the page end
    include 'footer.php';
?>
