# mvc-php
An MVC template for PHP websites.

Currently, logging in creates a token in the database, which is not erased when logging out. This creates an ad hoc logging system. The authorization token is encoded with an sha1 hash.

Passwords are encoded with Bcrypt.

The database user and password is in classes/Database.php

There is a sql, mvc_php.sql dump with a user:
username: admin
password: admin

## Adding a page

To add a page:
- Add the route to Routes.php:
```php
Route::set('categories', true, function() {
    Categories::CreateView('Categories');
});
```
- The first parameter is the URL and the second is a boolean saying whether or not the page should be included in the navigation menu, the third is the name of the view. The class (Categories in this case) created in the function should have the same name as the view.
- Make a Contoller in the Controllers folder:
```php
class Categories extends Controller {

}
```
- Any post handling should be done in the controller.
- Database queries are handled by the Database class in classes/Database.php.
- Make a View in the Views folder, a template is in template.php.
- At the moment, the create-account path is open. This will be closed when Manage Users is finished.

That's it for now. There is still a lot of work to do.
