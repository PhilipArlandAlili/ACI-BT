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
                            <?php

                            require 'includes/db.php';

                            $doc_name = $_GET['doc_name'];
                            $doc_name = str_replace("_", " ", $doc_name);
                            if ($doc_name) {
                                echo "<h5 class='card-title fs-4'>" . $doc_name . "</h5>";
                            } else {
                                echo "<h5 class='card-title fs-4'>No transaction selected</h5>";
                            }
                            ?>
                            <!-- Table with stripped rows -->
                            <table class="table">
                                <?php

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
                                            echo "<th>Full Name</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Birthplace</th>";
                                            echo "<th>Birthdate</th>";
                                            echo "<th>Civil Status</th>";
                                            echo "<th>Period of Residency</th>";
                                            echo "<th>Purpose</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // Combine first_name, middle_name, last_name, and suffix into Full Name
                                            $fullName = $row["first_name"]
                                                . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                . " " . $row["last_name"]
                                                . (!empty($row["suffix"]) ? ", " . $row["suffix"] : "");
                                            echo "<td>" . $fullName . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["birthplace"] . "</td>";
                                            echo "<td>" . $row["birthdate"] . "</td>";
                                            echo "<td>" . $row["civil_status"] . "</td>";
                                            $por = $row["period_of_residency"];
                                            $years = floor($por / 12);
                                            if ($por == 1) {
                                                echo "<td>" . $por . " month</td>";
                                            } elseif ($por < 12) {
                                                echo "<td>" . $por . " months</td>";
                                            } elseif ($por/12 == 1) {
                                                echo "<td>" . $years . " year</td>";
                                            } elseif ($por > 12) {
                                                echo "<td>" . $years . " years</td>";
                                            }
                                            echo "<td>" . $row["purpose"] . "</td>";
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
                                            echo "<th>Full Name (Male)</th>";
                                            echo "<th>Birthdate</th>";
                                            echo "<th>Full Name (Female)</th>";
                                            echo "<th>Birthdate</th>";
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
                                            $fullNameMale = $row["first_name_male"]
                                                . (!empty($row["middle_name_male"]) ? " " . $row["middle_name_male"] : "")
                                                . " " . $row["last_name_male"]
                                                . (!empty($row["suffix_male"]) ? ", " . $row["suffix_male"] : "");
                                            echo "<td>" . $fullNameMale . "</td>";
                                            echo "<td>" . $row["birthdate_male"] . "</td>";

                                            $fullNameFemale = $row["first_name_female"]
                                                . (!empty($row["middle_name_female"]) ? " " . $row["middle_name_female"] : "")
                                                . " " . $row["last_name_female"];
                                            echo "<td>" . $fullNameFemale . "</td>";
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
                                            echo "<th>Full Name</th>";
                                            echo "<th>Age</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            $fullName = $row["first_name"]
                                                . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                . " " . $row["last_name"]
                                                . (!empty($row["suffix"]) ? ", " . $row["suffix"] : "");
                                            echo "<td>" . $fullName . "</td>";
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
                                            echo "<th>Full Name</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Income (Number)</th>";
                                            echo "<th>Income (Words)</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            $fullName = $row["first_name"]
                                                . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                . " " . $row["last_name"]
                                                . (!empty($row["suffix"]) ? ", " . $row["suffix"] : "");
                                            echo "<td>" . $fullName . "</td>";
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
                                            echo "<th>Full Name</th>";
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
                                            $fullName = $row["first_name"]
                                                . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                . " " . $row["last_name"]
                                                . (!empty($row["suffix"]) ? " " . $row["suffix"] : "");
                                            echo "<td>" . $fullName . "</td>";
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
                                            echo "<th>Full Name</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            $fullName = $row["first_name"]
                                                . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                . " " . $row["last_name"]
                                                . (!empty($row["suffix"]) ? " " . $row["suffix"] : "");
                                            echo "<td>" . $fullName . "</td>";
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
                                            echo "<th>Full Name (Complainant)</th>";
                                            echo "<th>Age</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Date of Complain</th>";
                                            echo "<th>Full Name (Respondent)</th>";
                                            echo "<th>Case No.</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            $fullNameComplaint = $row["first_name_complainant"]
                                                . (!empty($row["middle_name_complainant"]) ? " " . $row["middle_name_complainant"] : "")
                                                . " " . $row["last_name_complainant"]
                                                . (!empty($row["suffix_complainant"]) ? ", " . $row["suffix_complainant"] : "");
                                            echo "<td>" . $fullNameComplaint . "</td>";
                                            echo "<td>" . $row["age"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["date_of_complain"] . "</td>";

                                            $fullNameRespondent = $row["first_name_respondent"]
                                                . (!empty($row["middle_name_respondent"]) ? " " . $row["middle_name_respondent"] : "")
                                                . " " . $row["last_name_respondent"]
                                                . (!empty($row["suffix_respondent"]) ? ", " . $row["suffix_respondent"] : "");
                                            echo "<td>" . $fullNameRespondent . "</td>";
                                            echo "<td>" . $row["case_no"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        if ($table == "death_certificate") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>Full Name</th>";
                                            echo "<th>Age</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Date of Death</th>";
                                            echo "<th>Time of Death</th>";
                                            echo "<th>Full Name (Requester)</th>";
                                            echo "<th>Relationship</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            $fullName = $row["first_name"]
                                                . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                . " " . $row["last_name"]
                                                . (!empty($row["suffix"]) ? ", " . $row["suffix"] : "");
                                            echo "<td>" . $fullName . "</td>";

                                            echo "<td>" . $row["age"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["date_of_death"] . "</td>";
                                            echo "<td>" . $row["time_of_death"] . "</td>";

                                            $fullNameReq = $row["req_first_name"]
                                                . (!empty($row["req_middle_name"]) ? " " . $row["req_middle_name"] : "")
                                                . " " . $row["req_last_name"]
                                                . (!empty($row["req_suffix"]) ? ", " . $row["req_suffix"] : "");
                                            echo "<td>" . $fullNameReq . "</td>";
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
                                            echo "<th>Full Name</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Lot No.</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            $fullName = $row["first_name"]
                                                . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                . " " . $row["last_name"]
                                                . (!empty($row["suffix"]) ? ", " . $row["suffix"] : "");
                                            echo "<td>" . $fullName . "</td>";
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
                                            echo "<th>Full Name</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>Nationality</th>";
                                            echo "<th>Civil Status</th>";
                                            echo "<th>Previus Address</th>";
                                            echo "<th>Current Address</th>";
                                            echo "<th>Purpose</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            $fullName = $row["first_name"]
                                                . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                . " " . $row["last_name"]
                                                . (!empty($row["suffix"]) ? ", " . $row["suffix"] : "");
                                            echo "<td>" . $fullName . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["nationality"] . "</td>";
                                            echo "<td>" . $row["civil_status"] . "</td>";
                                            echo "<td>" . $row["previous_address"] . "</td>";
                                            echo "<td>" . $row["current_address"] . "</td>";
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