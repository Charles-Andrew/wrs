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
    <title>Items - S.A WRS Admin</title>
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
                    <a class="btn btn-sm btn-danger ms-3 mb-2 px-3" href="logout?true"><i
                            class="fa-solid fa-power-off"></i></a>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Items</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card mb-4">
                                <div class="card-header">
                                    Update
                                </div>
                                <div class="card-body">
                                    <form action="modifyitem" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">Item:</label>
                                            <select class="form-select" name="in" required>
                                                <option selected disabled value="">Select Item...</option>
                                                <?php 
        
                                                    $sql = 'SELECT * FROM items';
                                                    $statement = $pdo -> query($sql);
                                                    $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($rows as $vals) {
                                                        if (isset($_SESSION['cwid']) || isset($_SESSION['cwtd'])) {
                                                            if ($_SESSION['cwid'] == $vals['itemID'] || $_SESSION['cwtd'] == $vals['itemID']) {
                                                                echo '<option value="'.$vals['itemID'].'" selected>'.$vals['itemName'].' - '.$vals['itemPrice'].'</option>';
                                                                $cwin = $vals['itemName'];
                                                                $cwip = $vals['itemPrice'];
                                                            }else{
                                                                echo '<option value="'.$vals['itemID'].'">'.$vals['itemName'].' - '.$vals['itemPrice'].'</option>';
                                                            }
                                                        }else{
                                                            echo '<option value="'.$vals['itemID'].'">'.$vals['itemName'].' - '.$vals['itemPrice'].'</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary mt-2"
                                                    name="btnitemedit">Edit</button>
                                                <button type="submit" class="btn btn-danger mt-2"
                                                    name="btnitemdelete">Delete</button>    
                                            </div>
                                        </div>
                                        <?php 
                                            if (isset($_SESSION['cwid'])) {
                                                echo '<div class="mb-3 d-md-flex">
                                                        <div class="col m-1">
                                                            <label class="form-label">Name:</label>
                                                            <input type="text" name="nn" value="'.$cwin.'" class="form-control" required>
                                                        </div>
                                                        <div class="col m-1">
                                                            <label class="form-label">Price:</label>
                                                            <input type="number" name="np" min="1" value="'.$cwip.'" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" name="btnitemupdate" class="btn btn-primary mt-2">Update</button>
                                                    </div>';
                                            }
                                        ?>
                                    </form>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    Add
                                </div>
                                <div class="card-body">
                                    <form action="modifyitem" method="POST">
                                        <div class="mb-3">
                                            <div class="mb-3 d-md-flex">
                                                <div class="col m-1">
                                                    <label class="form-label">Name:</label>
                                                    <input type="text" name="nin" value="" class="form-control" required>
                                                </div>
                                                <div class="col m-1">
                                                    <label class="form-label">Price:</label>
                                                    <input type="number" name="nip" min="1" value="" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" name="btnaddnew"
                                                    class="btn btn-primary mt-2">ADD</button>
                                            </div>
                                        </div>
                                    </form>
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

    <div class="modal fade" id="statusmodal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <?php 
                    if (isset($_SESSION['ius'])) {
                        echo '<div class="modal-body bg-warning text-center text-white">
                            <h4>Item Successfuly Updated.</h4>
                            </div>';
                    }else
                    if (isset($_SESSION['ias'])) {
                        echo '<div class="modal-body bg-success text-center text-white">
                            <h4>Item Successfuly Added.</h4>
                            </div>';
                    }else
                    if (isset($_SESSION['ids'])) {
                        echo '<div class="modal-body bg-success text-center text-white">
                            <h4>Item Successfuly Deleted.</h4>
                            </div>';
                    }else
                    if (isset($_SESSION['iad'])) {
                        echo '<div class="modal-body bg-warning text-center text-white">
                        <h4>Are you sure you want to delete the selected item?</h4>
                        <a class="btn btn-sm btn-danger" href="modifyitem?del=true">Yes</a>
                        <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
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
        if (isset($_SESSION['ius'])) {
            echo '<script src="js/editconfirmation.js"></script>';
            unset($_SESSION['ius']);
        }
        if (isset($_SESSION['iad'])) {
            echo '<script src="js/deleteitem.js"></script>';
            unset($_SESSION['iad']);
        }
        if (isset($_SESSION['ids'])) {
            echo '<script src="js/editconfirmation.js"></script>';
            unset($_SESSION['ids']);
        }
    ?>
</body>

</html>