<?php

class Login extends Controller {
    public static function CreateView($viewName) {
        $messageToUser = '';
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = Database::query('SELECT * FROM users WHERE username=:username', array(':username'=>$username));
            if(!empty($query) && $query[0]["username"] == $username && $query[0]["inactive"] == false) {
                if(password_verify($password, $query[0]["password"])) {
                    $messageToUser .= "<p>Logged in!</p><p>{$_SERVER['REMOTE_ADDR']}";
                    $cstrong = true;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                    $query = Database::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id, NOW())',
                        array(':token'=>sha1($token), ':user_id'=>$query[0]['ID']));
                    // TODO: Set the second to last parameter to true for https.
                    setcookie("BKID", $token, time()+3600, '/', null, null, true);
                } else {
                    $messageToUser .= "<p class='warning'>Unable to log in: invalid credentials.</p>";
                }
            } else {
                $messageToUser .= "<p class='warning'>Unable to log in: invalid credentials.</p>";
            }
        }
        require_once "./views/$viewName.php";
    }
}
