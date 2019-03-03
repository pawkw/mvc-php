<?php

class Controller extends Database {

    public static function CreateView($viewName) {
        // Accessed through index.php, so we are not going up a directory.
        require_once "./views/$viewName.php";
    }
}
