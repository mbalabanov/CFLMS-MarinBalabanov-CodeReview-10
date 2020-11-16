<?php
    ob_start();
    session_start();
    require_once 'actions/db_connect.php';

    // it will never let you open admin page if session is set
    if( !isset($_SESSION['admin' ]) ) {
        header("Location: index.php");
        exit;
    }

    // select logged-in users details
    $res=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
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
        <img src="assets/user-admin.jpg" alt="Admin Area" class="img-fluid shadow rounded-lg mt-4">
    </div>

    <div class="container my-5">
        <div class="row my-3">
            <div class="col-12 text-center">
                <h2>Welcome to the Admin Area</h2>
            </div>
        </div>
        <div class="row my-3">
            <?php
            $sql = 'SELECT * FROM users';
            $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    printf('
                    <div class="col-md-6">
                        <div class="card m-2 p-4">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <img src="%s" class="card-img" alt="%s">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h4 class="card-title">%s<br>%s</h4>
                                        <span class="badge badge-pill badge-success mx-2">%s</span>
                                        <p class="card-text">
                                            <a class="btn btn-primary btn-sm m-2" href="adminupdate.php?id=%s">Edit user</a>
                                            <a class="btn btn-danger btn-sm m-2"  href="admindelete.php?id=%s">Delete user</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>',
                    $row['userImage'], $row['userName'], $row['userName'], $row['userEmail'], $row['userType'], $row['userId'], $row['userId']);
                }
            } else {
                echo('<div class="alert alert-danger text-center" role="alert"><h3>No users in database</h3></div>');
            }
        ?>
        </div>
    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>
</html>
<?php ob_end_flush(); ?>





