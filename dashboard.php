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
    <title>ACI-BT | Dashboard</title>
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include 'includes/header.php' ?>
    </header>

    <aside id="sidebar" class="sidebar">
        <?php include 'includes/sidebar.php' ?>
    </aside>

    <main id="main" class="main">
        <div class="container-fluid">
            <div class="pagetitle mb-5 m-5">
                <div class="col-md-12">
                    <div class="welcome-card d-flex align-items-center justify-content-between flex-wrap">
                        <h3 class="fs-1 pt-3">Welcome, <b><?php echo $_SESSION['username'] ?>!</b></h3>

                        <script type="text/javascript">
                            tday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                            tmonth = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                            function GetClock() {
                                var d = new Date();
                                var nday = d.getDay(), nmonth = d.getMonth(), ndate = d.getDate(), nyear = d.getFullYear();
                                var nhour = d.getHours(), nmin = d.getMinutes(), nsec = d.getSeconds(), ap;

                                if (nhour == 0) { ap = " AM"; nhour = 12; }
                                else if (nhour < 12) { ap = " AM"; }
                                else if (nhour == 12) { ap = " PM"; }
                                else if (nhour > 12) { ap = " PM"; nhour -= 12; }

                                if (nmin <= 9) nmin = "0" + nmin;
                                if (nsec <= 9) nsec = "0" + nsec;

                                document.getElementById('datetimes').innerHTML = nhour + ":" + nmin + ":" + nsec + ap + " , " + tmonth[nmonth] + " " + ndate + ", " + nyear + " " + tday[nday];
                            }
                            window.onload = function () {
                                GetClock();
                                setInterval(GetClock, 1000);
                            }
                        </script>

                        <h5 id="datetimes"></h5>
                    </div>
                </div>
            </div>

            <section class="section dashboard">
                <div class="row d-flex container-fluid">

                    <!-- Generate Documents -->
                    <div class="col-lg-4 col px-4">
                        <form action="generate_documents.php">
                            <button class="dashboard-card w-100" type="submit">
                                <div class="card-document p-2 text-center">
                                    <h6 class="card-title fw-semibold fs-4">Generate Documents</h6>
                                </div>
                                <div class="card-body text-center">
                                    <img class="img-fluid card-size" src="./assets/img/certs.png"
                                        alt="Generate Documents">
                                </div>
                                <div class="card-document">
                                    <hr>
                                    <div class="stats"></div>
                                </div>
                            </button>
                        </form>
                    </div>

                    <!-- View Transactions -->
                    <div class="col-lg-4 col px-4">
                        <form action="view_transactions.php">
                            <button class="dashboard-card w-100" type="submit">
                                <div class="card-document p-2 text-center">
                                    <h6 class="card-title fw-semibold fs-4">View Transactions</h6>
                                </div>
                                <div class="card-body text-center">
                                    <img class="img-fluid card-size" src="./assets/img/list.png"
                                        alt="View Transactions">
                                </div>
                                <div class="card-document">
                                    <hr>
                                    <div class="stats"></div>
                                </div>
                            </button>
                        </form>
                    </div>

                    <!-- View Reports -->
                    <div class="col-lg-4 col px-4">
                        <form action="view_reports.php">
                            <button class="dashboard-card w-100" type="submit">
                                <div class="card-document p-2 text-center">
                                    <h6 class="card-title fw-semibold fs-4">View Reports</h6>
                                </div>
                                <div class="card-body text-center">
                                    <img class="img-fluid card-size" src="./assets/img/reports.png" alt="View Reports">
                                </div>
                                <div class="card-document">
                                    <hr>
                                    <div class="stats"></div>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer id="footer" class="footer">
        <?php include 'includes/footer.php' ?>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="assets/js/main.js"></script>

</body>

</html>