
<?php
  
  session_start();
  
 
  try {
  require(__DIR__. '/database/db.php');
  }
  catch(Exception $e) {}
  //   $id = 17; //to do usar a id da seção//
  $username = $_SESSION['username'];
  $id = $_SESSION['Id'];
  $query = "SELECT * FROM `hostel_img` AS `Foto` ORDER BY RAND() LIMIT 2";

  $result = mysqli_query($con,$query);
  $images = mysqli_fetch_all($result, MYSQLI_ASSOC);

 
  $query2 = "SELECT * FROM `Usuarios` AS `Foto` ORDER BY RAND() LIMIT 5";

  $result2 = mysqli_query($con,$query2);
  $images2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOLUNTRIP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

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
  <link href="assets/css/page-map-hostel.css" rel="stylesheet"/>
  <link href="assets/css/home.css" rel="stylesheet"/>
  
</head>

<body>

<div id="page-map-hostel">
    <div id="container">
                <header class="page-header">
                <div class="container d-flex justify-content-between align-items-center">
				<div id="logo">
                <a href=""><img id="Logo-img" src="assets/img/img2/logo/Logo.png" alt=""/></a>
                <!-- Uncomment below if you prefer to use a text logo -->
                <!--<h1><a href="index.html">Regna</a></h1>-->
        </div>

        <div class=Frase>      
         <p>
             <strong>Seja bem vindo</strong>
         </p>
        </div>

            <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="index.php"><img id="User" src= "assets/img/img2/logo/user.png" alt=""></a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
    </div>
</div>

<div id="home_quicklinks">
                                <a class="quicklink link1" href= "<?php echo "user-edit.php?id=".$id?>">
                                    <span class="ql_caption">
                                        <span class="outer">
                                        <img class="edit-user"src="./assets/img/profile.svg" alt="edit-user">
                                            <span class="inner">
                                                <h2>User Edit</h2>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="ql_top"></span>
                                    <span class="ql_bottom"></span>
                                </a>

                                <a class="quicklink link2" href= "<?php echo "hostel-edit.php?id=".$id?>">
                                    <span class="ql_caption">
                                        <span class="outer">
                                          <img class="edit-hostel"src="./assets/img/hostel.svg" alt="edit-hostel">
                                            <span class="inner">
                                                <h2>Hostel Edit</h2>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="ql_top"></span>
                                    <span class="ql_bottom"></span>
                                </a>

                                <a class="quicklink link3" href="map-hostel.php">
                                    <span class="ql_caption">
                                        <span class="outer">
                                        <img class="serch-hostel"src="./assets/img/loupe.svg" alt="serch-hostel">
                                            <span class="inner">
                                                <h2>Search Hostel</h2>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="ql_top"></span>
                                    <span class="ql_bottom"></span>
                                </a>

                                <div class="clear"></div>
                            </div>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>


</html>