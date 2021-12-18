<?php
    date_default_timezone_set('Asia/Kolkata');
    session_start();

    $index = "";
   if(isset($_SESSION['admin'])) {


        $conn = new mysqli('localhost', 'root', '', 'nautilus');
        $exitUserID = $_SESSION['exit']['user']['id'];
        $query = "SELECT * FROM entry_1 WHERE id = '$exitUserID'";
        $data = $conn->query($query);

        $finalData = $data->fetch_assoc();


        if(in_array( $_SESSION['exit']['user']['id'], $_SESSION['arr'])) {
            $index = array_search($_SESSION['exit']['user']['id'], $_SESSION['arr']);
            // unset($_SESSION['arr'][$index]); Check Line Number : 18; This line of code has a bug;
        } else {
            header('location: pre-exit.php?idExist=1');
        }

        if(isset($_POST['ok'])) {
            $id = $_SESSION['exit']['user']['id'];
            // $conn = new mysqli('localhost', 'root', '', 'nautilus');
            // $sql = "DELETE FROM entry_1 WHERE id='$id'";
            // $conn->query($sql);
            unset($_SESSION['arr'][$index]);
            header('location:pre-exit.php?1-parking-lot-clear=true');
        }
   } else {
       header('location: index.php?admin-session-not-set=1');
   }

        $current_time = date('H:i:s', time());
        $entryTime = strtotime($_SESSION['exit']['user']['entry_time']);
        $exitTime = strtotime($current_time);
        $TotalDurationInMin = round(abs($exitTime - $entryTime) / 60);
        $pricing = round($TotalDurationInMin / 15);
        $totalPrice = ($pricing * $_SESSION['exit']['user']['fixed-pricing']) + $_SESSION['exit']['user']['fixed-pricing'];

        $savePriceQuery = "UPDATE entry_1 SET price = '$totalPrice' WHERE id = '$exitUserID'";
        if($conn->query($savePriceQuery)) {
            echo "Data Saved";
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautilus | Confirm Exit</title>

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


    .qr-code {
        width: 100px;
        height: 100px;
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


    <section class="mt-0 py-2 bg-img">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-3 border-right border-dark rounded-lg">
                    <div class="py-5 px-3 rounded-lg">

                        <table class="table py-5 px-3">

                            <!-- ID -->
                            <tr>
                                <td class="pr-4"><label for="" class="text-light">ID</label></td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control text-uppercase" name="id" id="state_code"
                                            placeholder="4475" readonly title="Registration ID"
                                            value="<?php echo $_SESSION['exit']['user']['id'];  ?>">
                                    </div>
                                </td>
                            </tr>

                            <!-- Vehicle Registration Number -->
                            <tr>
                                <td class="pr-4"><label for="" class="text-light">Vehicle Registration No.</label></td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control text-uppercase" name="vehicle_reg_no"
                                            id="vehicle_reg_no" placeholder="KA47WE672"
                                            value="<?php echo $_SESSION['exit']['user']['registration_no']; ?>"
                                            readonly>
                                    </div>
                                </td>
                            </tr>

                            <!-- Parking Lot Number -->
                            <tr>
                                <td class="pr-4 text-light" class="">Parking Lot No.</td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="text" name="parking_lot_no" placeholder="7" readonly
                                            class="form-control text-uppercase"
                                            value="<?php echo $finalData['parking_lot']; ?>">
                                    </div>
                                </td>
                            </tr>

                            <!-- Vehicle Size -->
                            <tr>
                                <td class="pr-4 text-light">Size</td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="text" name="vehicle_size" placeholder="large" readonly
                                            class="form-control text-uppercase"
                                            value="<?php echo $_SESSION['exit']['user']['vehicle_size']; ?>">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 p-3 border-right border-dark">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="py-5 px-3 rounded-sm">
                        <table class="table">


                            <!-- Amount -->
                            <tr>
                                <td class="pr-4 text-light">Amount</td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="text" name="exit_time" placeholder="100 Rs/-" readonly
                                            class="form-control text-uppercase" value="<?php echo $totalPrice; ?>">
                                    </div>
                                </td>
                            </tr>

                            <!-- Payment Mode -->
                            <!-- Amount -->
                            <tr>
                                <td class="pr-4 text-light">Payment Mode</td>
                                <td class="pr-4">
                                    <div class="d-flex flex-row pt-4">
                                        <div class="form-group form-check mr-2">
                                            <input type="radio" class="form-check-input" id="exampleCheck1"
                                                name="payment_mode" checked value="cash">
                                            <label class="form-check-label text-light" for="exampleCheck1">Cash</label>
                                        </div>
                                        <div class="form-group form-check mr-2">
                                            <input type="radio" class="form-check-input" id="exampleCheck1"
                                                name="payment_mode" value="online">
                                            <label class="form-check-label text-light"
                                                for="exampleCheck1">Online</label>
                                        </div>
                                        <div class="form-group form-check mr-2">
                                            <input type="radio" class="form-check-input" id="exampleCheck1"
                                                name="payment_mode" value="other">
                                            <label class="form-check-label text-light" for="exampleCheck1">Other</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- UPI -->
                            <tr>
                                <td class="pr-4 text-light">UPI</td>
                                <td class="pr-4">
                                    <img src="assets/upi.jpg" alt="UPI QR Code" class="img-fluid qr-code">
                                </td>
                            </tr>
                        </table>

                        <div class="text-center">
                            <button class="btn bg-btn mx-2" type="submit" name="ok">OK</button>
                            <button class="btn bg-btn mx-2" type="">PRINT</button>
                            <button class="btn bg-btn" type="button">BACK</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 p-3">
                    <div class="py-5 px-3 rounded-lg">
                        <table class="table">

                            <!-- Entry time -->
                            <tr>
                                <td class="pr-4 text-light">Entry Time</td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="text" name="entry_time" placeholder="12:30:25" readonly
                                            class="form-control text-uppercase"
                                            value="<?php echo $_SESSION['exit']['user']['entry_time']; ?>">
                                    </div>
                                </td>
                            </tr>

                            <!-- Exit time -->
                            <tr>
                                <td class="pr-4 text-light">Exit Time</td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="text" name="exit_time" placeholder="12:50:10" readonly
                                            class="form-control text-uppercase" value="<?php echo $current_time; ?>">
                                    </div>
                                </td>
                            </tr>

                        </table>
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
</body>

</html>