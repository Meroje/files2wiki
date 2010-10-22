<?php
require ('lib/edit_page.php');
require ('lib/view_page.php');

if (!isset($_GET['id'])) {
    echo 'You must provide an id !';
    exit;
}
if (! empty($_POST['title']) && ! empty($_POST['content'])) {
    if ($_POST['title'] != $_POST['title_old']) {
        $edit_title = htmlspecialchars($_POST['title']);
    } else {
        $edit_title = NULL;
    }
    if ($_POST['content'] != $_POST['content_old']) {
        $edit_content = nl2br(htmlspecialchars($_POST['content']));
    } else {
        $edit_content = NULL;
    }
    if (!file_exists('pages/'.intval($_GET['id']).'/protect')) {
        edit_page(intval($_GET['id']), $edit_title, $edit_content);
    } else {
        echo 'Editing is forbidden !';
        exit;
    }
    $edited = TRUE;
} else {
    $edited = FALSE;
    if (file_exists('pages/'.intval($_GET['id']).'/protect')) {
        echo 'Editing is forbidden !';
        exit;
    }
    $data = view_page(intval($_GET['id']));
    $data['Content'] = str_replace('<br />', '', $data['Content']);
}
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Wiki::Edit</title>
    </head>
    <body>
        <?php if ($edited): ?>
        <p>
            Page edited !
            <br/>
            <a href="view.php?id=<?php echo $_GET['id']; ?>">View the page</a>
        </p>
        <?php else : ?>
        <form method="post" action="edit.php?id=<?php echo $_GET['id']; ?>">
            <label for="title">
                Titre : 
            </label>
            <br/>
            <input type="text" name="title" id="title" value="<?php echo $data['Title']; ?>" /><input type="hidden" name="title_old" value="<?php echo $data['Title']; ?>" />
            <br/>
            <label for="content">
                Content : 
            </label>
            <br/>
            <textarea name="content" id="content" rows="10" cols="100">
<?php echo $data['Content']; ?>
            </textarea>
            <input type="hidden" name="content_old" value="<?php echo $data['Content']; ?>" />
            <br/>
            <input type="submit" value="Edit the page !" />
        </form>
        <?php endif; ?>
    </body>
</html>