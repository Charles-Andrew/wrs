<?php 
    session_start();
    $pdo = new PDO('sqlite:db/transDb.db');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>S.A WRS</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container justify-content-end">
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#portfolio">Products</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#about">Payment</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#contact">Contact</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded border border-primary border-3"
                            href="redi/initOrder?orderinit">Order Now</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="assets/img/avtr.png" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">S.A drop water refilling station</h1>
            <h4 class="text-uppercase mb-0">Kidapawan City</h4>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-icon"><i class="fa-solid fa-bottle-water"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa-solid fa-bottle-water"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa-solid fa-bottle-water"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa-solid fa-bottle-water"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa-solid fa-bottle-water"></i></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">We deliver the highest quality, cleanest, and FDA
                approved water right in front of your doorsteps.</p>
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Products</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-icon"><i class="fa-solid fa-bottle-water"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa-solid fa-bottle-water"></i></div>
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa-solid fa-bottle-water"></i></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
                <div class="col-md-6 col-lg-4 mb-5 text-center">
                    <div class="portfolio-item mx-auto">
                        <img class="img-fluid" src="assets/img/portfolio/gal1.png" alt="..." />
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 text-center">
                    <div class="portfolio-item mx-auto">
                        <img class="img-fluid" src="assets/img/portfolio/gal2.png" alt="..." />
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5 text-center">
                    <div class="portfolio-item mx-auto">
                        <img class="img-fluid" src="assets/img/portfolio/gal3.png" alt="..." />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">Payment</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-4 ms-auto">
                    <p class="lead">We offer Cash on Delivery and Gcash Payment. <br><br><br>Please prepare the total
                        payment upon delivery. </p>
                </div>
                <div class="col-lg-4 me-auto">
                    <p class="lead">For Gcash Transactions: <br>Name: Charles Andrew Barsubia<br>Number: 09307694071
                        <br><br>Present the proof of Gcash Payment Transaction upon delivery.</p>
                </div>
            </div>
            <!-- About Section Button-->
            <div class="text-center mt-4">
                <h6 class="lead"><u>Only only accepts orders from Kidapawan.</u></h6>
            </div>
        </div>
    </section>
    <!-- Contact Section-->
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <p class="lead text-secondary text-center text-uppercase text-secondary mb-0">Have any concerns?</p>
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Us</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa-solid fa-address-book"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row text-center">
                <h2 class="my-2">Email</h2>
                <h5 class="lead">@email.com</h5>
                <h2 class="my-2">Phone</h2>
                <h5 class="lead">091230123012 - Smart</h5>
                <h5 class="lead">091230123012 - Globe</h5>
                <h2 class="my-3 text-uppercase">Or Reach Us at our social media pages.</h2>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        2215 John Daniel Drive
                        <br />
                        Clark, MO 65243
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="facebook.com"><i
                            class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="twitter.com"><i
                            class="fab fa-fw fa-twitter"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Credits</h4>
                    <p class="lead mb-0">
                        Freelance is a free to use, MIT licensed Bootstrap theme created by
                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                        .
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy <a href="admin">S.A WRS</a> 2022</small></div>
    </div>
    <!-- Create Order Modals-->
    <div class="modal fade" id="createOrderModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="atc" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Order ID:</label>
                            <input type="text" class="form-control"
                                value="<?php echo((isset($_SESSION["coc"])?$_SESSION["coc"]:"")); ?>" readonly
                                style="text-align:center; font-size: large; font-weight: bold;" name="oID">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Reciever's Name:</label>
                            <input type="text" class="form-control" placeholder="e.g. Juan Fucker" name="RN"
                                value="<?php echo((isset($_SESSION['rn']))?$_SESSION['rn']:"") ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Reciever's Contact Number:</label>
                            <input type="text" class="form-control" placeholder="e.g. 09XXXXXXXXXX" name="RCN"
                                value="<?php echo((isset($_SESSION['rcn']))?$_SESSION['rcn']:"") ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Complete Address:</label>
                            <textarea class="form-control" rows="3" placeholder="e.g. Taas Santol Kidapawan City"
                                name="CA" required><?php echo((isset($_SESSION['ca']))?$_SESSION['ca']:"") ?></textarea>
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="col-5">
                                <label class="form-label">Product:</label>
                                <select class="form-select form-select-sm" name="Product">
                                    <option selected disabled value="0">Select Item</option>
                                    <?php
                                    $sql = "SELECT *, itemName || ' - ' || itemPrice as choice FROM items";
                                    $statement = $pdo -> query($sql);
                                    $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($rows as $item) {
                                        echo '<option value="'.$item["itemID"].'">'.$item["choice"].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col-2 mx-2">
                                <label class="form-label">Quantiy:</label>
                                <input type="number" name="Quantity" class="form-control form-control-sm" min="1">
                            </div>
                            <div class="col-4 text-md-start text-center">
                                <button class="btn btn-primary mt-4" name="atc">Add to Cart</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h5 class="text-uppercase">Cart:</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantiy</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $coc = $_SESSION['coc'];
                                        $tot = 0;
                                        $sql = "SELECT *, (SELECT SUM(tTotalPrice) FROM transactionDetails WHERE tCode='$coc') as TA FROM transactionDetails JOIN items WHERE tItemID=itemID AND tCode = '$coc'";
                                        $statement = $pdo -> query($sql);
                                        $rows = $statement -> fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $item) {
                                            echo '<tr>
                                                    <td>'.$item['itemName'].'</td>
                                                    <td>'.$item['tItemQuantity'].' gallon/s</td>
                                                    <td><i class="fa-solid fa-peso-sign"></i>'.$item['tTotalPrice'].'</td>
                                                    <td><a type="button" class="btn btn-danger" href="delCart?id='.$item['tID'].'"><i class="fa-solid fa-trash"></i></a></td>
                                                </tr>';
                                            $tot = $item["TA"];
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <h6 class="text-end text-uppercase">Total = <i
                                    class="fa-solid fa-peso-sign"></i><?php echo $tot; ?></h6>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="checkout">Checkout</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="statusmodal" tabindex="-1"
        <?php echo((isset($_SESSION['osr']))?'data-bs-backdrop="static" data-bs-keyboard="false"':"") ?>>
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <?php 
                if (isset($_SESSION['osr'])) {
                    echo '<div class="modal-body bg-primary text-center text-white">
                    <h4>Order Proccessed Successfully</h4>
                    <h6>Please present this code upon delivery:</h6>
                    <h3><u>'.$_SESSION['coc'].'</u></h3>
                    <button class="btn btn-sm btn-danger"data-bs-dismiss="modal">Close</button>
                    </div>';
                } else
                if (isset($_SESSION['blank'])) {
                    echo '<div class="modal-body bg-danger text-center text-uppercase text-white">
                    <h4>Please select a product and quantity.</h4>
                    </div>';
                } else
                if (isset($_SESSION['emptyCart'])) {
                    echo '<div class="modal-body bg-danger text-center text-uppercase text-white">
                    <h4>Cart Empty!</h4>
                    </div>';
                } else
                if (isset($_SESSION['alaf'])) {
                    echo '<div class="modal-body bg-danger text-center text-uppercase text-white">
                    <h4>Login Failed!</h4>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="modal" id="adminlogin" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-secondary text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Secret Key</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="login" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="password" class="form-control form-control-lg" name="apw" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" name="lb" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">
    </script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="js/savescroll.js"></script>
    <?php 
            if ((isset($_SESSION['activeorder']) && $_SESSION['activeorder']) || isset($_SESSION['atcSuccess'])) {
                echo '<script src="js/createorder.js"></script>';
                unset($_SESSION['activeorder']);
                unset($_SESSION['atcSuccess']);
            }
            if (isset($_SESSION['osr'])) {
                echo '<script src="js/ordersuccess.js"></script>';     
                unset($_SESSION['osr']);
                unset($_SESSION['coc']);
            }
            if (isset($_SESSION['blank'])) {
                echo '<script src="js/emptychoice.js"></script>';
                unset($_SESSION['blank']);
            }
            if (isset($_SESSION['emptyCart'])) {
                echo '<script src="js/emptychoice.js"></script>';
                unset($_SESSION['emptyCart']);
            }
            if (isset($_SESSION['ala'])) {
                echo '<script src="js/adminlogin.js"></script>';
                unset($_SESSION['ala']);
            }
            if (isset($_SESSION['alaf'])) {
                echo '<script src="js/adminAla.js"></script>';
                unset($_SESSION['alaf']);
            }
    ?>
</body>

</html>