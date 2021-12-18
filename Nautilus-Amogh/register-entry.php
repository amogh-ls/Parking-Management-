<?php 
    session_start();
    $_SESSION['arr'];
    $_SESSION['max_size'] = 4;

    $registraionNoExists = 0;

    if(count($_SESSION['arr']) === $_SESSION['max_size']) {
        header('location: parking-lot-full.php');
    }
    
    if(isset($_GET['registrationError'])) {
        if($_GET['registrationError'] === 1) {
            echo "<script> alert(Please use different registration number) </script>";
        }
    }

  if(isset($_SESSION['admin'])) {
    if(count($_SESSION['arr']) > $_SESSION['max_size']) {
        header('parking-lot-full.php');
    } else {
        
     if(isset($_POST['confirm'])) {

        $conn = new mysqli('localhost', 'root', '', 'nautilus');
        if($conn) {
            $registration_no = strtoupper($_POST['registration_no']);
            // $vehicle_code = strtoupper($_POST['vehicle_code']);
            $vehicle_size = strtoupper($_POST['size']);

            // Session
            if(!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['user']['registration_no'] = $registration_no;
            // $_SESSION['user']['vehicle_code'] = $vehicle_code;
            $_SESSION['user']['vehicle_size'] = $vehicle_size;

            $sql = "INSERT INTO `entry_1`(`registration_no`, `vehicle_size`, `entry_time`, `date`) VALUES ('$registration_no', '$vehicle_size', CURRENT_TIME(), CURDATE())";
            if($conn->query($sql)) {
                $sql = "SELECT * FROM entry_1 ORDER BY id DESC LIMIT 1";
                $result = $conn->query($sql);
                $data = $result->fetch_assoc();
                $_SESSION['parking-data'] = $data;
                $_SESSION['user']['id'] = $data['id'];
                $_SESSION['user']['parking-lot-confirmation'] = 1;
                header('location: parking-lot-confirmation.php?registration_success=1');
            } else {
                $registraionNoExists = 1;
            }
            }
        }
    }
  } else {
      header('index.php?admin-session-not-set&error-occuring-on-register-entry-line-46');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautilus | Register Vehicle Entry</title>

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

<body id="body">

    <!-- Header -->
    <header class="border border-bottom-2 bg-header">
        <nav class="navbar navbar-expand">
            <div class="container">
                <span class="navbar-brand d-flex flex-row">
                    <img src="assets/LOGO.jpg" alt="Company Logo" id="logo">
                    <div class="d-flex flex-column mt-5 ml-2 text-light">
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
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <h2 class="nav-link h2 m-0 p-0">
                        ENTRY
                    </h2>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Layout -->
    <section class="mt-0 py-5 bg-img">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 pt-4 border-right border-dark">

                </div>
                <div class="col-md-6 p-5 border-right border-dark">

                    <?php if($registraionNoExists === 1): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Vehicle exists</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="py-5 px-3 rounded-sm">
                        <table>
                            <tr>
                                <td class="pr-4"><label for="" class="text-light">
                                        <h4>Registration No.</h4>
                                    </label></td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control text-uppercase" name="registration_no"
                                            required id="registration_no" placeholder="KA47QQ1987" autocomplete="off"
                                            autofocus="on" minlength="6" maxlength="10"
                                            title="As the Govt Rules Vehicle state code must be only 4 Characters long Please enter valid characters">
                                    </div>
                                </td>
                            </tr>

                            <!-- <tr>
                                <td class="pr-4"><label for="">Vehicle Code</label></td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control text-uppercase" name="vehicle_code"
                                            required id="vehicle_code" placeholder="WE3909" autocomplete="off"
                                            autofocus="on" minlength="2" maxlength="6">
                                    </div>
                                </td>
                            </tr> -->

                            <tr>
                                <td class="pr-4 text-light">
                                    <h4>Vehicle Size</h4>
                                </td>
                                <td class="pr-4">
                                    <div class="d-flex flex-row pt-4">

                                        <div class="form-group form-check mr-2">
                                            <input type="radio" class="form-check-input" id="exampleCheck1" name="size"
                                                checked value="small">
                                            <label class="form-check-label text-light" for="exampleCheck1">Small</label>
                                        </div>
                                        <div class="form-group form-check mr-2">
                                            <input type="radio" class="form-check-input" id="exampleCheck1" name="size"
                                                value="medium">
                                            <label class="form-check-label text-light"
                                                for="exampleCheck1">Medium</label>
                                        </div>
                                        <div class="form-group form-check mr-2">
                                            <input type="radio" class="form-check-input" id="exampleCheck1" name="size"
                                                value="large">
                                            <label class="form-check-label text-light" for="exampleCheck1">Large</label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <div class="text-center">
                            <button class="btn bg-btn text-secondary" type="submit" name="confirm">CONFIRM</button>
                            <button class="btn bg-btn text-secondary mx-3" type="reset">CLEAR</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 pt-4">
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