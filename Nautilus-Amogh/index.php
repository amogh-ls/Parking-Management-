<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautilus | Home Page</title>

    <link rel="shortcut icon" href="assets/LOGO.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

</head>

<body id="body">
    <!-- Header -->
    <header class="border border-bottom-2 bg-header">
        <nav class="navbar navbar-expand">
            <div class="container">
                <span class="navbar-brand d-flex flex-row">
                    <img src="assets/LOGO.jpg" alt="Company Logo" id="logo">
                    <div class="d-flex flex-column mt-5 text-secondary ml-4">
                        <h3 class="text-light"> MAGNUM GROUP OF COMPANIES</h3>
                        <h5 class="text-light">
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
                    <h2 class="nav-link h2 m-0 p-0">
                        PARKING LOT
                    </h2>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="admin/index.php" class="nav-link">
                        <i class="fa fa-user"></i> Admin
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <section class="mt-0 py-5 bg-img">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 pt-4 border-right border-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-light rounded-lg w-75 mx-auto">
                                    <p class="text-center text-light font-weight-bolder h4">CONTACT US</p>
                                    <div class="d-flex flex-column align-items-center">
                                        <h5 class="h5 text-center font-weight-bolder text-secondary">NAUTILUS</h5>
                                        <img src="assets/LOGO1.png" alt="" style="width: 30px; height: 30px;">
                                        <h6 class="h6 text-center font-weight-bolder text-secondary">We Choose U Right
                                            Choice</h6>
                                        <ul class="list-group mt-3">
                                            <li
                                                class="list-unstyled border-bottom-thick mb-4 pb-2 text-center text-dark">
                                                <i class="fa fa-map-marker d-block text-center fa-2x text-danger"></i>
                                                Prabhat
                                                Nagar, Honnavar
                                                (U.K.)
                                            </li>
                                            <li
                                                class="list-unstyled border-bottom-thick mb-4 pb-2 text-center text-dark">
                                                <i class="fa fa-phone d-block text-center fa-2x text-danger"></i>
                                                7022817636 | 7026189050
                                            </li>
                                            <li class="list-unstyled mb-4 pb-2 text-center text-dark"><i
                                                    class="fa fa-envelope d-block text-center fa-2x text-danger"></i>
                                                nautilus.ak@gmail.com
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-5 border-right border-light">
                    <div class="text-center m-t-110">
                        <a href="register-entry.php"
                            class="btn btn-danger font-weight-bolder mx-3 my-3 bg-btn p-2 text-secondary px-3">ENTRY</a>
                        <a href="pre-exit.php"
                            class="btn btn-danger font-weight-bolder mx-3 my-3 bg-btn p-2 text-secondary px-3">EXIT</a>
                    </div>
                </div>
                <div class="col-md-4 pt-4">
                    <p class="text-center text-light font-weight-bolder h4">COMPLAINTS</p>
                    <div class="d-flex flex-column align-items-center">
                        <form action="">
                            <div class="form-group">
                                <input type="text" name="" id="" class="form-control" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <input type="email" name="" id="" class="form-control" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <textarea name="" id="" cols="30" rows="6" class="form-control"
                                    placeholder="Complaint"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-btn text-secondary">SUBMIT</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

    <footer>
        <div class="container">
            <p class="text-center text-light mt-5 fixed-bottom bg-dark mb-0 p-2">Copyright &copy; 2020 - All Rights
                Reserved
                -
                MAGNUM IT
                PARK</p>
        </div>
    </footer>

    <script src="js/jquery/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>