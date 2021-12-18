<?php

    $dataCleared = 0;
    $conn = new mysqli('localhost', 'root', '', 'nautilus');

    
    if(isset($_GET['clear-database'])) {
        if($_GET['clear-database'] == 1) {
            $deleteQuery = "DELETE FROM entry_1";

            if($conn->query($deleteQuery)) {
                $dataCleared = 1;
            }
        }
    } 

    $getParkingHistoryQuery = "SELECT * FROM entry_1";
    
    $rawData = $conn->query($getParkingHistoryQuery);

    $dataInArray = [];

    foreach($rawData as $data) {
        $dataInArray[] = $data;
    }
    // var_dump($dataInArray);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Daily Account Status</title>

    <link rel="shortcut icon" href="../assets/LOGO.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/util.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../js/custombox/dist/custombox.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

    <script src="../js/custombox/dist/custombox.min.js"></script>


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
                    <a href="dashboard.php" class="nav-link">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <h2 class="h2 nav-link">Lot Status</h2>
                </li>
            </ul>
        </div>
    </nav>


    <section class="bg-img p-5">
        <div class="container py-5">

            <?php if($dataCleared == 1): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Data Earsed</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            <table class="table text-light table-hover">
                <thead class="" style="border-bottom: 4px solid #fff;">
                    <td class="border-right text-center">SL No.</td>
                    <td class="border-right text-center">ID</td>
                    <td class="border-right text-center">Reg No</td>
                    <td class="border-right text-center">Vehicle Size</td>
                    <td class="border-right text-center">Parking Lot</td>
                    <td class="border-right text-center">Entry Time</td>
                    <td class="text-center border-right">Date</td>
                    <td class="text-center">Price</td>
                    <!-- <td>Amount</td>
                    <td>Size</td> -->
                </thead>

                <tbody>
                    <?php $i = 1; $totalPrice = 0; ?>
                    <?php foreach($dataInArray as $data): ?>

                    <tr>
                        <td class="border-right text-center"><?php echo $i++;  ?></td>
                        <td class="border-right text-center"><?php echo $data['id'];  ?></td>
                        <td class="border-right text-center"><?php echo $data['registration_no'];  ?></td>
                        <td class="border-right text-center"><?php echo $data['vehicle_size'];  ?></td>
                        <td class="border-right text-center"><?php echo $data['parking_lot'];  ?></td>
                        <td class="border-right text-center"><?php echo $data['entry_time'];  ?></td>
                        <td class="text-center border-right"><?php echo $data['date']; ?></td>
                        <td class="text-center"><?php echo $data['price']; $totalPrice += $data['price']; ?></td>
                        <!-- <td>200 Rs/-</td>
                    <td>Large</td> -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h1 class="text-light text-right">Total Price = <?php echo $totalPrice;  ?></h1>

            <div class="text-right">
                <a href="daily-account.php?clear-database=1" class="btn bg-btn">Clear Database</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark pb-2">
        <div class="container">
            <p class="text-center text-light bg-dark mb-0 mt-0 p-2">Copyright &copy; 2020 - All Rights
                Reserved
                -
                MAGNUM IT
                PARK</p>
        </div>
    </footer>
    <script src="../js/jquery/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>

</html>