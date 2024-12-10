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
    $period_of_residency_ym = $conn->real_escape_string($_POST["period_of_residency_ym"]);
    $period_of_residency = $conn->real_escape_string($_POST["period_of_residency"]);
    $purpose = $conn->real_escape_string($_POST["purpose"]);

    $fullname = $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $suffix;

    if ($period_of_residency_ym == 'years') {
        $period_of_residency = $period_of_residency*12;
    }

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
    }
    $stmt->close();
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
    }
    $stmt->close();
}

if (isset($_POST["certificate_of_cohabitation"])){
    $first_name_male = $conn->real_escape_string($_POST["first_name"]);
    $middle_name_male = $conn->real_escape_string($_POST["middle_name"]);
    $last_name_male = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $birthdate = $conn->real_escape_string($_POST["birthdate"]);
    $first_name_female = $conn->real_escape_string($_POST["first_name_female"]);
    $middle_name_female = $conn->real_escape_string($_POST["middle_name_female"]);
    $last_name_female = $conn->real_escape_string($_POST["last_name_female"]);
    $birthdate_female = $conn->real_escape_string($_POST["birthdate_female"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $date_of_marriage = $conn->real_escape_string($_POST["date_of_marriage"]);

    $fullname = $first_name_female . ' ' . $middle_name_female . ' ' . $last_name_female;
    $years_married = date('Y') - date('Y', strtotime($date_of_marriage));

    $stmt = $conn->prepare("INSERT INTO certificate_of_cohabitation (first_name_male, middle_name_male, last_name_male, suffix_male, birthdate_male, first_name_female, middle_name_female, last_name_female, birthdate_female, address, date_of_marriage, years_married, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssssssiss', $first_name_male, $middle_name_male, $last_name_male, $suffix, $birthdate, $first_name_female, $middle_name_female, $last_name_female, $birthdate_female, $purok, $date_of_marriage, $years_married, $issued_date, $duty_officer_name);

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

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 4, ?, (SELECT COUNT(*) FROM certificate_of_cohabitation), NOW())");
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
    }
    $stmt->close();
}

if (isset($_POST["certificate_of_employability"])) {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $birthdate = $conn->real_escape_string($_POST["birthdate"]);

    $age = date('Y') - date('Y', strtotime($birthdate));
    $fullname = $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $suffix;

    $stmt = $conn->prepare("INSERT INTO certificate_of_employability (first_name, middle_name, last_name, suffix, address, age, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssiss', $first_name, $middle_name, $last_name, $suffix, $purok, $age, $issued_date, $duty_officer_name);

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

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 5, ?, (SELECT COUNT(*) FROM certificate_of_employability), NOW())");
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
    }
    $stmt->close();
}

if (isset($_POST["certificate_of_income"])) {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $income_num = $conn->real_escape_string($_POST["income_num"]);
    $income_words = $conn->real_escape_string($_POST["income_words"]);

    $fullname = $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $suffix;

    $stmt = $conn->prepare("INSERT INTO certificate_of_income (first_name, middle_name, last_name, suffix, address, income_num, income_words, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssss', $first_name, $middle_name, $last_name, $suffix, $purok, $income_num, $income_words, $issued_date, $duty_officer_name);

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

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 6, ?, (SELECT COUNT(*) FROM certificate_of_income), NOW())");
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
    }
    $stmt->close();
}

if (isset($_POST["certificate_of_indigency"])) {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $birthdate = $conn->real_escape_string($_POST["birthdate"]);
    $civil_status = $conn->real_escape_string($_POST["civil_status"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $purpose = $conn->real_escape_string($_POST["purpose"]);

    $fullname = $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $suffix;
    $age = date('Y') - date('Y', strtotime($birthdate));

    $stmt = $conn->prepare("INSERT INTO certificate_of_indigency (first_name, middle_name, last_name, suffix, age, civil_status, address, purpose, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssissssss', $first_name, $middle_name, $last_name, $suffix, $age, $civil_status, $purok, $purpose, $issued_date, $duty_officer_name);

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

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 7, ?, (SELECT COUNT(*) FROM certificate_of_indigency), NOW())");
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
    }
    $stmt->close();
}

if (isset($_POST["certificate_of_indigency_aics"])) {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $purok = $conn->real_escape_string($_POST["purok"]);

    $fullname = $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $suffix;

    $stmt = $conn->prepare("INSERT INTO certificate_of_indigency_aics (first_name, middle_name, last_name, suffix, address, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $first_name, $middle_name, $last_name, $suffix, $purok, $issued_date, $duty_officer_name);

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

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 8, ?, (SELECT COUNT(*) FROM certificate_of_indigency_aics), NOW())");
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
    }
    $stmt->close();
}

if (isset($_POST["complaint_certificate"])) {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $birthdate = $conn->real_escape_string($_POST["birthdate"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $date_of_complain = $conn->real_escape_string($_POST["date_of_complain"]);
    $first_name_respondent = $conn->real_escape_string($_POST["first_name_respondent"]);
    $middle_name_respondent = $conn->real_escape_string($_POST["middle_name_respondent"]);
    $last_name_respondent = $conn->real_escape_string($_POST["last_name_respondent"]);
    $suffix_respondent = $conn->real_escape_string($_POST["suffix_respondent"]);
    $case_no = $conn->real_escape_string($_POST["case_no"]);
    $vawc_official_name = $conn->real_escape_string($_POST["vawc_official_name"]);

    $fullname = $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $suffix;
    $age = date('Y') - date('Y', strtotime($birthdate));

    $stmt = $conn->prepare("INSERT INTO complaint_certificate (first_name_complainant, middle_name_complainant, last_name_complainant, suffix_complainant, age, address, date_of_complain, first_name_respondent, middle_name_respondent, last_name_respondent, suffix_respondent, case_no, vawc_official_name, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
    $stmt->bind_param('sssssssssssssss', $first_name, $middle_name, $last_name, $suffix, $age, $purok, $date_of_complain, $first_name_respondent, $middle_name_respondent, $last_name_respondent, $suffix_respondent, $case_no, $vawc_offical_name, $issued_date, $duty_officer_name);

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

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 9, ?, (SELECT COUNT(*) FROM complaint_certificate), NOW())");
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
    }
    $stmt->close();
}

if (isset($_POST["death_certificate"])) {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    // $birthdate = $conn->real_escape_string($_POST["birthdate"]);
    $date_of_death = $conn->real_escape_string($_POST["date_of_death"]);
    $time_of_death = $conn->real_escape_string($_POST["time_of_death"]);
    $cause_of_death = $conn->real_escape_string($_POST["cause_of_death"]);
    $req_first_name = $conn->real_escape_string($_POST["req_first_name"]);
    $req_middle_name = $conn->real_escape_string($_POST["req_middle_name"]);
    $req_last_name = $conn->real_escape_string($_POST["req_last_name"]);
    $req_suffix = $conn->real_escape_string($_POST["req_suffix"]);
    $relationship = $conn->real_escape_string($_POST["relationship"]);

    $fullname = $req_first_name . ' ' . $req_middle_name . ' ' . $req_last_name . ' ' . $req_suffix;
    // $age = date('Y') - date('Y', strtotime($birthdate));
    $age = 0;

    $stmt = $conn->prepare("INSERT INTO death_certificate (first_name, middle_name, last_name, suffix, age, address, date_of_death, time_of_death, req_first_name, req_middle_name, req_last_name, req_suffix, relationship, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssssssssss', $first_name, $middle_name, $last_name, $suffix, $age, $purok, $date_of_death, $time_of_death, $req_first_name, $req_middle_name, $req_last_name, $req_suffix, $relationship, $issued_date, $duty_officer_name);

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

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 10, ?, (SELECT COUNT(*) FROM death_certificate), NOW())");
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
    }
    $stmt->close();
}

if (isset($_POST["lot_ownership"])) {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $claimant = $conn->real_escape_string($_POST["claimant"]);
    $beneficiary = $conn->real_escape_string($_POST["beneficiary"]);
    $actual_occupant = $conn->real_escape_string($_POST["actual_occupant"]);
    $lot_number = $conn->real_escape_string($_POST["lot_number"]);
    $lot_area_numerical = $conn->real_escape_string($_POST["lot_area_numerical"]);
    $lot_location_address = $conn->real_escape_string($_POST["lot_location_address"]);

    $fullname = $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $suffix;
    $lot_area_words = "????? pesos";

    $stmt = $conn->prepare("INSERT INTO lot_ownership (first_name, middle_name, last_name, suffix, address, claimant, beneficiary, actual_occupant, lot_no, area_measurement_num, area_measurement_words, loc_address, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssssssss', $first_name, $middle_name, $last_name, $suffix, $purok, $claimant, $beneficiary, $actual_occupant, $lot_number, $lot_area_numerical, $lot_area_words, $lot_location_address, $issued_date, $duty_officer_name);

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

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 11, ?, (SELECT COUNT(*) FROM lot_ownership), NOW())");
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
    }
    $stmt->close();
}

if (isset($_POST["transfer_of_residency"])) {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $suffix = $conn->real_escape_string($_POST["suffix"]);
    $purok = $conn->real_escape_string($_POST["purok"]);
    $current_address = $conn->real_escape_string($_POST["current_address"]);
    $previous_address = $conn->real_escape_string($_POST["previous_address"]);
    $nationality = $conn->real_escape_string($_POST["nationality"]);
    $civil_status = $conn->real_escape_string($_POST["civil_status"]);
    $purpose = $conn->real_escape_string($_POST["purpose"]);

    $fullname = $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $suffix;

    $stmt = $conn->prepare("INSERT INTO transfer_of_residency (first_name, middle_name, last_name, suffix, address, nationality, civil_status, previous_address, purpose, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssssss', $first_name, $middle_name, $last_name, $suffix, $purok, $nationality, $civil_status, $previous_address, $purpose, $issued_date, $duty_officer_name);

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

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 12, ?, (SELECT COUNT(*) FROM transfer_of_residency), NOW())");
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
    }
    $stmt->close();
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
                                <option value="certificate_of_cohabitation">Certificate of Cohabitation</option>
                                <option value="certificate_of_employability">Certificate of Employability</option>
                                <option value="certificate_of_income">Certificate of Income</option>
                                <option value="certificate_of_indigency">Certificate of Indigency</option>
                                <option value="certificate_of_indigency_aics">Certificate of Indigency (AICS)</option>
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
                            
                            <div class="cert" id="certificate_of_indigency">
                                <?php include 'forms/certificate_of_indigency.php' ?>
                            </div>

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
    <script >function validatebday(input) {
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