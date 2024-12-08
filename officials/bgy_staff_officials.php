<?php

include '../includes/db.php';

// Fetch officials from database
$officials = [];
$result = $conn->query("SELECT id, name, position, age, birthdate, address, phone, email, img FROM officials_staff");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $officials[] = $row;
    }
} else {
    echo "No officials found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head2.php' ?>
    <title>ACI-BT | Staff Officials</title>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include '../includes/header.php' ?>
    </header>

    <aside id="sidebar" class="sidebar">
        <?php include 'sidebar2.php' ?>
    </aside>

    <main id="main" class="main">
        <div class="content">
            <div class="container d-flex flex-column align-items-center justify-content-center">
                <div class="card overflow-hidden">
                    <div class="card-body p-0">
                        <img src="../assets/img/brgy_staffs.png" alt="Barangay Staff Officials" class="img-fluid">
                    </div>
                </div>

                <div class="tab-pane fade show active" id="pills-friends" role="tabpanel"
                    aria-labelledby="pills-friends-tab" tabindex="0">
                    <div class="row d-flex align-items-center justify-content-center">
                        <?php foreach ($officials as $official): ?>
                            <?php if ($official['id'] >= 1): ?>
                                <div class="official-card col-sm-6 col-lg-4">
                                    <div class="card card-bottom">
                                        <div class="d-flex justify-content-end">
                                            <a href="edit_staff_officials.php?id=<?= $official['id'] ?>">
                                                <button type="button" class="btn" title="Edit Profile">
                                                    <i class="bi bi-list text-secondary"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="card-body text-center border-bottom">
                                            <img src="../assets/img/devs/<?= $official['img'] ?>"
                                                alt="<?= $official['name'] ?>" class="rounded-circle mb-3" width="80"
                                                height="80">
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