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
            table {
                margin-top: 10px;
            }
        </style>
        <h1>index of all animal posts</h1>
        <a href='../index.php' class='btn btn-default'>back to home page</a>
        
        <?php

            $server_name = "127.0.0.1";
            $user_name = "root";
            $password = "dasier256";
            $db_name = "myDB";

            try {
                $connection = new PDO("mysql:host=$server_name;dbname=$db_name", $user_name, $password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $connection->prepare("SELECT id, pet_name, species, breed FROM animal_posts");
                $sql->execute();

                // specify that the returned array is an associative array
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

                echo "<table class='table'><tr><th>Post ID</th><th>Pet name</th>"
                . "<th>Pet species</th><th>Pet breed</th></tr>";

                // for each row in the whole table
                while ($row = $sql->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['pet_name'] . "</td>";
                    echo "<td>" . $row['species'] . "</td>";
                    echo "<td>" . $row['breed'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

            } catch (PDOException $e) {
                $error_log = fopen("../assets/error_log.txt", "w");
                fwrite($error_log, $e->getMessage());
                fclose($error_log);
            }
        ?>
        
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
</html>
