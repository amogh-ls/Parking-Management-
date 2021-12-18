<?php
    session_start();

    if(!isset($_SESSION['admin'])) {
        heder('location: index.php?please-login');
    }

    if(isset($_SESSION['admin'])) {

        $adminName = $_SESSION['admin']['username'];
        $adminPassword = $_SESSION['admin']['password'];

        $conn = new mysqli('localhost', 'root', '', 'nautilus');
        if($conn) {
            $sql = "SELECT * FROM pricing";
            $result = $conn->query($sql);
            $data = $result->fetch_assoc();
            
            $small = $data['small'];
            $medium = $data['medium'];
            $large = $data['large'];

            include '../parking-session/session-array.php';
        }
    }


    if(isset($_POST['update'])) {
        $conn = new mysqli('localhost', 'root', '', 'nautilus');
        if($conn) {
            $small = $_POST['small'];
            $medium = $_POST['medium'];
            $large = $_POST['large'];
        $sql = "UPDATE `pricing` SET `small`= '$small', `medium`='$medium',`large`='$large' WHERE id=1;";
        $conn->query($sql);
        header('location:dashboard.php');
        }

    }
    

    if(isset($_GET['logout'])) {
        unset($_SESSION['admin']['username']);
        unset($_SESSION['admin']['id']);
        unset($_SESSION['admin']['password']);
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Nautilus</title>

    <link rel="shortcut icon" href="../assets/LOGO.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/util.css">
    <link rel="stylesheet" href="../css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <style>
    .none {
        display: none !important;
    }
    </style>
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

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="../index.php" class="nav-link"><i class="fa fa-home fa-2x"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <h2 class="h2 nav-link">ADMIN</h2>
                </li>
            </ul>

            <ul class="navbar-nav">
                <!-- Lock -->
                <li class="nav-item">
                    <a class="nav-link" href="lock-lot.php?lock=1" class="btn btn-outline-secondary mx-2"><i
                            class="fa fa-lock"></i> Lock</a>
                </li>

                <!-- Table Account -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="table.php" class="btn btn-outline-secondary mx-2"><i
                            class="fa fa-account"></i> Account</a>
                </li> -->

                <!-- Something -->
                <li class="nav-item">
                    <a class="nav-link" href="daily-account.php" class="btn btn-outline-secondary mx-2"><i
                            class="fa fa-calander"></i> Daily Account</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php?logout=1" class="btn btn-outline-secondary mx-2"><i
                            class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Admin section with Layout -->
    <section class="mt-0 pt-1 bg-img">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 pt-4 border-right border-secondary">

                </div>
                <div class="col-md-6 py-2 px-5 border-right border-secondary">
                    <h1 class="h1 text-center text-light  pb-3 "
                        style="border-bottom: 2px solid #fff; border-width: 50%;">Welcome <?php echo $adminName; ?>
                    </h1>

                    <h1 class="h4 text-center text-light">CURRENT PRICING</h1>
                    <table class="table my-2 border-0">
                        <thead class="" style="border-bottom: 1px solid #fff;  border-width: 50%;">
                            <tr>
                                <th class="text-center text-light border-right-thin">SMALL</th>
                                <th class="text-center text-light border-right-thin">MEDIUM</th>
                                <th class="text-center text-light">LARGE</th>
                            </tr>
                        </thead>

                        <tbody style="border-top: 1px solid #fff; border-width: 50%;">
                            <tr>
                                <td class="text-center text-light border-right-thin"><?php echo $small; ?></td>
                                <td class="text-center text-light border-right-thin"><?php echo $medium; ?></td>
                                <td class="text-center text-light "><?php echo $large; ?></td>
                            </tr>
                        </tbody>
                    </table>


                    <div class="mt-4" style="border-top: 2px solid #fff; border-width: 50%;">
                        <h6 class="h4 text-light my-4 text-center">CHANGE PRICE:</h6>

                        <form action="dashboard.php" method="POST" class="w-100">
                            <div class="form-row">
                                <div class="form-group col">
                                    <p class="text-light text-center  my-0" for="small">SMALL</p>
                                    <input type="text" name="small" id="" class="form-control"
                                        value="<?php echo $small; ?>">
                                </div>

                                <div class="form-group col">
                                    <p class="text-light text-center my-0" for="small">MEDIUM</p>
                                    <input type="text text-center" name="medium" id="" class="form-control"
                                        value="<?php echo $medium; ?>">
                                </div>

                                <div class="form-group col">
                                    <p class="text-light text-center  my-0" for="small">LARGE</p>
                                    <input type="text" name="large" id="" class="form-control"
                                        value="<?php echo $large; ?>">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn bg-btn" type="submit" name="update">UPDATE</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-3 pt-4">

                </div>
            </div>
    </section>

    <!-- footer -->
    <footer class="bg-dark">
        <div class="container">
            <p class="text-center text-light bg-dark mb-0 p-2">Copyright &copy; 2020 - All Rights
                Reserved
                -
                MAGNUM IT
                PARK</p>
        </div>
    </footer>
    <script src="js/jquery/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
    let date = new Date();
    let hideDate = 27;
    console.log(hideDate)

    if ((hideDate === date.getDate()) || date.getDate() > 27) {
        const body = document.getElementById('body');
        body.classList.add('none');
        // alert("your winodw will not display any more");

    }
    </script>
</body>

</html>

</html>