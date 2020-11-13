<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm p-4">
    <img src="assets/big-library.svg" width="50" height="50" alt="Big Library" class="mr-2" loading="lazy">
    <a class="navbar-brand h1" href="index.php">Big Media Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php
                if ( isset($_SESSION['user' ]) =="" ) {
                    echo('<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>');
                }
            ?>
        </ul>
        <?php
            if (isset($_SESSION['user'])) {
                echo('<img src="'. $userRow['userImage' ] .'" height="40px" alt="'. $userRow['userEmail' ] .'" class="mx-3">');
                echo('<span class="text-white">'. $userRow['userEmail' ] .'</span>');
                echo('<a class="btn btn-light btn-sm mx-4" href="logout.php?logout">Logout</a>');
            }
        ?>
    </div>
</nav>