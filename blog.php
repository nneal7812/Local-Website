<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        .blog-content {
            width: 50%;
            margin: auto;
            border: solid medium;
        }

    </style>
</head>
<body align="center">
    <?php
    $file = fopen("blog.txt", "r");

    if (!$file) {
        exit("Cannot open blog.txt<br/>");
    }

    //creates entries in array for blog post content
    $entries = [];
    $entry = "";
    while (($line = fgets($file)) !== false) {
        if (trim($line) == "---" || feof($file)) {
            $entries[] = $entry;
            $entry = "";
        } else {
            $entry .= $line;
        }
    }

    fclose($file);

    //displays blog post content
    for ($i = count($entries) - 1; $i >= 0; $i--) {
        $fields = explode("^", $entries[$i]);

        print("<h1>$fields[1]</h1>");
        print("<h2>by $fields[0] on $fields[4]</h2>");

        if (isset($fields[3])) {
            print("<img src='$fields[3]' alt='Blog Image'>");
        }

        print("<div class='blog-content'>$fields[2]</div>");
    }
    ?>
</body>
</html>
