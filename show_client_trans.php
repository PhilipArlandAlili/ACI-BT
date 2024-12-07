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
        <a href="view-transactions.php" class="navigation d-flex align-items-center py-3 mx-2">
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
                            <table class="table datatable pt-3">
                                <?php
                                require 'includes/db.php';

                                $id = $_GET['id'];
                                $table = strtolower($_GET['doc_name']);
                                $sql = "SELECT * FROM $table WHERE id = $id";
                                $result = $conn->query($sql);
                                // Check if there are rows returned
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // For Barangay Certification
                                        if ($table == "barangay_clearance") {
                                            echo "<thead>";
                                            echo "<tr>";
                                            // echo "<th>ID</th>";
                                            echo "<th>Full Name</th>";
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
                                            echo "<td>" . $row["fullname"] . "</td>";
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
                                            echo "<th>Business Type</th>";
                                            echo "<th>Issued Date</th>";
                                            echo "<th>Duty Officer Name</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            echo "<tr>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["business_name"] . "</td>";
                                            echo "<td>" . $row["business_address"] . "</td>";
                                            echo "<td>" . $row["business_owner"] . "</td>";
                                            echo "<td>" . $row["business_type"] . "</td>";
                                            echo "<td>" . $row["issued_date"] . "</td>";
                                            echo "<td>" . $row["duty_officer_name"] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        // test
                                        // For Cohabitation
                                        // echo "<tr>";
                                        // echo "<td>" . $row["id"] . "</td>";
                                        // echo "<td>" . $row["fullname_male"] . "</td>";
                                        // echo "<td>" . $row["birthdate_male"] . "</td>";
                                        // echo "<td>" . $row["fullname_female"] . "</td>";
                                        // echo "<td>" . $row["birthdate_female"] . "</td>";
                                        // echo "<td>" . $row["address"] . "</td>";
                                        // echo "<td>" . $row["date_of_marriage"] . "</td>";
                                        // echo "<td>" . $row["years_married"] . "</td>";
                                        // echo "<td>" . $row["issued_date"] . "</td>";
                                        // echo "<td>" . $row["duty_officer_name"] . "</td>";
                                        // echo "</tr>";
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