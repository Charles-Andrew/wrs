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
    <title>Stats - S.A WRS Admin</title>
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
        <?php 
        
            $sql = 'select DISTINCT count(tID) as  oc, (SELECT DISTINCT count(tID) from transactions WHERE tActive = 0) as ac, (SELECT DISTINCT count(tID) from transactions WHERE tActive = 1) as dc, (SELECT DISTINCT count(tID) from transactions WHERE tActive = 2) as sc, (SELECT DISTINCT count(tID) from transactions WHERE tActive = 3) as cc from transactions';
            $statement = $pdo -> query($sql);
            $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
            $oc = 0;
            $ac = 0;
            $dc = 0;
            $sc = 0;
            $cc = 0;
            foreach ($rows as $vals) {
                $oc = $vals['oc'];
                $ac = $vals['ac'];
                $dc = $vals['dc'];
                $sc = $vals['sc'];
                $cc = $vals['cc'];
            }
    
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 text-center">
                    <h1 class="mt-4">Statistics</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card mb-4">
                                <div class="card-header">
                                    Over All
                                </div>
                                <div class="card-body">
                                    <div class="d-md-flex m-2">
                                        <div class="col border border-2">
                                            <h5>All Transactions</h5>
                                            <h3 class="text-secondary"><b><?php echo $oc; ?></b></h3>
                                        </div>
                                        <div class="col border border-2">
                                            <h5>Active Transactions</h5>
                                            <h3 class="text-primary"><b><?php echo $ac; ?></b></h3>
                                        </div>
                                        <div class="col border border-2">
                                            <h5>Currently Delivering Transactions</h5>
                                            <h3 class="text-info"><b><?php echo $dc; ?></b></h3>
                                        </div>
                                    </div>
                                    <div class="d-md-flex m-2">
                                        <div class="col border border-2">
                                            <h5>Cancelled Transactions</h5>
                                            <h3 class="text-warning"><b><?php echo $cc; ?></b></h3>
                                        </div>
                                        <div class="col border border-2">
                                            <h5>Delivered Transactions</h5>
                                            <h3 class="text-success"><b><?php echo $sc; ?></b></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                    $sql = 'SELECT ifnull(SUM(tTotalPrice),0) as os, ifnull((SELECT SUM(tTotalPrice) FROM transactions as t JOIN transactionDetails as td WHERE t.tCode = td.tCode AND tActive = 2 ),0) as ps, ifnull((SELECT SUM(tTotalPrice) FROM transactions as t JOIN transactionDetails as td WHERE t.tCode = td.tCode AND (tActive = 0 || tActive = 1) AND tActive != 3),0) as pends FROM transactions as t JOIN transactionDetails as td WHERE t.tCode = td.tCode AND tActive != 3';
                                    $statement = $pdo -> query($sql);
                                    $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
                                    $pends = 0;
                                    $ps = 0;
                                    $os = 0;
                                    foreach ($rows as $vals) {
                                        $pends = $vals['pends'];
                                        $ps = $vals['ps'];
                                        $os = $vals['os'];
                                    }        
                            ?>
                            <div class="card mb-4">
                                <div class="card-header">
                                    Sales
                                </div>
                                <div class="card-body">
                                    <div class="d-md-flex m-2">
                                        <div class="col border border-2">
                                            <h5>Pending Sales</h5>
                                            <h3 class="text-secondary"><b><?php echo $pends; ?></b></h3>
                                        </div>
                                        <div class="col border border-2">
                                            <h5>Processed Sales</h5>
                                            <h3 class="text-primary"><b><?php echo $ps; ?></b></h3>
                                        </div>
                                        <div class="col border border-2">
                                            <h5>Over All Sales</h5>
                                            <h3 class="text-info"><b><?php echo $os; ?></b></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    echo '<div class="modal-body bg-warning text-center text-white">
                    <h4>Are you sure you want to delete the selected record?</h4>
                    <a class="btn btn-sm btn-danger" href="changeStat?del='.$_SESSION["delinit"].'">Yes</a>
                    <button class="btn btn-sm btn-secondary">No</button>
                    </div>';
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
    ?>
</body>

</html>