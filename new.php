<?php
if(!empty($_POST['title']) && !empty($_POST['content']))
{
  $submited = TRUE;
  
  $title = htmlspecialchars($_POST['title']);
  $content = nl2br(htmlspecialchars($_POST['content']));
  
  require('lib/new_page.php');
  
  if(isset($_POST['1']))
    $id = new_page(FALSE, $title, $content);
  if(isset($_POST['2']))
    $id = new_page(TRUE, $title, $content);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Wiki::New</title>
  </head>
  <body>
    <? if($submited): ?>
    <p>Your page has been created !<br />You can see it <a href="view.php?id=<?= $id ?>">here</a>.</p>
    <? else: ?>
    <form method="post" action="new.php">
      <label for="title">Title : </label><br />
      <input type="text" name="title" id="title" /><br />
      <label for="content">Content : </label><br />
      <textarea name="content" id="content" cols="100" rows="10"></textarea><br />
      <input type="submit" name="1" value="Create the page !" /><input type="submit" name="2" value="Create and lock the page !" />
    </form>
    <? endif; ?>
  </body>
</html>
