<?php
	try {
	require(__DIR__. '/database/db.php');
    require(__DIR__. '/funcoes/upload-fotos.php');
	}
	catch(Exception $e) {}
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username);
 $cpf = mysqli_real_escape_string($con,$_REQUEST['cpf']);
 $cpfBd = str_replace("-", "", $cpf);
 $cpfBd = str_replace(".", "", $cpfBd);
 $gender = mysqli_real_escape_string($con,$_REQUEST['gender']);
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 $foto = upload_fotos ($_FILES, "fotovoluntario");
 $e_hostel = $_REQUEST['idhostel'] ;
        $query = "INSERT into `Usuarios` (username, cpf, senha, email, gender, foto, e_hostel, ativo)
VALUES ('$username', $cpfBd, '".md5($password)."', '$email', '$gender', '$foto', $e_hostel, 1)";
        $result = mysqli_query($con,$query);
        if($result){
                echo 'entra2'; 
            if ($e_hostel == 1) {      
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "cadastro-hostel.php";
        header("Location: http://$host$uri/$extra");
        exit;
            }
            
            echo "<div class='form'>
        <h3>You are registered successfully.</h3>
        <br/>Click here to <a href='login.php'>Login</a></div>";
        }

    }else{}
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
  <link href="assets/css/cadastro.css" rel="stylesheet"/>

</head>

<body>

<div id= "page-voluntario">
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
                
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title">Insira seus dados</h2>
                        <form method="POST" enctype="multipart/form-data">

                            <div class="row row-space">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label class="label">Nome</label>
                                        <input class="form-control input--style-4 " type="text" name="username">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label class="label">CPF/PASSAPORT</label>
                                        <input class="form-control input--style-4" type="text" name="cpf">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label class="label">E-mail</label>
                                        <input class="form-control input--style-4"  type="email" name="email"/>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label class="label">Password</label>
                                        <input class="form-control input--style-4" type="password" name="password"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space"> 
                                <div class="col-5">
                                        <label class="label">Gender</label>
                                        <div class="p-t-30">
                                            <div class="form-check form-check-inline">
                                             <label class="form-check-label">Masculino</label>
                                             <input class="form-check-input" type="radio" checked="checked" name="gender" VALUE="Masc"/>
                                            </div>
                                            <div class="form-check form-check-inline">
                                             <label class="form-check-label">Feminino</label>
                                             <input class="form-check-input"  type="radio" name="gender" VALUE="Femin"/>
                                            </div>
                                            <div class="form-check form-check-inline">
                                             <label class="form-check-label">Outros</label>
                                             <input class="form-check-input"  type="radio" name="gender" VALUE="Outr"/>
                                            </div>
                                        </div>
                                   
                                </div>                            
                                <div class="col-5" >
                                 <label>VOCÊ É HOSTEL?</label>
                                 <div class="p-t-30">
                                    <div class="form-check form-check-inline">
                                                <input class="form-check-input" id= "Sim" name="idhostel" type= "radio" value="1"/>
                                                <label class="form-check-label" for="Sim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" id= "Nao" name="idhostel" type= "radio" value="0"/>
                                            <label class="form-check-label" for="Nao">Não</label>   
                                    </div>
                                 </div>
                                </div>
                             <div class="row row-space">
                                  <div class="col-6">
                                      <div class="form-group">
                                        <div class="field" align="left">
                                        <h3>Fotos Sua</h3>
                                        <input class="form-control-file" id="files"type="file" name="image"/></br>
                                        <div id="files-preview"></div>
                                    </div>
                                  </div>
                                
                             </div>
                             <div class="row row-space">
                                  <div class="col-4">
                                      <div class="form-group">
                                        <input class="btn" type="submit" value="Enviar" name="envia" />
                                      </div>
                                  </div>
                                
                             </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="./assets/js/files-preview.js"></script>
</body>


</html>

