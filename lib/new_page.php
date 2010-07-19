<?php
function new_page($protect, $title, $content)
{
  global $new_id;
  $dir = 'pages';

  $dirs_list = glob($dir.'/*');

  //Variables declaration
  $ids = array();
  $increment = 0;

  foreach($dirs_list as $name)
  {
    if(is_dir($name))
    {
      $id = explode('/', $name);
      $ids[$increment] = $id[1];
      $increment++;
    }
  }

  $new_id = max($ids) + 1;
  $new_dir = mkdir($dir.'/'.$new_id);
  $dir = $dir.'/'.$new_id;

  if($protect == "locked")
  {
    $lock_file = fopen($dir.'/protect', 'w+');
    fclose($lock_file);
  }

  file_put_contents($dir.'/title.txt', $title);
  file_put_contents($dir.'/content.txt', $content);

  /* Save this for future reset */
  $timestamp = time();
  $save_dir = mkdir($dir.'/save');
  $time_dir = mkdir($dir.'/save'.$timestamp);

  $dir = $dir.'/save'.$timestamp;

  file_put_contents($dir.'/title.txt', $title);
  file_put_contents($dir.'/content.txt', $content);
}