<?php

header('Content-Type: application/json');

include 'includes/db.php';

$month = isset($_GET['month']) ? $_GET['month'] : null;
$year = isset($_GET['year']) ? $_GET['year'] : null;
$day = isset($_GET['day']) ? $_GET['day'] : null;

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
    "Lot Ownership",
    "Transfer of Residency",
];

$data = [];

// Check filters and construct queries accordingly
if ($year === 'all' && $month === 'all' && $day === 'all') {
    // Aggregate data for all years without specific filters
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
} elseif ($year === 'all' && $month !== 'all' && $day === 'all') {
    // Aggregate data for a specific month across all years
    $month = (int) $month;

    foreach ($certificates as $cert) {
        $table_name = strtolower(str_replace(" ", "_", $cert));
        $sql = "SELECT COUNT(*) AS count FROM $table_name WHERE MONTH(issued_date) = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo json_encode(["error" => "Query preparation failed for table '$table_name': " . $conn->error]);
            exit();
        }

        $stmt->bind_param("i", $month);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $data[$cert] = $result['count'];
    }
} elseif ($year === 'all' && $month !== 'all' && $day !== 'all') {
    // Aggregate data for a specific month and day across all years
    $month = (int) $month;
    $day = (int) $day;

    foreach ($certificates as $cert) {
        $table_name = strtolower(str_replace(" ", "_", $cert));
        $sql = "SELECT COUNT(*) AS count FROM $table_name WHERE MONTH(issued_date) = ? AND DAY(issued_date) = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo json_encode(["error" => "Query preparation failed for table '$table_name': " . $conn->error]);
            exit();
        }

        $stmt->bind_param("ii", $month, $day);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $data[$cert] = $result['count'];
    }
} elseif ($year && $month === 'all' && $day === 'all') {
    // Filter by year only (no month or day filtering)
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
} elseif ($year && $month !== 'all' && $day === 'all') {
    // Filter by year and month (no day filtering)
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
} elseif ($year !== 'all' && $month === 'all' && $day !== 'all') {
    // Filter by year and day (no month filtering)
    $year = (int) $year;
    $day = (int) $day;

    foreach ($certificates as $cert) {
        $table_name = strtolower(str_replace(" ", "_", $cert));
        $sql = "SELECT COUNT(*) AS count FROM $table_name WHERE DAY(issued_date) = ? AND YEAR(issued_date) = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo json_encode(["error" => "Query preparation failed for table '$table_name': " . $conn->error]);
            exit();
        }

        $stmt->bind_param("ii", $day, $year);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $data[$cert] = $result['count'];
    }
} elseif ($year !== 'all' && $month !== 'all' && $day !== 'all') {
    // Filter by year, month, and day
    $year = (int) $year;
    $month = (int) $month;
    $day = (int) $day;

    foreach ($certificates as $cert) {
        $table_name = strtolower(str_replace(" ", "_", $cert));
        $sql = "SELECT COUNT(*) AS count FROM $table_name WHERE DAY(issued_date) = ? AND MONTH(issued_date) = ? AND YEAR(issued_date) = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo json_encode(["error" => "Query preparation failed for table '$table_name': " . $conn->error]);
            exit();
        }

        $stmt->bind_param("iii", $day, $month, $year);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $data[$cert] = $result['count'];
    }
} else {
    // Default case for all other combinations
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

// Output the data as JSON
echo json_encode($data);
$conn->close();
?>
