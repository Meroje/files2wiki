<?php
function edit_page($id, $title = NULL, $content = NULL) {
    $dir = 'pages/'.$id;
    if ($title != NULL) {
        file_put_contents($dir.'/title.txt', $title);
    }
    if ($content != NULL) {
        file_put_contents($dir.'/content.txt', $content);
    }
    
	/* Save this for future reset */
    $timestamp = time();
    $time_dir = mkdir($dir.'/save/'.$timestamp);
    file_put_contents($dir.'/save/'.$timestamp.'/title.txt', $title);
    file_put_contents($dir.'/save/'.$timestamp.'/content.txt', $content);
}
