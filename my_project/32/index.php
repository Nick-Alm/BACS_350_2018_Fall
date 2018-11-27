<?php
    // Start the page
    require_once 'views.php';
    require_once 'auth.php';
 
    $site_title = 'BACS 350 - Index of Project 32';
    $page_title = 'Login';
    begin_page($site_title, $page_title);
    // Page Content
    //echo '<p><a href="pagelog.php">Page Log</a></p>';
    $state = logged_in();
    echo "<h1>State: $state</h1>";


    echo '<h2>Login</h2>';
    echo '<form action="login.php" method="post">
                <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                <br><br>
                <p><label>Password:</label> &nbsp; <input type="password" name="password"></p>
                <br>
                <p><input type="submit" value="Login"/></p>
                <br>
                <input type="hidden" name="action" value="create">
           </form>';

    echo '<h2>Register User</h2>';
    echo '<form action="register.php" method="post">
                <p><label>Email:</label> &nbsp; <input type="text" name="email"></p>
                <br><br>
                <p><label>Password:</label> &nbsp; <input type="password" name="password"></p>
                <br><br>
                <p><label>First:</label> &nbsp; <input type="text" name="first"></p>
                <br><br>
                <p><label>Last:</label> &nbsp; <input type="text" name="last"></p>
                <br><br>
                <p><input type="submit" value="Register"/></p>
                <input type="hidden" name="action" value="create">
            </form>';
    


    
    

    //echo '<p><a href="index.php?action=clear" class="btn">Clear Log</a></p>';
    end_page();
?>