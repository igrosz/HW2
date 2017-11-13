<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Quality Stationary</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="items.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addItem.php">Add items (admin only)</a>
                </li>
            </ul>
            <?php if (!empty($_SESSION['username'])) : ?>
            <div class="my-2 my-lg-0">
                <span class="navbar-text">Logged in as <?= $_SESSION['username'] ?></span>
                <a class="btn btn-outline-success my-2 my-sm-0" href="logout.php">Logout</a>
            </div>
            <?php endif ?>
        </div>
    </nav>
    <div class="jumbotron">
    <div class="container text-center">
            <h1>Quality Stationary</h1>
        </div>
    </div>
    <div class="container">