<?php
/**
 * Lists all pages
 * @return array $datas
 */
function list_pages()
{
  global $datas;
  $dir = "pages";

  $subdirs = glob($dir.'/*');
  asort($subdirs); //Alphabetical sorting

  //Variabless declaration
  $names = array();
  $ids = array();
  $increment = 0;

  foreach($subdirs as $link) //Start the listing process
  {
    if(is_dir($link)) //If it's a directory, not a file
    {
      $id = explode('/', $link);
      $ids[$increment] = $id[1]; //Page's id = Dirctory's name

      $title = $link.'/title.txt';
      $open_title = fopen($title, 'r');
      $read_title = fread($open_title, filesize($title));

      $names[$increment] = $read_title; //Put the page's title in the corresponding array

      $increment++;
    }
  }
  
  return $datas = array('Names' => $names,
                 'Id'    => $ids);
}