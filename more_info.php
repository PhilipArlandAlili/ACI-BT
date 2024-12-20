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
                            <?php
                            require 'includes/db.php';

                            // Get doc_id from the URL
                            $doc_id = isset($_GET['doc_id']) ? intval($_GET['doc_id']) : 0;
                            $doc_name = isset($_GET['doc_type']) ? $_GET['doc_type'] : "More Info";
                            $doc_name = str_replace("_", " ", $doc_name);
                            $doc_name = strtoupper($doc_name);
                            if ($doc_name != "More Info") {
                                echo "<h5 class='card-title fs-4'>$doc_name</h5>";
                            } else {
                                echo "<h5 class='card-title fs-4'>More Info</h5>";
                            }
                            ?>
                            <!-- Table with stripped rows -->
                            <table class="table datatable pt-3">
                                <thead>
                                    <tr>
                                        <?php
                                        // Barangay Clearance
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
                                        } 
                                        // Business Permit New and Renew
                                        elseif ($doc_id == 2 || $doc_id == 3) {
                                            echo "
                                            <th>Business Name</th>
                                            <th>Business Address</th>
                                            <th>Purok</th>
                                            <th>Business Owner</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } 
                                        // Certificate of Cohabitation
                                        elseif ($doc_id == 4) {
                                            echo "
                                            <th>Full Name (Male)</th>
                                            <th>Birthdate</th>
                                            <th>Full Name (Female)</th>
                                            <th>Birthdate</th>
                                            <th>Address</th>
                                            <th>Date of Marriage</th>
                                            <th>Years Married</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } 
                                        // Certificate of Employability
                                        elseif ($doc_id == 5) {
                                            echo "
                                            <th>Full Name</th>
                                            <th>Birthdate</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } 
                                        // Certificate of Income
                                        elseif ($doc_id == 6) {
                                            echo "
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Income (Number)</th>
                                            <th>Income (Words)</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } 
                                        // Certificate of Indigency (AICS)
                                        elseif ($doc_id == 7) {
                                            echo "
                                            <th>Full Name</th>
                                            <th>Birthdate</th>
                                            <th>Civil Status</th>
                                            <th>Address</th>
                                            <th>Purpose</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        }
                                        // Certificate of Transfer
                                        elseif ($doc_id == 8) {
                                            echo "
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Nationality</th>
                                            <th>Civil Status</th>
                                            <th>Previus Address</th>
                                            <th>Current Address</th>
                                            <th>Purpose</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        }
                                        // Complaint Certificate
                                        elseif ($doc_id == 9) {
                                            echo "
                                            <th>Full Name (Complainant)</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Date of Complain</th>
                                            <th>Full Name (Respondent)</th>
                                            <th>Case No.</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } 
                                        // Death Certificate
                                        elseif ($doc_id == 10) {
                                            echo "
                                            <th>Full Name</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Date of Death</th>
                                            <th>Time of Death</th>
                                            <th>Full Name (Requester)</th>
                                            <th>Relationship</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } 
                                        // First Time Job Seeker
                                        elseif ($doc_id == 11) {
                                            echo "
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Period of Residency</th>
                                            <th>Singed Date</th>
                                            <th>Validation Date</th>
                                            <th>Witness</th>
                                            <th>Age</th>
                                            <th>Full Name (Consent)</th>
                                            <th>Relationship</th>
                                            <th>Age</th>
                                            <th>Adress</th>
                                            <th>Period of Residency</th>
                                            <th>Duty Officer Name</th>
                                            ";
                                        }
                                        // Lot Ownership
                                        elseif ($doc_id == 12) {
                                            echo "
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Claimant</th>
                                            <th>Beneficiary</th>
                                            <th>Actual Occupant</th>
                                            <th>Lot No.</th>
                                            <th>Area Measurement (Number)</th>
                                            <th>Area Measurement (Words)</th>
                                            <th>Location Address</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        }
                                        // Certificate of Indigency Keeps
                                        elseif ($doc_id == 13) {
                                            echo "
                                            <th>Full Name</th>
                                            <th>Age</th>
                                            <th>Civil Status</th>
                                            <th>Address</th>
                                            <th>Purpose</th>
                                            <th>Issued Date</th>
                                            <th>Duty Officer Name</th>
                                        ";
                                        } 
                                        // Default
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
                                    // Barangay Clearance
                                    if ($doc_id == 1) {
                                        // Fetch data from barangay_clearance table when doc_id is 1
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, birthplace, birthdate, civil_status, period_of_residency, issued_date, purpose, duty_officer_name
                                        FROM barangay_clearance
                                        ORDER BY id DESC";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                $fullName = $row["first_name"]
                                                    . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                    . " " . $row["last_name"]
                                                    . (!empty($row["suffix"]) ? " " . $row["suffix"] : "");
                                                echo "<td>" . $fullName . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["birthplace"] . "</td>";
                                                echo "<td>" . $row["birthdate"] . "</td>";
                                                echo "<td>" . $row["civil_status"] . "</td>";
                                                $por = $row["period_of_residency"];
                                                $years = floor($por / 12); // Calculate full years
                                                $remaining_months = $por % 12; // Calculate remaining months
                                                
                                                if ($por == 1) {
                                                    echo "<td>" . $por . " month</td>";
                                                } elseif ($por < 12) {
                                                    echo "<td>" . $por . " months</td>";
                                                } elseif ($por == 12) {
                                                    echo "<td>" . $years . " year</td>";
                                                } elseif ($remaining_months == 0) { // Exact multiple of 12 months
                                                    echo "<td>" . $years . " years</td>";
                                                } else { // Combined years and months
                                                    echo "<td>" . $years . " year" . ($years > 1 ? "s" : "") . " and " . $remaining_months . " month" . ($remaining_months > 1 ? "s" : "") . "</td>";
                                                }
                                                echo "<td>" . $row["purpose"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='9'><center>No barangay clearances found</center></td></tr>";
                                        }
                                    } 
                                    // Business Permit New
                                    elseif ($doc_id == 2) {
                                        // Fetch data from business_permit_new table when doc_id is 2
                                        $sql = "SELECT business_name, manager, address, purok, issued_date, duty_officer_name
                                        FROM business_permit_new
                                        ORDER BY id DESC";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["business_name"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["purok"] . "</td>";
                                                echo "<td>" . $row["manager"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'><center>No new business permits found</center></td></tr>";
                                        }
                                    } 
                                    // Business Permit Renew
                                    elseif ($doc_id == 3) {
                                        // Fetch data from business_permit_renew table when doc_id is 3
                                        $sql = "SELECT business_name, manager, address, purok, issued_date, duty_officer_name
                                        FROM business_permit_renew
                                        ORDER BY id DESC";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["business_name"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["purok"] . "</td>";
                                                echo "<td>" . $row["manager"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'><center>No renewed business permits found</center></td></tr>";
                                        }
                                    } 
                                    // Certificate of Cohabitation
                                    elseif ($doc_id == 4) {
                                        // Fetch data from cohabitation table when doc_id is 4
                                        $sql = "SELECT first_name_male, middle_name_male, last_name_male, suffix_male, birthdate_male, first_name_female, middle_name_female, last_name_female, birthdate_female, address, date_of_marriage, years_married, issued_date, duty_officer_name
                                        FROM certificate_of_cohabitation
                                        ORDER BY id DESC";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                $fullNameMale = $row["first_name_male"]
                                                    . (!empty($row["middle_name_male"]) ? " " . $row["middle_name_male"] : "")
                                                    . " " . $row["last_name_male"]
                                                    . (!empty($row["suffix_male"]) ? " " . $row["suffix_male"] : "");
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
                                            }
                                        } else {
                                            echo "<tr><td colspan='9'><center>No cohabitation records found</center></td></tr>";
                                        }
                                    } 
                                    // Certificate of Employability
                                    elseif ($doc_id == 5) {
                                        // Fetch data from certificate_of_employability table when doc_id is 5
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, birthdate, age, issued_date, duty_officer_name
                                        FROM certificate_of_employability
                                        ORDER BY id DESC";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                $fullName = $row["first_name"]
                                                    . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                    . " " . $row["last_name"]
                                                    . (!empty($row["suffix"]) ? " " . $row["suffix"] : "");
                                                echo "<td>" . $fullName . "</td>";
                                                echo "<td>" . $row["birthdate"] . "</td>";
                                                echo "<td>" . $row["age"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'><center>No employability certificates found</center></td></tr>";
                                        }
                                    }
                                    // Certificate of Income
                                    elseif ($doc_id == 6) {
                                        // Fetch data from certificate_of_income table when doc_id is 8
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, income_num, income_words, issued_date, duty_officer_name
                                        FROM certificate_of_income
                                        ORDER BY id DESC";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                                $fullName = $row["first_name"]
                                                    . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                    . " " . $row["last_name"]
                                                    . (!empty($row["suffix"]) ? " " . $row["suffix"] : "");
                                                echo "<td>" . $fullName . "</td>";
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
                                    } 
                                    // Certificate of Indigency (AICS)
                                    elseif ($doc_id == 7) {
                                        // Fetch data from indigency_aics table when doc_id is 7
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, birthdate, civil_status, address, purpose, issued_date, duty_officer_name
                                        FROM certificate_of_indigency
                                        ORDER BY id DESC";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            $fullName = $row["first_name"]
                                                . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                . " " . $row["last_name"]
                                                . (!empty($row["suffix"]) ? " " . $row["suffix"] : "");
                                            echo "<td>" . $fullName . "</td>";
                                            echo "<td>" . $row["birthdate"] . "</td>";
                                            echo "<td>" . $row["civil_status"] . "</td>";
                                            echo "<td>" . $row["address"] . "</td>";
                                            echo "<td>" . $row["purpose"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'><center>No indigency (AICS) certificates found</center></td></tr>";
                                        }
                                    } 
                                    // Certificate of Transfer
                                    elseif ($doc_id == 8) {
                                        // Fetch data from transfer_of_residency table when doc_id is 13
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, nationality, civil_status, previous_address, current_address, purpose, issued_date, duty_officer_name
                                        FROM transfer_of_residency
                                        ORDER BY id DESC";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
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
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'><center>No transfer of residency certificates found</center></td></tr>";
                                        }
                                    
                                    }
                                    // Complaint Certificate
                                    elseif ($doc_id == 9) {
                                        // Fetch data from complaint_certificate table when doc_id is 9
                                        $sql = "SELECT first_name_complainant, middle_name_complainant, last_name_complainant, suffix_complainant, age, address, date_of_complain, first_name_respondent, middle_name_respondent, last_name_respondent, suffix_respondent, case_no, vawc_official_name, issued_date, duty_officer_name
                                        FROM complaint_certificate
                                        ORDER BY id DESC";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            $fullNameComplaint = $row["first_name_complainant"]
                                                . (!empty($row["middle_name_complainant"]) ? " " . $row["middle_name_complainant"] : "")
                                                . " " . $row["last_name_complainant"]
                                                . (!empty($row["suffix_complainant"]) ? " " . $row["suffix_complainant"] : "");
                                                echo "<td>" . $fullNameComplaint . "</td>";
                                                echo "<td>" . $row["age"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["date_of_complain"] . "</td>";

                                                $fullNameRespondent = $row["first_name_respondent"]
                                                    . (!empty($row["middle_name_respondent"]) ? " " . $row["middle_name_respondent"] : "")
                                                    . " " . $row["last_name_respondent"]
                                                    . (!empty($row["suffix_respondent"]) ? " " . $row["suffix_respondent"] : "");
                                                echo "<td>" . $fullNameRespondent . "</td>";
                                                echo "<td>" . $row["case_no"] . "</td>";
                                                echo "<td>" . $row["issued_date"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'><center>No complaint certificates found</center></td></tr>";
                                        }
                                    } 
                                    // Death Certificate
                                    elseif ($doc_id == 10) {
                                        // Fetch data from death_certificate table when doc_id is 10
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, age, address, date_of_death, time_of_death, req_first_name, req_middle_name, req_last_name, req_suffix, relationship, issued_date, duty_officer_name
                                        FROM death_certificate";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
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
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'><center>No death certificates found</center></td></tr>";
                                        }
                                    } 
                                    // First Time Job Seeker
                                    elseif ($doc_id == 11) {
                                        // Fetch data from first_time_job_seeker table when doc_id is 11
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, period_of_residency, signed_date, validation_date, witness, age, consent_first_name, consent_middle_name, consent_last_name, consent_suffix, relationship, consent_age, consent_address, consent_period_of_residency, duty_officer_name
                                        FROM first_time_job_seeker
                                        ORDER BY id DESC";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                $fullName = $row["first_name"]
                                                    . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                    . " " . $row["last_name"]
                                                    . (!empty($row["suffix"]) ? " " . $row["suffix"] : "");
                                                echo "<td>" . $fullName . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["period_of_residency"] . "</td>";
                                                echo "<td>" . $row["signed_date"] . "</td>";
                                                echo "<td>" . $row["validation_date"] . "</td>";
                                                echo "<td>" . $row["witness"] . "</td>";
                                                echo "<td>" . $row["age"] . "</td>";
                                                $fullNameConsent = $row["consent_first_name"]
                                                    . (!empty($row["consent_middle_name"]) ? " " . $row["consent_middle_name"] : "")
                                                    . " " . $row["consent_last_name"]
                                                    . (!empty($row["consent_suffix"]) ? " " . $row["consent_suffix"] : "");
                                                echo "<td>" . $fullNameConsent . "</td>";
                                                echo "<td>" . $row["relationship"] . "</td>";
                                                echo "<td>" . $row["consent_age"] . "</td>";
                                                echo "<td>" . $row["consent_address"] . "</td>";
                                                echo "<td>" . $row["consent_period_of_residency"] . "</td>";
                                                echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'><center>No first time job seekers found</center></td></tr>";
                                        }
                                    }
                                    // Lot Ownership
                                    elseif ($doc_id == 12) {
                                        // Fetch data from lot_ownership table when doc_id is 12
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, address, claimant, beneficiary, actual_occupant, lot_no, area_measurement_num, area_measurement_words, loc_address, issued_date, duty_officer_name
                                        FROM lot_ownership";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                // echo "<td>" . $row["id"] . "</td>";
                                                $fullName = $row["first_name"]
                                                    . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                    . " " . $row["last_name"]
                                                    . (!empty($row["suffix"]) ? " " . $row["suffix"] : "");
                                                    echo "<td>" . $fullName . "</td>";
                                                    echo "<td>" . $row["address"] . "</td>";
                                                    echo "<td>" . $row["claimant"] . "</td>";
                                                    echo "<td>" . $row["beneficiary"] . "</td>";
                                                    echo "<td>" . $row["actual_occupant"] . "</td>";
                                                    echo "<td>" . $row["lot_no"] . "</td>";
                                                    echo "<td>" . $row["area_measurement_num"] . "</td>";
                                                    echo "<td>" . $row["area_measurement_words"] . "</td>";
                                                    echo "<td>" . $row["loc_address"] . "</td>";
                                                    echo "<td>" . $row["issued_date"] . "</td>";
                                                    echo "<td>" . $row["duty_officer_name"] . "</td>";
                                                    echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='10'><center>No lot ownership certificates found</center></td></tr>";
                                        }
                                    } 
                                    // Certificate of Indigency keeps
                                    elseif ($doc_id == 13) {
                                        // Fetch data from indigency table when doc_id is 6
                                        $sql = "SELECT first_name, middle_name, last_name, suffix, age, civil_status, address, purpose, issued_date, duty_officer_name
                                        FROM certificate_of_indigency";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                                $fullName = $row["first_name"]
                                                    . (!empty($row["middle_name"]) ? " " . $row["middle_name"] : "")
                                                    . " " . $row["last_name"]
                                                    . (!empty($row["suffix"]) ? ", " . $row["suffix"] : "");
                                                echo "<td>" . $fullName . "</td>";
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
                                    }
                                    // Default
                                    else {
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