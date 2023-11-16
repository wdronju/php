<?php

// readfile();
// file_exists();
// copy();
// rename();
// mkdir();
// rmdir();
// unlink();
// filesize();
// filetype();
// realpath();
// pathinfo();
// dirname();
// basename();


$file = "newfile.txt";

if(file_exists($file)){
    echo readfile("newfile.txt");
    copy($file, "extrafile.txt");
    rename("extrafile.txt", "ronju.txt");
    unlink("ronju.txt");

}
else{
    echo "file not exist.";
};

?>


