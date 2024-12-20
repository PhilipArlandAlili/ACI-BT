<?php
// Include your PHP code here
include 'db.php';

//comment
// SQL query to count the number of records in the 'barangay_clearance' table
$sql_barangay_clearance = "SELECT COUNT(*) AS count FROM barangay_clearance";
$result_baranagay_clearance = $conn->query($sql_barangay_clearance);

// Fetch the count of records from the result
if ($result_baranagay_clearance->num_rows > 0) {
    $row_barangay_clearance = $result_baranagay_clearance->fetch_assoc();
    $count_barangay_clearance = $row_barangay_clearance['count'];
} else {
    $count_barangay_clearance = 0;
}

// SQL query to count the number of records in the 'business_permit_new' table
$sql_business_permit_new = "SELECT COUNT(*) AS count FROM business_permit_new";
$result_business_permit_new = $conn->query($sql_business_permit_new);

// Fetch the count of records from the result
if ($result_business_permit_new->num_rows > 0) {
    $row_business_permit_new = $result_business_permit_new->fetch_assoc();
    $count_business_permit_new = $row_business_permit_new['count'];
} else {
    $count_business_permit_new = 0;
}

// SQL query to count the number of records in the 'business_permit_renew' table
$sql_business_permit_renew = "SELECT COUNT(*) AS count FROM business_permit_renew";
$result_business_permit_renew = $conn->query($sql_business_permit_renew);

// Fetch the count of records from the result
if ($result_business_permit_renew->num_rows > 0) {
    $row_business_permit_renew = $result_business_permit_renew->fetch_assoc();
    $count_business_permit_renew = $row_business_permit_renew['count'];
} else {
    $count_business_permit_renew = 0;
}


// SQL query to count the number of records in the 'certificate_of_cohabitation' table
$sql_certificate_of_cohabitation = "SELECT COUNT(*) AS count FROM certificate_of_cohabitation";
$result_certificate_of_cohabitation = $conn->query($sql_certificate_of_cohabitation);

// Fetch the count of records from the result
if ($result_certificate_of_cohabitation->num_rows > 0) {
    $row_certificate_of_cohabitation = $result_certificate_of_cohabitation->fetch_assoc();
    $count_certificate_of_cohabitation = $row_certificate_of_cohabitation['count'];
} else {
    $count_certificate_of_cohabitation = 0;
}


// SQL query to count the number of records in the 'certificate_of_employability' table
$sql_certificate_of_employability = "SELECT COUNT(*) AS count FROM certificate_of_employability";
$result_certificate_of_employability = $conn->query($sql_certificate_of_employability);

// Fetch the count of records from the result
if ($result_certificate_of_employability->num_rows > 0) {
    $row_certificate_of_employability = $result_certificate_of_employability->fetch_assoc();
    $count_certificate_of_employability = $row_certificate_of_employability['count'];
} else {
    $count_certificate_of_employability = 0;
}

// SQL query to count the number of records in the 'certificate_of_income' table
$sql_certificate_of_income = "SELECT COUNT(*) AS count FROM certificate_of_income";
$result_certificate_of_income = $conn->query($sql_certificate_of_income);

// Fetch the count of records from the result
if ($result_certificate_of_income->num_rows > 0) {
    $row_certificate_of_income = $result_certificate_of_income->fetch_assoc();
    $count_certificate_of_income = $row_certificate_of_income['count'];
} else {
    $count_certificate_of_income = 0;
}


// SQL query to count the number of records in the 'certificate_of_indigency' table
$sql_certificate_of_indigency = "SELECT COUNT(*) AS count FROM certificate_of_indigency_keeps";
$result_certificate_of_indigency = $conn->query($sql_certificate_of_indigency);

// Fetch the count of records from the result
if ($result_certificate_of_indigency->num_rows > 0) {
    $row_certificate_of_indigency = $result_certificate_of_indigency->fetch_assoc();
    $count_certificate_of_indigency = $row_certificate_of_indigency['count'];
} else {
    $count_certificate_of_indigency = 0;
}

// SQL query to count the number of records in the 'certificate_of_indigency_aics' table
$sql_certificate_of_indigency_aics = "SELECT COUNT(*) AS count FROM certificate_of_indigency";
$result_certificate_of_indigency_aics = $conn->query($sql_certificate_of_indigency_aics);

// Fetch the count of records from the result
if ($result_certificate_of_indigency_aics->num_rows > 0) {
    $row_certificate_of_indigency_aics = $result_certificate_of_indigency_aics->fetch_assoc();
    $count_certificate_of_indigency_aics = $row_certificate_of_indigency_aics['count'];
} else {
    $count_certificate_of_indigency_aics = 0;
}


// SQL query to count the number of records in the 'complaint_certificate' table
$sql_complaint_certificate = "SELECT COUNT(*) AS count FROM complaint_certificate";
$result_complaint_certificate = $conn->query($sql_complaint_certificate);

// Fetch the count of records from the result
if ($result_complaint_certificate->num_rows > 0) {
    $row_complaint_certificate = $result_complaint_certificate->fetch_assoc();
    $count_complaint_certificate = $row_complaint_certificate['count'];
} else {
    $count_complaint_certificate = 0;
}

// SQL query to count the number of records in the 'death_certificate' table
$sql_death_certificate = "SELECT COUNT(*) AS count FROM death_certificate";
$result_death_certificate = $conn->query($sql_death_certificate);

// Fetch the count of records from the result
if ($result_death_certificate->num_rows > 0) {
    $row_death_certificate = $result_death_certificate->fetch_assoc();
    $count_death_certificate = $row_death_certificate['count'];
} else {
    $count_death_certificate = 0;
}

// SQL query to count the number of records in the 'first_time_job_seeker' table
$sql_first_time_job_seeker = "SELECT COUNT(*) AS count FROM first_time_job_seeker";
$result_first_time_job_seeker = $conn->query($sql_first_time_job_seeker);

// Fetch the count of records from the result
if ($result_first_time_job_seeker->num_rows > 0) {
    $row_first_time_job_seeker = $result_first_time_job_seeker->fetch_assoc();
    $count_first_time_job_seeker = $row_first_time_job_seeker['count'];
} else {
    $count_first_time_job_seeker = 0;
}


// SQL query to count the number of records in the 'lot_ownership' table
$sql_lot_ownership = "SELECT COUNT(*) AS count FROM lot_ownership";
$result_lot_ownership = $conn->query($sql_lot_ownership);

// Fetch the count of records from the result
if ($result_lot_ownership->num_rows > 0) {
    $row_lot_ownership = $result_lot_ownership->fetch_assoc();
    $count_lot_ownership = $row_lot_ownership['count'];
} else {
    $count_lot_ownership = 0;
}

// SQL query to count the number of records in the 'transfer_of_residency' table
$sql_transfer_of_residency = "SELECT COUNT(*) AS count FROM transfer_of_residency";
$result_transfer_of_residency = $conn->query($sql_transfer_of_residency);

// Fetch the count of records from the result
if ($result_transfer_of_residency->num_rows > 0) {
    $row_transfer_of_residency = $result_transfer_of_residency->fetch_assoc();
    $count_transfer_of_residency = $row_transfer_of_residency['count'];
} else {
    $count_transfer_of_residency = 0;
}

$sum = $count_barangay_clearance + $count_business_permit_new + $count_business_permit_renew + $count_certificate_of_cohabitation + $count_certificate_of_employability + $count_certificate_of_income + $count_certificate_of_indigency + $count_complaint_certificate + $count_death_certificate + $count_first_time_job_seeker + $count_lot_ownership + $count_transfer_of_residency;