<?php
    require '../connect.php';
    session_start();
    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
    } else {
        $status = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">MyBlog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Admin</a>
                    </li>
                </ul>
                <?php
                
                    if ($status == 'login') { ?>
                        <form class="form-inline my-2 my-lg-0">
                            <a href="/logout.php" class="btn btn-light ml-2 my-2 my-sm-0">Logout</a>
                        </form>

                        <?php
                    } else { ?>

                        <form class="form-inline my-2 my-lg-0">
                            <a href="/login.php" class="btn btn-light my-2 my-sm-0">Login</a>
                            <a href="/register.php" class="btn btn-light ml-2 my-2 my-sm-0">Register</a>
                        </form>

                    <?php
                    }
                ?>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Ini Judul Blog
                    </div>
                    <div class="card-body">
                        Ini konten blog
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>