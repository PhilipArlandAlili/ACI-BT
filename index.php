<?php
require 'includes/db.php';

session_start();

$error = '';
$showModal = false;

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `admin` WHERE username=? AND password=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;

    if ($count == 1) {
        $_SESSION['username'] = ucfirst($username);

        $query = "INSERT INTO `user_logs` (admin_name, status, datetime) VALUES (?, 'IN', NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        header("Location: dashboard.php");
        exit();
    } else {
        // header("Location: index.php");
        // echo "<script>alert('Invalid username or password!')</script>";
        $error = 'Invalid username or password!'; // Set error message
        $showModal = true;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ACI-BT | Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/brgy_logo.png" rel="icon">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<style>
    .logo-overlap {
        margin-top: -100px;
    }
</style>

<body style="background-color: #F4F3EF;">
    <main>
        <div class="container p-0">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-lg-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card" style="height: 750px;">
                                <div class="p-0 m-0">
                                    <div class="image">
                                        <img src="assets/img/tiniguiban.jpg" alt="..." class="img-fluid rounded"
                                            style="height: 240px; width: 100%;">
                                    </div>
                                    <div class="card-body">
                                        <div class="author logo-overlap d-flex flex-column align-items-center">
                                            <img class="avatar border-gray m-2 rounded-circle"
                                                src="assets/img/logo.jpg" alt="..."
                                                style="height: 190px; margin: 20;">
                                            <h5 class="title fs-2 fw-bold" style="color: #729ED9;">Welcome to ACI-BT!</h5>
                                            <label for="" class="fs-4">Login</label>
                                        </div>
                                    </div>
                                </div>
                                <form class="row g-3 needs-validation px-5" action="#" method="post"
                                    novalidate>
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label fs-5">Username</label>
                                        <div class="input-group has-validation" style="height: 50px;">
                                            <span class="input-group-text fs-5" id="inputGroupPrepend">@</span>
                                            <input type="text" name="username" class="form-control" id="yourUsername"
                                                placeholder="Enter Username" required>
                                            <div class="invalid-feedback">Please enter your username.</div>
                                        </div>
                                    </div>
                                    <div class="col-12 pb-1">
                                        <label for="yourPassword" class="form-label fs-5">Password</label>
                                        <div class="input-group has-validation" style="height: 50px;">
                                            <span class="input-group-text" id="inputGroupPrepend"><i
                                                    class="bi bi-lock"></i></span>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" placeholder="Enter Password" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 fs-4 fw-bold" type="submit" style="height: 50px;">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Login Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= htmlspecialchars($error) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if ($showModal): ?>
                const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            <?php endif; ?>
        });
    </script>

</body>

</html>