
<?php
	try {
	require(__DIR__. '/database/db.php');
	}
	catch(Exception $e) {}
 
  $query = "SELECT * FROM `hostel_img` AS `Foto` ORDER BY RAND() LIMIT 3";

  $result = mysqli_query($con,$query);
  $images = mysqli_fetch_all($result, MYSQLI_ASSOC);

 
  $query2 = "SELECT * FROM `Usuarios` AS `Foto` ORDER BY RAND() LIMIT 5";

  $result2 = mysqli_query($con,$query2);
  $images2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VOLUNTRIP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css?v=1.0" rel="stylesheet"/>

  <!-- =======================================================
  * Template Name: Regna - v4.0.1
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="index.php"><img id="Logo-img" src="assets/img/img2/logo/Logo.png" alt=""/></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="index.html">Regna</a></h1>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Quem somos</a></li>
          <li><a class="nav-link scrollto" href="#services">Servi??os</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Hostels</a></li>
          <li><a class="nav-link scrollto" href="#team">Volunt??rios</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contato</a></li>
          <li><a class="nav-link scrollto" href="login.php"><img id="User" src= "assets/img/img2/logo/user.png" alt=""></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Voluntrip</h1>
      <h2>"Os melhores lugares para viajantes volunt??rios"</h2>
      <a href="login.php" class="btn-get-started">Descubra</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row about-container">
          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">O que ?? a Voluntrip?</h2>
            <p>
              A Voluntrip nasceu da necessidade de viajantes volunt??rios que estavam no meio de suas viagens e n??o conseguiam continuar a viagem, pois tinham duvidas se no pr??ximo destino encontrariam hostel disponiveis para voluntariado.
            </p>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-briefcase"></i></div>
              <h4 class="title"><a href="">Voluntariado</a></h4>
              <p class="description">Cadastre-se na Voluntrip, para enxergar as melhores oportunidades de voluntariado no seu pr??ximo destino</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bi bi-card-checklist"></i></div>
              <h4 class="title"><a href="">Hostels</a></h4>
              <p class="description">Mostre a todos os viajantes volunt??rios que o seu Hostel pode recebe-los de v??rias formas.</p>
            </div>
          </div>

          <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"></div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Servi??os Voluntrip</h3>
          <p class="section-description">Veja abaixo todos os servi??os prestadosm pela plataforma.</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="bi bi-briefcase"></i></a></div>
              <h4 class="title"><a href="">Volunt??rios</a></h4>
              <p class="description">Aqui voc?? realiza seu cadastro para ter acesso ao mapa que ir?? mostrar todos os hostel da cidade que voc?? esta.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="bi bi-card-checklist"></i></a></div>
              <h4 class="title"><a href="">Hostels</a></h4>
              <p class="description">Fa??a seu cadastro para mostrar os viajantes volunt??rios as vagas disponiveis para voluntariado.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="zoom-in">
            <div class="box">
              <div class="icon"><a href=""><i class="bi bi-bar-chart"></i></a></div>
              <h4 class="title"><a href="">Mapeamento e Divulga????o dos Hostels</a></h4>
              <p class="description">Utilize -se do nosso mapeamento da cidade e veja quantas oportunidades existem na localidade que voce esta ou que deseja ir.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Hostels</h3>
          <p class="section-description">Encontre aqui os melhores hostel em seus segmentos.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Todos</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <?php 
                  foreach($images as $image ) {
                  echo '<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img class="img-fluid" src="./fotohostel/'.$image["Foto"].'" alt="Foto do Hostel" title="">
                    </div>';
                  }
        ?>
      </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Volunt??rios</h3>
          <p class="section-description">Veja aqui os volunt??rios que mais utilizam a platoforma.</p>
        </div>
        <div class="row">
              <?php 
                  foreach($images2 as $img2 ) {
                   echo '<div class="col-lg-3 col-md-6"><div class="member" data-aos="fade-up"   data-aos-delay="100">
                   <img class="pic" src="./'.$img2["Foto"].'" alt="Foto Voluntarios" title=""/>
                   </div> </div>';
                  }
              ?>  
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Contato</h3>
          <p class="section-description">Fale com a gente!!</p>
        </div>
      </div>

      <!-- Uncomment below if you wan to use dynamic maps -->
      <div class="container mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>Av. Pres. Epitacio Pessoa, n??567<br>Jo??o Pessoa, PB</p>
              </div>

              <div>
                <i class="bi bi-envelope"></i>
                <p>contato@voluntrip.com</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>+55 83 996470556 </p>
              </div>
            </div>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Voluntrip</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<?php echo '<p>Hello World</p>'; ?> 
