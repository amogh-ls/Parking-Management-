<?php 
    session_start();
    if(isset($_POST['confirm'])) {
        header('location: register-entry.php');
    }

    if(isset($_SESSION['user']['id'])) {
        if(isset($_SESSION['user']['parking-lot-confirmation'])) {
        include 'parking-session/index.php';
        } 
        $parkingLot =  $_SESSION['floor'] . "-P" . $_SESSION['user']['index']; 
        $userID = $_SESSION['user']['id'];
        $conn = new mysqli('localhost', 'root', '', 'nautilus');
        $setParkingLot = "UPDATE entry_1 SET parking_lot = '$parkingLot' WHERE id = '$userID';";
        $conn->query($setParkingLot);

        $sql = "SELECT parking_lot from entry_1 WHERE id = '$userID'";
        $parkingLotInfo = $conn->query($sql);
        $finalparkingLotInfo = $parkingLotInfo->fetch_assoc();
        $_SESSION['parking-data']['parking_lot'] = $finalparkingLotInfo;
        // var_dump($finalparkingLotInfo);
        // var_dump($_SESSION['parking-data']);

    }

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautilus | Parking Lot Confirmation</title>

    <link rel="shortcut icon" href="assets/LOGO.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">


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

    <!-- Readonly Form Data -->
    <section class="mt-0 py-5 bg-img">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 pt-4 border-right border-dark">
                </div>
                <div class="col-md-4 p-5 border-right border-dark">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="py-5 px-3 rounded-sm ">

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="id" class="text-light">ID</label>
                                <input class="form-control" type="text" name="id" id="id" readonly
                                    value="<?php echo $_SESSION['user']['id']; ?>">
                            </div>

                            <div class="form-group col">
                                <label for="reg_no" class="text-light"> Registration No.</label>
                                <input class="form-control" type="text" name="reg_no" id="reg_no" readonly
                                    value="<?php echo $_SESSION['user']['registration_no']; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="size" class="text-light">Vehicle Size</label>
                                <input class="form-control" type="text" name="size" id="size" readonly
                                    value="<?php echo $_SESSION['user']['vehicle_size']; ?>">
                            </div>

                            <div class="form-group col">
                                <label for="reg_no" class="text-light">Parking Lot</label>
                                <input class="form-control" type="text" name="reg_no" id="reg_no" readonly
                                    value="<?php echo $_SESSION['floor'] . "-P" . $_SESSION['user']['index']; ?>">
                            </div>
                        </div>


                        <div class="text-center">
                            <button class="btn bg-btn text-secondary" type="submit" name="confirm">CONFIRM</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 pt-4">
                </div>
            </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="text-center text-light mt-5 fixed-bottom bg-dark mb-0 p-2">Copyright &copy; 2020 - All Rights
                Reserved
                -
                MAGNUM IT
                PARK</p>
        </div>
    </footer>
</body>

</html>