<?php
	require '../connect.php';
	
	session_start();
    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
    } else {
        header('Location: ../login.php');
	}
	
	$sql = "SELECT blogs.id, blogs.title, blogs.content, users.name, users.email FROM blogs INNER JOIN users ON blogs.user_id = users.id";
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

    <section class="py-5">
        <div class="container">
			<a href="../admin/create-blog.php" class="btn btn-primary mb-2">Create a New Blog</a>
            <table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
					<th scope="col">ID</th>
					<th scope="col">Penulis</th>
					<th scope="col">Title</th>
					<th scope="col">Content</th>
					<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
					while ($row = $result->fetch_assoc()) { ?>
							<tr>
								<th scope="row"><?php echo $row['id'] ?></th>
								<td>
                                    <?php echo $row['name'] ?> <br>
                                    <?php echo $row['email'] ?>
                                </td>
								<td><?php echo $row['title'] ?></td>
								<td><?php echo substr($row['content'], 0, 30) ?> ....</td>
								<td>
									<a href="edit-blog.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
									<a href="delete-blog.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>

						<?php
					}

					?>
				</tbody>
				</table>
        </div>
    </section>
</body>
</html>