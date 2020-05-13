<!DOCTYPE html>
<html lang="fr-CA">
    <head>
        <title>
            Photo
        </title>
        <meta name="viewport" content="width=device=width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script type="dist/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="fichier.js"></script>
        <link rel="stylesheet" href="dist/css/bootstrap.css">	
        <link rel=stylesheet href="style.css">

    </head>
    <body>
        <header>
            <div id="header"> </div>
        </header>	

        <main>
        	<?php 
        	   	include_once('/classes/Image.class.php');
            	include_once('/classes/ImageDAO.class.php');
	            if(!isset($_SESSION)) {
	 			   session_start();
				}
            	$dao = new ImageDAO();
            	$liste = $dao->findAllMyImage($_SESSION["id"]);
            	$a = implode(",",$liste);
            	echo "<div class='conteneur' style='border:2px solid black'>";
            	foreach($liste as $photo) {
            		echo "<figure style='border:2px solid black'><img src='".$photo->getUrl()."'/><br/><figurecaption>".$photo->getNom()."</figurecaption></figure>";
            	}
            	echo "</div>";
            ?>
            <div class="conteneur-upload">
            	
            <form class="form-vertical" method="post" enctype="multipart/form-data">
                <h2>Upload File</h2>
                <div class="form-group">
                <label for="fileSelect"> <span style="color:red">Choisir votre fichier * </span>:</label>
                <input class="form-control" type="file" name="file" id="fileSelect">


                <input class="form-control" type="submit" name="submit" value="Upload">
                <p><strong>Note:</strong> Seulement .jpg, .jpeg, .gif, .png de taille maximum de 1024000kB (1000mB).</p>
            </div>
            <div>
                <input class="form-control" type="checkbox" name="public" value="Publier publiquement" checked>
                <label for="checked" style="align-self: end;"> <span style="color: red">*Publication publique</span></label>
            </div>
            </form>
            </div>

            <?php 
            include_once('/classes/Image.class.php');
            include_once('/classes/ImageDAO.class.php');
      		if(!isset($_SESSION)) {
 			   session_start();
			}      
            $dao = new ImageDAO();
            if (isset($_POST["submit"])) {
                $file = $_FILES["file"];
                $fileName = $_FILES["file"]["name"];
                $fileTmpName = $_FILES["file"]["tmp_name"];
                $fileSize = $_FILES["file"]["size"];
                $fileError = $_FILES["file"]["error"];
                $fileType = $_FILES["file"]["type"];

                $fileExt = explode(".", $fileName);
                $extension = strtolower(end($fileExt));

                $allowed = array("jpg", "png", "jpeg");
                if (isset($_POST["public"])) {
                    $protection = 0;
                } else {
                    $protection = 1;
                }

                if (in_array($extension, $allowed)) {
                    if ($fileError == 0) {
                        if ($fileSize < 1024000) { // en kB
                            $fileNameNew = uniqid('', true) . "." . $extension;
                            $fileDestination = "uploads/" . $fileNameNew;
                            $newPhoto = new Image($fileExt[0], $fileDestination, $protection);
                            $dao->create($newPhoto);
                            move_uploaded_file($fileTmpName, $fileDestination);
                            echo "<script> alert('Téléversement de la photo complete" . $fileName . "'); window.location.replace('pagePhoto.php');</script>";
                            // //header("Location: pagePhoto.html?uploadsucess");
                        } else {
                            echo "<script> alert('Fichier trop volumineux.'); window.location.replace('pagePhoto.php');</script>";
                        }
                    } else {
                    	$a = 'Erreur de televersement. ';
                    	switch ($fileError) {

                    		case 0:
                    			echo "<script> alert('".$a." ".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    			break;
                    		case 1:
                    			echo "<script> alert('".$a." The uploaded file exceeds the upload_max_filesize directive in php.ini".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    			break;
                    		case 2:
                    			echo "<script> alert('".$a." The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    			break;
                    		case 3:
                    			echo "<script> alert('".$a." The uploaded file was only partially uploaded".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    			break;
                    		case 4:
                    			echo "<script> alert('".$a." No file was uploaded".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    			break;
                    		case 5:
                    			echo "<script> alert('".$a." Missing a temporary folder".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    			break;
                    		case 6:
                    			echo "<script> alert('".$a." The uploaded file was only partially uploaded".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    			break;
                    		case 7:
                    			echo "<script> alert('".$a." Failed to write file to disk".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    			break;
                    		case 8:
                    			echo "<script> alert('".$a." A PHP extension stopped the file upload".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    			break;
                    		default:
                    			echo "<script> alert('".$a." ".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    			break;
                    	}
                    	echo "<script> alert('Erreur de televersement.".$fileError."'); window.location.replace('pagePhoto.php');</script>";
                    }
                } else {
            		echo "<script> alert('Type de fichier non-accepte'); window.location.replace('pagePhoto.php');</script>";

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
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if file was uploaded without errors
                if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["photo"]["name"];
                    $filetype = $_FILES["photo"]["type"];
                    $filesize = $_FILES["photo"]["size"];

                    // Verify file extension
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed))
                        die("Error: Please select a valid file format.");

                    // Verify file size - 5MB maximum
                    $maxsize = 5 * 1024 * 1024;
                    if ($filesize > $maxsize)
                        die("Error: File size is larger than the allowed limit.");

                    // Verify MYME type of the file
                    if (in_array($filetype, $allowed)) {
                        // Check whether file exists before uploading it
                        if (file_exists("upload/" . $filename)) {
                            echo $filename . " is already exists.";
                        } else {
                            move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $filename);
                            echo "Your file was uploaded successfully.";
                        }
                    } else {
                        echo "Error: There was a problem uploading your file. Please try again.";
                    }
                } else {
                    echo "Error: " . $_FILES["photo"]["error"];
                }
            }
            ?>
            -->
        </main>

        <footer>
            <div id="footer"></div>
        </footer>
    </body>
</html>