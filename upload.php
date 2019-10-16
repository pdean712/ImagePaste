<?php
        //Check if the file is well uploaded
        if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }
        
        $extension = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
        
        $mimetype = exif_imagetype($_FILES['file']['tmp_name']);
        
        if (exif_imagetype($_FILES['file']['tmp_name'])) {
        // Upload file. 
        // Ensure img directory exists
        
        mkdir('img/', 0755);
        $random_file_name = substr(md5(rand()), 0, 7);
        $result = move_uploaded_file($_FILES['file']['tmp_name'], "img/$random_file_name.$extension");
        
        if($result)
        {
        echo
        "<body>
        <center>
        <img src='img/$random_file_name.$extension'/>
        <br>
        
        <a href='img/$random_file_name.$extension'>link</a>
        <pre>$mimetype</pre>
        </center>
        </body>";
        }

        } else

        {
        echo "$mimetype";
        }

?>
