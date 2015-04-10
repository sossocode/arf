
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

  <body style='padding-top: 50px; padding-bottom: 20px;'>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Arf Pet Connections</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" role="Search">
            <form class="navbar-form navbar-left" action="controllers/simpleSearch.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." 
                           name="search_term">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>This is the vertical prototype for group 9 for CSc 648/848 for the Spring 2015 semester.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>View list of all posts</h2>
          <p>This is for debugging purposes only, specifically for the CSc 648 vertical prototype.</p>
          <p><a class="btn btn-default" href="views/showPostsIndex.php" role="button">view posts index</a></p>
        </div>
        <div class="col-md-4">
          <h2>View a particular post</h2>
          <p>Enter in the id of a post and hit submit. You can see the index of all the posts by clicking the 'view posts index' button to the left.</p>
          <form action="views/showPost.php" method='POST' class='form-inline'>
              <div class='form-group'>
                <input type='text' name='post_id' class='form-control' placeholder='Enter post ID...'>
                <button type="submit" class="btn btn-default">Submit</button>
              </div>
          </form>
       </div>
        <div class="col-md-4">
          <h2>Create a post</h2>
          <p>Click on the button below to create your own animal post.</p>
          <p><a class="btn btn-default" href="views/newPost.html" role="button">add post form</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2015</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>
