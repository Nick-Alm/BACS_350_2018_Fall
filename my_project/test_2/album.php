<?php
        require_once 'album_db.php';
        // $db = albums_connect();
        // Add a new record
        function add_album($db, $name, $artist, $artwork, $purchase_url, $description, $review, $success) {

            // Show if insert is successful or not
            try {
    
                // Add database row
                $query = "INSERT INTO albums (name, artist, artwork, purchase_url, description, review) VALUES (:name, :artist, :artwork, :purchase_url, :description, :review);";
                $statement = $db->prepare($query);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':artist', $artist);
                $statement->bindValue(':artwork', $artwork);
                $statement->bindValue(':purchase_url', $purchase_url);
                $statement->bindValue(':description', $description);
                $statement->bindValue(':review', $review);
                $statement->execute();
                $statement->closeCursor();
    
                header("Location: $success");
                //echo '<p><b>Insert successful</b></p>';
    
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "<p>Error: $error_message</p>";
                die();
            }
            
        }

        function query_albums ($db) {

            $query = "SELECT * FROM albums";
            $statement = $db->prepare($query);
            $statement->execute();
            return $statement->fetchAll();
    
        }
?>