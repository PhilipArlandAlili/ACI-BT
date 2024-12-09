<?php

header('Content-Type: application/json');

include 'includes/db.php';

$certificates = [
    "Barangay Clearance",
    "Business Permit New",
    "Business Permit Renew",
    "Certificate of Cohabitation",
    "Certificate of Employability",
    "Certificate of Income",
    "Certificate of Indigency",
    "Certificate of Indigency AICS",
    "Complaint Certificate",
    "Death Certificate",
    "First Time Job Seeker",
    "Lot Ownership",
    "Transfer of Residency",
];

$data = [];

// Check if both month and year filters are present
if ($month === 'all' && $year) {
    // Get data for the whole year without month filtering
    $year = (int) $year;
    foreach ($certificates as $cert) {
        $table_name = strtolower(str_replace(" ", "_", $cert));
        $sql = "SELECT COUNT(*) AS count FROM $table_name WHERE YEAR(issued_date) = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo json_encode(["error" => "Query preparation failed for table '$table_name': " . $conn->error]);
            exit();
        }

        $stmt->bind_param("i", $year);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $data[$cert] = $result['count'];
    }
} elseif ($month !== 'all' && $year) {
    // Filter by both month and year if both are specified
    $month = (int) $month;
    $year = (int) $year;

    foreach ($certificates as $cert) {
        $table_name = strtolower(str_replace(" ", "_", $cert));
        $sql = "SELECT COUNT(*) AS count FROM $table_name WHERE MONTH(issued_date) = ? AND YEAR(issued_date) = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo json_encode(["error" => "Query preparation failed for table '$table_name': " . $conn->error]);
            exit();
        }

        $stmt->bind_param("ii", $month, $year);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $data[$cert] = $result['count'];
    }
} else {
    // If month is "all" and no specific year, get total counts without any date filter
    foreach ($certificates as $cert) {
        $table_name = strtolower(str_replace(" ", "_", $cert));
        $sql = "SELECT COUNT(*) AS count FROM $table_name";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo json_encode(["error" => "Query preparation failed for table '$table_name': " . $conn->error]);
            exit();
        }

        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $data[$cert] = $result['count'];
    }
}

echo json_encode($data);
$conn->close();
?>