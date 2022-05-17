<?php 
    session_start();
    if (!isset($_SESSION['admin'])) {
        $_SESSION['ala'] = true;
        header("Location: index");
    }
    include 'timeConverter.php';
    $pdo = new PDO('sqlite:db/transDb.db');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - S.A WRS Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/adminstyles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admin">S.A Administrator</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main</div>
                        <a class="nav-link" href="admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="admin_stats">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-hashtag"></i></div>
                            Stats
                        </a>
                        <a class="nav-link" href="items">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-truck-droplet"></i></div>
                            Items
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    S.A Administrator
                    <a class="btn btn-sm btn-danger ms-3 mb-2 px-3" href="logout?true"><i class="fa-solid fa-power-off"></i></a>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Recent Transactions
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact #</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact #</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        $sql = 'SELECT *, CASE WHEN tActive = 0 THEN "ACTIVE" WHEN tActive = 1 THEN "DELIVERING" WHEN tActive = 2 THEN "DELIVERED" WHEN tActive = 3 THEN "CANCELLED" END AS stat FROM transactions';
                                        $statement = $pdo -> query($sql);
                                        $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $rec) {
                                            $sql = "SELECT SUM(tTotalPrice) as tp FROM transactionDetails WHERE tCode = '".$rec['tCode']."'";
                                            $statement = $pdo -> query($sql);
                                            $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
                                            $tp = 0;
                                            foreach ($rows as  $tc) {
                                                $tp = $tc['tp'];
                                            }
                                            echo '<tr>
                                                    <td>'.$rec['tID'].'</td>
                                                    <td>'.$rec['tCode'].'</td>
                                                    <td>'.$rec['tCustomerName'].'</td>
                                                    <td>'.$rec['tAddress'].'</td>
                                                    <td>'.$rec['tPhone'].'</td>
                                                    <td>'.tc($rec['tDate']).'</td>
                                                    <td>'.$tp.'</td>
                                                    <td>'.$rec['stat'].'</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary m-1" href="changeStat?id2p='.$rec['tID'].'&stat=0"><i class="fa-solid fa-hourglass"></i></a>
                                                        <a class="btn btn-sm btn-info m-1" href="changeStat?id2p='.$rec['tID'].'&stat=1"><i class="fa-solid fa-truck"></i></a>
                                                        <a class="btn btn-sm btn-success m-1" href="changeStat?id2p='.$rec['tID'].'&stat=2"><i class="fa-solid fa-thumbs-up"></i></a>
                                                        <a class="btn btn-sm btn-warning m-1" href="changeStat?id2p='.$rec['tID'].'&stat=3"><i class="fa-solid fa-square-xmark"></i></a>
                                                        <a class="btn btn-sm btn-danger m-1" href="changeStat?id2p='.$rec['tID'].'&stat=4&c='.$rec['tCode'].'"><i class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="text-center small ">
                        <div class="text-muted">Copyright &copy; S.A WRS 2022</div>
                        <div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal fade" id="confirmationModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <?php 
                    if (isset($_SESSION['delinit'])) {
                        echo '<div class="modal-body bg-warning text-center text-white">
                        <h4>Are you sure you want to delete the selected record?</h4>
                        <a class="btn btn-sm btn-danger" href="changeStat?del='.$_SESSION["delinit"].'">Yes</a>
                        <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
                        </div>';
                    }else if (isset($_SESSION['dsucc'])) {
                        echo '<div class="modal-body bg-warning text-center text-white">
                        <h4>Record Deleted.</h4>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/adminscripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <?php 
        if (isset($_SESSION['delinit'])) {
            echo '<script src="js/adminconfirmation.js"></script>';
            unset($_SESSION['delinit']);
        }
        if (isset($_SESSION['dsucc'])) {
            echo '<script src="js/adminconfirmation.js"></script>';
            unset($_SESSION['dsucc']);
        }
    ?>
</body>

</html>