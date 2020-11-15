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

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Add media | Big Library</title>

</head>
<body class="bg-light">

<?php include('navbar.php'); ?>

<div class="container my-4">
    <div class="row mt-3">
        <div class="col-8 offset-2 pt-2 alert alert-primary rounded-lg">
            <h3 class="mt-2 text-center">Add Media</h3>
            <form action="actions/a_create.php" method="post">
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formimage">Media Title</label></div >
                    <div class="col-md-8"><input class="form-control" type="text" name="formtitle"  placeholder="Enter title of media..." /></div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formimage">Image URL</label></div>
                    <div class="col-md-8"><input class="form-control" type="text" name="formimage" placeholder="Enter URL of image..." /></div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formauthor_first_name">Author First Name</label></div>
                    <div class="col-md-8"><input class="form-control" type="text" name="formauthor_first_name" placeholder="Enter the author's first name..." /></div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formauthor_last_name">Author Last Name</label></div>
                    <div class="col-md-8"><input class="form-control" type="text" name="formauthor_last_name" placeholder="Enter the author's last name..." /></div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formisbn_code">ISBN Code</label></div>
                    <div class="col-md-8"><input class="form-control" type="text" name="formisbn_code" placeholder="Enter ISBN code..." /></div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formshort_description">Short Description</label></div>
                    <div class="col-md-8"><input class="form-control" type="text" name="formshort_description" placeholder="Enter a short description..." /></div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formpublish_date">Publishing Year</label></div>
                    <div class="col-md-8"><input class="form-control" type="number" name="formpublish_date" placeholder="Enter publishing year..." /></div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formpublisher_name">Publisher Name</label></div>
                    <div class="col-md-8"><input class="form-control" type="text" name="formpublisher_name" placeholder="Enter publisher name..." /></div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formpublisher_address">Publisher Address</label></div>
                    <div class="col-md-8"><input class="form-control" type="text" name="formpublisher_address" placeholder="Enter publisher address..." /></div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formpublisher_size">Publisher Size</label></div>
                    <div class="col-md-8">
                        <select name="formpublisher_size" class="form-control" id="publisher_size">
                            <option selected>Choose publisher size...</option>
                            <option value="big">big</option>
                            <option value="medium">medium</option>
                            <option value="small">small</option>
                        </select>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4 text-right"><label for="formmedia_type">Media Type</label></div>
                    <div class="col-md-8">
                        <select name="formmedia_type" class="form-control" id="media_type">
                            <option selected>Choose media type...</option>
                            <option value="Book">Book</option>
                            <option value="CD">CD</option>
                            <option value="DVD">DVD</option>
                        </select>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8 text-center">
                        <button class="btn btn-primary m-2" type ="submit">Insert media</button>
                        <a class="btn btn-secondary m-2" href="index.php">Back to home</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div >

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>