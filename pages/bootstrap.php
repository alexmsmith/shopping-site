<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Mobile-first -->
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  </head>
  <body>
      <div class="container">
        <div class="row">
          <div class="col-sm-2" style="background-color:lavender;">.col</div>
          <div class="col-sm-8" style="background-color:orange;">
            <h1 class="display-4">My First Bootstrap Page</small></h1>
          </div>
          <div class="col-sm-2" style="background-color:lavender;">.col</div>
        </div>
        <div class="row">
          <div class="col-sm-2" style="background-color:lavender;">.col</div>
          <div class="col-sm-8" style="background-color:orange;">
            <h1>Keyboard <small>Inputs</small></h1>
            <p>To indicate input that is typically entered via the keyboard, use the kbd element:</p>
            <p>Use <kbd>ctrl + p</kbd> to open the Print dialog box.</p>
          </div>
          <div class="col-sm-2" style="background-color:lavender;">.col</div>
        </div>
        <div class="jumbotron">
          <h1>Bootstrap Tutorial</h1>
          <p>Bootstrap is the most popular HTML, CSS...</p>
        </div>
        <div class="alert alert-success alert-dismissable fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> Indicates a successful or positive action.
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Apple</button>
          <button type="button" class="btn btn-primary">Samsung</button>
          <button type="button" class="btn btn-primary">Sony</button>
        </div>
        <div class="btn-group-vertical">
          <button type="button" class="btn btn-primary">Apple</button>
          <button type="button" class="btn btn-primary">Samsung</button>
          <button type="button" class="btn btn-primary">Sony</button>
        </div>
        <button type="button" class="btn btn-primary">
          Messages <span class="badge badge-light">4</span>
        </button>
        <span class="badge badge-pill badge-success">New!</span>
      </div>
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Photos</a></li>
        <li class="breadcrumb-item"><a href="#">Summer 2017</a></li>
        <li class="breadcrumb-item"><a href="#">Italy</a></li>
        <li class="breadcrumb-item active">Rome</li>
      </ul>
      <div class="card" style="width:400px">
        <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title">John Doe</h4>
          <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
          <a href="#" class="btn btn-primary">See Profile</a>
        </div>
      </div>
      <a class="navbar-brand" href="#">
        <img src="../images/circuit_board_logo.png" alt="logo">
      </a>
      <h2 style="color: white";>The-Tech-Store</h2>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <!-- Brand/logo -->

        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item" style="margin-left: 20px;">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Shopping</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </nav>
  </body>
</html>
