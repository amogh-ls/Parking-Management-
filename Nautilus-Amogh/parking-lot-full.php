<?php
    session_start();

    if(count($_SESSION['arr']) < $_SESSION['max_size']) {
        $_SESSION['parking-alert'] = 1;
        header('location: register-entry.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautilus | Parking Lot Full</title>

    <link rel="shortcut icon" href="assets/LOGO.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
    body {
        overflow-x: hidden;
        overflow-y: hidden;
    }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="border border-bottom-2 bg-header">
        <nav class="navbar navbar-expand">
            <div class="container">
                <span class="navbar-brand d-flex flex-row">
                    <img src="assets/LOGO.jpg" alt="Company Logo" id="logo">
                    <div class="d-flex flex-column mt-5 text-light ml-2">
                        <h3> MAGNUM GROUP OF COMPANIES</h3>
                        <h5>
                            <p>THE COMPLETE SOFTWARE SOLUTION</p>
                        </h5>
                    </div>
                </span>
            </div>
        </nav>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <h2 class="nav-link text-danger h2 m-0 p-0">
                        WARNING...!
                    </h2>
                </li>
            </ul>
        </div>
    </nav>

    <section class="mt-0 py-5 bg-img">
        <div class="container-fluid">
            <div class="w-50 mx-auto">
            <div class="container my-3">
                <div class="text-center">
                    <h1 class="display-1 text-light my-4">FULL..!<h1>
                            <h3 class="h2 text-light">Parking Lot has been Completely Filled...</h3>
                            <h3 class="h2 text-light">Sorry for Inconvinence...</h3>
                            <h4 class="h4 text-light">Refresh by Pressing Below Button</h4>
                </div>

                <div class="text-center">
                    <a href="parking-lot-full.php" class="btn bg-btn font-weight-bolder text-secondary"><i class="fa fa-refresh mx-2"></i>REFRESH</a>
                </div>
            </div>
    </section>

    <footer class="bg-dark pb-2">
        <div class="container">
            <p class="text-center text-light bg-dark mb-0 p-2 pt-0">Copyright &copy; 2020 - All Rights
                Reserved
                -
                MAGNUM IT
                PARK</p>
        </div>
    </footer>
</body>

</html>