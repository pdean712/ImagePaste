<?php
	//Check if the file is well uploaded
	if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }
	
	//We won't use $_FILES['file']['type'] to check the file extension for security purpose
	
	//Set up valid image extensions
	$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
	
	//Extract extention from uploaded file
		//substr return ".jpg"
		//Strrchr return "jpg"
		
	$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
	//Check if the uploaded file extension is allowed
	
	if (in_array($extUpload, $extsAllowed) ) { 
	
	//Upload the file on the server
	
	// Ensure img directory exists
	mkdir('img/', 0755);
	//
        $random_file_name = substr(md5(rand()), 0, 7);
	//$name = "$dest_dir/{$_FILES['file']['tmp_name']}";
	$result = move_uploaded_file($_FILES['file']['tmp_name'], "img/$random_file_name.$extUpload");
	if($result)
	{
	echo 
	"<body>
	<body bgcolor=#ffffcc>
	<center>
	<img src='img/$random_file_name.$extUpload'/>
	<br>
	
	<a href='img/$random_file_name.$extUpload'>link</a>
	</center>
	</body>";
	}
		
	} else 
	
	{ 
	echo 'File is not valid. Please try again'; 
	}
	
?>
