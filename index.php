<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>smart-bar </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/styleMain.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+255 684539399</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sun: 24hrs</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">

        <ul>
          <li><a href="auth/customer/login.php">Login</a></li>
          <li><a href="auth/customer/register.php">SignUp</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <h1 class="logo me-auto me-lg-0"><a href="index.php">SMART-BAR</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li class="dropdown"><a href="#"><span>Staff</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="auth/employee/login.php">Employee</a></li>
              <li><a href="auth/manager/login.php">Manager</a></li>
            </ul>
          </li>
          <!-- <li><a class="nav-link scrollto" href="auth/admin/index.php">Admin</a></li> -->
        </ul>
        <i class=" bi bi-list mobile-nav-toggle"></i>
      </nav><!-- navbar -->
      <a href="#available-bar" class="book-a-table-btn scrollto d-none d-lg-flex">Available Bar</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Smart-Bar</span></h1>
          <h2>guarantee to Easy of service </h2>

          <?php if (isset($_GET["redirect"]) && !empty($_GET["redirect"])) : ?>
            <?php if ($_GET["redirect"] == "success") : ?>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                Message sent succesfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
          <?php endif; ?>

        </div>
      </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/bg-A.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>our system is here to enable you to have a counter of a specific bar on a palm of your hand. </h3>
            <p class="fst-italic">
              Smart-Bar will enable you to choose a bar of your desire, make order and wait for service.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> “There comes a time in every woman's life when the only thing that helps is a glass of champagne.” </li>
              <li><i class="bi bi-check-circle"></i> “In a study, scientists report that drinking beer can be good for the liver. I’m sorry, did I say ‘scientists’? I meant Irish people.”</li>
              <li><i class="bi bi-check-circle"></i> “Happiness is having a rare steak, a bottle of whisky and a dog to eat the rare steak.”</li>
            </ul>
            <p>
              Never lie, steal, cheat or drink. But if you must lie, lie in the arms of the one you love.
              If you must steal, steal away from bad company. If you must cheat, cheat death.
              And if you must drink, drink in the moments that take your breath away.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Use Smart-Bar</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>direct access of service</h4>
              <p>It connect you direct with the counter and kitchen</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Drink what you order</h4>
              <p>Smart-bar gives you bill </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>Drink with friends</h4>
              <p>Tell a friend and a friend will tell a friend</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Available Bar Section ======= -->
    <section id="available-bar" class="barlist">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Available Bar</h2>
          <p>List Of Bar Using Smart-Bar</p>
        </div>

        <div class="row">

          <?php require_once("database/dbConnect.php");

          $sql = "SELECT * from bar";

          $results = mysqli_query($mysqli, $sql);

          // output data of each row
          $count = 1;
          while ($row = mysqli_fetch_array($results)) {
            $barID = 'barID' . $count;

            echo ' 
           <a href="auth/customer/barlogin.php?bar_name=' . $row["barName"] . '&bar_id=' . $row["barId"] . '"class="col-sm-12 col-lg-3 order-1 order-lg-12 mt-5">
              <div class="col-lg-4" >
                <div class="card" style="width: 20rem;" data-aos="zoom-in" data-aos-delay="100">
                  <img src="assets/img/image_7.png" class="card-img-top" alt="...">
                  <div class="card-img-overlay">
                    <h5 class="card-title" style="color: #d3af71;">' . 'Bar name :' . ' ' . $row["barName"] . '</h5>
                      <p class="card-text" style="color: white;" >' . 'Bar Manager :' . ' ' . $row["barOwner"] . '<br>
                    ' . 'Located at :' . ' ' . $row["barPhysicalAddress"] . '
                    <br>' . '</p><br>
                    
                  </div>
                </div>
                </div>
            </a>';
          }

          ?>

        </div>

      </div>
    </section><!-- End Available Bar Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Bars</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img2.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img3.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img4.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img9.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img9.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img6.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img10.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img10.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img11.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img11.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img7.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img5.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/img8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/img8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Dar-es-salaam</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Sunday:<br>
                  24HRS
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>smartbar@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+255 684 539398</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="backend/feedbackController.php" method="post" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="fullname" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" id="name" placeholder="Your Name" required>
                  <span class="invalid-feedback"><?php echo $fullname_err; ?></span>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="Your Email" required>
                  <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control <?php echo (!empty($subject_err)) ? 'is-invalid' : ''; ?>" name="subject" id="subject" placeholder="Subject" required>
                <span class="invalid-feedback"><?php echo $subject_err; ?></span>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" name="message" rows="8" placeholder="Message" required></textarea>
                <span class="invalid-feedback"><?php echo $message_err; ?></span>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Smart-Bar</h3>
              <p>
                <strong>Email:</strong>smartbar@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Project Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Network Administration</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>For more updates!</h4>
            <p>Enter your E-mail then Click subscribe button </p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Smart-Bar</span></strong>. All Rights Reserved
      </div>
      <div class="credits">Designed by <a href="#">Smart-Girls</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/mainJs.js"></script>

</body>

</html>