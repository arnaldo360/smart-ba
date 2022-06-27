<?php

// require once config file
require_once "../../database/dbConnect.php";

// declare a variable and initialize an array
$login_errors = array();

// execute script when login button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //store form field values in variables
    $username    = trim($_POST["username"]);
    $password    = trim($_POST["password"]);

    $sql = "SELECT superAdminId, superAdminEmail, superAdminPassword FROM  superadmin WHERE superAdminEmail = ? ";

    if ($statement = $mysqli->prepare($sql)) {
        //bind variables
        $statement->bind_param("s", $param_username);

        //set parameter
        $param_username = $username;

        if ($statement->execute()) {

            // Store result
            $statement->store_result();

            // Check if account exists, if yes then verify password
            if ($statement->num_rows == 1) {

                // Bind result variables
                $statement->bind_result($userID, $username, $hashed_password);

                if ($statement->fetch()) {

                    if (password_verify($password, $hashed_password)) {

                        // Password is correct and account is active, so start a new session
                        session_start();

                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"]       = $userID;
                        $_SESSION["username"] = $username;

                        header("Location: pages/dashboard.php");
                    } else {
                        array_push($login_errors, "Invalid Password");
                    }
                }
            } else {
                array_push($login_errors, "Invalid account");
            }
            // Close statement
            $statement->close();
        } else {
            echo "Failed to execute";
        }
    } else {
        echo "Failed to prepare";
    }
    // Close connection
    $mysqli->close();
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Administration</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>

    <main style="background-image: url('../../assets/img/bg_4.jpg');">
        <div class=" container">

            <section class=" section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="#" class="logo d-flex align-items-center w-auto">
                                    <img src="../../assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block" style="color: wheat;">Smart-Bar</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Admin Login</h5>
                                        <p class="text-center small">Enter username & password to login</p>
                                    </div>

                                    <?php if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) : ?>
                                        <?php if ($_GET["redirect"] == "success") : ?>
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <i class="bi bi-check-circle me-1"></i>
                                                Password Change succesfully! Login with new password.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (count($login_errors) > 0) : ?>
                                        <div class="alert alert-danger">
                                            <?php foreach ($login_errors as $errors) : ?>
                                                <p><strong><i class="fa fa-exclamation"></i><span class="ml-2"><?= $errors; ?></span></strong></p>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                    <form class="row g-3 needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" novalidate>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" placeholder="Enter your Email" id="yourUsername" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Enter your Password" id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                        </div>

                                        <div class="col-6">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>

                                        <div class="col-6">
                                            <a href="../../index.php"><button class="btn btn-danger w-100" type="button">Cancel</button></a>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../../assets/vendor/quill/quill.min.js"></script>
    <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>