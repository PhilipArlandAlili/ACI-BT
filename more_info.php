<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php' ?>
    <title>ACI-BT | More Info </title>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include 'includes/header.php' ?>
    </header>

    <aside id="sidebar" class="sidebar">
        <?php include 'includes/sidebar.php' ?>
    </aside>

    <main id="main" class="main">
        <a href="view_reports.php" class="navigation d-flex align-items-center mx-2">
            <i class="bx bxs-caret-left-square fs-2 "></i>
            <span class="fs-3 fw-semibold ">Back</span>
        </a>

        <section class="section pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4">More Info</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable pt-3">
                                <thead>
                                    <tr>
                                        <?php
                                        require 'includes/db.php';

                                        // Get doc_id from the URL
                                        $doc_id = isset($_GET['doc_id']) ? intval($_GET['doc_id']) : 0;

                                        if ($doc_id == 1) {
                                            echo "
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Birthplace</th>
                                            <th>Birthdate</th>
                                            <th>Civil Status</th>
                                            <th>Period of Residency</th>
                                            <th>Purpose</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } elseif ($doc_id == 2 || $doc_id == 3) {
                                            echo "
                                            <th>Business Name</th>
                                            <th>Address</th>
                                            <th>Owner</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } elseif ($doc_id == 4) {
                                            echo "
                                            <th>First Name (Male)</th>
                                            <th>Middle Name (Male)</th>
                                            <th>Last Name (Male)</th>
                                            <th>Suffix (Male)</th>
                                            <th>Birthdate (Male)</th>
                                            <<th>First Name (Female)</th>
                                            <th>Middle Name (Female)</th>
                                            <th>Last Name (Female)</th>
                                            <th>Birthdate (Female)</th>
                                            <th>Address</th>
                                            <th>Date of Marriage</th>
                                            <th>Years Married</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } elseif ($doc_id == 5) {
                                            echo "
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Suffix</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } elseif ($doc_id == 6) {
                                            echo "
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Suffix</th>
                                            <th>Address</th>
                                            <th>Income (Number)</th>
                                            <th>Income (Words)</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } elseif ($doc_id == 7) {
                                            echo "
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Suffix</th>
                                            <th>Age</th>
                                            <th>Civil Status</th>
                                            <th>Address</th>
                                            <th>Purpose</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } elseif ($doc_id == 8) {
                                            echo "
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Suffix</th>
                                            <th>Address</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } elseif ($doc_id == 9) {
                                            echo "
                                            <th>First Name (Complainant)</th>
                                            <th>Middle Name  (Complainant)</th>
                                            <th>Last Name  (Complainant)</th>
                                            <th>Suffix  (Complainant)</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Date of Complain</th>
                                            <th>First Name (Respondent)</th>
                                            <th>Middle Name (Respondent)</th>
                                            <th>Last Name (Respondent)</th>
                                            <th>Suffix (Respondent)</th>
                                            <th>Case No.</th>
                                            <th>VAWC Official Name</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } elseif ($doc_id == 10) {
                                            echo "
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Suffix</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Date of Death</th>
                                            <th>Time of Death</th>
                                            <th>First Name (Requester)</th>
                                            <th>Middle Name (Requester)</th>
                                            <th>Last Name (Requester)</th>
                                            <th>Suffix (Requester)</th>
                                            <th>Relationship</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } elseif ($doc_id == 11) {
                                            echo "
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Suffix</th>
                                            <th>Address</th>
                                            <th>Lot No.</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } elseif ($doc_id == 12) {
                                            echo "
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Suffix</th>
                                            <th>Address</th>
                                            <th>Nationality</th>
                                            <th>Civil Status</th>
                                            <th>Previous Address</th>
                                            <th>Purpose</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } 
                                        else {
                                            echo "
                                            <th>ID</th>
                                            <th>Transacted By</th>
                                            <th>Document Name</th>
                                            <th>Client Transaction ID</th>
                                            <th>Created At</th>
                                        ";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($doc_id == 1) {
                                        // Fetch data from barangay_clearance table when doc_id is 1
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, birthplace, birthdate, civil_status, period_of_residency, issued_date, purpose, duty_officer_name
                                        FROM barangay_clearance";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                $fullName = $row["first_name"]
                                                . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                . " " . $row["last_name"]
                                                . (!empty($row["suffix"]) ? ", " . $row["suffix"] : "");
                                                echo "<td>" . $fullName . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["birthplace"] . "</td>";
                                                echo "<td>" . $row["birthdate"] . "</td>";
                                                echo "<td>" . $row["civil_status"] . "</td>";
                                                $por = $row["period_of_residency"] / 12;
                                                if ($por >= 12) {
                                                    if ($por == 1) {
                                                        echo "<td>" . $por . " year</td>";
                                                    } else {
                                                        echo "<td>" . $por . " years</td>";
                                                    }
                                                } else {
                                                    if ($row["period_of_residency"] == 1) {
                                                        echo "<td>" . $row["period_of_residency"] . " month</td>";
                                                    } else {
                                                        echo "<td>" . $row["period_of_residency"] . " months</td>";
                                                    }
                                                }
                                                echo "<td>" . $row["purpose"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='9'><center>No barangay clearances found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 2) {
                                        // Fetch data from business_permit_new table when doc_id is 2
                                        $sql = "SELECT business_name, manager, address, issued_date, duty_officer_name
                                        FROM business_permit_new";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["business_name"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["manager"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'><center>No new business permits found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 3) {
                                        // Fetch data from business_permit_renew table when doc_id is 3
                                        $sql = "SELECT business_name, manager, address, issued_date, duty_officer_name
                                        FROM business_permit_renew";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["business_name"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["manager"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'><center>No renewed business permits found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 4) {
                                        // Fetch data from cohabitation table when doc_id is 4
                                        $sql = "SELECT first_name_male, middle_name_male, last_name_male, suffix_male, birthdate_male, first_name_female, middle_name_female, last_name_female, birthdate_female, address, date_of_marriage, years_married, issued_date, duty_officer_name
                                        FROM certificate_of_cohabitation";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
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
                                            }
                                        } else {
                                            echo "<tr><td colspan='9'><center>No cohabitation records found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 5) {
                                        // Fetch data from certificate_of_employability table when doc_id is 5
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, age, issued_date, duty_officer_name
                                        FROM certificate_of_employability";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["first_name"] . "</td>";
                                                echo "<td>" . $row["middle_name"] . "</td>";
                                                echo "<td>" . $row["last_name"] . "</td>";
                                                echo "<td>" . $row["suffix"] . "</td>";
                                                echo "<td>" . $row["age"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'><center>No employability certificates found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 6) {
                                        // Fetch data from certificate_of_income table when doc_id is 8
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, income_num, income_words, issued_date, duty_officer_name
                                        FROM certificate_of_income";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
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
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'><center>No certificates of income found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 7) {
                                        // Fetch data from indigency table when doc_id is 6
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, age, civil_status, address, purpose, issued_date, duty_officer_name
                                        FROM certificate_of_indigency";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
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
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'><center>No indigency certificates found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 8) {
                                        // Fetch data from indigency_aics table when doc_id is 7
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, issued_date, duty_officer_name
                                        FROM certificate_of_indigency_aics";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["first_name"] . "</td>";
                                                echo "<td>" . $row["middle_name"] . "</td>";
                                                echo "<td>" . $row["last_name"] . "</td>";
                                                echo "<td>" . $row["suffix"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'><center>No indigency (AICS) certificates found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 9) {
                                        // Fetch data from complaint_certificate table when doc_id is 9
                                        $sql = "SELECT first_name_complainant, middle_name_complainant, last_name_complainant, suffix_complainant, age, address, date_of_complain, first_name_respondent, middle_name_respondent, last_name_respondent, suffix_respondent, case_no, vawc_official_name, issued_date, duty_officer_name
                                        FROM complaint_certificate";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
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
                                                echo "<td>" . $row["vawc_official_name"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'><center>No complaint certificates found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 10) {
                                        // Fetch data from death_certificate table when doc_id is 10
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, age, address, date_of_death, time_of_death, req_first_name, req_middle_name, req_last_name, req_suffix, relationship, issued_date, duty_officer_name
                                        FROM death_certificate";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
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
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'><center>No death certificates found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 11) {
                                        // Fetch data from lot_ownership table when doc_id is 12
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, claimant, beneficiary, actual_occupant, lot_no, area_measurement_num, area_measurement_words, loc_address, issued_date, duty_officer_name
                                        FROM lot_ownership";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["first_name"] . "</td>";
                                                echo "<td>" . $row["middle_name"] . "</td>";
                                                echo "<td>" . $row["last_name"] . "</td>";
                                                echo "<td>" . $row["suffix"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["lot_no"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='10'><center>No lot ownership certificates found</center></td></tr>";
                                        }
                                    } elseif ($doc_id == 12) {
                                        // Fetch data from transfer_of_residency table when doc_id is 13
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, nationality, civil_status, previous_address, purpose, issued_date, duty_officer_name
                                        FROM transfer_of_residency";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
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
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'><center>No transfer of residency certificates found</center></td></tr>";
                                        }
                                    } else {
                                        // Default case to handle all other doc_id values
                                        echo "<tr><td colspan='5'><center>No transactions found</center></td></tr>";
                                    }

                                    $conn->close();
                                    ?>
                                </tbody>
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