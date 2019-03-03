<?php

class ManageUsers extends Controller {
    public static function CreateView($viewName) {
        $user = userValidated();
        if(!isset($user)) {
            echo 'Something is wrong.';
            die();
        }
        $query = DataBase::query('SELECT role FROM users WHERE ID=:user', array(':user'=>$user));
        // 0 is root, 1 is administrator, 2 is editor, 3 is reviewer.
        $admin = ($query[0]['role'] < 2);
        $messageToUser = ($admin ? '' : '<p class="warning">You are not authorized to manage user accounts.</p>');
        require_once "./views/$viewName.php";
    }
}
