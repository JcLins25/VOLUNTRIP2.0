<?php
	try {
	require(__DIR__. '/database/db.php');
    require(__DIR__. '/funcoes/upload-fotos.php');
	}
	catch(Exception $e) {}
    if($_SERVER['REQUEST_METHOD']=='GET'){
    if (isset($_GET['id'])){
        
    $id = mysqli_real_escape_string($con,$_GET['id']);
    }
}
// If form submitted, insert values into the database.
 if (isset($_REQUEST['hostelname'])){
        // removes backslashes
 $User_ID =  mysqli_real_escape_string($con,$_REQUEST['id']);
 $hostelname = stripslashes($_REQUEST['hostelname']);
        //escapes special characters in a string
 $hostelname = mysqli_real_escape_string($con,$hostelname);
 $cnpj = mysqli_real_escape_string($con,$_REQUEST['cnpj']);
 $email = mysqli_real_escape_string($con,'email');
 var_dump ($_REQUEST);
 $endereco = mysqli_real_escape_string($con,$_REQUEST['Logradouro'].', '.$_REQUEST['Numero'].', '.$_REQUEST['Localidade'].', '.$_REQUEST['UF'],);
 $history = mysqli_real_escape_string($con, 'history');
 $fotos = upload_multiples_fotos ($_FILES['files'], "fotohostel", "files");
 $ch = curl_init(); 
 $url = "http://www.mapquestapi.com/geocoding/v1/address?key=tMIwGu01s4teRLEGZMmSbAtKFyeaFTey&location=" . urlencode( $endereco) . "&maxResults=1";
// //  $url = urlencode ($url);
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
// //  curl_setopt($ch, CURLOPT_HEADER, 0);
//  curl_setopt($ch, CURLOPT_HTTPGET, 1);
 $result_geocoding = curl_exec($ch);

    // trigger_error(curl_error($ch));

 $obj = json_decode($result_geocoding, true);

 $lat = ($obj['results'][0]["locations"][0]["latLng"]['lat']);
 $lng = ($obj['results'][0]["locations"][0]["latLng"]['lng']);
// echo "<br />";
// print_r($result_geocoding->results[0]);
// echo "<br />";
//  $latlng = $obj->info;
//  $lat = $latlng->displayLatLng->lat;
//  $lng = $latlng->displayLatLng->lng;
//  curl_close($ch);
    $query = "INSERT into `Hostel` (User_ID, hostelname, cnpj, email, endereco, history, latitude, longitude, ativo)
VALUES ('$User_ID', '$hostelname', '$cnpj', '$email', '$endereco', '$history', $lat, $lng, 1)";
      $result = mysqli_query($con,$query);

        if($result){
            
            $Id_hostel = mysqli_insert_id($con);
            foreach ($fotos as $foto){
                $query2 = "INSERT INTO `hostel_img`(`Foto`, `Id_hostel`) VALUES ('$foto', '$Id_hostel')";
                $result2 = mysqli_query($con,$query2);
            }
     echo "<div class='form'>
      <h3>You are registered successfully.</h3>
      <br/>Click here to <a href='login.php'>Login</a></div>";
        }
    else{
        echo "<div class='form'>
      <h3>Erro.</h3><br/>".var_dump ($result)
      ."</div>";
    }
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
  <link href="assets/css/cadastro-hostel.css" rel="stylesheet"/>
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

    </div>
                
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <div class="wrapper wrapper--w680">
            <div class="card card-6">
                    <div class="card-body">
                        <h2 class="title">Insira seus dados</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                            <input type="hidden" id= "input-id" name= "id" value="<?php echo $id?>"/>
                                    <div class="form-group col-sm-4">
                                        <label class="col-6">Nome do Hostel</label>
                                        <div class="col-12">
                                        <input class="form-control input--style-4" type="text" name="hostelname">
                                        </div>
                                    </div>
                                 
                                    <div class="form-group col-sm-4">
                                        <label class="col-6">CNPJ</label>
                                        <div class="col-12">
                                        <input class="form-control input--style-4" type="text" name="cnpj">
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label class="col-6">Email</label>
                                        <div class="col-12">
                                        <input class="form-control input--style-4" type="text" name="email">
                                        </div>
                                    </div>
                               
                            </div>
    
                        <div class="form-row">
                           <div class="form-group col-sm-2">
                                        <label class="col-8">Cep</label>
                                        <div class="col-12">
                                        <input id="search_txt" class="form-control input--style-4" type="text" name="cep"/>
                                        <button type="button" id="search-cep">Pesquisar Cep</button>
                                        </div>
                                </div>
                                <div class="form-group col-sm-4">
                                        <label class="col-8">Logradouro</label>
                                        <div class="col-12">
                                        <input id="logradouro_txt" class="form-control input--style-4" type="text" name="Logradouro"/>
                                        </div>
                                </div>
                                <div class="form-group col-sm-1">
                                        <label class="col-12">N°</label>
                                        <div class="col-12">
                                        <input id="Numero_txt" class="form-control input--style-4" type="text" name="Numero"/>
                                        </div>
                                </div>
                                <div class="form-group col-sm-4">
                                        <label class="col-4">Cidade</label>
                                        <div class="col-12">
                                        <input id="localidade_txt" class="form-control input--style-4" type="text" name="Localidade"/>
                                        </div>
                                </div>
                                <div class="form-group col-sm-1">
                                        <label class="col-12">UF</label>
                                        <div class="col-12">
                                        <input id="uf_txt" class="form-control input--style-4" type="text" name="UF"/>
                                        </div>
                                </div>
                            </div>
                        </div>

                            <div class="form-row">
                                <div class="col-sm-11">
                                    <div class="form-group col-sm-12">
                                        <label class="col-12" for="bio">FALE SOBRE O HOSTEL</label>
                                        <div class="col-12">
                                        <textarea class=" col-12 form-control input--style-4" name="history" id="history" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                              <div class="col-sm-11">
                                 <div class="form-group col-sm-12">
                                   <div class="col-12">
                                     <div class="field" align="left">
                                        <h3>Fotos Hostel</h3>
                                        <input class="form-control-file" type="file" id="files" name="files[]" multiple/>
                                        <div id="files-preview"></div>
                                    </div> 
                                   </div>
                                  </div>
                              </div>
                            </div>
                                
                            <div class="row">
                                  <div class="col-4">
                                  <div class="form-group">
                                    <input class="btn" id="button" type="submit" value="Enviar" name="envia" />
                                  </div>
                                 </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="./assets/js/files-preview.js"></script>
    <script src="./assets/js/cep.js"></script>
</body>


</html>