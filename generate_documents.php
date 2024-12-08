<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$duty_officer_name = $_SESSION['username'];
$issued_date = date('Y-m-d');

if (isset($_POST["barangay_clearance"])) {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $birthplace = $conn->real_escape_string($_POST["birthplace"]);
    $birthdate = $conn->real_escape_string($_POST["birthdate"]);
    $civil_status = $conn->real_escape_string($_POST["civil_status"]);
    $period_of_residency = $conn->real_escape_string($_POST["period_of_residency"]);
    $purpose = $conn->real_escape_string($_POST["purpose"]);

    $fullname = $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $suffix;

    $stmt = $conn->prepare("INSERT INTO barangay_clearance (first_name, middle_name, last_name, suffix, address, birthplace, birthdate, civil_status, period_of_residency, issued_date, purpose, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssisss', $first_name, $middle_name, $last_name, $suffix, $purok, $birthplace, $birthdate, $civil_status, $period_of_residency, $issued_date, $purpose, $duty_officer_name);

    if ($stmt->execute()) {
        //echo "New record inserted successfully";

        $sql = "SELECT id FROM admin WHERE username = ?";
        $admin_stmt = $conn->prepare($sql);
        $admin_stmt->bind_param('s', $duty_officer_name);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();

        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 1, ?, (SELECT COUNT(*) FROM barangay_clearance), NOW())");
            $trans_stmt->bind_param('is', $admin_id, $fullname);

            if ($trans_stmt->execute()) {
                //echo "Transaction record inserted successfully";
            } else {
                //echo "Error: " . $trans_stmt->error;
            }

            $trans_stmt->close();

        } else {
            //echo "Error: Admin user not found.";
        }

        $admin_stmt->close();
    } else {
        //echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_POST["business_permit_new"])) {
    $business_name = $conn->real_escape_string($_POST["business_name"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $manager = $conn->real_escape_string($_POST["manager"]);
    $address = $conn->real_escape_string($_POST["address"]);

    $address = $address . ' ' . $purok;

    $stmt = $conn->prepare("INSERT INTO business_permit_new (business_name, manager, address, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $business_name, $manager, $address, $issued_date, $duty_officer_name);

    if ($stmt->execute()) {
        //echo "New record inserted successfully";

        $sql = "SELECT id FROM admin WHERE username = ?";
        $admin_stmt = $conn->prepare($sql);
        $admin_stmt->bind_param('s', $duty_officer_name);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();

        if ($stmt->execute()) {
            //echo "New record inserted successfully";

            $sql = "SELECT id FROM admin WHERE username = ?";
            $admin_stmt = $conn->prepare($sql);
            $admin_stmt->bind_param('s', $duty_officer_name);
            $admin_stmt->execute();
            $admin_result = $admin_stmt->get_result();

            if ($admin_result->num_rows > 0) {
                $row = mysqli_fetch_assoc($admin_result);
                $admin_id = $row['id'];

                $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 2, ?, (SELECT COUNT(*) FROM business_permit_new), NOW())");
                $trans_stmt->bind_param('is', $admin_id, $manager);

                if ($trans_stmt->execute()) {
                    //echo "Transaction record inserted successfully";
                } else {
                    //echo "Error: " . $trans_stmt->error;
                }

                $trans_stmt->close();

            } else {
                //echo "Error: Admin user not found.";
            }

            $admin_stmt->close();
        } else {
            //echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

if (isset($_POST["business_permit_renew"])) {
    $business_name = $conn->real_escape_string($_POST["business_name"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $manager = $conn->real_escape_string($_POST["manager"]);
    $address = $conn->real_escape_string($_POST["address"]);

    $address = $address . ' ' . $purok;

    $stmt = $conn->prepare("INSERT INTO business_permit_renew (business_name, manager, address, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $business_name, $manager, $address, $issued_date, $duty_officer_name);

    if ($stmt->execute()) {
        //echo "New record inserted successfully";

        $sql = "SELECT id FROM admin WHERE username = ?";
        $admin_stmt = $conn->prepare($sql);
        $admin_stmt->bind_param('s', $duty_officer_name);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();

        if ($stmt->execute()) {
            //echo "New record inserted successfully";

            $sql = "SELECT id FROM admin WHERE username = ?";
            $admin_stmt = $conn->prepare($sql);
            $admin_stmt->bind_param('s', $duty_officer_name);
            $admin_stmt->execute();
            $admin_result = $admin_stmt->get_result();

            if ($admin_result->num_rows > 0) {
                $row = mysqli_fetch_assoc($admin_result);
                $admin_id = $row['id'];

                $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 3, ?, (SELECT COUNT(*) FROM business_permit_renew), NOW())");
                $trans_stmt->bind_param('is', $admin_id, $manager);

                if ($trans_stmt->execute()) {
                    //echo "Transaction record inserted successfully";
                } else {
                    //echo "Error: " . $trans_stmt->error;
                }

                $trans_stmt->close();

            } else {
                //echo "Error: Admin user not found.";
            }

            $admin_stmt->close();
        } else {
            //echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

if (isset($_POST["certificate_of_income"])) {
    // Sanitize and assign form data to variables
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $income_num = $conn->real_escape_string($_POST["income_num"]); // Numeric amount
    $income_words = $conn->real_escape_string($_POST["income_words"]); // Add this field to the form
    $duty_officer_name = $_SESSION['username'];

    // Generate full name and issued date
    $fullname = ucwords("$first_name $middle_name $last_name $suffix");
    $issued_date = date('Y-m-d');

    // Insert data into certificate_of_income table
    $stmt = $conn->prepare("INSERT INTO certificate_of_income 
        (first_name, middle_name, last_name, suffix, address, income_num, income_words, issued_date, duty_officer_name) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssisss', $first_name, $middle_name, $last_name, $suffix, $purok, $income_num, $income_words, $issued_date, $duty_officer_name);

    if ($stmt->execute()) {
        echo "Certificate of income record inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
    <title>ACI-BT | Generate Documents</title>
    <link rel="stylesheet" href="assets/css/styleDocs.css">
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include 'includes/header.php' ?>
    </header>

    <aside id="sidebar" class="sidebar">
        <?php include 'includes/sidebar.php' ?>
    </aside>

    <main id="main" class="main">
        <a href="dashboard.php" class="navigation d-flex align-items-center pt-3 mx-2">
            <i class="bx bxs-caret-left-square fs-2 "></i>
            <span class="fs-3 fw-semibold ">Back</span>
        </a>

        <div class="alert-container pt-2">
            <?php if (isset($_SESSION['success'])): ?>
                <!-- Bootstrap Alert -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> <?php echo $_SESSION['success']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']); // Remove success message after displaying it ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <!-- Bootstrap Alert for Errors -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> <?php echo $_SESSION['error']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['error']); // Remove error message after displaying it ?>
            <?php endif; ?>
        </div>

        <div class="row pt-3">
            <div class="col-lg-4" id="fillup">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Fillup Certificate</h5>
                        <!-- General Form Elements -->
                        <label for="certificateType"> Select Certificate</label><br>
                        <div class="col-md-12">
                            <select class="p-2 text-left form-control" id="certificateType" onchange="toggleFields()">
                                <option value="">--select certificates--</option>
                                <option value="barangay_clearance">Barangay Clearance</option>
                                <option value="business_permit_new">Barangay Business Permit New</option>
                                <option value="business_permit_renew">Barangay Business Permit Renew</option>
                                <option value="certificate_of_employability">Certificate Of Employability</option>
                                <option value="certificate_of_income">Certificate of Income</option>
                                <option value="cohabitation">Certificate of Cohabitation</option>
                                <option value="complaint_certificate">Complaint Certificate</option>
                                <option value="death_certificate">Death Certificate</option>
                                <option value="first_time_job_seeker">Barangay Certification (First time Job Seeker)
                                </option>
                                <option value="indigency_aics">Indigency (AICS)</option>
                                <option value="indigency">Indigency</option>
                                <option value="lot_ownership">Lot Ownership</option>
                                <option value="Oathtaking">Oathtaking</option>
                                <option value="transfer_of_residency">Certificate of Transfer</option>
                            </select>
                        </div>
                        <hr>
                        <div class="certificates">
                            <div class="cert" id="barangay_clearance">
                                <?php include 'forms/barangay_clearance.php' ?>
                            </div>

                            <div class="cert" id="business_permit_new">
                                <?php include 'forms/business_permit_new.php' ?>
                            </div>

                            <div class="cert" id="business_permit_renew">
                                <?php include 'forms/business_permit_renew.php' ?>
                            </div>

                            <div class="cert" id="certificate_of_employability">
                                <?php include 'forms/certificate_of_employability.php' ?>
                            </div>

                            <div class="cert" id="certificate_of_income">
                                <?php include 'forms/certificate_of_income.php' ?>
                            </div>

                            <div class="cert" id="cohabitation">
                                <?php include 'forms/cohabilitation.php' ?>
                            </div>

                            <div class="cert" id="complaint_certificate">
                                <?php include 'forms/complaint_certificate.php' ?>
                            </div>

                            <div class="cert" id="death_certificate">
                                <?php include 'forms/death_certificate.php' ?>
                            </div>

                            <div class="cert" id="first_time_job_seeker">
                                <?php include 'forms/first_time_job_seeker.php' ?>
                            </div>

                            <div class="cert" id="indigency_aics">
                                <?php include 'forms/indigency_aics.php' ?>
                            </div>

                            <div class="cert" id="indigency">
                                <?php include 'forms/indigency.php' ?>
                            </div>

                            <div class="cert" id="lot_ownership">
                                <?php include 'forms/lot_ownership.php' ?>
                            </div>

                            <div class="cert" id="Oathtaking"> ⁡⁢⁣⁢
                                <!-- ‍wala sa database table -->⁡⁡
                                <?php include 'forms/Oathtaking.php' ?>
                            </div>

                            <div class="cert" id="transfer_of_residency">
                                <?php include 'forms/transfer_of_residency.php' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="">
                        <h5 class="card-title" style="padding: 20px;">View Certificate</h5>
                        <div class="iframe-container">
                            <iframe id="myIframe" width="100%" height="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer" class="footer">
        <?php include 'includes/footer.php' ?>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/main2.js"></script>

</body>

</html>