 <?php

    // Start the page
    $page_title = 'Subscriber Demo';
    require_once 'header.php';

    // Show the list after the insert
    require 'select.php';

    // Add a record
    echo '<form action="insert.php" method="get">
        
        <p><label>Name:</label> &nbsp; <input type="text" name="name"></p>
        <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
        <p><input type="submit" value="Add New Contact"/></p>
        
    </form>';

    // End the page
    require_once 'footer.php';

?>