<?php

    /*
        add_note_form -- Create an HTML form to add record.
    */

    function add_note_form() {
        
        echo '
            <div class="card">
                <h3>Add Note</h3>
            
                <form action="insert.php" method="get">
                    <p><label>Title:</label> &nbsp; <input type="text" name="title"></p>
                    <p><label>Body:</label> &nbsp; <textarea name="body"></textarea></p>
                    <p><input type="submit" value="Save Note"/></p>
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
                <h3>Notes</h3> 
                <ul>
            ';
        foreach ($list as $s) {
            $display_date = date_create($s['date']);
            $display_string = $display_date->format('D, M d, Y');
            echo '<li>' . '<b><label>Note Title: </label></b>' . $s['title'] .  '<br>' . 
                        '<b><label>Date Created: </label></b>' . $display_string .  '<br>' .
                        '<b><label>Body:         </label></b>'. '<br>'.
                        '<p>' .$s['body'] .'</p>' . '</li>';
        }
        echo '
                </ul>
            </div>';
    
    }
    

?>