<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Tunisair escales</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
  -->
  <?php
	session_start();
	include("connection.php");

  if (!isset($_SESSION['id'])) { header("location:login.php"); } 
  if ($_SESSION['status'] == '0'){ header("location:index.php"); }
	
?>
  </head>

  <body id="reportsPage">
  <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.php">
                    <h1 class="tm-site-title mb-0">Tunisair</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                    <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link" href="vols.php">
                                <i class="far fa-file-alt"></i>
                                    Vols 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aeroports.php">
                            <i class="fas fa-users"></i>
                            Aeroports
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="escales.php">
                            <i class="fas fa-user-graduate"></i>
                                Etudiants
                            </a>
                        </li>
                       
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="logout.php">
                            <?php echo $_SESSION['login_admin']; ?>, <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <form method="POST" action="create_escale.php" class="tm-login-form">
            <table class="table table-hover tm-table-small tm-product-table">
              <tbody>
                <tr>
                <td style="width:140px"><select class="custom-select form-control" name="no_aeroport" class="form-control validate" required>
                <option value="0">aeroport</option>
                <?php
                $conn=connect();	
	
                if($conn){ 
                  $req = "SELECT no_aeroport	, nom_aeroport FROM aeroport";
                  $result = $conn->query($req);
                  if ($result->rowCount() > 0) {
                    while($row = $result->fetch()) {
                echo
                '
                <option value="'. $row['no_aeroport'] .'">'. $row['no_aeroport'] .' : '. $row['nom_aeroport'] .'</option>';
               }}else {echo '<option value="1">none</option>';}} ?> </select></td>
                  <td><input name="heure_depart" class="form-control validate" required placeholder="heure_depart" type="text" /></td>
                  <td><input name="heure_arrivee" class="form-control validate" required placeholder="heure_arrivee" type="text" /></td>
                  <td><button type="submit" name="ajout" class="btn btn-primary btn-block text-uppercase">
              Ajouter nouveau escale
            </button></td>
                </tr>
              </tbody>
            </table>
            </form>
            <form method="POST" action="create_escale.php">
            <button type="submit" name="delete" class="btn btn-primary btn-block text-uppercase">
              Supprimer toute
            </button></form>
            <div class="tm-product-table-container">
            
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    
                    <th scope="col" colspan="2">N° escale</th>
                    <th scope="col">Heure Depart</th>
                    <th scope="col">Heure Arrive</th>
                    <th scope="col">N° aeroport</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $conn=connect();	
	
                if($conn){ 
                  $req = "SELECT no_escale, heure_depart, heure_arrivee, no_aeroport FROM escale";
                  $result = $conn->query($req);
                  if ($result->rowCount() > 0) {
                    while($row = $result->fetch()) {
                echo
                  ' <form method="post" action="edit&delete_escale.php" class="tm-login-form"><tr>
                  <td colspan="2" class="tm-product-name">'. $row['no_escale'] .'<input type="text"  name="no_escale" hidden class="form-control" value="'. $row['no_escale'] .'"></td>
                    <td><input type="text"  name="heure_depart" class="form-control validate" required value="'. $row['heure_depart'] .'"></td>
                    <td><input type="text"  name="heure_arrivee" class="form-control validate" required value="'. $row['heure_arrivee'] .'"></td>
                    <td><input type="text"  name="no_aeroport" class="form-control validate" required value="'. $row['no_aeroport'] .'"></td>
                    <td>
                    <button type="submit" name="edit" class="tm-product-delete-link" style="cursor:pointer">
                        <i class="far fa-save tm-product-delete-icon"></i>
                        </button>
                      
                    </td>
                    <td>
                      <button type="submit" name="delete" class="tm-product-delete-link" style="cursor:pointer">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i></button>
                    </td>
                  </tr></form>';
                }} 
              }
                ?>
                </tbody>
              </table>
                   
            </div>
            <!-- table container -->
          
          </div>
        </div>
        
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
      <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2019</b> All rights reserved. 
                    
                </p>
      </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
   
  </body>
</html>