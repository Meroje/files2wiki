<?php
require('lib/list_pages.php');
//List the pages
$data = list_pages();
$increment = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Wiki::Home</title>
  </head>
  <body>
    <p>
  <?php foreach($data['Names'] as $name): /*Explore the array*/ ?>
  <a href="view.php?id=<?php echo $data['Id'][$increment]; ?>"><?php echo $name; ?></a> [<a href="edit.php?id=<?php echo $data['Id'][$increment]; ?>">Edit</a>]<br /> <!--Display title with edit link-->
  <?php $increment++; ?>
  <?php endforeach; ?>
  <br /><a href="new.php">Create a new page</a><br />
    </p>
  </body>
</html>
