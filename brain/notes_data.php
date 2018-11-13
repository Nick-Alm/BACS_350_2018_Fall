<?php

    require_once 'views.php';
    require_once 'db.php';
    require_once 'log.php';

    $page = 'notes.php';


    /************************/
    /*      D A T A         */
    /************************/

    // Add a new record
    function add_note() {
        try {
            $title = filter_input(INPUT_POST, 'title');
            $body = filter_input(INPUT_POST, 'body');
            date_default_timezone_set("America/Denver");
            $date = date('Y-m-d g:is a');
            $query = "INSERT INTO notes (title, body, date) VALUES (:title, :body, :date);";
            global $db;
            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':body', $body);
            $statement->bindValue(':date', $date);
            $statement->execute();
            $statement->closeCursor();
            global $page;
            header("Location: $page");
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error: $error_message</p>";
            die();
        }
    }


    // Delete Database Record
    function delete_note($id) {
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'id');
        if ($action == 'delete' and !empty($id)) {
            $query = "DELETE from notes WHERE id = :id";
            global $db;
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
        }
        global $page;
        header("Location: $page");
    }
    

    // Lookup Record using ID
    function get_note($id) {
        $query = "SELECT * FROM notes WHERE id = :id";
        global $db;
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $record = $statement->fetch();
        $statement->closeCursor();
        return $record;
    }


    // Query for all notes
    function query_notes () {
        $query = "SELECT * FROM notes";
        global $db;
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }


    // Update the database
    function update_note () {
        $id    = filter_input(INPUT_POST, 'id');
        $title = filter_input(INPUT_POST, 'title');
        $body  = filter_input(INPUT_POST, 'body');
        date_default_timezone_set("America/Denver");
        $date  = date('Y-m-d g:is a');
        
        // Modify database row
        $query = "UPDATE notes SET title = :title, body = :body, date = :date WHERE id = :id";
        global $db;       
        $statement = $db->prepare($query);

        $statement->bindValue(':id', $id);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':body', $body);
        $statement->bindValue(':date', $date);

        $statement->execute();
        $statement->closeCursor();
        
        global $page;
        header("Location: $page");
    }


    /************************/
    /*      V I E W S       */
    /************************/

    // Show form for adding a record
    function add_note_view() {
        global $page;
        return '
            <div class="card">
                <h3>Add note</h3>
                <form action="' . $page . '" method="post">
                    <p><label>Title:</label> &nbsp; <input type="text" name="title"></p>
                    <p><label>Body:</label> &nbsp; <textarea name="body"></textarea></p>
                    <p><input type="submit" value="Add Note"/></p>
                    <input type="hidden" name="action" value="create">
                </form>
            </div>
        ';
    }


    // Show form for adding a record
    function edit_note_view($record) {
        $id    = $record['id'];
        $name  = $record['name'];
        $email = $record['email'];
        global $page;
        return '
            <div class="card">
                <h3>Edit note</h3>
                <form action="' . $page . '" method="post">
                    <p><label>Title:</label> &nbsp; <input type="text" name="title" value="' . $name . '"></p>
                    <p><label>Body:</label> &nbsp; <textarea name="body">' . $name . '</textarea></p>
                    <p><input type="submit" value="Save Record"/></p>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="' . $id . '">
                </form>
            </div>
        ';
    }


    // Handle all action verbs
    function render_notes_view() {
        $id = filter_input(INPUT_GET, 'id');
        global $notes;
        global $log;
        global $db;
        
        // POST
        $action = filter_input(INPUT_POST, 'action');
        if ($action == 'create') {    
            $log->log('note CREATE');                    // CREATE
            add_note();
        }
        if ($action == 'update') {
            $log->log('note UPDATE');                    // UPDATE
            update_note ();
        }

        // GET
        $action = filter_input(INPUT_GET, 'action');
        if (empty($action)) {                                  
            $log->log('note READ');                      // READ
            return note_list_view(query_notes());
        }
        if ($action == 'add') {
            $log->log('note Add View');
            return add_note_view();
        }
        if ($action == 'delete') {
            $log->log('note DELETE');                    // DELETE
            return delete_note($id);
        }
        if ($action == 'edit' and ! empty($id)) {
            $log->log('note Edit View');
            return edit_note_view(get_note($id));
        }
    }


    // render_table -- Create a bullet list in HTML
    function note_list_view ($table) {
        global $page;
        $s = '<div class="card">';
        $s .= render_button('Add note', "$page?action=add") . '<br><br>';
        $s .= '<table>';
        $s .= '<tr><th>Title</th><th>Bodys</th></tr>';
        foreach($table as $row) {
            $edit = render_link($row[1], "$page?id=$row[0]&action=edit");
            $email = $row[2];
            $delete = render_link("delete", "$page?id=$row[0]&action=delete");
            $row = array($edit, $email, $delete);
            $s .= '<tr><td>' . implode('</td><td>', $row) . '</td></tr>';
        }
        $s .= '</table></div>';
        
        return $s;
    }


?>
