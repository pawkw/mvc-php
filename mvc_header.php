<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?php
            echo $mvc_page['label'] ?></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <header>
                <h1>The Web Site</h1>
                <h3><?php echo $mvc_page['label']; ?></h3>
                <form class="" action="index.php" method="post">
                    <input type="submit" name="logout" class="logout" value="Log out">
                </form>
            </header>
            <?php require_once 'nav.php'; ?>
            <div class="content">
