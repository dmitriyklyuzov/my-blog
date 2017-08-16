<!--The content below is only a placeholder and can be replaced.-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
  </head>

  <body>

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Admin Panel</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="#" onclick="event.preventDefault(); loadElement('users');">Dashboard</a></li>
            <li><a href="#" onclick="event.preventDefault(); loadElement('pages');">Pages</a></li>
            <li><a href="#" onclick="event.preventDefault(); loadElement('posts');">Posts</a></li>
            <li><a href="#" onclick="event.preventDefault(); loadElement('users');">Users</a></li>
          </ul> -->
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hi, Admin
                <span class="caret"></span>
              </a>
              
              <ul class="dropdown-menu">
                <li><a href="/logout">Log out</a></li>
                <li><a href="#" onclick="event.preventDefault(); loadElement('profile'); ">Profile</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> <!-- #main-navbar -->

    <section id="main">
      <div class="container">
        <div class="row">

          <!-- Left navbox -->
          <div class="col-md-3">

            <div class="list-group">
              <a href="#" onclick="event.preventDefault(); loadElement('overview');" class="list-group-item active">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="#" onclick="event.preventDefault(); loadElement('pages');" class="list-group-item">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Pages
                <span class="badge">3</span>
              </a>
              <a href="#" onclick="event.preventDefault(); loadElement('posts');" class="list-group-item">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts
                <span class="badge">3</span>
              </a>
              <a href="#" onclick="event.preventDefault(); loadElement('users');" class="list-group-item">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users
                <span class="badge">4</span>
              </a>
            </div>
            
            <!-- Statistics -->
            <div class="panel">
              <div class="panel-heading blue white-text">
                <h3 class="panel-title">Disk Usage</h3>
              </div>
              <div class="panel-body">
                <div class="progress">
                  <div class="progress-bar progress-bar-warning" role="progressbar"
                    aria-valuenow="85"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: 85%;">
                      85%
                  </div>
                </div>
              </div>
            </div>

            <div class="panel">
              <div class="panel-heading blue white-text">
                <h3 class="panel-title">Bandwidth Used</h3>
              </div>
              <div class="panel-body">
                <div class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar"
                    aria-valuenow="40"
                    aria-valuemin="0"
                    aria-valuemax="100"
                    style="width: 40%;">
                      40%
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Main content -->
          <div class="col-md-9">

            <!-- Overview panel -->
            <span id="overview-panel"></span>

            <!-- Main table panel -->
            <div class="panel">
              <div class="panel-heading panel-blue-white clearfix">
                <div class="col-md-11">
                  <h3 class="panel-title" id="main-panel-heading">Posts</h3>
                </div>
                <div class="col-md-1">
                  <!-- <button class="btn btn-default" type="button">Add new</button> -->
                  <a id="main-panel-add-link" data-toggle="modal" href="#"><span class="glyphicon glyphicon-plus white-text"></span></a>
                </div>
              </div>
              <div class="panel-body" id="main-panel-body">
                <app-post></app-post>
              </div>
            </div> <!-- main table panel -->

          </div> <!-- col-md-9 -->
        </div> <!-- row -->
      </div> <!-- container -->
    </section> <!-- main -->


    <!-- <footer class="footer" id="footer">
      <div class="container">
        <span class="text-muted">
          Admin Panel is a free to use, open source Bootstrap theme created by <a href="http://dkbk.us">Dmitriy Klyuzov</a>.
        </span>
      </div>
    </footer> -->

    <!-- Modals -->

    

    <!-- Bootstrap core JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/loadElement.js"></script>
    <script>

      // Disable element caching
      $.ajaxSetup({
        cache: false
      });

      // Automatically loads element on page load
      $(document).ready(function(){
        loadElement('overview');
      });

      // replaces the texterea input #post-editor with a ckeditor
      CKEDITOR.replace('post-editor');
      // replaces the texterea input #page-editor with a ckeditor
      CKEDITOR.replace('page-editor');
    </script>
  </body>
</html>