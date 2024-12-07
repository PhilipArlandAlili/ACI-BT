<div class="barangay-logo h-50">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <a href="dashboard.php">
            <img src="assets/img/cap-log.png" height="250" alt="Barangay Tiniguiban Logo">
        </a>
    </div>
</div>

<ul class="sidebar-nav pt-3" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link text-light" href="dashboard.php">
            <i class="bi bi-grid text-light fs-5"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed text-light" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-diagram-3 fs-5 text-light"></i>
            <span class="fs-5">Officials</span>
            <i class="bi bi-chevron-down ms-auto fs-5 text-light"></i>
        </a>

        <!-- Collapsible section -->
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="officials/bgy-officials.php">
                    <i class="bi bi-person-check-fill text-light fs-5"></i>
                    <span class="text-light">Barangay Officials</span>
                </a>
            </li>
            <li>
                <a href="officials/bgy-sk-officials.php">
                    <i class="bi bi-person-badge text-light fs-5"></i>
                    <span class="text-light ">SK Officials</span>
                </a>
            </li>
            <li>
                <a href="officials/bgy-staff-officials.php">
                    <i class="bi bi-people-fill text-light fs-5"></i>
                    <span class="text-light ">Barangay Staffs</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link text-light" href="about.php">
            <i class="bi bi-question-circle text-light fs-5"></i>
            <span>About</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="index.php" style="background-color: #F4F3EF;">
            <i class="bi bi-power text-dark fs-5"></i>
            <span class="text-dark">Logout</span>
        </a>
    </li>
</ul>
