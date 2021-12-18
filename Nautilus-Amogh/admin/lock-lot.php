<?php
    session_start();
    
    if(isset($_GET['lock-lot-status'])) {
        unset($_SESSION['admin']);
        header('location: index.php?lock-status=1');
    }

    if(!isset($_SESSION['admin'])) {
        header('location: index.php?admin-must-login');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Lock Lot</title>

    <link rel="shortcut icon" href="assets/LOGO.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/util.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Header -->
    <header class="border border-bottom-2 bg-header">
        <nav class="navbar navbar-expand">
            <div class="container">
                <span class="navbar-brand d-flex flex-row">
                    <img src="../assets/LOGO.jpg" alt="Company Logo" id="logo">
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <h2 class="nav-link text-secondary h2 m-0 p-0">
                        Lock Lot
                    </h2>
                </li>


            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="lock-lot.php?lock-lot-status=1" class="nav-link"><i
                            class="fa fa-unlock mr-2"></i>Unlock</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="mt-0 py-5 bg-img">
        <div class="container-fluid">
            <div class="w-50 mx-auto">
                <div class="container my-3">
                    <div class="text-center">
                        <h1 class="display-1 text-light my-4">Lock <h1>
                                <h3 class="h2 text-light">Due to Construction the Lot is closed...</h3>
                                <h3 class="h2 text-light">Sorry for Inconvinence...</h3>
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