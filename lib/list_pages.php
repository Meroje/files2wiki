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
  foreach($subdirs as $link) //Start the listing process
  {
    if(is_dir($link)) //If it's a directory, not a file
    {
      $id = explode('/', $link);
      $ids[] = $id[1]; //Page's id = Directory's name

      $title = $link.'/title.txt';
      $read_title = file_get_contents($title);

      $names[] = $read_title; //Put the page's title in the corresponding array
    }
  }
  
  return $datas = array('Names' => $names,
                        'Id'    => $ids);
}