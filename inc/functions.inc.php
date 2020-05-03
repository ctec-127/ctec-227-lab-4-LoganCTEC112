<?php
if (isset($_GET['file'])) {
    copy('images/uploads/' . $_GET['file'], 'images/temp/' . $_GET['file']);

    if (unlink("images/uploads/" . $_GET['file'])) {
        header('Location: imagegallery.php');
    } else {
        echo '<p>I could not delete that file for you :(</p>';
    }
}
function display_images(){
    $dir = "images/uploads";
    if (is_dir($dir)) {
        if ($dir_handle = opendir($dir)) {
            while ($filename = readdir($dir_handle)) {
                // To ignore Mac's DS_Store
                if (!is_dir($filename) && $filename != '.DS_Store') {
                    echo "<div class=\"pic mb-5\"><a href=\"imagegallery.php?file=$filename\"><svg id=\"trashcan\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M9 19c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5-17v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712zm-3 4v16h-14v-16h-2v18h18v-18h-2z\"/></svg></a>";
                    echo "<img src=\"images/uploads/$filename\" alt=\"A photo\" height=\"250\"  width=\"300\"></div>";

                }
            } 
            closedir($dir_handle);
        }
    } 
}