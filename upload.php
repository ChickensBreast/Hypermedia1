
<?php
	if(isset($_POST["submit"])) {
		$file = $_FILES["file"];

		$fileName = $_FILES["file"]["name"];
		$fileTmpName = $_FILES["file"]["tmp_name"];
		$fileSize = $_FILES["file"]["size"];
		$fileError = $_FILES["file"]["error"];
		$fileType = $_FILES["file"]["type"];

		$fileExt = explode(".", $fileName);
		$extension = strtolower(end($fileExt));

		$allowed = array("jpg", "png", "jpeg"); 

		if (in_array($extension, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 1024000) { // en kB
					$fileNameNew = uniqid('', true).".".$extension;
					$fileDestination = "uploads/".$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					header("Location: pagePhoto.html?uploadsucess");
				}
				else {
					echo "Fichier trop volumineux.";
				}
			}
			else {
				echo "Erreur de televersement.";
			}
		}
		else{
			echo "Type de fichier non-accepte";
		}
	}
?>


<!--
<?php

$host = "localhost";
	$user = "root";
	$pass = "root";
	$conn = mysql_connect($host, $user, $pass);
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $filename);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>
-->