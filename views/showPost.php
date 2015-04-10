<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Arf | view all animal posts</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Custom styles for this template -->
        <link href="../assets/css/app.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style='padding: 20px;'>
        <style>
            td, th {
                padding: 5px;
            }
        </style>
        <h1>showing the animal post</h1>
        <a href='../index.php' class='btn btn-default'>back to home page</a>
        
        <?php

            $server_name = "127.0.0.1";
            $user_name = "root";
            $password = "dasier256";
            $db_name = "myDB";

            // get id of post to show (sent via the form)
            $post_id_to_show = $_POST['post_id'];

            try {
                $connection = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $connection->prepare("SELECT pet_name, species, breed, pet_from, pet_bio "
                        . "FROM animal_posts WHERE id = $post_id_to_show");
                $sql->execute();

                // specify that the returned array is an associative array
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

                // get the row for the post image
                $row = $sql->fetch();
                echo "<h1>Name: " . $row['pet_name'] . "</h1>";
                echo "<h2>Species: " . $row['species'] . "</h2>";
                echo "<h2>Breed: " . $row['breed'] . "</h2>";
                echo "<h2>Sheltered or homed: " . $row['pet_from'] . "</h2>";
                echo "<h2>Pet bio: " . $row['pet_bio'] . "</h2>";
                
                $stmt = $connection->prepare("SELECT image_file_path FROM animal_post_images "
                        . "WHERE post_id = $post_id_to_show");
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                
                while ($row = $stmt->fetch()) {
                    echo "<img src=\"" . $row['image_file_path'] . "\">";
                }
                
                

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
