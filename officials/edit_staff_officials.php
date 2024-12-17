<?php
session_start();  // Start the session to store messages

include '../includes/db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT id, name, position, age, birthdate, address, phone, email, img, img_type FROM officials_staff WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $position, $age, $birthdate, $address, $phone, $email, $img, $imageType);

    if ($stmt->fetch()) {
        // Values are fetched successfully into the variables
    } else {
        echo "Official not found!";
        exit;
    }
    $stmt->close();
}


if (isset($_POST['submit'])) {
    $id = $_GET['id'];

    // Check if an image is uploaded
    if (!empty($_FILES['img']['tmp_name'])) {
        $image = $_FILES['img']['tmp_name'];
        $imageType = $_FILES['img']['type']; // Get MIME type
        $imageData = file_get_contents($image); // Read image as binary data

        // Prepare SQL query to update the image
        $stmt = $conn->prepare("UPDATE officials_staff SET img = ?, img_type = ? WHERE id = ?");
        $stmt->bind_param("bsi", $imageData, $imageType, $id); // 'b' for binary, 's' for string (MIME type), 'i' for integer ID
        $stmt->send_long_data(0, $imageData); // Send binary image data
        $stmt->execute();

        if ($stmt->affected_rows <= 0) {
            echo "Failed to update image.";
            $stmt->close();
            exit;
        }

        $stmt->close();
    }

    // Update other fields
    $name = $_POST['name'];
    $position = $_POST['position'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    $stmt1 = $conn->prepare("UPDATE officials_staff SET name = ?, position = ?, age = ?, birthdate = ?, address = ?, phone = ?, email = ? WHERE id = ?");
    $stmt1->bind_param("ssissssi", $name, $position, $age, $birthdate, $address, $phone, $email, $id);
    $stmt1->execute();

    if ($stmt1->affected_rows > 0) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $_GET['id']);
        $_SESSION['success'] = "Profile updated successfully!";

        exit;
    } else {
        echo "Failed to update details.";
    }

    $stmt1->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head2.php' ?>
    <title>ACI-BT | Edit Barangay Official Profile</title>
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include 'header2.php' ?>
    </header>

    <aside id="sidebar" class="sidebar">
        <?php include 'sidebar2.php' ?>
    </aside>

    <main id="main" class="main">
        <a href="bgy_staff_officials.php" class="navigation d-flex align-items-center mx-2">
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
                <h1>Barangay Official Profile</h1>
            </div>

            <section class="section profile">
                <div class="row d-flex justify-content-around">
                    <div class="col-xl-5">
                        <div class="profile-card">
                                    <div class="d-flex align-items-center justify-content-center p-5 gap-5">
                                        
                                        <div class="profile-image ">
                                            <div class="border border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 125px; height: 125px;">
                                                <img src="data:<?php echo $imageType; ?>;base64,<?php echo base64_encode($img); ?>" alt="Image" /></div>    
                                            </div>
                                        <div class="profile-name">
                                            <h2 class="fs-3 fw-bold pt-3"><?php echo $name; ?></h2>
                                            <h5 class="mt-n5 text-center"><?php echo $position ?></h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-details px-4">
                                            <div class="profile-overview text-dark" id="profile-overview">
                                                <h5 class="card-title w-100">Profile Details</h5>
                                                <div class="row">
                                                    <div class="col-lg-6 label">Full Name</div>
                                                    <div class="col-lg-6"><?php echo $name; ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 label">Age</div>
                                                    <div class="col-lg-6"><?php echo $age; ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 label">Birthday</div>
                                                    <div class="col-lg-6"><?php echo $birthdate; ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 label">Address</div>
                                                    <div class="col-lg-6"><?php echo $address; ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 label">Phone</div>
                                                    <div class="col-lg-6"><?php echo $phone; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="profile-card">
                            <div class="card-body px-5 pt-2 ">
                                <h5 class="card-title">Edit Profile</h5>
                            </div>
                                    <form class="text-dark p-2 pt-0 px-5 profile-overview" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="row mb-3">
        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
        <div class="col-md-8 col-lg-9">
            <div class="pt-2">
                <input class="form-control" type="file" accept=".png,.jpg,.jpeg" id="formFile" name="img">
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
        <div class="col-md-8 col-lg-9">
            <input name="name" type="text" class="form-control" id="fullName" value="<?php echo $name; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="position" class="col-md-4 col-lg-3 col-form-label">Position</label>
        <div class="col-md-8 col-lg-9">
            <input name="position" type="text" class="form-control" id="position" value="<?php echo $position; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="age" class="col-md-4 col-lg-3 col-form-label">Age</label>
        <div class="col-md-8 col-lg-9">
            <input name="age" type="number" class="form-control" id="age" value="<?php echo $age; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="birthdate" class="col-md-4 col-lg-3 col-form-label">Birthdate</label>
        <div class="col-md-8 col-lg-9">
            <input name="birthdate" type="date" class="form-control" id="birthdate" value="<?php echo $birthdate; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
        <div class="col-md-8 col-lg-9">
            <input name="address" type="text" class="form-control" id="address" value="<?php echo $address; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
        <div class="col-md-8 col-lg-9">
            <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $phone; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
        <div class="col-md-8 col-lg-9">
            <input name="email" type="email" class="form-control" id="email" value="<?php echo $email; ?>" required>
        </div>
    </div>

    <div class="text-end py-3">
        <button type="" name="submit" class="btn btn-primary py-2">Confirm Changes</button>
    </div>
</form>

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