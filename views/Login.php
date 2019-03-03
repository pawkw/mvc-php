<?php
    if(!empty($messageToUser)) {
        echo $messageToUser;
    }
?>

<form action="login" method="post">
    <p> <label for="username">Username: </label><input type="text" name="username" required/><br />
        <label for="password">Password: </label><input type="password" name="password" required/><br />
    </p>
    <p><input type="submit" class="normal" name="login" value="Log in"> </p>
</form>
