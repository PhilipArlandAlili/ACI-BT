<?php

include '../includes/db.php';

// Fetch officials from database
$officials = [];
$stmt = $conn->prepare("SELECT id, name, position, age, birthdate, address, phone, email, img, img_type FROM officials_barangay");

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $officials[] = $row;
        }
    } else {
        echo "No officials found.";
    }
} else {
    die("Query preparation failed: " . $conn->error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head2.php' ?>
    <title>ACI-BT | Barangay Officials</title>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include 'header2.php' ?>
    </header>

    <aside id="sidebar" class="sidebar">
        <?php include 'sidebar2.php' ?>
    </aside>

    <main id="main" class="main">
        <div class="content">
            <div class="container d-flex flex-column align-items-center justify-content-center">
                <div class="card overflow-hidden">
                    <div class="card-body p-0">
                        <img src="../assets/img/brgy_councils.png" alt="Barangay Councils" class="img-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-4 order-lg-1 order-2"></div>
                            <div class="row d-flex align-items-center justify-content-center">
                                <?php foreach ($officials as $official): ?>
                                    <?php if ($official['id'] == 1): ?>
                                        <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                                            <div class="mt-n4">
                                                <div class="d-flex justify-content-end">
                                                    <a href="edit_bgy_officials.php?id=<?= $official['id'] ?>">
                                                        <button type="button" class="btn" title="Edit Profile">
                                                        <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center mb-2">
                                                    <div class="border border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                                        style="width: 125px; height: 125px;">
                                                        <img src="data:<?php echo $official['img_type']; ?>;base64,<?php echo base64_encode($official['img']); ?>"
                                                            style="max-width: 125px;" class="rounded-circle mb-3" alt="Image" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center pb-2">
                                                <h6 class="text-primary fs-5"><?= $official['name'] ?></h6>
                                                <span class="text-dark fs-5"><?= $official['position'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <ul class="px-2 py-3 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                    </ul>
                </div>

                <div class="tab-pane fade show active" id="pills-friends" role="tabpanel"
                    aria-labelledby="pills-friends-tab" tabindex="0">
                    <div class="row d-flex align-items-center justify-content-center">
                        <?php foreach ($officials as $official): ?>
                            <?php if ($official['id'] >= 2): ?>
                                <div class="official-card col-sm-6 col-lg-4">
                                    <div class="card card-bottom">
                                        <div class="d-flex justify-content-end">
                                            <a href="edit_bgy_officials.php?id=<?= $official['id'] ?>">
                                                <button type="button" class="btn" title="Edit Profile">
                                                    <i class="bi bi-pencil-square"></i>

                                                </button>
                                            </a>
                                        </div>
                                        <div class="card-body text-center border-bottom">
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <div class="border border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                                    style="width: 125px; height: 125px;">
                                                    <img src="data:<?php echo $official['img_type']; ?>;base64,<?php echo base64_encode($official['img']); ?>"
                                                        style="max-width: 125px; class=" rounded-circle mb-3" alt="Image" />
                                                </div>
                                            </div>
                                            <h6 class="text-primary fs-5"><?= $official['name'] ?></h6>
                                            <span class="text-dark fs-5"><?= $official['position'] ?></span>
                                        </div>
                                        <ul
                                            class="px-2 py-3 bg-light list-unstyled d-flex align-items-center justify-content-center mb-0">
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer" class="footer">
        <div class="credits fs-5">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="../about.php">&copy; Cayabyabers</a>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="../assets/js/main.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>