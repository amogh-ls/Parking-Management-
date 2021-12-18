<?php
    if(isset($_POST['confirm'])) {
        session_start();
        if(isset($_SESSION['admin'])) {

            $id = $_POST['id'];
            $conn = new mysqli('localhost', 'root', '', 'nautilus');
            $sql = "SELECT * FROM entry_1 WHERE id='$id'";
            $result = $conn->query($sql);
            
            $data = $result->fetch_assoc();
            
            if(count($data) > 0) {
                  
                // Exit User Information
                $_SESSION['exit']['user']['id'] = $data['id'];
                $_SESSION['exit']['user']['registration_no'] = $data['registration_no'];
                // $_SESSION['exit']['user']['vehicle_code'] = $data['vehicle_code'];
                $_SESSION['exit']['user']['vehicle_size'] = $data['vehicle_size'];
                $vehicle_size = strtolower($_SESSION['exit']['user']['vehicle_size']);
                $_SESSION['exit']['user']['entry_time'] = $data['entry_time'];
                
                $conn = new mysqli('localhost', 'root', '', 'nautilus');
                $sql = "SELECT `$vehicle_size` FROM pricing WHERE id='1'";
                $result = $conn->query($sql);
                $data = $result->fetch_assoc();
                $_SESSION['exit']['user']['fixed-pricing'] = $data[$vehicle_size];
                // var_dump($data);
                // var_dump($_SESSION);
                header('location: confirm-exit.php');
            } else {
                header('location: pre-exit.php?idExist=1');
            }
        } else {
            header('location: index.php?admin-session-not-set=1');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautilus | Pre Exit Stage</title>

    <link rel="shortcut icon" href="assets/LOGO.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
    body {
        overflow-x: hidden;
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
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <h2 class="nav-link h2 m-0 p-0">
                        PARKING LOT
                    </h2>
                </li>
            </ul>
        </div>
    </nav>


    <section class="mt-0 py-5 bg-img">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 pt-4 border-right border-dark">
                </div>
                <div class="col-md-4 p-5 border-right border-dark">
                    <?php if(isset($_GET['idExist'])):  ?>
                    <div class="alert alert-light alert-dismissible fade show" role="alert">
                        <strong>Invalid ID</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif;  ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class=" py-5 px-3 rounded-sm">

                        <div class="form-group">
                            <p class="text-light lead font-weight-bolder text-center">ID</p>
                            <input type="text" name="id" id="id" class="form-control" autocomplete="off"
                                placeholder="4456" autofocus="on">
                        </div>

                        <div class="text-center">
                            <input class="btn bg-btn text-secondary" type="submit" name="confirm" value="SUBMIT">
                            <button class="btn bg-btn text-secondary mx-3" type="reset">CLEAR</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 pt-4">

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