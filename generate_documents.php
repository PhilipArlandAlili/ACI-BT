<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

date_default_timezone_set('Asia/Manila');
$duty_officer_name = $_SESSION['username'];
$issued_date = date('Y-m-d');
$timestamp = date('Y-m-d H:i:s');

include 'queries.php';
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

        <div class="alert-container pt-3">
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    <strong>Success:</strong> <?php echo $_SESSION['success']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
        </div>

        <script>
            // Automatically close the alert after 5 seconds
            setTimeout(() => {
                const alertElement = document.getElementById('success-alert');
                if (alertElement) {
                    alertElement.classList.remove('show');
                    setTimeout(() => alertElement.remove(), 150); // Time for the fade effect
                }
            }, 5000);
        </script>


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
                                <option value="certificate_of_cohabitation">Certificate of Cohabitation</option>
                                <option value="certificate_of_employability">Certificate of Employability</option>
                                <option value="certificate_of_income">Certificate of Income</option>
                                <!-- <option value="certificate_of_indigency">Certificate of Indigency</option> -->
                                <option value="certificate_of_indigency_aics">Certificate of Indigency</option>
                                <option value="complaint_certificate">Complaint Certificate</option>
                                <option value="death_certificate">Death Certificate</option>
                                <option value="lot_ownership">Lot Ownership</option>
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

                            <div class="cert" id="certificate_of_cohabitation">
                                <?php include 'forms/certificate_of_cohabitation.php' ?>
                            </div>

                            <div class="cert" id="complaint_certificate">
                                <?php include 'forms/complaint_certificate.php' ?>
                            </div>

                            <div class="cert" id="death_certificate">
                                <?php include 'forms/death_certificate.php' ?>
                            </div>

                            <!-- <div class="cert" id="certificate_of_indigency">
                                <?php include 'forms/certificate_of_indigency.php' ?>
                            </div> -->

                            <div class="cert" id="certificate_of_indigency_aics">
                                <?php include 'forms/certificate_of_indigency_aics.php' ?>
                            </div>

                            <div class="cert" id="lot_ownership">
                                <?php include 'forms/lot_ownership.php' ?>
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
    <script>function validatebday(input) {
            const birthDate = new Date(input.value); // Get the selected date
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            const dayDiff = today.getDate() - birthDate.getDate();

            // Adjust age if the current date is before the birthdate in the current year
            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                age--;
            }

            if (age < 18) {
                alert("You must be at least 18 years old.");
                input.value = ''; // Clear the input field
            }


        }

        function validateformarriagedate(input) {
            const birthDate = new Date(input.value); // Get the selected date
            const today = new Date();
            today.setHours(0, 0, 0, 0); // Remove time from today's date for comparison

            if (birthDate > today) {
                alert("Future dates are not allowed. Please enter a valid date.");
                input.value = ''; // Clear the input field
                return;
            }

            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            const dayDiff = today.getDate() - birthDate.getDate();

            // Adjust age if the current date is before the birthdate in the current year
            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                age--;
            }


        }</script>

</body>

</html>