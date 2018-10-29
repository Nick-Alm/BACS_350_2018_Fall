<?php

    /*
        add_note_form -- Create an HTML form to add record.
    */

    function add_album_form() {
        
        echo '
            <div class="card">
                <h3>Add An Album</h3>
            
                <form action="insert.php" method="get">
                    <p class="form_item"><label>Album Name:    </label> &nbsp; <input type="text" name="album"></p>
                    <p class="form_item"><label>Artist:        </label> &nbsp; <input type="text" name="artist"></p>
                    <p class="form_item"><label>Artwork:       </label> &nbsp; <input type="text" name="artwork"></p>
                    <p class="form_item"><label>Purchase Link: </label> &nbsp; <input type="text" name="purchase_url"></p>
                    <p class="form_item"><label>Description:   </label> &nbsp; <textarea name="description"></textarea></p>
                    <p class="form_item"><label>Review:        </label> &nbsp; <textarea name="review"></textarea></p>
                    <p class="form_item"><input type="submit" value="Save Album"/></p>
                </form>
            </div>
            ';
        
    }


    /*
        render_simple_page -- Create the HTML page.
    */

    function render_simple_page($title, $text) {
        
        echo "<h1>$title</h1><p>$text</p>";
    }


    /*
        render_list -- Loop over all of the notes to make a bullet list
    */
 
    function render_list($list) {

        echo '
            <div class="card">
                <h3>Albums</h3> 
                <ul>
            ';
        foreach ($list as $s) {
            $name = $s['name'];
            $artist = $s['artist'];
            $artwork = $s['artwork'];
            $purchase_url = $s['purchase_url'];
            $description = $s['description'];
            $review = $s['review'];
            echo '<div class="card">';
            echo  '<b><label>Album Title: </label></b>' . $name .  '<br>' . 
                        '<b><label>Artist: </label></b>' . $artist .  '<br>' .
                        '<b><label>Artwork: </label></b><br><img src=' . $artwork . ' class="album_img"><br>' .
                        '<b><label>Purchase Link: </label></b><a href="' . $purchase_url .  '">Purchase Site<a/><br>' .
                        '<b><label>Description: </label></b>' . $description .  '<br>' .
                        '<b><label>Review: </label></b>' . $review .  '<br>';
            echo '</div>';
        }
        echo '
                </ul>
            </div>';
    
    }
    

?>