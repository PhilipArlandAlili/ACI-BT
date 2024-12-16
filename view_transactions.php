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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="transactions">
                        <div class="card-body">
                            <h5 class="card-title fs-4">Transaction Table</h5>
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
                                                    WHEN dt.id = 1 THEN CONCAT(COALESCE(bc.first_name, ''), ' ', COALESCE(bc.middle_name, ''), ' ', COALESCE(bc.last_name, ''), ' ', COALESCE(bc.suffix, ''))
                                                    WHEN dt.id = 2 THEN bpn.manager
                                                    WHEN dt.id = 3 THEN bpr.manager
<<<<<<< Updated upstream
                                                    WHEN dt.id = 4 THEN CONCAT(COALESCE(cc.first_name_female, ''), ' ', COALESCE(cc.middle_name_female, ''), ' ', COALESCE(cc.last_name_female, ''))
                                                    WHEN dt.id = 5 THEN CONCAT(COALESCE(ce.first_name, ''), ' ', COALESCE(ce.middle_name, ''), ' ', COALESCE(ce.last_name, ''), ' ', COALESCE(ce.suffix, ''))
                                                    WHEN dt.id = 6 THEN CONCAT(COALESCE(ci.first_name, ''), ' ', COALESCE(ci.middle_name, ''), ' ', COALESCE(ci.last_name, ''), ' ', COALESCE(ci.suffix, ''))
                                                    WHEN dt.id = 7 THEN CONCAT(COALESCE(cinda.first_name, ''), ' ', COALESCE(cinda.middle_name, ''), ' ', COALESCE(cinda.last_name, ''), ' ', COALESCE(cinda.suffix, ''))
                                                    WHEN dt.id = 9 THEN CONCAT(COALESCE(cpc.first_name_complainant, ''), ' ', COALESCE(cpc.middle_name_complainant, ''), ' ', COALESCE(cpc.last_name_complainant, ''), ' ', COALESCE(cpc.suffix_complainant, ''))
                                                    WHEN dt.id = 10 THEN CONCAT(COALESCE(dc.first_name, ''), ' ', COALESCE(dc.middle_name, ''), ' ', COALESCE(dc.last_name, ''), ' ', COALESCE(dc.suffix, ''))
                                                    WHEN dt.id = 11 THEN CONCAT(COALESCE(ftjs.first_name, ''), ' ', COALESCE(ftjs.middle_name, ''), ' ', COALESCE(ftjs.last_name, ''), ' ', COALESCE(ftjs.suffix, ''))
                                                    WHEN dt.id = 12 THEN CONCAT(COALESCE(lo.first_name, ''), ' ', COALESCE(lo.middle_name, ''), ' ', COALESCE(lo.last_name, ''), ' ', COALESCE(lo.suffix, ''))
                                                    WHEN dt.id = 8 THEN CONCAT(COALESCE(tor.first_name, ''), ' ', COALESCE(tor.middle_name, ''), ' ', COALESCE(tor.last_name, ''), ' ', COALESCE(tor.suffix, ''))
=======
                                                    WHEN dt.id = 5 THEN CONCAT(COALESCE(cc.first_name_female, ''), ' ', COALESCE(cc.middle_name_female, ''), ' ', COALESCE(cc.last_name_female, ''))
                                                    WHEN dt.id = 6 THEN CONCAT(COALESCE(ce.first_name, ''), ' ', COALESCE(ce.middle_name, ''), ' ', COALESCE(ce.last_name, ''), ' ', COALESCE(ce.suffix, ''))
                                                    WHEN dt.id = 8 THEN CONCAT(COALESCE(ci.first_name, ''), ' ', COALESCE(ci.middle_name, ''), ' ', COALESCE(ci.last_name, ''), ' ', COALESCE(ci.suffix, ''))
                                                    WHEN dt.id = 9 THEN CONCAT(COALESCE(cinda.first_name, ''), ' ', COALESCE(cinda.middle_name, ''), ' ', COALESCE(cinda.last_name, ''), ' ', COALESCE(cinda.suffix, ''))
                                                    WHEN dt.id = 10 THEN CONCAT(COALESCE(tor.first_name, ''), ' ', COALESCE(tor.middle_name, ''), ' ', COALESCE(tor.last_name, ''), ' ', COALESCE(tor.suffix, ''))
                                                    WHEN dt.id = 11 THEN CONCAT(COALESCE(cpc.first_name_complainant, ''), ' ', COALESCE(cpc.middle_name_complainant, ''), ' ', COALESCE(cpc.last_name_complainant, ''), ' ', COALESCE(cpc.suffix_complainant, ''))
                                                    WHEN dt.id = 12 THEN CONCAT(COALESCE(dc.first_name, ''), ' ', COALESCE(dc.middle_name, ''), ' ', COALESCE(dc.last_name, ''), ' ', COALESCE(dc.suffix, ''))
                                                    WHEN dt.id = 13 THEN CONCAT(COALESCE(ftjs.first_name, ''), ' ', COALESCE(ftjs.middle_name, ''), ' ', COALESCE(ftjs.last_name, ''), ' ', COALESCE(ftjs.suffix, ''))
                                                    WHEN dt.id = 14 THEN CONCAT(COALESCE(lo.first_name, ''), ' ', COALESCE(lo.middle_name, ''), ' ', COALESCE(lo.last_name, ''), ' ', COALESCE(lo.suffix, ''))
>>>>>>> Stashed changes
                                                ELSE 'Unknown' 
                                                    END AS fullname, t.client_trans_id, t.created_at
                                                FROM transactions t
                                                    INNER JOIN admin a ON t.transact_by = a.id
                                                    INNER JOIN doctype dt ON t.doc_id = dt.id
                                                    LEFT JOIN barangay_clearance bc ON t.client_trans_id = bc.id AND dt.id = 1
                                                    LEFT JOIN business_permit_new bpn ON t.client_trans_id = bpn.id AND dt.id = 2
                                                    LEFT JOIN business_permit_renew bpr ON t.client_trans_id = bpr.id AND dt.id = 3
<<<<<<< Updated upstream
                                                    LEFT JOIN certificate_of_cohabitation cc ON t.client_trans_id = cc.id AND dt.id = 4
                                                    LEFT JOIN certificate_of_employability ce ON t.client_trans_id = ce.id AND dt.id = 5
                                                    LEFT JOIN certificate_of_income ci ON t.client_trans_id = ci.id AND dt.id = 6
                                                    LEFT JOIN certificate_of_indigency cinda ON t.client_trans_id = cinda.id AND dt.id = 7
                                                    LEFT JOIN complaint_certificate cpc ON t.client_trans_id = cpc.id AND dt.id = 9
                                                    LEFT JOIN death_certificate dc ON t.client_trans_id = dc.id AND dt.id = 10
                                                    LEFT JOIN first_time_job_seeker ftjs ON t.client_trans_id = ftjs.id AND dt.id = 11
                                                    LEFT JOIN lot_ownership lo ON t.client_trans_id = lo.id AND dt.id = 12
                                                    LEFT JOIN transfer_of_residency tor ON t.client_trans_id = tor.id AND dt.id = 18
=======
                                                    LEFT JOIN certificate_of_cohabitation cc ON t.client_trans_id = cc.id AND dt.id = 5
                                                    LEFT JOIN certificate_of_employability ce ON t.client_trans_id = ce.id AND dt.id = 6
                                                    LEFT JOIN certificate_of_income ci ON t.client_trans_id = ci.id AND dt.id = 8
                                                    LEFT JOIN certificate_of_indigency cinda ON t.client_trans_id = cinda.id AND dt.id = 9
                                                    LEFT JOIN transfer_of_residency tor ON t.client_trans_id = tor.id AND dt.id = 10
                                                    LEFT JOIN complaint_certificate cpc ON t.client_trans_id = cpc.id AND dt.id = 11
                                                    LEFT JOIN death_certificate dc ON t.client_trans_id = dc.id AND dt.id = 12
                                                    LEFT JOIN first_time_job_seeker ftjs ON t.client_trans_id = ftjs.id AND dt.id = 13
                                                    LEFT JOIN lot_ownership lo ON t.client_trans_id = lo.id AND dt.id = 14
>>>>>>> Stashed changes
                                                    ORDER BY t.created_at DESC";


                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr class='fs-5'>";
                                            // echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["transact_by"] . "</td>";
                                            echo "<td>" . $row["doc_name"] . "</td>";
                                            echo "<td>" . $row["fullname"] . "</td>";
                                            echo "<td>" . $row["created_at"] . "</td>";
                                            echo "<td><a href='show_client_trans.php?id=" . $row["client_trans_id"] . "&doc_name=" . str_replace(" ", "_", $row["doc_name"]) . "'><button type='submit' class='btn btn-primary'>VIEW</button></a></td>";
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
    <script src="assets/js/main.js"></script>

</body>

</html>