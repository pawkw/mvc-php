<?php

class CreateAccount extends Controller {
    public static function CreateView($viewName) {
        $messageToUser = '';
        if(isset($_POST['createaccount'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            // The colons are there so the names don't match the database columns.
            if(!Database::query('SELECT username FROM users WHERE username=:username',
               array(':username'=>$username))) {
                   if(preg_match('/^[a-zA-Z0-9_-]+$/', $username) && strlen($username)>2) {
                       Database::query('INSERT INTO users VALUES (\'\', :username, :password, :role, \'\')',
                           array(':username'=>$username, ':password'=>password_hash($password,
                           PASSWORD_BCRYPT), ':role'=>$role));
                       $messageToUser = '<p>Successfully created account.</p>';
                   } else {
                       $messageToUser = '<p class="warning">Could not create account: Invalid username '.$username.'.</p>';
                   }
               } else {
                   $messageToUser = '<p class="warning">Could not create account: Username already exists.</p>';
               }
        }
        require_once "./views/$viewName.php";
    }
}
