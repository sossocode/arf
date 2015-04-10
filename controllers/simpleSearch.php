<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Arf | pet connection</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/app.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <a href="../index.php" class="btn btn-primary"
       style="margin-left: 10px; margin-top: 10px;">back</a>

    <?php

    $server_name = "127.0.0.1";
    $user_name = "root";
    $password = "dasier256";
    $db_name = "myDB";
    
    $search_term = $_POST['search_term'];

    try {
            $connection = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $connection->prepare("SELECT pet_name, species, breed, pet_from, pet_bio "
                    . "FROM animal_posts WHERE species = '$search_term'"
                    . "OR breed = '$search_term'"
                    . "OR pet_from = '$search_term'");
            $sql->execute();
            
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            echo "<table class='table'><tr><th>Pet name</th>"
                . "<th>Pet species</th><th>Pet breed</th><th>Homed or Sheltered</th>"
                    . "<th>Pet Bio</th></tr>";

                // for each row in the whole table
                while ($row = $sql->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['pet_name'] . "</td>";
                    echo "<td>" . $row['species'] . "</td>";
                    echo "<td>" . $row['breed'] . "</td>";
                    echo "<td>" . $row['pet_from'] . "</td>";
                    echo "<td>" . $row['pet_bio'] . "</td>";
                    echo "</tr>";
                }

            echo "</table>";
    
    } catch (PDOException $e) {
                echo $e;
    }
    ?>
</body>
</html>
