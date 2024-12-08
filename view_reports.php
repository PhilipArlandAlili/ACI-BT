<!-- Troy  -->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
    <title>ACI-BT | View Reports</title>
</head>

<style>
    .carousel-control-next-icon,
    .carousel-control-prev-icon {
        filter: invert(1);
    }

    .carousel-control-prev-icon {
        margin-left: -180px;
    }

    .carousel-control-next-icon {
        margin-right: -180px;
    }
</style>

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

        <?php include 'includes/queries_reports.php'; ?>
        <script>
            // Use PHP variables in JavaScript
            const barangay_clearance = <?php echo $count_barangay_clearance; ?>;
            const business_permit_new = <?php echo $count_business_permit_new ?>;
            const business_permit_renew = <?php echo $count_business_permit_renew ?>;
            const certificate_of_cohabitation = <?php echo $count_certificate_of_cohabitation; ?>;
            const certificate_of_employability = <?php echo $count_certificate_of_employability ?>;
            const certificate_of_income = <?php echo $count_certificate_of_income ?>;
            const certificate_of_indigency = <?php echo $count_certificate_of_indigency; ?>;
            const certificate_of_indigency_aics = <?php echo $count_certificate_of_indigency_aics; ?>;
            const complaint_certificate = <?php echo $count_complaint_certificate; ?>;
            const death_certificate = <?php echo $count_death_certificate; ?>;
            const first_time_job_seeker = <?php echo $count_first_time_job_seeker; ?>;
            const lot_ownership = <?php echo $count_lot_ownership; ?>;
            const transfer_of_residency = <?php echo $count_transfer_of_residency; ?>;

            const sum = <?php echo $sum; ?>;
            document.addEventListener('DOMContentLoaded', function () {

                // Calculate the clearance percentage
                const barangay_clearance_percent = (barangay_clearance / sum) * 100;
                const business_permit_new_percent = (business_permit_new / sum) * 100;
                const business_permit_renew_percent = (business_permit_renew / sum) * 100;
                const certificate_of_cohabitation_percent = (certificate_of_cohabitation / sum) * 100;
                const certificate_of_employability_percent = (certificate_of_employability / sum) * 100;
                const certificate_of_income_percent = (certificate_of_income / sum) * 100;
                const certificate_of_indigency_percent = (certificate_of_indigency / sum) * 100;
                const certificate_of_indigency_aics_percent = (certificate_of_indigency_aics / sum) * 100;
                const complaint_certificate_percent = (complaint_certificate / sum) * 100;
                const death_certificate_percent = (death_certificate / sum) * 100;
                const first_time_job_seeker_percent = (first_time_job_seeker / sum) * 100;
                const lot_ownership_percent = (lot_ownership / sum) * 100;
                const transfer_of_residency_percent = (transfer_of_residency / sum) * 100;

                // Set the clearance percentage value into the span
                document.getElementById('barangay_clearance_percent').innerHTML = barangay_clearance_percent.toFixed(2) + '%';
                document.getElementById('business_permit_new_percent').innerHTML = business_permit_new_percent.toFixed(2) + '%';
                document.getElementById('business_permit_renew_percent').innerHTML = business_permit_renew_percent.toFixed(2) + '%';
                document.getElementById('certificate_of_cohabitation_percent').innerHTML = certificate_of_cohabitation_percent.toFixed(2) + '%';
                document.getElementById('certificate_of_employability_percent').innerHTML = certificate_of_employability_percent.toFixed(2) + '%';
                document.getElementById('certificate_of_income_percent').innerHTML = certificate_of_income_percent.toFixed(2) + '%';
                document.getElementById('certificate_of_indigency_percent').innerHTML = certificate_of_indigency_percent.toFixed(2) + '%';
                document.getElementById('certificate_of_indigency_aics_percent').innerHTML = certificate_of_indigency_aics_percent.toFixed(2) + '%';
                document.getElementById('complaint_certificate_percent').innerHTML = complaint_certificate_percent.toFixed(2) + '%';
                document.getElementById('death_certificate_percent').innerHTML = death_certificate_percent.toFixed(2) + '%';
                document.getElementById('first_time_job_seeker_percent').innerHTML = first_time_job_seeker_percent.toFixed(2) + '%';
                document.getElementById('lot_ownership_percent').innerHTML = lot_ownership_percent.toFixed(2) + '%';
                document.getElementById('transfer_of_residency_percent').innerHTML = transfer_of_residency_percent.toFixed(2) + '%';
            })




            // Function to redirect to view_transactions page with document type parameter
            function moreInfo(docType, docId) {
                window.location.href = 'more_info.php?docType=' + encodeURIComponent(docType) + '&docId=' + encodeURIComponent(docId);
            }

        </script>

        <section class="section dashboard pt-4">
            <div class="row">
                <div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <!-- Left side columns -->
                            <div class="container-fluid col-lg" style="overflow-x: hidden;">
                                <div class="row">

                                    <!-- Sales Card -->
                                    <div class="col-md-4">
                                        <div class="card info-card sales-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>


                                                    <li>
                                                        <p class="dropdown-item lead"
                                                            onclick="moreInfo('Barangay Clearance', 1)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    BARANGAY CLEARANCE
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color: rgba(255, 0, 0, 1)">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_barangay_clearance; ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="barangay_clearance_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                // Wait for the page to load before running the script
                                                document.addEventListener('DOMContentLoaded', function () {
                                                    // Use PHP variables in JavaScript
                                                    const barangay_clearance = <?php echo $count_barangay_clearance; ?>;
                                                    const sum = <?php echo $sum; ?>;

                                                    // Calculate the clearance percentage
                                                    const barangay_clearance_percent = (barangay_clearance / sum) * 100;

                                                    // Set the clearance percentage value into the span
                                                    document.getElementById('barangay_clearance_percent').innerHTML = barangay_clearance.toFixed(2) + '%';
                                                });
                                            </script>

                                        </div>
                                    </div><!-- End Sales Card -->

                                    <!-- Revenue Card -->
                                    <div class="col-md col-md-4">
                                        <div class="card info-card revenue-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Business Permit (New)', 2)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    BUSINESS PERMIT | <span class="text-success">NEW</span>
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color: rgba(54, 162, 235, 1)">
                                                            stroke-linejoin="round" class="feather feather-file-text" >
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_business_permit_new ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="business_permit_new_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div><!-- End Revenue Card -->


                                    <!-- Customers Card -->
                                    <div class="col-xxl-4 col-md-4">
                                        <div class="card info-card customers-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Business Permit (Renew)', 3)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title ">
                                                    BUSINESS PERMIT | <span class="text-success">RENEW</span>
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color: rgba(255, 206, 86, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_business_permit_renew ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="business_permit_renew_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div><!-- End Customers Card -->


                                </div>
                            </div><!-- End Left side columns -->
                        </div>
                        <div class="carousel-item">

                            <!-- Left side columns -->
                            <div class="container-fluid col-lg-12">
                                <div class="row">



                                    <!-- Sales Card -->
                                    <div class="col-md-4 col-md-3">
                                        <div class="card info-card sales-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Certificate of Income', 8)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    CERTFICATE OF INCOME
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color:rgba(153, 102, 255, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_certificate_of_income ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="certificate_of_income_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div><!-- End Sales Card -->

                                    <!-- Revenue Card -->
                                    <div class="col-md col-md-4">
                                        <div class="card info-card revenue-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Certificate of Cohabitaion', 4)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title ">
                                                    CERTIFICATE OF COHABITATION
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color:rgba(255, 165, 0, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_certificate_of_cohabitation; ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="certificate_of_cohabitation_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div><!-- End Revenue Card -->



                                    <!-- Customers Card -->
                                    <div class="col-xxl-4 col-md-4">

                                        <div class="card info-card customers-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Certificate of Employability', 5)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title ">
                                                    CERTIFICATE OF EMPLOYABILITY
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color:rgba(75, 192, 192, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_certificate_of_employability ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="certificate_of_employability_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div><!-- End Customers Card -->



                                </div>
                            </div><!-- End Left side columns -->
                        </div>

                        <!-- Third Row -->
                        <div class="carousel-item">

                            <!-- Left side columns -->
                            <div class="container-fluid col-lg-12">
                                <div class="row">



                                    <!-- Sales Card -->
                                    <div class="col-md-4 col-md-3">
                                        <div class="card info-card sales-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Certificate of Indigency', 6)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    CERTIFICATE OF INDIGENCY
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color:rgba(77, 0, 77, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_certificate_of_indigency; ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="certificate_of_indigency_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div><!-- End Sales Card -->

                                    <!-- Revenue Card -->
                                    <div class="col-md col-md-4">
                                        <div class="card info-card revenue-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Certificate of Indigency (AICS)', 7)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title ">
                                                    CERTIFICATE OF INDIGENCY (AICS)
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color:rgba(16, 16, 16, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_certificate_of_indigency_aics; ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="certificate_of_indigency_aics_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div><!-- End Revenue Card -->



                                    <!-- Customers Card -->
                                    <div class="col-xxl-4 col-md-4">

                                        <div class="card info-card customers-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Complaint Certificate', 9)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    COMPLAINT CERTIFICATE
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color:rgba(0, 51, 102, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_complaint_certificate; ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="complaint_certificate_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div><!-- End Customers Card -->



                                </div>
                            </div><!-- End Left side columns -->
                        </div>

                        <!-- FOURTH ROW -->
                        <div class="carousel-item">

                            <!-- Left side columns -->
                            <div class="container-fluid col-lg-12">
                                <div class="row">



                                    <!-- Sales Card -->
                                    <div class="col-md-4 col-md-3">
                                        <div class="card info-card sales-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Death Certificate', 10)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    DEATH CERTIFICATE
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color:rgba(0, 128, 0, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_death_certificate; ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="death_certificate_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div><!-- End Sales Card -->

                                    <!-- Revenue Card -->
                                    <div class="col-md col-md-4">
                                        <div class="card info-card revenue-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('First Time Job Seeker', 11)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title ">
                                                    FIRST TIME JOB SEEKER
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color:rgba(153, 0, 0, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_first_time_job_seeker; ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="first_time_job_seeker_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div><!-- End Revenue Card -->



                                    <!-- Customers Card -->
                                    <div class="col-xxl-4 col-md-4">

                                        <div class="card info-card customers-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Lot Ownership', 12)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    LOT OWNERSHIP
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color:rgba(128, 0, 0, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_lot_ownership; ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="lot_ownership_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div><!-- End Customers Card -->



                                </div>
                            </div><!-- End Left side columns -->
                        </div>

                        <!-- FIFTH ROW -->
                        <div class="carousel-item">

                            <!-- Left side columns -->
                            <div class="container-fluid col-lg-12">
                                <div class="row">



                                    <!-- Sales Card -->
                                    <div class="col-md-4 col-md-3">
                                        <div class="card info-card sales-card">

                                            <div class="filter" style="z-index: 10;">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li class="dropdown-header text-start">
                                                        <h6>Option</h6>
                                                    </li>

                                                    <li>
                                                        <p class="dropdown-item display-1"
                                                            onclick="moreInfo('Transfer of Residency', 13)"
                                                            style="cursor: pointer;">Show Info</p>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="card-body">

                                                <h5 class="card-title">
                                                    TRANSFER OF RESIDENCY
                                                </h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text"
                                                            style="color:rgba(153, 153, 0, 1);">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>
                                                            <?php echo $count_transfer_of_residency; ?>
                                                        </h6>
                                                        <span class="text-success small pt-1 fw-bold"
                                                            id="transfer_of_residency_percent">%</span> <span
                                                            class="text-muted small pt-2 ps-1">increase</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End Sales Card -->
                                </div>
                            </div><!-- End Left side columns -->
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


                <div class="container col-md-12">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Bar Chart <span>| Reports</span></h5>

                        <div class="select-holder d-flex gap-3">
                            <select id="yearFilter" onchange="updateChart()" class="card p-2">
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>

                            <select id="monthFilter" onchange="updateChart()" class="card p-2">
                                <option value="all">All</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="col-lg">
                            <canvas id="myChart" style="width: 800px; height: 240px;"></canvas>
                            <div class="print-btn py-4 d-flex align-items-center justify-content-center">
                                <button onclick="printChartData()" class="btn btn-primary p-2">Print Reports</button>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                // Data for the bar chart
                                const chartData = {
                                    labels: ['Barangay Clearance', 'Business Permit (New)', 'Business Permit (Renew)', 'Certificate of Cohabitation', 'Certificate of Employability', 'Certificate of Income', 'Certificate of Indigency', 'Certificate of Indidency (AICS)', 'Complaint Certificate', 'Death Certificate', 'First Time Job Seeker', 'Lot Ownership', 'Transfer of Residency'],
                                    datasets: [{
                                        label: 'Number of Issued Certificates',
                                        backgroundColor: [
                                            'rgba(255, 25, 25, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 165, 0, 0.2)',
                                            'rgba(0, 51, 102, 0.2)',
                                            'rgba(0, 128, 0, 0.2)',
                                            'rgba(153, 0, 0, 0.2)',
                                            'rgba(77, 0, 77, 0.2)',
                                            'rgba(16, 16, 16, 0.2)',
                                            'rgba(128, 0, 0, 0.2)',
                                            'rgba(153, 153, 0, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 0, 0, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 165, 0, 1)',
                                            'rgba(0, 51, 102, 1)',
                                            'rgba(0, 128, 0, 1)',
                                            'rgba(153, 0, 0, 1)',
                                            'rgba(77, 0, 77, 1)',
                                            'rgba(16, 16, 16, 1)',
                                            'rgba(128, 0, 0, 1)',
                                            'rgba(153, 153, 0, 1)'
                                        ],
                                        borderWidth: 1,
                                        data: [
                                            barangay_clearance,
                                            business_permit_new,
                                            business_permit_renew,
                                            certificate_of_cohabitation,
                                            certificate_of_employability,
                                            certificate_of_income,
                                            certificate_of_indigency,
                                            certificate_of_indigency_aics,
                                            complaint_certificate,
                                            death_certificate,
                                            first_time_job_seeker,
                                            lot_ownership,
                                            transfer_of_residency]
                                    }]
                                };

                                const chartConfig = {
                                    type: 'bar',
                                    data: chartData,
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                };

                                const myChart = new Chart(document.getElementById('myChart'), chartConfig);

                                // Print function to open a new window with both table and chart
                                function printChartData() {
                                    const chartCanvas = document.getElementById('myChart');
                                    const chartImageURL = chartCanvas.toDataURL("image/png");

                                    // Generate the table content with chart data
                                    const chartLabels = chartData.labels;
                                    const chartValues = chartData.datasets[0].data;
                                    let content = '<html><head><title>Print Reports</title></head><body>';
                                    content += '<h2>Certificate Reports</h2>';
                                    content += '<h3>Table of Issued Certificates</h3>';
                                    content += '<table border="1" style="width: 100%; text-align: left;"><thead><tr><th>Certificate Type</th><th>Number Issued</th></tr></thead><tbody>';

                                    // Populate table rows
                                    chartLabels.forEach((label, index) => {
                                        content += `<tr><td>${label}</td><td>${chartValues[index]}</td></tr>`;
                                    });
                                    content += '</tbody></table>';

                                    // Add the chart image to the print window content
                                    content += '<h3>Bar Chart</h3>';
                                    content += `<img src="${chartImageURL}" style="width: 100%; height: auto;">`;

                                    content += '</body></html>';

                                    // Open a new window for printing and render the content
                                    const printWindow = window.open('', '_blank');
                                    printWindow.document.write(content);
                                    printWindow.document.close();
                                    printWindow.print();
                                }
                            </script>

                            <script>
                                function updateChart() {
                                    const month = document.getElementById('monthFilter').value;
                                    const year = document.getElementById('yearFilter').value;

                                    // Construct the URL with both month and year parameters
                                    let url = `getChartData.php?month=${month}&year=${year}`;

                                    fetch(url)
                                        .then(response => response.json())
                                        .then(data => {
                                            // If 'month' is 'all', reset the chart data to default values
                                            if (month === 'all') {
                                                myChart.data.datasets[0].data = [
                                                    data["Barangay Clearance"],
                                                    data["Business Permit New"],
                                                    data["Business Permit Renew"],
                                                    data["Certificate of Cohabitation"],
                                                    data["Certificate of Employability"],
                                                    data["Certificate of Income"],
                                                    data["Certificate of Indigency"],
                                                    data["Certificate of Indigency AICS"],
                                                    data["Complaint Certificate"],
                                                    data["Death Certificate"],
                                                    data["First Time Job Seeker"],
                                                    data["Lot Ownership"],
                                                    data["Transfer of Residency"]
                                                ];
                                            } else {
                                                // Update chart data with the fetched values from the specific month/year
                                                myChart.data.datasets[0].data = Object.values(data);
                                            }

                                            // Update the chart with new data
                                            myChart.update();
                                        })
                                        .catch(error => console.error('Error fetching chart data:', error));
                                }

                            </script>
                        </div>
                    </div>

                </div>
            </div>
        </section>

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

</body>

</html>