<?php
    ob_start();
    session_start();
    require_once 'actions/db_connect.php';

    // if session is not set this will redirect to login page
    if( !isset($_SESSION['user' ]) ) {
        header("Location: index.php");
        exit;
    }

    // select logged-in users details
    $res=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <title>Big Media Library</title>
    </head>
    <body class="bg-light">

    <?php include('navbar.php'); ?>
    <div class="d-flex justify-content-center">
        <img src="assets/header.jpg" alt="Big Media Library" class="img-fluid shadow rounded-lg mt-4">
    </div>

    <div class="container">
        <h2 class="mt-5 text-center">Welcome to the Big Media Library</h2>
        <div class="row">
            <div class="col-12 text-center">
                <a class="btn btn-primary m-2" href="create.php">Add new media</a>
            </div>
        </div>
        <div class="row mb-5 alert alert-primary pb-4 rounded-lg">

            <?php
                $sql = 'SELECT * FROM media';
                $result = $connect->query($sql);

                if($result->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        printf('
                            <div class="col-md-4 pt-4">
                                <div class="bg-white border p-2 rounded-lg">
                                    <h3 class="text-center">%s</h3>
                                    <h4 class="text-center">%s</h4>
                                    <p class="text-center">Type: %s</p>
                                    <p class="text-center"><sup>ISBN-%s<br> %s, %s</sup></p>
                                    <p><img src="%s" class="img-fluid rounded-lg"></p>
                                    <div class="alert alert-secondary" role="alert">
                                        <h4>Description</h4>
                                        <p>%s</p>
                                    </div>
                                    <p class="text-center">
                                        <a class="btn btn-primary m-2" href="update.php?id=%s">Edit media</a>
                                        <a class="btn btn-danger m-2"  href="delete.php?id=%s">Delete media</a>
                                    </p>
                                </div>
                            </div>',
                            $row['title'], $row['author'], $row['media_type'], $row['isbn_code'], $row['publisher'], $row['publish_date'], $row['image'], $row['short_description'], $row['media_id'], $row['media_id']);
                    }
                } else {
                    echo('<div class="alert alert-danger text-center" role="alert"><h3>No meals in database</h3></div>');
                }
            ?>

        </div>
    </div>

    <?php include('footer.php'); ?>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>
</html>
<?php ob_end_flush(); ?>