<?php

    /* -------------------------------
        DB CONNECT
    ------------------------------- */

    // Connect to the remote database
    function remote_connect() {

        $port = '3306';
        $dbname = 'qydwprmy_albums';
        $db_connect = "mysql:host=localhost:$port;dbname=$dbname";
        $username = 'qydwprmy_nickalm';
        $password = 'password';
        return db_connect($db_connect, $username, $password);

    }


    // Local Host Database settings
    function local_connect() {

        $host = 'localhost';
        $dbname = 'albums';
        $username = 'root';
        $password = '';
        $db_connect = "mysql:host=$host;dbname=$dbname";
        return db_connect($db_connect, $username, $password);

    }


    // Open the database or die
    function db_connect($db_connect, $username, $password) {
        
        // echo "<h2>DB Connection</h2><p>Connect String:  $db_connect, $username, $password</p>";
        try {
            $db = new PDO($db_connect, $username, $password);
            // echo '<p><b>Successful Connection</b></p>';
            return $db;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }

    }


    // Open the database or die
    function albums_connect() {
        
        $remote = ($_SERVER['SERVER_NAME'] == 'qyd.wpr.mybluehost.me');
        if ($remote) {
            return remote_connect();
        } 
        else {
            return local_connect();
        }
        
    }


?>
