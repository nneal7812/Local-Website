<?php

extract($_POST);

//file will append data to the blog.txt
//will need to clear blog.txt for use without duplicates
$file = fopen("blog.txt", "a");
$field[0] = "";
$field[1] = "";
$field[2] = "";
$field[3] = "";
$field[4] = date('m-d-y');

//test output and assigning to $field array
if (count($_POST) > 0)
{
    print("<h1>Post Data Follows:</h1>");

    for($i = 0; $i < count($_POST); $i++)
    {
        $ind = key($_POST);

        $data = $_POST[$ind];
        $field[$i] = $data;

        next($_POST);
    }
}

//uploading images to image folder in htdocs
if (count($_FILES)) {
    $target_dir = "images/blog/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    //Temporary file is moved to permanent file
    $res = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    if (!$res) {
        print("<h1>Problem uploading " . $target_file . "<h1>");
    } else {
        print("<h1>.$target_file." . "Uploaded Successfully</h1>");
    }

    $field[3] = $target_file;
}

//file operations (uses ^ as a delimeter for each part of an entry)
$str = $field[0] . "^" . $field[1] . "^" . $field[2] . "^" . $field[3] . "^" . $field[4];

if ($file)
{
    //writes to file and uses --- as a delimeter for multiple blog entries
    fwrite($file, $str."\r\n"."---"."\r\n");
}
else
{
    exit("Unable to open products.txt<br/>");
}

fclose($file);

//returns back to admin.html for consecutive uses
//will have to close out of admin.html in order to access other pages
echo '<meta HTTP-EQUIV="REFRESH" content ="0; url=admin.html">';