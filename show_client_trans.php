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
    <title>ACI-BT | View Transactions</title>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include 'includes/header.php' ?>
    </header>

    <aside id="sidebar" class="sidebar">
        <?php include 'includes/sidebar.php' ?>
    </aside>

    <main id="main" class="main">
        <a href="view_transactions.php" class="navigation d-flex align-items-center py-3 mx-2">
            <i class="bx bxs-caret-left-square fs-2 "></i>
            <span class="fs-3 fw-semibold ">Back</span>
        </a>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4">Transaction Table</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <?php

                                require 'includes/db.php';

                                $id = $_GET['id'];
                                $table = strtolower($_GET['doc_name']);

                                $sql = "SELECT * FROM $table WHERE id = $id";

                                $result = $conn->query($sql);

                                // Check if there are rows returned
                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        // For Barangay Certification
                                        if ($table == "barangay_clearance") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Middle Name</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>Suffix</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Birthplace</th>";
                                            echo "<th>Birthdate</th>";
                                            echo "<th>Civil Status</th>";
                                            echo "<th>Period of Residency</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["first_name"] . "</td>";
                                            echo "<td>" . $row["middle_name"] . "</td>";
                                            echo "<td>" . $row["last_name"] . "</td>";
                                            echo "<td>" . $row["suffix"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["birthplace"] . "</td>";
                                            echo "<td>" . $row["birthdate"] . "</td>";
                                            echo "<td>" . $row["civil_status"] . "</td>";
                                            echo "<td>" . $row["period_of_residency"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";

                                        }

                                        // For Business Permit New
                                        if ($table == "business_permit_new") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>Business Name</th>";
                                            echo "<th>Business Address</th>";
                                            echo "<th>Business Owner</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["business_name"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["manager"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }

                                        if ($table == "business_permit_renew") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>Business Name</th>";
                                            echo "<th>Business Address</th>";
                                            echo "<th>Business Owner</th>";

                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["business_name"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["manager"] . "</td>";

                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        if ($table == "certificate_of_cohabitation") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>First Name(Male)</th>";
                                            echo "<th>Middle Name(Male)</th>";
                                            echo "<th>Last Name(Male)</th>";
                                            echo "<th>Suffix(Male)</th>";
                                            echo "<th>Birthdate(Male)</th>";
                                            echo "<th>First Name(Female)</th>";
                                            echo "<th>Middle Name(Female)</th>";
                                            echo "<th>Last Name(Female)</th>";
                                            echo "<th>Birthdate(Female)</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Date of Marriage</th>";
                                            echo "<th>Years Married</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["first_name_male"] . "</td>";
                                            echo "<td>" . $row["middle_name_male"] . "</td>";
                                            echo "<td>" . $row["last_name_male"] . "</td>";
                                            echo "<td>" . $row["suffix_male"] . "</td>";
                                            echo "<td>" . $row["birthdate_male"] . "</td>";
                                            echo "<td>" . $row["first_name_female"] . "</td>";
                                            echo "<td>" . $row["middle_name_female"] . "</td>";
                                            echo "<td>" . $row["last_name_female"] . "</td>";
                                            echo "<td>" . $row["birthdate_female"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["date_of_marriage"] . "</td>";
                                            echo "<td>" . $row["years_married"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        if ($table == "certificate_of_employability") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Middle Name</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>Suffix</th>";
                                            echo "<th>Age</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["first_name"] . "</td>";
                                            echo "<td>" . $row["middle_name"] . "</td>";
                                            echo "<td>" . $row["last_name"] . "</td>";
                                            echo "<td>" . $row["suffix"] . "</td>";
                                            echo "<td>" . $row["age"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        if ($table == "certificate_of_income") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Middle Name</th>";
                                            echo "<th>Last Namer</th>";
                                            echo "<th>Suffix</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Income(Number)</th>";
                                            echo "<th>Income(Words)</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["first_name"] . "</td>";
                                            echo "<td>" . $row["middle_name"] . "</td>";
                                            echo "<td>" . $row["last_name"] . "</td>";
                                            echo "<td>" . $row["suffix"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["income_num"] . "</td>";
                                            echo "<td>" . $row["income_words"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        if ($table == "certificate_of_indigency") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Middle Name</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>Suffix</th>";
                                            echo "<th>Age</th>";
                                            echo "<th>Civil Status</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Purpose</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["first_name"] . "</td>";
                                            echo "<td>" . $row["middle_name"] . "</td>";
                                            echo "<td>" . $row["last_name"] . "</td>";
                                            echo "<td>" . $row["suffix"] . "</td>";
                                            echo "<td>" . $row["age"] . "</td>";
                                            echo "<td>" . $row["civil_status"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["purpose"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        if ($table == "certificate_of_indigency_aics") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Middle Name</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>Suffix</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["first_name"] . "</td>";
                                            echo "<td>" . $row["middle_name"] . "</td>";
                                            echo "<td>" . $row["last_name"] . "</td>";
                                            echo "<td>" . $row["suffix"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        if ($table == "complaint_certificate") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>First Name(Complainant)</th>";
                                            echo "<th>Middle Name(Complainant)</th>";
                                            echo "<th>Last Namer(Complainant)</th>";
                                            echo "<th>Suffix(Complainant)</th>";
                                            echo "<th>Age</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Date of Complain</th>";
                                            echo "<th>First Name(Respondent)</th>";
                                            echo "<th>Middle Name(Respondent)</th>";
                                            echo "<th>Last Name(Respondent)</th>";
                                            echo "<th>Suffix(Respondent)</th>";
                                            echo "<th>Case No.</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["first_name_complainant"] . "</td>";
                                            echo "<td>" . $row["middle_name_complainant"] . "</td>";
                                            echo "<td>" . $row["last_name_complainant"] . "</td>";
                                            echo "<td>" . $row["suffix_complainant"] . "</td>";
                                            echo "<td>" . $row["age"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["date_of_complain"] . "</td>";
                                            echo "<td>" . $row["first_name_respondent"] . "</td>";
                                            echo "<td>" . $row["middle_name_respondent"] . "</td>";
                                            echo "<td>" . $row["last_name_respondent"] . "</td>";
                                            echo "<td>" . $row["suffix_respondent"] . "</td>";
                                            echo "<td>" . $row["case_no"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        if ($table == "death_certificate") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Middle Name</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>Suffix</th>";
                                            echo "<th>Age</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Date of Death</th>";
                                            echo "<th>Time of Death</th>";
                                            echo "<th>First Name(Requester)</th>";
                                            echo "<th>Middle Name(Requester)</th>";
                                            echo "<th>Last Name(Requester)</th>";
                                            echo "<th>Suffix(Requester)</th>";
                                            echo "<th>Relationship</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["first_name"] . "</td>";
                                            echo "<td>" . $row["middle_name"] . "</td>";
                                            echo "<td>" . $row["last_name"] . "</td>";
                                            echo "<td>" . $row["suffix"] . "</td>";
                                            echo "<td>" . $row["age"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["date_of_death"] . "</td>";
                                            echo "<td>" . $row["time_of_death"] . "</td>";
                                            echo "<td>" . $row["req_first_name"] . "</td>";
                                            echo "<td>" . $row["req_middle_name"] . "</td>";
                                            echo "<td>" . $row["req_last_name"] . "</td>";
                                            echo "<td>" . $row["req_suffix"] . "</td>";
                                            echo "<td>" . $row["relationship"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        if ($table == "lot_ownership") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Middle Name</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>Suffix</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Lot No.</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["first_name"] . "</td>";
                                            echo "<td>" . $row["middle_name"] . "</td>";
                                            echo "<td>" . $row["last_name"] . "</td>";
                                            echo "<td>" . $row["suffix"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["lot_no"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        if ($table == "transfer_of_residency") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>First Name</th>";
                                            echo "<th>Middle Name</th>";
                                            echo "<th>Last Name</th>";
                                            echo "<th>Suffix</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Nationality</th>";
                                            echo "<th>Civil Status</th>";
                                            echo "<th>Previus Address</th>";
                                            echo "<th>Purpose</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["first_name"] . "</td>";
                                            echo "<td>" . $row["middle_name"] . "</td>";
                                            echo "<td>" . $row["last_name"] . "</td>";
                                            echo "<td>" . $row["suffix"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["nationality"] . "</td>";
                                            echo "<td>" . $row["civil_status"] . "</td>";
                                            echo "<td>" . $row["previous_address"] . "</td>";
                                            echo "<td>" . $row["purpose"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                    }
                                } else {
                                    echo "<tr><td colspan='5'><center>No transactions found</center></td></tr>";
                                }

                                // Close the database connection
                                $conn->close();
                                ?>
                            </table>
                            <!-- End Table with stripped rows -->
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

    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>