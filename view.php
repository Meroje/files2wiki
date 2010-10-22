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
            <?php echo $data['Title']; ?>
        </title>
    </head>
    <body>
        <h1>
            <?php echo $data['Title']; ?>
            <?php if (!file_exists('pages/'.intval($_GET['id']).'/protect')): ?>
            [<a href="edit.php?id=<?php echo $_GET['id']; ?>">Edit</a>]
            <?php endif; ?>
        </h1>
        <p>
            <?php if (!file_exists('pages/'.intval($_GET['id']).'/protect')): ?>
            [<a href="restaure.php?id=<?php echo $_GET['id']; ?>">History</a>]
            <?php endif; ?>
            <br/>
            <br/>
            <?php echo $data['Content']; ?>
            <br/>
        </p>
    </body>
</html>
