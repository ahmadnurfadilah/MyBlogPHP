<?php
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
    <title>My Blog - Ahmad</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">MyBlog - Brand</a>
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

    <div class="jumbotron">
        <div class="container">
            <?php
                if ($status == 'login') { ?>

                    <div class="alert alert-success">
                        Kamu telah login: <?php echo $_SESSION['email'] ?>
                    </div>

                <?php
                }
            ?>
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
</body>
</html>