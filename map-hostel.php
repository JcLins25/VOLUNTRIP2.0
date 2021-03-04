<?php
//include auth.php file on all secure pages
include("../database/auth.php");
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

    <link rel="stylesheet" href="./style/page-map-hostel.css">
</head>

<body>

<div id="page-map-hostel">

</div>

<div id="container">
        <header class="page-header">
            <div class="redes-sociais">
                <ul>
                    <li>
                        <a href="Insta">
                            <img src="./img/logo/instagram.png" />
                        </a>
                    </li>
                    <li>
                        <a href="Face">
                            <img src="./img/logo/facebook.png" />
                        </a>
                    </li>
                    <li>
                        <a href="Twitter">
                            <img src="./img/logo/twitter.png" alt="Twitter">
                        </a>
                    </li>
                    <li>
                        <a href="Login">
                            <p>Bem Vindo <?php echo $_SESSION['username']; ?>!</p>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="top-bar-container">
                    <img class="logotipo" src="./img/logo/Logo.png" alt="VOLUNTRIP">
            </div>

            
        </header>
        
    </div>

    <div class="header-content">
        <div class=Frase>
        <strong>Seja bem vindo</strong>
        <p>
            Escolha, visualize e aplique para
                
            sua experiência de voluntário
        </p>
        </div>

        <div class="buttons-container">
        <a class="Voltar" href="index.html">VOLTAR</a>
        </div>
    </div>

<div id="mapid" class="animate-appear"></div>


    <div class="hostel">
      
        <span hidden
          data-id="1"
          data-name="Hostel Jampa"
          data-lat="-7.10713"
          data-lng="-34.82787"
        ></span>
      
      
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="./javascript/files-preview.js"></script>

<script src="./javascript/page-map.js"></script>

</body>


</html>
