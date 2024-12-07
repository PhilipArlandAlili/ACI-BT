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
        <a href="dashboard.php" class="navigation d-flex align-items-center py-3 mx-2">
            <i class="bx bxs-caret-left-square fs-2 "></i>
            <span class="fs-3 fw-semibold ">Back</span>
        </a>
        
        <section class="section">
            <div class="row fs-5">
                <div class="col-lg-12">
                    <div class="card" id="transactions">
                        <div class="card-body">
                            <h5 class="card-title fs-4">Transaction Table</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable pt-3">
                                <thead>
                                    <tr>
                                        <th>Transacted by</th>
                                        <th>Document Name</th>
                                        <th>Client Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require 'includes/db.php';
                                    $sql = "SELECT t.id, a.username AS transact_by, dt.doc_name, 
                                                CASE 
                                                WHEN dt.id = 1 THEN bc.fullname
                                                WHEN dt.id = 2 THEN bp.manager
                                                WHEN dt.id = 3 THEN bpr.manager
                                                WHEN dt.id = 4 THEN coe.fullname
                                                ELSE 'Unknown' 
                                                END AS fullname, 
                                                t.client_trans_id, t.created_at
                                                FROM transactions t
                                                INNER JOIN admin a ON t.transact_by = a.id
                                                INNER JOIN doctype dt ON t.doc_id = dt.id
                                                LEFT JOIN barangay_clearance bc ON t.client_trans_id = bc.id AND dt.id = 1
                                                LEFT JOIN business_permit_new bp ON t.client_trans_id = bp.id AND dt.id = 2
                                                LEFT JOIN business_permit_renew bpr ON  t.client_trans_id = bpr.id AND dt.id = 3
                                                LEFT JOIN certificate_of_employability coe ON t.client_trans_id = coe.id AND dt.id = 4";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["transact_by"] . "</td>";
                                            echo "<td>" . $row["doc_name"] . "</td>";
                                            echo "<td>" . $row["fullname"] . "</td>";
                                            echo "<td>" . $row["created_at"] . "</td>";
                                            echo "<td><a href='show_client_trans.php?id=" . $row["client_trans_id"] . "&doc_name=" . str_replace(" ", "_", $row["doc_name"]) . "'><button type='button' class='btn btn-primary'>VIEW</button></a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'><center>No transactions found</center></td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>