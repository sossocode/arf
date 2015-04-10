<?php

// database variables
$server_name = "127.0.0.1";
$user_name = "root";
$password = "dasier256";

// values received from the form 
$pet_name = $_POST["pet_name"];
$species = $_POST["species"];
$breed = $_POST["breed"];
$pet_from = $_POST["pet_from"];
$pet_bio = $_POST["pet_bio"];

$image_file_1_path = "../images/" . basename($_FILES["post_image_1"]["name"]);

// get the image's MIME type
$imageFileType = pathinfo(image_file_1_path, PATHINFO_EXTENSION);

move_uploaded_file($_FILES["post_image_1"]["tmp_name"], $image_file_1_path);

/*list ($width, $height) = getimagesize($image_file_1_path);
echo "width: " . $width . " height: " . $height;

// create new, smaller image
$image_percent = 0.5;
$new_width = $width * $image_percent;
$new_height = $height * $image_percent;
$new_image = imagecreatetruecolor($new_width, $new_height);

// load image
if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
    $image = imagecreatefromjpeg($image_name_1);
} else if ($imageFileType == "gif") {
    $image = imagecreatefromgif($image_name_1);   
} else if ($imageFileType == "png") {
    $image = imagecreatefrompng($image_name_1);
}

// resize image
imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
    imagejpeg($new_image, $image_name_1);
} else if ($imageFileType == "gif") {
    imagegif($new_image, $image_name_1); 
} else if ($imageFileType == "png") {
    imagepng($new_image, $image_name_1);
}*/

// insert values into database
try {
    $connection = new PDO("mysql:host=$server_name;dbname=myDB", $user_name, $password);
    // set the PDO error mode to throw exceptions that we can catch
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // build sql statment to send to database
    $sql = "INSERT INTO animal_posts(pet_name, species, breed, pet_from, pet_bio)
        VALUES ('$pet_name', '$species', '$breed', '$pet_from', '$pet_bio');";
    
    // use exec() because no results are returned
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    
    // get the id of the post we just inserted into the animal_posts table
    $last_id = $connection->lastInsertId();
    
    // now add the images (with the associated post_id info) to the 
    // animal_posts_images table
    $sql = "INSERT INTO animal_post_images(image_file_path, post_id)"
            . "VALUES ('$image_file_1_path', '$last_id')";
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    
} catch (PDOEXCEPTION $e) {
    $error_log = fopen("../assets/error_log.txt", "w");
    fwrite($error_log, $e->getMessage());
    fclose($error_log);
}

// now, redirect back to home page
echo "<script>window.location = '../index.php'</script>";