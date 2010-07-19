<?php
function view_page($id) {
    global $data;
    $dir = "pages/$id";
    
    if (is_dir($dir)) {
        $title = file_get_contents($dir.'/title.txt');
        $content = file_get_contents($dir.'/content.txt');
        
        $data = array('Title'=>$title, 'Content'=>$content);
        
        return $data;
    } else {
        return $data = NULL;
    }
}
