<?php
        $passwordError = 0;
        $userNameError = 0;

        if(isset($_POST['login'])) {

            $conn = new mysqli('localhost', 'root', '', 'nautilus');
            if($conn) {
                $username = $_POST['username'];
                $pswd = $_POST['password'];

                $sql = "SELECT * FROM admin WHERE username='$username' AND password = '$pswd'";
                $result = $conn->query($sql);
                $data = $result->fetch_assoc();
    
                if($data['username'] === $username) {
                    if($data['password'] == $pswd) {
                        session_start();
                        $_SESSION['admin']['username'] = $data['username'];
                        $_SESSION['admin']['id'] = $data['id'];
                        $_SESSION['admin']['password'] = $data['password'];
                        header('location: dashboard.php');
                    } else {
                      $passwordError = 1;
                    }
                } else {
                   $userNameError = 1;
                }
            }
           
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
                    <a href="../index.php" class="nav-link">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <h2 class="h2 nav-link">ADMIN LOGIN</h2>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Admin section with Layout -->
    <section class="mt-0 py-5 pt-3 bg-img">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 pt-4 border-right border-secondary">

                </div>
                <div class="col-md-4 p-5 border-right border-secondary">

                    <?php if($userNameError == 1 || $passwordError == 1): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Invalid Username and Password</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <form action="index.php" method="POST" class="p-3 rounded-lg pt-4">
                        <table>
                            <tr>
                                <td class="pr-4 font-weight-bolder text-light">Username</td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="text" name="username" id="" class="form-control"
                                            placeholder="ABCDEF" autofocus='on' required autocomplete="off"
                                            tabindex="1">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pr-4 font-weight-bolder text-light">Password</td>
                                <td class="pr-4">
                                    <div class="form-group">
                                        <input type="password" name="password" id="" class="form-control"
                                            placeholder="******" required autocomplete="off" tabindex="2">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="text-center">
                            <input type="submit" value="LOGIN" class="btn bg-btn" name="login">
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
    <script src="../js/jquery/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>

</html>