<?php

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
        $period_of_residency = $period_of_residency * 12;
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

        $_SESSION['success'] = "Added Barangay Clearance successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 1, ?, (SELECT COUNT(*) FROM barangay_clearance), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $fullname, $timestamp);

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

        $_SESSION['success'] = "Added Business Permit New successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 2, ?, (SELECT COUNT(*) FROM business_permit_new), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $manager, $timestamp);

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

        $_SESSION['success'] = "Added Business Permit Renew successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 3, ?, (SELECT COUNT(*) FROM business_permit_renew), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $manager, $timestamp);

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

if (isset($_POST["certificate_of_cohabitation"])) {
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

        $_SESSION['success'] = "Added Certificate of Cohabitation successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 4, ?, (SELECT COUNT(*) FROM certificate_of_cohabitation), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $fullname, $timestamp);

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

        $_SESSION['success'] = "Added Certificate of Employability successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 5, ?, (SELECT COUNT(*) FROM certificate_of_employability), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $fullname, $timestamp);

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

        $_SESSION['success'] = "Added Certificate of Income successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 6, ?, (SELECT COUNT(*) FROM certificate_of_income), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $fullname, $timestamp);

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
    $stmt->bind_param('ssssssssss', $first_name, $middle_name, $last_name, $suffix, $age, $civil_status, $purok, $purpose, $issued_date, $duty_officer_name);

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

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 7, ?, (SELECT COUNT(*) FROM certificate_of_indigency), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $fullname, $timestamp);

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

        $_SESSION['success'] = "Added Certificate of Indigency successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 8, ?, (SELECT COUNT(*) FROM certificate_of_indigency_aics), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $fullname, $timestamp);

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

        $_SESSION['success'] = "Added Complaint Certificate successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 9, ?, (SELECT COUNT(*) FROM complaint_certificate), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $fullname, $timestamp);

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
    $birthdate = $conn->real_escape_string($_POST["birthdate"]);
    $date_of_death = $conn->real_escape_string($_POST["date_of_death"]);
    $time_of_death = $conn->real_escape_string($_POST["time_of_death"]);
    $cause_of_death = $conn->real_escape_string($_POST["cause_of_death"]);
    $req_first_name = $conn->real_escape_string($_POST["req_first_name"]);
    $req_middle_name = $conn->real_escape_string($_POST["req_middle_name"]);
    $req_last_name = $conn->real_escape_string($_POST["req_last_name"]);
    $req_suffix = $conn->real_escape_string($_POST["req_suffix"]);
    $relationship = $conn->real_escape_string($_POST["relationship"]);

    $fullname = $req_first_name . ' ' . $req_middle_name . ' ' . $req_last_name . ' ' . $req_suffix;
    $age = date('Y') - date('Y', strtotime($birthdate));

    $stmt = $conn->prepare("INSERT INTO death_certificate (first_name, middle_name, last_name, suffix, age, address, date_of_death, time_of_death, req_first_name, req_middle_name, req_last_name, req_suffix, relationship, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssssssssss', $first_name, $middle_name, $last_name, $suffix, $age, $purok, $date_of_death, $time_of_death, $req_first_name, $req_middle_name, $req_last_name, $req_suffix, $relationship, $issued_date, $duty_officer_name);

    if ($stmt->execute()) {
        //echo "New record inserted successfully";

        $sql = "SELECT id FROM admin WHERE username = ?";
        $admin_stmt = $conn->prepare($sql);
        $admin_stmt->bind_param('s', $duty_officer_name);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();

        $_SESSION['success'] = "Added Death Certificate successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 10, ?, (SELECT COUNT(*) FROM death_certificate), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $fullname, $timestamp);

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
    $lot_area_words = $conn->real_escape_string($_POST["lot_area_word"]);
    $lot_location_address = $conn->real_escape_string($_POST["lot_location_address"]);

    if ($claimant == '/') {
        $claimant = "Yes";
    } else {
        $claimant = "No";
    }

    if ($beneficiary == '/') {
        $beneficiary = "Yes";
    } else {
        $beneficiary = "No";
    }

    if ($actual_occupant == '/') {
        $actual_occupant = "Yes";
    } else {
        $actual_occupant = "No";
    }

    $fullname = $first_name . ' ' . $middle_name . ' ' . $last_name . ' ' . $suffix;

    $stmt = $conn->prepare("INSERT INTO lot_ownership (first_name, middle_name, last_name, suffix, address, claimant, beneficiary, actual_occupant, lot_no, area_measurement_num, area_measurement_words, loc_address, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssssssss', $first_name, $middle_name, $last_name, $suffix, $purok, $claimant, $beneficiary, $actual_occupant, $lot_number, $lot_area_numerical, $lot_area_words, $lot_location_address, $issued_date, $duty_officer_name);

    if ($stmt->execute()) {
        //echo "New record inserted successfully";

        $sql = "SELECT id FROM admin WHERE username = ?";
        $admin_stmt = $conn->prepare($sql);
        $admin_stmt->bind_param('s', $duty_officer_name);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();

        $_SESSION['success'] = "Added Lot Ownership successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 11, ?, (SELECT COUNT(*) FROM lot_ownership), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $fullname, $timestamp);

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

    $stmt = $conn->prepare("INSERT INTO transfer_of_residency (first_name, middle_name, last_name, suffix, address, nationality, civil_status, previous_address, current_address, purpose, issued_date, duty_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssssss', $first_name, $middle_name, $last_name, $suffix, $purok, $nationality, $civil_status, $previous_address, $current_address, $purpose, $issued_date, $duty_officer_name);

    if ($stmt->execute()) {
        //echo "New record inserted successfully";

        $sql = "SELECT id FROM admin WHERE username = ?";
        $admin_stmt = $conn->prepare($sql);
        $admin_stmt->bind_param('s', $duty_officer_name);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();

        $_SESSION['success'] = "Added Transfer of Residency successfully!";
        if ($admin_result->num_rows > 0) {
            $row = mysqli_fetch_assoc($admin_result);
            $admin_id = $row['id'];

            $trans_stmt = $conn->prepare("INSERT INTO transactions (transact_by, doc_id, fullname, client_trans_id, created_at) VALUES (?, 12, ?, (SELECT COUNT(*) FROM transfer_of_residency), ?)");
            $trans_stmt->bind_param('iss', $admin_id, $fullname, $timestamp);

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