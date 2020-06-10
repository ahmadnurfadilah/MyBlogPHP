<?php
    require '../connect.php';
    session_start();
    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
    } else {
        $status = false;
    }

    $sql = "SELECT blogs.id, blogs.title, blogs.content, blogs.image , users.name, users.email FROM blogs INNER JOIN users ON blogs.user_id = users.id ORDER BY blogs.created_at DESC";
    $result = $conn->query($sql);
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
            <?php
            while ($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <?php
                        
                        if ($row['image'] == NULL || $row['image'] == '') { ?>
                            <img src="https://via.placeholder.com/600x300.png?text=Image" class="card-img-top" alt="...">
                        <?php
                        } else { ?>
                            <img src="/thumbnail/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
                        <?php
                        }
                        ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            <p class="card-text"><?php echo substr($row['content'], 0, 40) ?> ....</p>
                            <a href="/blog/show.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    
</body>
</html>