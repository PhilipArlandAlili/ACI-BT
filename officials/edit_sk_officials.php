<?php
session_start();


include '../includes/db.php';

$officials = [];
$selected_id = isset($_GET['id']) ? $_GET['id'] : 1; // Default to 1 if no id is set

// Fetch officials
$result = $conn->query("SELECT id, name, position, age, birthdate, address, phone, email, img FROM officials_sk");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $officials[] = $row;
    }
} else {
    echo "No officials found.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $img = $_FILES['img']['name'];

    // Handle image upload
    if (!empty($img)) {
        $target_dir = "../assets/img/SK-COUNCIL/";
        $target_file = $target_dir . basename($img);
        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
    } else {
        // If no new image uploaded, keep the current one
        $currentOfficial = $conn->query("SELECT img FROM officials_sk WHERE id = $id")->fetch_assoc();
        $img = $currentOfficial['img'];
    }

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE officials_sk SET name = ?, position = ?, age = ?, birthdate = ?, address = ?, phone = ?, email = ?, img = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("ssisssssi", $name, $position, $age, $birthdate, $address, $phone, $email, $img, $id);
        $stmt->execute();
        $stmt->close();

        // Set a success message in session
        $_SESSION['success'] = "Profile updated successfully!";
    } else {
        // Handle errors in the prepare statement
        echo "Error preparing the query: " . $conn->error;
    }

    header("Location: edit_sk_officials.php?id=$id");  // Redirect to the same page with ID
    exit();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head2.php' ?>
    <title>ACI-BT | Edit Barangay SK Official Profile</title>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include '../includes/header.php' ?>
    </header>

    <aside id="sidebar" class="sidebar">
        <?php include '../includes/sidebar.php' ?>
    </aside>

    <main id="main" class="main">
        <a href="bgy_sk_officials.php" class="navigation d-flex align-items-center mx-2">
            <i class="bx bxs-caret-left-square fs-2 "></i>
            <span class="fs-3 fw-semibold ">Back</span>
        </a>

        <div class="container-fluid">
            <div class="alert-container pt-2">
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['success']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['success']); // Remove the message after displaying ?>
                <?php endif; ?>
            </div>

            <div class="pagetitle">
                <h1>Barangay SK Official Profile</h1>
            </div>

            <section class="section profile">
                <div class="row d-flex justify-content-around">
                    <div class="col-xl-5">
                        <div class="profile-card">
                            <?php foreach ($officials as $official): ?>
                                <?php if ($official['id'] == $selected_id): // Display the selected official ?>
                                    <div class="d-flex align-items-center justify-content-center p-5 gap-5">
                                        <div class="profile-image">
                                            <img src="../assets/img/SK-COUNCIL/<?php echo $official['img']; ?>"
                                                alt="Profile" class="rounded-circle" height="100" width="100">
                                        </div>
                                        <div class="profile-name">
                                            <h2 class="fs-3 fw-bold pt-3"><?php echo $official['name']; ?></h2>
                                            <h5 class="mt-n5 text-center"><?php echo $official['position']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-details px-4">
                                            <div class="profile-overview text-dark" id="profile-overview">
                                                <h5 class="card-title w-100">Profile Details</h5>
                                                <div class="row">
                                                    <div class="col-lg-6 label">Full Name</div>
                                                    <div class="col-lg-6"><?php echo $official['name']; ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 label">Age</div>
                                                    <div class="col-lg-6"><?php echo $official['age']; ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 label">Birthday</div>
                                                    <div class="col-lg-6"><?php echo $official['birthdate']; ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 label">Address</div>
                                                    <div class="col-lg-6"><?php echo $official['address']; ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 label">Phone</div>
                                                    <div class="col-lg-6"><?php echo $official['phone']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="profile-card">
                            <div class="card-body px-5 pt-2 ">
                                <h5 class="card-title">Edit Profile</h5>
                            </div>
                            <?php foreach ($officials as $official): ?>
                                <?php if ($official['id'] == $selected_id): ?>
                                    <form class="text-dark p-2 pt-0 px-5 profile-overview" method="post"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $official['id']; ?>">

                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <input class="form-control" type="file" accept=".png,.jpg,.jpeg"
                                                        id="formFile" name="img">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text" class="form-control" id="fullName"
                                                    value="<?php echo $official['name']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="position" type="text" class="form-control" id="position"
                                                    value="<?php echo $official['position']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="age" class="col-md-4 col-lg-3 col-form-label">Age</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="age" type="number" class="form-control" id="age"
                                                    value="<?php echo $official['age']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">Birthdate</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="birthdate" type="date" class="form-control" id="birthdate"
                                                    value="<?php echo $official['birthdate']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="address"
                                                    value="<?php echo $official['address']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="phone"
                                                    value="<?php echo $official['phone']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email"
                                                    value="<?php echo $official['email']; ?>" required>
                                            </div>
                                        </div>

                                        <div class="text-end py-3">
                                            <button type="submit" class="btn btn-primary py-2">Confirm Changes</button>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="../assets/js/main.js"></script>

</body>

</html>