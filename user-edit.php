<?php
  // Aqui você se conecta ao banco
  try {
      require(__DIR__. '/database/db.php');
      require(__DIR__. '/funcoes/upload-fotos.php');
    }
  catch(Exception $e) {}

if($_SERVER['REQUEST_METHOD']=='GET'){
if (isset($_GET['id'])){

$id = mysqli_real_escape_string($con,$_GET['id']);

// Executa uma consulta 
$query =  "SELECT id, username, senha, email, foto, e_hostel, ativo FROM `Usuarios` WHERE id =".$id;

 $userdata_arr = array();

$result = mysqli_query($con,$query);
        // var_dump ($result);
if($result){
$userdata_arr = mysqli_fetch_array($result);
};
}
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  if (isset($_POST['id'])){

  $id      = $_POST["id"];
  $username = $_POST["username"];
  $password     = $_POST["senha"];
  $email      = $_POST["email"]; 
  $foto      = $_POST["foto"];

  $query2 ="UPDATE Usuarios SET username= '$username', senha= '$password' , email= '$email', foto= '$foto' WHERE id=".$id;
 
  $result2 = mysqli_query($con,$query2);
  // var_dump ($result2);
  if($result2){
    echo "Sucesso: Atualizado corretamente!";
  }else{
    echo "Aviso: Não foi atualizado!";
  }
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
  <link href="assets/css/user-edit.css" rel="stylesheet"/>
  
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
             <strong>User edit</strong>
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

<div class="main-content">

<!-- User -->
<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
<div class=" dropdown-header noti-title">
<h6 class="text-overflow m-0">Welcome!</h6>
</div>
<a href="../examples/profile.html" class="dropdown-item">
<i class="ni ni-single-02"></i>
<span>My profile</span>
</a>
<a href="../examples/profile.html" class="dropdown-item">
<i class="ni ni-settings-gear-65"></i>
<span>Settings</span>
</a>
<a href="../examples/profile.html" class="dropdown-item">
<i class="ni ni-calendar-grid-58"></i>
<span>Activity</span>
</a>
<a href="../examples/profile.html" class="dropdown-item">
<i class="ni ni-support-16"></i>
<span>Support</span>
</a>
<div class="dropdown-divider"></div>
<a href="#!" class="dropdown-item">
<i class="ni ni-user-run"></i>
<span>Logout</span>
</a>
</div>
</li>
</ul>
</div>
</nav>
<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://www.seumochilao.com.br/wp-content/uploads/2015/07/seguro-viagem-mochileiros.jpg); background-size: cover; background-position: center top;">
<!-- Mask -->
<span class="mask bg-gradient-default opacity-8"></span>
<!-- Header container -->
<div class="container-fluid d-flex align-items-center">
<div class="row">
<div class="col-lg-7 col-md-10">
<h1 class="display-2 text-white">Olá Voluntário</h1>
<p class="text-white mt-0 mb-5">Esta é a sua página de perfil. Aqui vocẽ pode editar seus dados.</p>
<!-- <a href="" class="btn btn-info" data-toggle="modal" data-target="#edit">Edit profile</a> -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit">
  Edit profile
</button>
</div>
</div>
</div>
</div>
<div class="modal" id ="edit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<form METHOD = 'POST'>
      <div class="modal-body">  
      <div class="col-xl-12 order-xl-1">
<div class="card bg-secondary shadow">
<div class="card-header bg-white border-0">
<div class="row align-items-center">
<div class="col-12">
<h3 class="mb-0">My account</h3>
</div>
</div>
</div>
<div class="card-body">
<h6 class="heading-small text-muted mb-4">User information</h6>
<div class="pl-lg-4">
<div class="row ">
<div class="col-lg-6">
<input type="hidden" id= "input-id" name= "id" value="<?php echo $userdata_arr['id']?>"/>

<div class="form-group focused">
<label class="form-control-label" for="input-username">Nome</label>
<input type="text" id="input-username" name= "username" class="form-control input--style-4" value="<?php echo $userdata_arr['username']?>"/>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label class="form-control-label" for="input-email">Email address</label>
<input type="email" id="input-email" name= "email" class="form-control input--style-4" value=<?php echo $userdata_arr['email']?>>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group focused">
<label class="form-control-label" for="input-first-name">Password</label>
<input type="text" id="input-first-name"  name= "senha"class="form-control input--style-4">
</div>
</div>
<div class="col-lg-6">
<div class="form-group focused">
<label class="form-control-label" for="input-last-name">Nova Foto</label>
<div class="field" align="left">
<input class="form-control-file input--style-4" id="files"type="file" name="foto" value=<?php echo $userdata_arr['foto']?>/></br>
<div id="files-preview"></div>
</div>
</div>
</div>
</div>
</div>
<hr class="my-4">

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</footer>
</form>
</body>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>


</html>