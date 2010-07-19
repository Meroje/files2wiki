<?php
require ('lib/view_page.php');

if (!isset($_GET['id'])) {
    echo 'You must provide an id !';
    exit;
}
$data = view_page(intval($_GET['id']));
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>
            <?= $data['Title']?>
        </title>
    </head>
    <body>
        <h1>
            <?= $data['Title']?>
            <? if (!file_exists('pages/'.intval($_GET['id']).'/protect')): ?>
            [<a href="edit.php?id=<?= $_GET['id'] ?>">Edit</a>]
            <? endif; ?>
        </h1>
        <p>
            <? if (!file_exists('pages/'.intval($_GET['id']).'/protect')): ?>
            [<a href="restaure.php?id=<?= $_GET['id'] ?>">History</a>]
            <? endif; ?>
            <br/>
            <br/>
            <?= $data['Content']?>
            <br/>
        </p>
    </body>
</html>
