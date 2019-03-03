
<?php

if(!empty($messageToUser)) {
    echo $messageToUser;
}
?>
<form action="create-account" method="post">
    <p> <label for="username">Username: </label><input type="text" name="username" required/><br />
        <label for="password">Password: </label><input type="password" name="password" required/><br />
        <label for="role">Role: </label><br /><input type="radio" name="role" value='1'>Administrator</input><br />
        <input type="radio" name="role" value="2">Editor</input><br />
        <input type="radio" name="role" value="3" checked>Reviewer</input><br />
    </p>
    <p><input type="submit" class="normal" name="createaccount" value="Create Account"> </p>
</form>
