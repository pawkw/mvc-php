<?php

// page URL, add to nav menu?, nav label, function

Route::set('index.php', false, 'Home', function() {
    Index::CreateView('Login');
});

Route::set('login', false, 'Log In', function() {
    Login::CreateView('Login');
});

Route::set('create-account', false, 'Create Account', function() {
    CreateAccount::CreateView('CreateAccount');
});

Route::set('manage-users', true, 'Manage Users', function() {
    ManageUsers::CreateView('ManageUsers');
});

$mvc_page = Route::isValid($_GET['url']);
require_once 'mvc_header.php';
if($mvc_page !== false) {
    call_user_func($mvc_page['function']);
} else {
    include_once '404.php';
}

require_once 'mvc_footer.php';
