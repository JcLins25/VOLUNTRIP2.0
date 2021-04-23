
<?php
	try {
	require(__DIR__. '/database/db.php');
	}
	catch(Exception $e) {}
        
 $hostel = stripslashes($_REQUEST['hostel']);

    $query = "SELECT * FROM `hostel_img` WHERE `Id_hostel` =".$hostel;

    $query2 = "SELECT * FROM `Hostel` WHERE `Id_hostel` =".$hostel; 

      $result = mysqli_query($con,$query);

      $result2 = mysqli_query($con,$query2);

      $return_arr = array(); 

      $hostel_arr = array();

        if($result && $result2){

    while($row = mysqli_fetch_array($result)){
    $id_hostel_img = $row['id_hostel_img'];
    $Foto = $row['Foto'];
   
    $return_arr[] = array("id_hostel_img" => $id_hostel_img,
                    "Foto" => $Foto);
    }
    $hostel_arr = mysqli_fetch_array($result2);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOLUNTRIP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
  <link href="assets/css/hostel.css" rel="stylesheet"/>
</head>

<body>

<div id="page-hostel">

  
    <div id="container">
                <header class="page-header">
                <div class="container d-flex justify-content-between align-items-center">
				<div id="logo">
                <a href=""><img id="Logo-img" src="assets/img/img2/logo/Logo.png" alt=""/></a>
                <!-- Uncomment below if you prefer to use a text logo -->
                <!--<h1><a href="index.html">Regna</a></h1>-->
                </div>

            <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="index.php"><img id="User" src= "assets/img/img2/logo/user.png" alt=""></a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
    </div>

</header>

    <div class="images">
            <div class="col-lg-12">
              <div id="myCarouselArticle" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                <?php 
                  foreach($return_arr as $img ) {
                  echo '<div class="carousel-item active">
                    <img class="img-fluid" src="./fotohostel/'.$img["Foto"].'" alt="Foto do Hostel" title="">
                    </div>';
                  }
                ?>
                  
                  <!-- <div class="carousel-item">
                    <img class="img-fluid" src="./img/fotos hostel/areacomun.jpeg" alt="Area Comum" title="">
                  </div>
                  <div class="carousel-item">
                    <img class="img-fluid" src="./img/fotos hostel/recepção.jpeg" alt="Recepção" title="">
                  </div>
                  <div class="carousel-item">
                    <img class="img-fluid" src="./img/fotos hostel/quartos.jpeg" alt="Quartos" title="">
                  </div> -->
                </div>
                <a class="carousel-control-prev" href="#myCarouselArticle" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarouselArticle" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
 
        </div>
    </div>

    <div class="hystory">
      <p>
        <?php 
                   echo $hostel_arr['history'];            
        ?>
      </p>
    </div>
        
        <ul class="aplication">
            
            <li>

                <a class="Worldpackers" href="https://www.worldpackers.com/pt-BR">Aplique no WP</a>
            </li>
    
            <li>
                <a class="Coushsurfing" href="https://www.couchsurfing.com/">Aplique no CS</a>
            </li>
    
            <li>
                <a class="Contato-Direto" href="https://www.booking.com/index.pt.html?aid=376377;label=booking-name-pt-row-bwMffLz*fdB8PTKNsC9tlgS410921719638:pl:ta:p1:p22.563.000:ac:ap:neg:fi:tiaud-898142577569:kwd-65526620:lp1001622:li:dec:dm:ppccp=UmFuZG9tSVYkc2RlIyh9YXwxhKG0pUU-3JdcXtALQMg;ws=&gclid=Cj0KCQiA5bz-BRD-ARIsABjT4ngmrtwhz6c_8B9OELvheShai95mI7xoTplNnPB97I60Fs1ZlQMGqIMaAs8mEALw_wcB">Aplique Direto</a>
            </li>
        </ul>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>


</html>